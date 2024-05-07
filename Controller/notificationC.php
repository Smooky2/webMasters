<?php
require_once '../Assets/Utils/config.php';
class NotificationC
{

    public function addNotification($user_id, $requested_role_id)
    {
        $db = config::getConnexion();

        if ($this->notificationExistsForUser($user_id)) {
            return "Notification already exists for this user";
        }

        try {
            $query = "INSERT INTO notification (user_id, requested_role_id) VALUES (:user_id, :requested_role_id)";
            $stmt = $db->prepare($query);

            $stmt->bindValue(':user_id', $user_id);
            $stmt->bindValue(':requested_role_id', $requested_role_id);

            $stmt->execute();

            return "Notification sent successfully";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return "Error adding notification";
        }
    }
    public function getRoleById($roleId)
    {
        $db = config::getConnexion();

        $stmt = $db->prepare("SELECT * FROM role WHERE idrole = :role_id");
        $stmt->bindParam(':role_id', $roleId, PDO::PARAM_INT);
        $stmt->execute();

        $role = $stmt->fetch(PDO::FETCH_ASSOC);

        return $role;
    }
    private function notificationExistsForUser($user_id)
    {
        $db = config::getConnexion();
        $query = "SELECT COUNT(*) FROM notification WHERE user_id = :user_id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count > 0;
    }
    public function getNotifications()
    {
        $db = config::getConnexion();

        try {
            $query = "SELECT * FROM notification";
            $stmt = $db->query($query);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function deleteNotification($notificationId)
    {
        $db = config::getConnexion();

        try {
            $query = "DELETE FROM notification WHERE user_id = :id";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':id', $notificationId);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

}
?>
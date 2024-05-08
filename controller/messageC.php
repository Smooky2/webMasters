<?php
include_once 'C:\xampp\htdocs\projet\config.php';
include 'C:\xampp\htdocs\projet\vendor\autoload.php';


class messageC

{
    private function sendEmailNotification($subject, $data)
    {
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'magicbook.pi@gmail.com';
            $mail->Password = 'rhtwjrjcrjbmlerk';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('admin@php.com', 'Systeme de notification');
            $mail->addAddress('bsaiestaieb@gmail.com');

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $data;

            $mail->send();
        } catch (Exception $e) {
            echo "Le message n'a pas pu être envoyé. Erreur du messager : {$mail->ErrorInfo}";
        }
    }
        
    public function getCommentsByForumId($id_forum)
{
    // Use your database connection and query to fetch comments
    // Replace this with your actual database code
    $sql = "SELECT * FROM message WHERE id_forum = :id_forum";
    $db = Config::getConnexion();

    try {
        $query = $db->prepare($sql);
        $query->bindValue(':id_forum', $id_forum);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
public function addComment($forum_id, $comment_content,$date_sys)
    {
        $sql = "INSERT INTO message (contenu, date_poste,id_forum,id_user) VALUES (:contenu, :date_sys,:id_forum,:id_user)";
        $db = Config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->execute([
                'contenu' => $comment_content,
                'date_sys' => $date_sys,
                'id_forum' => $forum_id,
                'id_user' => 1,
            ]);
            $this->sendEmailNotification("Commentaire ajoute","Un commentaire a été ajouté");
            // Return the ID of the inserted row
            return $db->lastInsertId();
        } catch (PDOException $e) {
            // Add an error message for debugging
            echo 'Error: ' . $e->getMessage();
            return 0; // Return 0 to indicate failure
        }
    }
    public function getCommentsByUserId($user_id)
{
    $sql = "SELECT * FROM message WHERE id_user = :user_id";
    $db = Config::getConnexion();

    try {
        $query = $db->prepare($sql);
        $query->execute(['user_id' => $user_id]);
        
        // Fetch all comments associated with the user
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Handle the exception (e.g., log error, display message, etc.)
        echo 'Error: ' . $e->getMessage();
        
    }
}
public function listCommentsForforum($id_forum)
{
    // Assuming you have a method to fetch comments from the database
    $message = $this->fetchCommentsFromDatabase($id_forum);
    return $message;
}

// Example of fetching comments from the database
private function fetchCommentsFromDatabase($id_forum)
{
    // Use your database connection and query to fetch comments
    // Replace this with your actual database code
    $sql = "SELECT * FROM message WHERE id_forum = :id_forum";
    $db = Config::getConnexion();

    try {
        $query = $db->prepare($sql);
        $query->bindValue(':id_forum', $id_forum);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

public function deleteComment($id_message)
{
    $sql = "DELETE FROM message WHERE id_message = :id_message";
    $db = Config::getConnexion();

    try {
        $query = $db->prepare($sql);
        $query->bindValue(':id_message', $id_message);
        $query->execute();
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

public function getCommentCountsByForum() {
    try {
        $pdo = config::getConnexion();
        
        $query = "SELECT f.titre AS forum_name, COUNT(c.id_message) AS comment_count 
                  FROM message c
                  INNER JOIN forum f ON c.id_forum = f.id_forum 
                  GROUP BY c.id_forum";
            
        $statement = $pdo->prepare($query);
        $statement->execute();
    
        $commentCounts = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $commentCounts[] = $row; // Store each row as an associative array
        }
    
        return $commentCounts;
    } catch (PDOException $e) {
        // Handle exceptions here
        throw new Exception("Error fetching comment counts with forum names: " . $e->getMessage());
    }
}
public function modifier_comment($id_message,$content,$currentDate)
    {   /*$id_message = $forum->getidmessage();
        $contenu = $message->getcontenu();
        $date_sys = $message->getDateSys();*/
       
        // Requête SQL UPDATE
        $sql = "UPDATE message SET contenu = :contenu, date_poste = :date_sys   WHERE id_message = :id";
        $db = Config::getConnexion();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id_message);
        $stmt->bindParam(':contenu', $content);
        $stmt->bindParam(':date_sys', $currentDate);
      
        $stmt->execute();
    } 

    /*public function increaseLike($comment_id)
    {
        $sql = "UPDATE message SET 'like' = 'like' + 1 WHERE id_message = :id_message";
        $db = Config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id_message', $comment_id);
            $query->execute();
            return true;
        } catch (PDOException $e) {
            // Add an error message for debugging
            echo 'Error: ' . $e->getMessage();
            return false; // Return false to indicate failure
        }
    }*/
    public function increaseLike($comment_id)
{
    $sql = "UPDATE message SET `like` = `like` + 1 WHERE id_message = :id_message";
    $db = Config::getConnexion();

    try {
        $query = $db->prepare($sql);
        $query->bindValue(':id_message', $comment_id);
        $query->execute();

        // Get the updated like count
        $sql = "SELECT `like` FROM message WHERE id_message = :id_message";
        $query = $db->prepare($sql);
        $query->bindValue(':id_message', $comment_id);
        $query->execute();
        $likeCount = $query->fetchColumn();

        return $likeCount;
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return false;
    }
}
public function increasedisLike($comment_id)
{
    $sql = "UPDATE message SET `dislike` = `dislike` + 1 WHERE id_message = :id_message";
    $db = Config::getConnexion();

    try {
        $query = $db->prepare($sql);
        $query->bindValue(':id_message', $comment_id);
        $query->execute();

        // Get the updated like count
        $sql = "SELECT `dislike` FROM message WHERE id_message = :id_message";
        $query = $db->prepare($sql);
        $query->bindValue(':id_message', $comment_id);
        $query->execute();
        $dislikeCount = $query->fetchColumn();

        return $dislikeCount;
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return false;
    }
}
    

}























?>
<?php

    require_once '../Assets/Utils/config.php';
    require_once '../Model/user.php';


    class UserC {
    
public function afficheruser() {
    $db = config::getConnexion();
    $query = "SELECT * FROM user";
    $stmt = $db->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



public function getUserRole($userId) {
    $config = config::getConnexion();
        // Prepare and execute query to fetch user role
        $stmt = $config->prepare("SELECT idrole FROM user WHERE id = :userId");
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();

        // Fetch user role ID
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $roleId = $result['idrole'];

            // Query to fetch role title based on role ID from the roles table
            $roleStmt = $config->prepare("SELECT titre FROM role WHERE idrole = :roleId");
            $roleStmt->bindParam(':roleId', $roleId);
            $roleStmt->execute();

            // Fetch role title
            $roleResult = $roleStmt->fetch(PDO::FETCH_ASSOC);

            if ($roleResult) {
                return $roleResult['titre'];
            } else {
                return null; // Role title not found
            }
        } else {
            return null; // User not found or role ID not available
        }
    } 



        public function loginUser($emails, $pass) {
            $db = config::getConnexion();
            $query = "SELECT * FROM user WHERE emails = :emails";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':emails', $emails);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
            if ($user) {
                if ($pass === $user['pass']) {
                    return $user; // Return user data if login successful
                } else {
                    return null; // Return null for incorrect password
                }
            } else {
                return null; // Return null for user not found
            }
        }
        
        
        public function makeUserAdmin($user_id) {
       
            try {
                $conn = config::getConnexion();
                // Set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                // Update the user's role to admin in the database
                $stmt = $conn->prepare("UPDATE user SET idrole = (SELECT idrole FROM role WHERE titre = 'admin') WHERE id = :user_id");
                $stmt->bindParam(':user_id', $user_id);
                $stmt->execute();
    
                return true; // Successfully made the user an admin
            } catch(PDOException $e) {
                // Handle database connection or query error
                echo "Connection failed: " . $e->getMessage();
                return false; // Failed to make the user an admin
            }
        }
        








        // Create a new user
        public function createUser(User $user) {
            $db = config::getConnexion();

            $query = "INSERT INTO user (id, nom, prenom, emails, adresse, pass, rpass, dater, phone, gender, idrole) 
                      VALUES (:id, :nom, :prenom, :emails, :adresse, :pass, :rpass, :dater, :phone, :gender, :idrole)";
            // Prepare the SQL statement
            $stmt = $db->prepare($query);
    
            // Bind parameters
            $stmt->bindValue(':id', $user->getId());
            $stmt->bindValue(':nom', $user->getNom());
            $stmt->bindValue(':prenom', $user->getPrenom());
            $stmt->bindValue(':emails', $user->getEmails());
            $stmt->bindValue(':adresse', $user->getAdresse());
            $stmt->bindValue(':pass', $user->getPass());
            $stmt->bindValue(':rpass', $user->getRpass());
            $stmt->bindValue(':dater', $user->getDater());
            $stmt->bindValue(':phone', $user->getPhone());
            $stmt->bindValue(':gender', $user->getGender());
            $stmt->bindValue(':idrole', $user->getidrole());
            // Execute the query
            return $stmt->execute();
        }
    
        // Read user information by ID
        public function getUserById($id) {
            $db = config::getConnexion();
            $query = "SELECT * FROM user WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
    
            // Fetch user data as an associative array
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    
// Update user information
public function updateUser(User $user) {
    $db = config::getConnexion();
    $query = "UPDATE user SET nom = :nom, prenom = :prenom, emails = :emails, adresse = :adresse, 
              pass = :pass, rpass = :rpass, dater = :dater, phone = :phone, gender = :gender, idrole = :idrole WHERE id = :id";
    $stmt = $db->prepare($query);

    // Bind parameters
    $stmt->bindValue(':id', $user->getId());
    $stmt->bindValue(':nom', $user->getNom());
    $stmt->bindValue(':prenom', $user->getPrenom());
    $stmt->bindValue(':emails', $user->getEmails());
    $stmt->bindValue(':adresse', $user->getAdresse());
    $stmt->bindValue(':pass', $user->getPass());
    $stmt->bindValue(':rpass', $user->getRpass());
    $stmt->bindValue(':dater', $user->getDater());
    $stmt->bindValue(':phone', $user->getPhone());
    $stmt->bindValue(':gender', $user->getGender()); 
    $stmt->bindValue(':idrole', $user->getidrole()); 
    // Execute the query
    return $stmt->execute();
}

    
        // Delete user by ID
        public function deleteUser($id) {
            $db = config::getConnexion();
            $query = "DELETE FROM user WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':id', $id);
    
            // Execute the query
            return $stmt->execute();
        }
    }
    
?>
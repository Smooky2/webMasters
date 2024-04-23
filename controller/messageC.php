<?php
include_once 'C:\xampp\htdocs\projet\config.php';


class messageC
{
        
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
                'id_user' => 3,
            ]);

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

function getCommentCountsByForum() {
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



}























?>
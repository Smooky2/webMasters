<?php
include 'C:\xampp\htdocs\projet\config.php';

class forumc{


public function addForum($forum)
{
    $sql = "INSERT INTO forum (id_forum, titre, description, date_creation,createur_forum_id) VALUES (:id_forum,:titre,:description,:date_creation,:createur_forum_id)";
    $db = Config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'id_forum'=>$forum->getid_forum(),
            'titre' => $forum->gettitre(),
            'description' => $forum->getdescription(),
            'date_creation' => $forum->getdate_creation(),
            'createur_forum_id' =>$forum->getcreateur_forum_id()
        ]);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
public function listForum()
    {
        $db =Config::getConnexion();
        try {
            // Select all publications
            $sql = "SELECT * FROM Forum";
            Config::getConnexion();
            $list = $db->prepare($sql);
            $list->execute();

            // Fetch the result set
            return $list->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle exceptions
            die('Error:' . $e->getMessage());
        }
    }

    public function modifyforum($forum)
    {   $id_forum = $forum->getid_forum();
        $titre = $forum->gettitre();
        $description = $forum->getdescription();
       
        // Requête SQL UPDATE
        $sql = "UPDATE forum SET titre = :titre, description = :description   WHERE id_forum = :id";
        $db = Config::getConnexion();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id_forum);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':description', $description);
      
        $stmt->execute();
    }    
    public function suppforum($forum)
    {
        
    
    $db = Config::getConnexion();
    try {
        // Delete a publication by ID
        $sql = "DELETE FROM forum WHERE id_forum = :id";
        $req = $db->prepare($sql);
        $req->bindValue(':id', $forum);
        $req->execute();
    } catch (PDOException $e) {
        // Handle exceptions
        die('Error:' . $e->getMessage());
    }


}
}







?>
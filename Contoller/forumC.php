<?php
include_once 'C:\xampp\htdocs\projetfinal\config.php';

class forumc{

    public function getForumById($id_forum)
    {
        $db = Config::getConnexion();

        try {
            $query = $db->prepare('SELECT * FROM forum WHERE id_forum = :id_forum');
            $query->bindValue(':id_forum', $id_forum);
            $query->execute();

            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Add an error message for debugging
            echo 'Error: ' . $e->getMessage();
           
        }
    }
public function addForum($forum)
{
    $sql = "INSERT INTO forum (id_forum, titre, description, date_creation) VALUES (:id_forum,:titre,:description,:date_creation)";
    $db = Config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'id_forum'=>$forum->getid_forum(),
            'titre' => $forum->gettitre(),
            'description' => $forum->getdescription(),
            'date_creation' => $forum->getdate_creation()
            
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
function searchPublications($recherche) {
    $sql = "SELECT * FROM forum
            WHERE titre LIKE :recherche 
            OR description LIKE :recherche";

    $db = config::getConnexion();
    
    try {
        $query = $db->prepare($sql);
        $query->bindValue(':recherche', '%' . $recherche . '%');
        $query->execute();
        $publications = $query->fetchAll();
        return $publications;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}
function trierforum(){
    $sql = "SELECT * FROM forum ORDER BY date_creation DESC";
    $db = config::getConnexion();
    try {
        $req = $db->query($sql);
        return $req;
    } catch (Exception $e) {
        echo 'Erreur: ' . $e->getMessage();
    }
}
function trierforumS(){
    $sql = "SELECT * FROM forum ORDER BY date_creation ASC";
    $db = config::getConnexion();
    try {
        $req = $db->query($sql);
        return $req;
    } catch (Exception $e) {
        echo 'Erreur: ' . $e->getMessage();
    }
}

}







?>
<?php
include '..\config.php';
include '..\Model\Event.php';
include '..\Model\Review.php';

class ReviewC
{

    public function AfficherEvent($nomE)
    { 
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM events WHERE nomE LIKE :nom");
            $query->execute(['nom' => "%$nomE%"]); // Using LIKE for partial matching
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function AfficherReview($text)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM events e, reviews r WHERE e.nomE LIKE :nom and r.idev = e.idE");
            $query->execute(['nom' => "%$text%"]);
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function addrate($rev)
    {
        $sql = "INSERT INTO reviews (idRev,stars,dateRev,id_user,idev)  
        VALUES (NULL,:stars,NULL,NULL,NULL)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'stars' => $rev->getstars(),
    
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}

?>

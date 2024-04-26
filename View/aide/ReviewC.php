<?php
include '..\aide\config.php';
include '..\aide\Event.php';
include '..\aide\Review.php';

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

    public function AfficherReview($idE)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM reviews WHERE idev = :idE");
            $query->execute(['idE' => $idE]);
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function addrate($rev)
    {
        $sql = "INSERT INTO reviews (stars,idev)  
        VALUES (:stars, :idev)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'stars' => $rev->getstars(),
                'idev' => $rev->getidev()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}

?>

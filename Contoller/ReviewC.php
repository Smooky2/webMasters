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
            //$query = $pdo->prepare("SELECT * FROM events e, reviews r WHERE e.nomE LIKE :nom and r.idev = e.idE");
            $query = $pdo->prepare("SELECT * FROM events e, reviews r WHERE e.idE = :id and r.idev = e.idE");
            //$query->execute(['nom' => "%$text%"]);
            $query->execute(['id' => $id]);
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
    public function deleterate($idRev)
{
    $sql = "DELETE FROM reviews WHERE idRev = :idRev";
    $db = config::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(':idRev', $idRev);

    try {
        $req->execute();
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}
public function listrate()
    {
        $sql = "SELECT * FROM reviews ";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function listrates($idE)
{
    $sql = "SELECT * FROM reviews WHERE idev = :idE";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->bindParam(':idE', $idE, PDO::PARAM_INT);
        $query->execute();
        $liste = $query->fetchAll();
        return $liste;
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}
}


?>

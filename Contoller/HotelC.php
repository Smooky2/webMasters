<?php

require_once __DIR__ . '/../config.php';

class Hotels
{

    public function listHotels()
    {

        $sql = "SELECT * FROM hotel";
        $conn = Config::getConnexion();
        try {
            $liste = $conn->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function addHotel($hotel)
    {
        $sql = "INSERT INTO hotel  
        VALUES (NULL, :fn,:ln,:d,:i)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'fn' => $hotel->getName(),
                'ln' => $hotel->getLocation(),        
                'd' => $hotel->getdescription(),
                'i' => $hotel->getImages(),


            
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    

    function deleteHotel($id)
    {
        $conn = Config::getConnexion();
        
        // Supprimer d'abord les réservations associées à cet hôtel
        $sqlDeleteReservations = "DELETE FROM reservation WHERE idH = :idH";
        $reqDeleteReservations = $conn->prepare($sqlDeleteReservations);
        $reqDeleteReservations->bindValue(':idH', $id);
    
        try {
            $reqDeleteReservations->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    
        // Ensuite, supprimer l'hôtel lui-même
        $sqlDeleteHotel = "DELETE FROM hotel WHERE idH = :idH";
        $reqDeleteHotel = $conn->prepare($sqlDeleteHotel);
        $reqDeleteHotel->bindValue(':idH', $id);
    
        try {
            $reqDeleteHotel->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    




    function updateHotel($hotel, $id)
    {
        $sql = "UPDATE hotel SET 
            `name` = :n, 
            `location` = :l, 
            `desc` = :d,
            `images`=:i
            WHERE idH = :idH";
    
        $conn = Config::getConnexion();
        try {
            $list = $conn->prepare($sql);
    
            $list->bindValue(':idH', $id);
            $list->bindValue(':n', $hotel->getName());
            $list->bindValue(':l', $hotel->getLocation());
            $list->bindValue(':d', $hotel->getDescription());
            $list->bindValue(':i', $hotel->getImages());
    
            $list->execute();
            
           
          
        } catch (PDOException $e) {
            echo $e->getMessage(); // You should handle the exception appropriately, not just echo the message.
        }
        return $list;
        }

    
        function showHotel($id)
        {
    
            $sql = "SELECT * from hotel where idH = $id";
            $conn = Config::getConnexion();
            try {
                $query = $conn->prepare($sql);
                $query->execute();
                $hotel = $query->fetch();
                return $hotel;
            } catch (Exception $e) {
                die('Error: ' . $e->getMessage());
            }
        }
        
       
    

    public function afficherReservations($idH)
    { 
        try
        {
            $pdo=config::getConnexion();
            $query=$pdo->prepare("SELECT * FROM reservation where idH= :id");
            $query->execute(["id"=> $idH]);
            return $query->fetchAll();
        } catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function afficherHotel() {
        try {
        $pdo= config::getConnexion();
        $query = $pdo->prepare("SELECT * FROM hotel ");
        $query->execute();
        return $query->fetchAll();
        } catch (PDOException $e) {
        echo $e->getMessage();
        }
        }
    
}
?>



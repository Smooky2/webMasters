<?php

require __DIR__ . '/../config.php';

class reservations1
{
    function updateres($res, $id)
    {
        $sql = "UPDATE reservation SET 
            endDate = :e, 
            start = :s, 
            idH = :d
            WHERE id = :id";
    
        $conn = config::getConnexion();
        try {
    
            $list = $conn->prepare($sql);
    
            $list->bindValue(':id', $id);
            $list->bindValue(':e', $res->getendDate());
            $list->bindValue(':d', $res->getdesc());
            $list->bindValue(':s', $res->getstart());
    
            $list->execute();
        } catch (PDOException $e) {
            echo $e->getMessage(); // You should handle the exception appropriately, not just echo the message.
        }
        return $list;
    }
    
    function showres($id)
    {
        

        $sql = "SELECT * from reservation where id = $id";
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare($sql);
            $query->execute();
            $res = $query->fetch();
            return $res;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function showid($id)
{
    $sql = "SELECT id FROM reservation WHERE id = :id";
    $conn = config::getConnexion();
    
    try {
        $query = $conn->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $resID = $query->fetchColumn(); // Fetch the value directly
        
        return $resID;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

}
<?php

require_once __DIR__ . '/../config.php';
//include '../config.php';

class reservations
{

    public function listres()
    {

        $sql = "SELECT * FROM reservation";
        $conn = config::getConnexion();
        try {
            $liste = $conn->query($sql);  
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteres($id)
    {
         

        $sql = "DELETE FROM reservation WHERE id = :id";
        $conn = config::getConnexion();
        $req = $conn->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addres($res)
    {
        $sql = "INSERT INTO reservation (id, start, endDate, idH, my_image) VALUES (:id, :start, :end, :idH, :image)";
        $conn = config::getConnexion();
    
        try {
            $upload_dir = "uploads/";
            $maxSize = 20000000;
            $name = $res->getimage();
            $fileExtension = explode(".", $name);
            $fileExtension = end($fileExtension);
            //$fileExtension = pathinfo($name, PATHINFO_EXTENSION);
            $n1=rand(1,1000000);
            $n2=date("mdy");
            $n3=time();
            $new_name=$n1.$n2.$n3.".".$fileExtension;
            $filepath = $upload_dir . $new_name;
            
            $query = $conn->prepare($sql);
            $query->execute([
                ':id' => $res->getIdEvent(),
                ':start' => $res->getstart()->format('Y/m/d'),
                ':end' => $res->getendDate()->format('Y/m/d'),
                ':idH' => $res->getdesc(),
                ':image' => $new_name
            ]);

            move_uploaded_file($_FILES['my_image']['tmp_name'], $filepath);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    

    function showres($id)
    {
        

        $sql = "SELECT * from reservation where id= $id";
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
            $list->bindValue(':s',$res->getstart());
            $list->bindValue(':d',$res->getdesc() );
    
            $list->execute();
        } catch (PDOException $e) {
            echo $e->getMessage(); // You should handle the exception appropriately, not just echo the message.
        }
        return $list;
    }
    public function triRes()
    {
        $sql = "SELECT * FROM reservation ORDER BY start";
        $conn = config::getConnexion();
        try {
            $liste = $conn->query($sql);  
            return $liste->fetchAll(PDO::FETCH_ASSOC); // Récupérer et retourner les données triées
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    
}

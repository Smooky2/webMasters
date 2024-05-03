<?php
include '..\aide\config.php';
include '..\aide\Event.php';

class EventC
{
    public function listEvent()
    {
        $sql = "SELECT * FROM events ";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deleteEvent($idE)
    {
        $sql = "DELETE FROM events WHERE idE = :idE";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idE', $idE);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function addEvent($event)
    {
        $sql = "INSERT INTO events (idE, nomE, dateE,heureE, lieuE, descrpE, categoE, fraisE,img)  
        VALUES (:idE, :nomE, :dateE,:heureE, :lieuE, :descrpE, :categoE, :fraisE,img)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'idE' => $event->getidE(),
                'nomE' => $event->getNomE(),
                'dateE' => $event->getDateE()->format('Y-m-d'),
                'heureE' => $event->getheureE()->format('H:i:s'),
                'lieuE' => $event->getLieuE(),
                'descrpE' => $event->getdescrpE(),
                'categoE' => $event->getCategoE(),
                'fraisE' => $event->getFraisE(),
                'img' => $event->getimg()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function updateEvent($event, $idE)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE events SET 
                nomE = :nomE, 
                dateE = :dateE, 
                heureE = :heureE, 
                lieuE = :lieuE, 
                descrpE = :descrpE, 
                categoE = :categoE, 
                fraisE = :fraisE,
                img = :img
                WHERE idE = :idE'
            );
            $query->execute([
                'idE' => $idE,
                'nomE' => $event->getNomE(),
                'dateE' => $event->getDateE()->format('Y-m-d'),
                'heureE' => $event->getheureeE()->format('H:i:s'),
                'lieuE' => $event->getLieuE(),
                'descrpE' => $event->getdescrpE(),
                'categoE' => $event->getCategoE(),
                'fraisE' => $event->getFraisE(),
                'img' => $event->getimg()

            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function showEvent($idE)
    {
        $sql = "SELECT * FROM events WHERE idE = :idE";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':idE', $idE);
            $query->execute();

            $event = $query->fetch();
            return $event;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
?>

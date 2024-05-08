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
        $sql = "INSERT INTO events (idE, nomE, dateE,heureE, lieuE, descrpE, categoE, fraisE)  
        VALUES (:idE, :nomE, :dateE,:heureE, :lieuE, :descrpE, :categoE, :fraisE)";
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
                'fraisE' => $event->getFraisE()
                
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
                
                WHERE idE = :idE'
            );
            $query->execute([
                'idE' => $idE,
                'nomE' => $event->getNomE(),
                'dateE' => $event->getDateE()->format('Y-m-d'),
                'heureE' => $event->getheureE()->format('H:i:s'),
                'lieuE' => $event->getLieuE(),
                'descrpE' => $event->getdescrpE(),
                'categoE' => $event->getCategoE(),
                'fraisE' => $event->getFraisE(),
             

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
    //**************************
    public function getEventStatistics()
    {
        $sql = "SELECT categoE, COUNT(*) AS totalEvents, AVG(fraisE) AS averageCost FROM events GROUP BY categoE";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $statistics = $query->fetchAll(PDO::FETCH_ASSOC);
            return $statistics;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return []; // Retourne un tableau vide en cas d'erreur
        }
    }



    /******************** */
    public function getEventsForCalendar()
    {
        $sql = "SELECT dateE FROM events"; // Sélectionner uniquement la colonne dateE
        $db = config::getConnexion();
    
        try {
            $query = $db->query($sql);
            if (!$query) {
                $errorInfo = $db->errorInfo(); // Obtenir les informations sur l'erreur
                throw new Exception("Query failed: " . $errorInfo[2]); // Lancer une exception avec le message d'erreur
            }
            $eventsData = $query->fetchAll(PDO::FETCH_ASSOC);
    
            $events = [];
            foreach ($eventsData as $eventData) {
                // Créer un tableau associatif pour chaque événement
                $event = [
                    'start' => $eventData['dateE'], // Date de début de l'événement
                    // Vous pouvez ajouter d'autres champs d'événement ici si nécessaire
                ];
                $events[] = $event;
            }
            echo '<pre>'; // Commencez par un balisage pour que la sortie soit bien formatée
        print_r($events); // Afficher les événements
        echo '</pre>';
    
            return $events;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage(); // Afficher l'erreur dans la console JavaScript
            // die('Error: ' . $e->getMessage());
        }
    }
    
    
    



}
?>

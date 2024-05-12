<?php
include '..\aide\config.php';
include '..\aide\Event.php';
include '..\aide\Review.php';

class ReviewC
{

    /*public function AfficherEvent($nomE)
    { 
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM events WHERE nomE LIKE :nom");
            $query->execute(['nom' => "%$nomE%"]); // Using LIKE for partial matching
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }*/

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
    /* function for searchreview  but now  i don't use it */
    public function CalculateAverageRating($idE)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT AVG(stars) AS averageRating FROM reviews WHERE idev = :idE");
            $query->execute(['idE' => $idE]);
            $result = $query->fetch(PDO::FETCH_ASSOC);
            return $result['averageRating'];
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    /* function for searchreview   */
    public function getReviewPercentage($idE)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT COUNT(*) AS total_reviews FROM reviews WHERE idev = :idE");
            $query->execute(['idE' => $idE]);
            $totalReviews = $query->fetchColumn();

            $query = $pdo->prepare("SELECT COUNT(*) AS positive_reviews FROM reviews WHERE idev = :idE AND stars > 3");
            $query->execute(['idE' => $idE]);
            $positiveReviews = $query->fetchColumn();

            if ($totalReviews > 0) {
                return round(($positiveReviews / $totalReviews) * 100, 2); // Calculate percentage
            } else {
                return 0;
            }
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
    public function deleterate($idE)
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
         // Function to get the average rate of an event
         public function getAverageRate($eventId)
         {
             try {
                 $pdo = Config::getConnexion();
                 $query = $pdo->prepare("SELECT AVG(stars) AS average_rate FROM reviews WHERE idev = :eventId");
                 $query->execute(['eventId' => $eventId]);
                 $row = $query->fetch();
                 return $row['average_rate'];
             } catch (PDOException $e) {
                 echo $e->getMessage();
                 return 0; // or handle the error appropriately
             }
         }
         
         public function updateReview($idRev, $stars)
{
    try {
        $pdo = config::getConnexion();
        $query = $pdo->prepare("UPDATE reviews SET stars = :stars WHERE idRev = :idRev");
        $query->execute([
            'idRev' => $idRev,
            'stars' => $stars
        ]);
        echo "Review updated successfully";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

         

         public function sortEventsByRate()
         {
             try {
                 $pdo = Config::getConnexion();
                 $query = $pdo->prepare("SELECT idE, nomE FROM events");
                 $query->execute();
                 $events = $query->fetchAll(PDO::FETCH_ASSOC);
         
                 // Calculate average rate for each event
                 foreach ($events as &$event) {
                     $averageRate = $this->getAverageRate($event['idE']);
                     $event['average_rate'] = $averageRate;
                 }
         
                 // Sort events by average rate
                 usort($events, function ($a, $b) {
                     return $b['average_rate'] - $a['average_rate'];
                 });
         
                 return $events;
             } catch (PDOException $e) {
                 echo $e->getMessage();
                 return []; // or handle the error appropriately
             }
         }
         
}

?>

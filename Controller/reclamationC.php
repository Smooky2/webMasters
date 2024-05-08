<?php
require_once 'C:\xampp\htdocs\projet\Config.php';


require_once 'C:\xampp\htdocs\projet\Model\reclamation.php';


require_once 'C:\xampp\htdocs\projet\vendor\autoload.php';




class reclamationC
{

	function afficherreclamations()
	{
		$sql = "SELECT * FROM reclamation";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
		}
	}

	function supprimerreclamation($IDR)
	{
		$sql = "DELETE FROM reclamation WHERE IDR=:IDR";
		$db = config::getConnexion();
		$req = $db->prepare($sql);
		$req->bindValue(':IDR', $IDR);
		try {
			$req->execute();
		} catch (Exception $e) {
		}
	}
	function ajouterreclamation($reclamation)
	{
		$sql = "INSERT INTO reclamation (IDR, typer, dater, sujet, dess, statut) 
        VALUES (:IDR, :typer, :dater, :sujet, :dess, :statut)";
		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute([
				'IDR' => $reclamation->getIDR(),
				'typer' => $reclamation->gettyper(),
				'dater' => date('Y-m-d H:i:s'),
				'sujet' => $reclamation->getsujet(),
				'dess' => $reclamation->getdess(),
				'statut' => "pas encore"
			]);
		} catch (Exception $e) {
			echo 'Erreur: ' . $e->getMessage();
		}
	}
	function recupererreclamation($IDR) //getelementbyid
	{
		$sql = "SELECT * from reclamation where IDR=$IDR";
		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute();

			$reclamation = $query->fetch();
			return $reclamation;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}




	function modifierreclamation($reclamation, $IDR)
	{
		try {
			$db = config::getConnexion();
			$query = $db->prepare(
				'UPDATE reclamation SET 
						typer= :typer, 
						dater= :dater, 
						sujet= :sujet,  
						dess= :dess
						
					WHERE IDR= :IDR'
			);
			$query->execute([
				'typer' => $reclamation->gettyper(),
				'dater' => date('Y-m-d H:i:s'),
				'sujet' => $reclamation->getsujet(),
				'dess' => $reclamation->getdess(),
				'IDR' => $IDR
			]);
			echo $query->rowCount() . " records UPDATED successfully <br>";
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}




	// Function to get the current statut
	function getCurrentStatut($IDR)
	{
		$sql = "SELECT statut FROM reclamation WHERE IDR = :IDR";

		$db = config::getConnexion();

		try {
			$query = $db->prepare($sql);
			$query->bindParam(':IDR', $IDR, PDO::PARAM_INT);
			$query->execute();

			$result = $query->fetch(PDO::FETCH_ASSOC);

			return $result['statut'];
		} catch (PDOException $e) {
			echo 'Erreur: ' . $e->getMessage();
		}
	}


    public function updateStatuts($IDR) {
        $db = config::getConnexion();

        try {
            // Update the statut field to "traité"
            $sql = "UPDATE reclamation SET statut = 'traité' WHERE IDR = :IDR";
            $query = $db->prepare($sql);
            $query->bindParam(':IDR', $IDR, PDO::PARAM_INT);
            $query->execute();
        } catch (PDOException $e) {
            echo 'Erreur: ' . $e->getMessage();
            // Handle the error as needed
        }
    }

	function getReclamationStatistics()
	{
		$sql = "SELECT statut, COUNT(*) AS count_per_statut FROM reclamation GROUP BY statut";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
		}
	}
	function afficherfilter($typer)
	{
		$sql = "SELECT * FROM reclamation WHERE typer = :typer";
		$db = config::getConnexion();
		
		try {
			$query = $db->prepare($sql);
			$query->bindParam(':typer', $typer);
			$query->execute();
	
			$reclamation = $query->fetchall();
			return $reclamation;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}
	
	function getUniqueTyperValues() {
		$pdo = config::getConnexion();
	
		try {
			$query = "SELECT DISTINCT typer FROM reclamation"; // Replace your_table_name with the actual table name
			$statement = $pdo->query($query);
	
			$typerValues = $statement->fetchAll(PDO::FETCH_COLUMN);
	
			return $typerValues;
		} catch (PDOException $e) {
			// Handle your error appropriately, maybe log it or show an error message
			// Example: log the error message
			error_log("Error: " . $e->getMessage());
			return []; // Return an empty array in case of an error
		}
	}
	private function sendEmailNotification($subject, $data)
    {
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'mouhamedaziz481@gmail.com';
            $mail->Password = 'nnkp ghno cpcw vacl';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('admin@php.com', 'Systeme de notification');
            $mail->addAddress('mouhamedaziz481@gmail.com');

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $data;

            $mail->send();
        } catch (Exception $e) {
            echo "Le message n'a pas pu être envoyé. Erreur du messager : {$mail->ErrorInfo}";
        }
    }
	public function updateStatut($IDR, $newStatut) {
		$db = config::getConnexion();
	
		try {
			// Update the statut field with the provided value
			$sql = "UPDATE reclamation SET statut = :newStatut WHERE IDR = :IDR";
			$query = $db->prepare($sql);
			$query->bindParam(':IDR', $IDR, PDO::PARAM_INT);
			$query->bindParam(':newStatut', $newStatut, PDO::PARAM_STR);
			$query->execute();
	
			// Include $newStatut in the email message
			$message = "Reponse Managment, réclamation: $newStatut";
			$this->sendEmailNotification("Reponse Managment", $message);
	
		} catch (PDOException $e) {
			echo 'Erreur: ' . $e->getMessage();
			// Handle the error as needed
		}
	}
	

}

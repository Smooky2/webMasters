<?php
require_once 'C:\xampp\htdocs\projet\Config.php';


require_once 'C:\xampp\htdocs\projet\Model\reclamation.php';






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



}

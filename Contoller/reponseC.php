<?php
require_once 'C:\xampp\htdocs\user+reservation+event\config.php';

include 'C:\xampp\htdocs\user+reservation+event\Model\reponse.php';
class reponseC
{


	function afficherby($id)
	{
		$requete = "select * from reponse where IDR=:id ";
		$config = config::getConnexion();
		try {
			$querry = $config->prepare($requete);
			$querry->execute(
				[
					'id' => $id
				]
			);
			$result = $querry->fetchall();
			return $result;
		} catch (PDOException $th) {
			$th->getMessage();
		}
	}




	function afficherreponses()
	{
		$sql = "SELECT * FROM reponse";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
		}
	}

	function supprimerreponse($IDR)
	{
		$sql = "DELETE FROM reponse WHERE IDR=:IDR";
		$db = config::getConnexion();
		$req = $db->prepare($sql);
		$req->bindValue(':IDR', $IDR);
		try {
			$req->execute();
		} catch (Exception $e) {
		}
	}
	function ajouterreponse($reponse)
	{
		$sql = "INSERT INTO reponse (idrep, IDR, dater, sujet, dess) 
			VALUES (:idrep, :IDR, :dater, :sujet, :dess)";
		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute([
				'idrep' => $reponse->getidrep(),
				'IDR' => $reponse->getIDR(),
				'dater' => date('Y-m-d H:i:s'),
				'sujet' => $reponse->getsujet(),
				'dess' => $reponse->getdess()
			]);
		} catch (Exception $e) {
		}
	}
	function recupererreponse($idrep)
	{
		$sql = "SELECT * from reponse where idrep=$idrep";
		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute();

			$reponse = $query->fetch();
			return $reponse;
		} catch (Exception $e) {
		}
	}

	public function getResponseByReclamationId($reclamationId)
	{
		try {
			$db = config::getConnexion();
			$query = $db->prepare('SELECT * FROM reponse WHERE IDR = :IDR');
			$query->bindParam(':IDR', $reclamationId, PDO::PARAM_INT);
			$query->execute();
			$response = $query->fetch(PDO::FETCH_ASSOC);

			return $response; // Return the fetched response data
		} catch (PDOException $e) {
			// Handle exceptions or errors here
			// For example, you can log the error or return null
			return null;
		}
	}











	function modifierreponse($reponse, $IDR)
	{
		try {
			$db = config::getConnexion();
			$query = $db->prepare('UPDATE reponse SET
					dater = :dater,
					sujet = :sujet,
					dess = :dess
					WHERE IDR = :IDR');

			$query->execute([
				'dater' => date('Y-m-d H:i:s'),
				'sujet' => $reponse->getsujet(),
				'dess' => $reponse->getdess(),
				'IDR' => $IDR
			]);

			echo $query->rowCount() . " records UPDATED successfully <br>";
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}

	public function updateStatutsup($IDR) {
        $db = config::getConnexion();

        try {
            // Update the statut field to "traité"
            $sql = "UPDATE reclamation SET statut = 'pas encore' WHERE IDR = :IDR";
            $query = $db->prepare($sql);
            $query->bindParam(':IDR', $IDR, PDO::PARAM_INT);
            $query->execute();
        } catch (PDOException $e) {
            echo 'Erreur: ' . $e->getMessage();
            // Handle the error as needed
        }
    }


}

<?php
require_once 'C:\xampp\htdocs\projetfinal\Contoller\reponseC.php';
$reponseC=new reponseC();
	$reponseC->supprimerreponse($_GET["IDR"]);
	$reponseC->updateStatutsup($_GET["IDR"]);

	header('location:afficherreclamation.php');
?>
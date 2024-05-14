<?php
	require_once 'C:\xampp\htdocs\projetfinal\Contoller\reclamationC.php';
	$reclamationC=new reclamationC();
	$reclamationC->supprimerreclamation($_GET["IDR"]);
	header('location:afficherreclamation.php');
?>
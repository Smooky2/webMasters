<?php
	require_once 'C:\xampp\htdocs\projet\Controller\reclamationC.php';
	$reclamationC=new reclamationC();
	$reclamationC->supprimerreclamation($_GET["IDR"]);
	header('location:afficherreclamation.php');
?>
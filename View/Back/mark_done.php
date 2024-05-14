
<?php
require_once 'C:\xampp\htdocs\user+reservation+event\Contoller\reclamationC.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['MarkDone'])) {
    $IDR = $_POST['IDR'];
    $reclamationC = new reclamationC();
    $currentStatut = $reclamationC->getCurrentStatut($IDR);

    // Toggle the statut
    $newStatut = ($currentStatut === "en train") ? "traité" : "en train";

    // Update the statut
    $reclamationC->updateStatut($IDR, $newStatut);

    header('location:afficherreclamation.php');
    exit();
}


?>
<?php
include 'C:\xampp\htdocs\projetfinal\contoller\forumC.php';
include 'C:\xampp\htdocs\projetfinal\contoller\messageC.php';
$forumC = new forumC();
$messageC= new messageC();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET["id_forum"])) {
    // Add validation for id_publication
    $idToDelete = filter_var($_GET["id_forum"], FILTER_VALIDATE_INT);

    if ($idToDelete !== false && $idToDelete > 0) {
        $forumC->suppforum($idToDelete);
        $messageC->deleteCommentforum($idToDelete);

        // Redirect to the correct file after deleting a publication
        header('Location: view_forum.php');
        exit();
    }
}
?>

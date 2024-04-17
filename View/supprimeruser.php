<?php
    require '../Controller/userC.php';

    $userC = new userC();
    $userC->deleteUser($_GET['id']);
    header('Location:afficheruser.php');
?>
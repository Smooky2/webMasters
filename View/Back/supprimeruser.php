<?php
 require 'C:\xampp\htdocs\projetfinal\Contoller\userC.php';

    $userC = new userC();
    $userC->deleteUser($_GET['id']);
    header('Location:user.php');
?>
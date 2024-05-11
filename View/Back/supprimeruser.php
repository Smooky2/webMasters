<?php
 require 'C:\Users\youss\OneDrive\Bureau\XAMP\htdocs\reservation1\Contoller\userC.php';

    $userC = new userC();
    $userC->deleteUser($_GET['id']);
    header('Location:user.php');
?>
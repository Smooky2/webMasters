<?php
 require 'C:\xampp\htdocs\sahar_2A\user+reservation+event\Contoller\userC.php';

    $userC = new userC();
    $userC->deleteUser($_GET['id']);
    header('Location:user.php');
?>
<?php
    require '../Controller/roleC.php';

    $roleC = new roleC();
    $roleC->supprimerrole($_GET['idrole']);
    header('Location:afficherrole.php');
?>
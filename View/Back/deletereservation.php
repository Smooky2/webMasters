
<?php
require '../../Contoller/res1_class.php';
$res = new reservations();
$res->deleteres($_GET["id"]);
header('Location:reservations.php');
?>

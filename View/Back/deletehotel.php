<?php
require '../../contoller/HotelC.php';
$hotel = new Hotels();
$hotel->deleteHotel($_GET['idH']);
header('Location:hotel.php');
?>
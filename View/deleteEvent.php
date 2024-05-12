<?php
include '../Contoller/EventC.php'; // Assuming the controller file for events is EventC.php
$eventC = new EventC(); // Create an instance of the event controller
$eventC->deleteEvent($_GET["id"]); // Call the deleteEvent method with the ID passed from the URL
header('Location: ../View/Back/listEvents.php'); // Redirect to the event list page

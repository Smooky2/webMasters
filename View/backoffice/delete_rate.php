<?php
include '..\Controller\ReviewC.php'; // Assuming the controller file for events is EventC.php
$revC = new ReviewC(); // Create an instance of the event controller
$revC->deleterate($_GET["id"]); // Call the deleteEvent method with the ID passed from the URL
header('Location: ../View/backoffice/listEvents.php'); // Redirect to the event list page

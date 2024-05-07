<?php
require '../../Model/Hotel.php'; // Import de la classe d'hôtel
require '../../contoller/HotelC.php'; // Import du contrôleur d'hôtel
$error = "";

// create formation
$hotel = null;

// create an instance of the controller
$hotelC = new Hotels();
if (
    isset($_POST["name"]) &&
    isset($_POST["location"]) &&
    isset($_POST["description"]) &&
    isset($_POST["images"]) 
   
) {
    if (
        !empty($_POST['name']) &&
        !empty($_POST['location']) &&
        !empty($_POST["description"]) &&
        !empty($_POST['images']) 

        
    ) {
        $hotel = new Hotel(
            null,
            $_POST['name'],
            $_POST['location'],
            $_POST['description'],
            $_POST['images'],
          
        );
        $hotelC->addhotel($hotel);
        header('Location:hotel.php');
    } else
        $error = "Missing information";
}


?>

    
       

// Affichage de l'erreur si nécessaire
echo $error;
?>
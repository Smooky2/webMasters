<?php

include '..\Contoller\EventC.php';
$error= "";
// create event
$event = null;

// create an instance of the controller
$eventC = new EventC();
if (
    isset($_POST["idE"]) &&
    isset($_POST["nomE"]) &&
    isset($_POST["dateE"]) &&
    isset($_POST["heureE"]) &&
    isset($_POST["lieuE"]) &&
    isset($_POST["descpE"]) &&
    isset($_POST["categoE"]) &&
    isset($_POST["fraisE"])
) {
    if (
        !empty($_POST['idE']) &&
        !empty($_POST['nomE']) &&
        !empty($_POST["dateE"]) &&
        !empty($_POST["heureE"]) &&
        !empty($_POST["lieuE"]) &&
        !empty($_POST["descpE"]) &&
        !empty($_POST["categoE"]) &&
        !empty($_POST["fraisE"])
    ) {
        $event = new Event(
            null,
            $_POST['idE'],
            $_POST['nomE'],
            new Date($_POST['dateE']),
            new Time($_POST['heureE']),
            $_POST['lieuE'],
            $_POST['descpE'],
            $_POST['categoE'],
            $_POST['fraisE']
        );
        $eventC->addEvent($event);
        header('Location: ListEvents.php');
    } else {
        $error = "Missing information";
    }
}

?>


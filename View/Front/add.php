<?php
require '../../Model/res_class.php';
require '../../Contoller/res1_class.php';

$error = "";
$res = null;


$resController = new reservations();


 
if (isset($_POST['submit']) && isset($_FILES['my_image'])  && isset($_POST['start'])&& isset($_POST['endDate'])&& isset($_POST['idH']))
 {

        if (
        
        !empty($_POST["start"]) &&
        !empty($_POST["endDate"]) &&
        !empty($_POST["idH"])&&
        !empty($_FILES["my_image"])
    ) {

        
        $res1 = new res(
            null,
            $_POST["start"],
            $_POST["endDate"],
            $_POST["idH"],
            $_FILES["my_image"]
        );

        $resController->addres($res1);
        header('Location: index.php');
        exit(); 
    } else {
        $error = "aaa";
    }
} else {
    $error = "Missing informatiosssn";
}

// Display the error if necessary
echo $error;
?>

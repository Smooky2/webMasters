<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php'; 
session_start();


$email = "yasmin.fakhfekh@esprit.tn";
$role = $_GET['role'];
$to = $email;
$subject = "Role Granted Notification";
$message = "Congratulations! Your role has been granted. You now have the role ";

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; 
    $mail->SMTPAuth   = true;
    $mail->Username   = 'messaoudmay6@gmail.com';
    $mail->Password   = 'qjci luzy dlft unhb';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom('yfakhfakhe08@gmail.com', 'Your Sender Name');
    $mail->addAddress($to);
    $mail->Subject = $subject;
    $mail->Body = $message;

    $mail->send();
    echo "<script>";
    echo "alert('Email sent successfully to notify the user about the granted ');";
    echo "window.location.href = 'give_role.php';";
    echo "</script>";

    exit();
} catch (Exception $e) {
    echo "Failed to send email. Error: {$mail->ErrorInfo}";
}
?>

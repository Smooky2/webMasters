<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

function sendActivationEmail($email) {
    $to = $email;
    $subject = "Account Activation";
    $message = "Your account has been activated successfully. Click on the link to login: http://localhost/user/user/View/login.php";

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp@gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'messaoudmay6@gmail.com';
        $mail->Password   = 'qjci luzy dlft unhb'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
        $mail->Port       = 587;

        $additionalText = "Click on the link to login";

        $mail->setFrom('yfakhfakhe08@gmail.com', 'test');
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->Body = $additionalText . "\n\n" . $message;

        $mail->send();
        echo "<script>";
        echo "alert('Email sent successfully. Please check your email.');";
        echo "window.location.href = 'afficheruser.php';";
        echo "</script>";

        exit();
    } catch (Exception $e) {
        echo "Failed to send email. Error: {$mail->ErrorInfo}";
    }
}

// Example usage:
$email = urldecode($_GET['email']);
sendActivationEmail($email);
?>

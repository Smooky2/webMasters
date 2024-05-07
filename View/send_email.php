<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

    $email = urldecode($_GET['email']);

        $to = $email;
        $subject = "password reset";
        $message = "http://localhost/user/user/View/reset_password.php?email=" . urlencode($email); 

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'messaoudmay6@gmail.com';
            $mail->Password   = 'qjci luzy dlft unhb'; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
            $mail->Port       = 587;

            $additionalText = "click on the link to change your password";

            $mail->setFrom('yasmin@gmail.com', 'yassmine Fakhfekh');
            $mail->addAddress($to);
            $mail->Subject = $subject;
            $mail->Body = $additionalText . "\n\n" . $message;

            $mail->send();
            echo "<script>";
            echo "alert('Email sent successfully. Please check your email.');";
            echo "window.location.href = 'login.php';";
            echo "</script>";
    
            exit();
        } catch (Exception $e) {
            echo "Failed to send email. Error: {$mail->ErrorInfo}";
        }
 
?>

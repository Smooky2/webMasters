<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

if (isset($_POST["send"])) {
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Change this to your SMTP server's hostname
    $mail->SMTPAuth = true;
    $mail->Username = 'youssefturki222@gmail.com'; // Your Gmail email address
    $mail->Password = 'yfui juyk uhon aruf'; // Your Gmail App Password
    $mail->SMTPSecure = 'tls'; // Use 'ssl' for SSL, 'tls' for TLS
    $mail->Port = 587; // Use 465 for SSL, 587 for TLS

    $mail->SetFrom('youssefturki222@gmail.com');
    $mail->AddAddress($_POST["email"]);

    $mail->isHTML(true);

    $mail->Subject = $_POST["subject"];
    $mail->Body = $_POST["message"];

    try {
        $mail->send();
        echo '<div style="background-color: #4CAF50; color: #fff; padding: 15px; text-align: center;">';
        echo '<h2>Mail sent successfully 🚀</h2>';
        echo '<a href="table.php"><button style="background-color: #008CBA; color: #fff; padding: 10px 20px; cursor: pointer; border: none; border-radius: 5px;">Get Back</button></a>';
        echo '</div>';
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}
?>

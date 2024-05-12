<?php

require 'C:\xampp\htdocs\sahar_2A\user+reservation1\Contoller\userC.php';

  $userC = new userC();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format. Please enter a valid email address.";
        // Redirect back to the form with an error message or handle accordingly
    } else {
        // Check if the email exists in the database
        if ($userC->isEmailExistsInDatabase($email)) {
            header("Location: send_email.php?email=" . urlencode($email));
            exit();
        } else {
            echo "<script>alert('Email not found in the database');</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        header {
            background-color: red;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        h2 {
            text-align: center;
            color: red;
        }

        form {
            width: 300px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: red;
        }

        input[type="email"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: red;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #4e0788;
        }
    </style>
</head>
<body>
    <header>
        <h1>Retrieve Password</h1>
    </header>
<br><br><br><br><br><br>
    <h2>Forgot Password</h2>

    <form action="" method="post">
        <label for="email">Enter your email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <input type="submit" value="Reset Password">
    </form>
</body>
</html>









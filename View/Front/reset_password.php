<?php
require 'C:\xampp\htdocs\sahar_2A\user+reservation1\Contoller\userC.php';
require '../../Model/user.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['email'])) {
    if (isset($_GET['email'])) {
        $email = urldecode($_GET['email']);
    }
   
    // Check if 'pass' key exists in $_POST before accessing it
    if (isset($_POST['pass'])) {
        $pass = $_POST['pass'];
   
      
        $userC = new userC();
        $userC->updatePasswordByEmail($email, $pass);

        echo "<script>";
        echo "alert('Password Successfully updated !');";
        echo "window.location.href = 'login.php';";
        echo "</script>";

    } else {
        echo "Password not provided.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
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

        input[type="password"],
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
        <h1>Reset Password</h1>
    </header>
<br><br><br>
    <h2>Reset Password</h2>

    <form action="reset_password.php?email=<?php echo urlencode($_GET['email']); ?>" method="post" id="passwordForm">
        <label for="pass">Enter your new password:</label><br>
        <input type="password" id="pass" name="pass" required><br><br>
        
        <label for="confirmPass">Confirm new password:</label><br>
        <input type="password" id="confirmPass" name="confirmPass" required><br><br>
        
        <input type="submit" value="Set New Password" id="submitButton">
    </form>

    <script>
        // Add JavaScript to validate both password fields
        document.getElementById('passwordForm').addEventListener('submit', function(event) {
            var password = document.getElementById('pass').value;
            var confirmPass = document.getElementById('confirmPass').value;

            if (password !== confirmPass) {
                alert("Passwords do not match. Please re-enter.");
                event.preventDefault(); // Prevent form submission if passwords don't match
            }
        });
    </script>
</body>
</html>
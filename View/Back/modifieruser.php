<?php

require 'C:\xampp\htdocs\user+reservation+event\Contoller\userC.php';
require '../../Model/user.php';
$userC = new userC();


if (
    isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['emails'])
    && isset($_POST['adresse']) && isset($_POST['pass']) && isset($_POST['rpass'])
    && isset($_POST['dater']) && isset($_POST['phone']) && isset($_POST['gender']) && isset($_POST['idrole'])
) {
    echo $_POST['id'];
    $user = new user(
        $_POST['id'],
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['emails'],
        $_POST['adresse'],
        $_POST['pass'],
        $_POST['rpass'],
        $_POST['dater'],
        $_POST['phone'],
        $_POST['gender'],
        $_POST['idrole'],
    );

    $userC->updateUser($user);
    header('Location:user.php');
} else {
    $a = $userC->getUserById($_GET['id']);
}



?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Hotel</title>
    <link rel="stylesheet" type="text/css" href="styleee.css">
 
    <style>
        body {
            background-color: #f5f5f5;
            color: #333;
            font-family: Arial, sans-serif;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #ff9900;
        }

        label {
            display: inline-block;
            width: 150px;
            margin-bottom: 10px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button.back {
            background-color: #ff9900;
        }
    </style>
</head>
<script>
    function validateForm() {
        var nom = document.getElementById('nom');
        var prenom = document.getElementById('prenom');
        var emails = document.getElementById('emails');
        var adresse = document.getElementById('adresse');
        var pass = document.getElementById('pass');
        var rpass = document.getElementById('rpass');
        var dater = document.getElementById('dater');
        var phone = document.getElementById('phone');
        var gender = document.getElementById('gender');
        var idrole = document.getElementById('idrole');

        if (
            nom.value === '' ||
            prenom.value === '' ||
            emails.value === '' ||
            adresse.value === '' ||
            pass.value === '' ||
            rpass.value === '' ||
            dater.value === '' ||
            phone.value === '' ||
            idrole.value === '' ||
            gender.value === ''
        ) {
            alert('Please fill in all required fields.');
            return false;
        }

        // You can add more specific validation rules here for each field, like checking email format, password strength, etc.

        return true;
    }
</script>
</script>

<form action="modifieruser.php" method="POST" onsubmit="return validateForm()">
    <center>
        <h1>Update User</h1>
    </center>

    <input type="hidden" name="id" value="<?php echo $a['id']; ?>"> <!-- Hidden field to store user ID -->

    <div class="input-box">
        <span class="details">Nom</span>
        <input type="text" class="input" placeholder="Entrer votre nom" name="nom" value="<?php echo $a['nom']; ?>">
    </div>
    <div class="input-box">
        <span class="details">Prénom</span>
        <input type="text" class="input" placeholder="Entrer votre prénom" name="prenom" value="<?php echo $a['prenom']; ?>">
    </div>
    <div class="input-box">
        <span class="details">Email</span>
        <input type="text" class="input" placeholder="Entrer votre email" name="emails" value="<?php echo $a['emails']; ?>">
    </div>
    <div class="input-box">
        <span class="details">Adresse</span>
        <input type="text" class="input" placeholder="Entrer votre adresse" name="adresse" value="<?php echo $a['adresse']; ?>">
    </div>
    <div class="input-box">
        <span class="details">Password</span>
        <input type="password" class="input" placeholder="Entrer votre mot de passe" name="pass" value="<?php echo $a['pass']; ?>">
    </div>
    <div class="input-box">
        <span class="details">Repeat Password</span>
        <input type="password" class="input" placeholder="Confirmer votre mot de passe" name="rpass" value="<?php echo $a['rpass']; ?>">
    </div>
    <div class="input-box">
        <span class="details">Date de naissance</span>
        <input type="date" class="input" name="dater" value="<?php echo $a['dater']; ?>">
    </div>
    <div class="input-box">
        <span class="details">Téléphone</span>
        <input type="text" class="input" placeholder="Entrer votre téléphone" name="phone" value="<?php echo $a['phone']; ?>">
    </div>
    <div class="gender-details">
        <label for="gender">Gender:</label>
        <select id="gender" name="gender">
            <option value="male" <?php if ($a['gender'] === 'male') echo 'selected'; ?>>Male</option>
            <option value="female" <?php if ($a['gender'] === 'female') echo 'selected'; ?>>Female</option>
            <option value="other" <?php if ($a['gender'] === 'other') echo 'selected'; ?>>Other</option>
        </select>
    </div>


   
    <br>
    <div class="button">
        <input type="submit" class="input" value="Update Profile">
    </div>
</form>

</main>
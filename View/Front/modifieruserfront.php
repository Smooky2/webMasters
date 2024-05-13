<?php
session_start();
    require_once 'C:\xampp\htdocs\user+reservation+event\Contoller\userC.php';
    require_once '../../Model/user.php' ;
    $userC = new userC();
    if (isset($_GET['id'])) {
        // Your code to fetch and display user details based on the 'id' parameter
    } else {
        // Handle the case when 'id' parameter is not set or invalid
        echo "User ID not provided.";
    }

    if (isset($_POST['id'] ) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['emails'])
    && isset($_POST['adresse']) && isset($_POST['pass']) && isset($_POST['rpass'])
    && isset($_POST['dater']) && isset($_POST['phone']) && isset($_POST['gender']) && isset($_POST['idrole'])) 
    {
        echo $_POST['id'] ;
            $user = new user($_POST['id']  ,
             $_POST['nom'],
            $_POST['prenom'],
            $_POST['emails'],
            $_POST['adresse'],
            $_POST['pass'],
            $_POST['rpass'],
            $_POST['dater'],
            $_POST['phone'],
            $_POST['gender'],
            $_POST['idrole'] );
            
            $userC->updateUser($user);
            $updatedUser = $userC->getUserById($_POST['id']);
            $_SESSION['name'] = $updatedUser['nom'];
            header('Location:index.php');
    }else
    {
        $a = $userC->getUserById($_GET['id']) ;
    }



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>esprit discovery
         </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<div>
    <!-- Topbar Start -->
    <div class="container-fluid bg-secondary ps-5 pe-0 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
           
            </div>
            <div class="col-md-6 text-center text-lg-end">
                <div class="position-relative d-inline-flex align-items-center bg-primary text-white top-shape px-5">
                    <div class="me-3 pe-3 border-end py-2">
                        <p class="m-0"><i class="fa fa-envelope-open me-2"></i>esprit discovery@gmail.com</p>
                    </div>
                    <div class="py-2">
                        <p class="m-0"><i class="fa fa-phone-alt me-2"></i>+216 50 819 687</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
        <a href="index.html" class="navbar-brand p-0">
            <h1 class="m-0 text-uppercase text-primary"><i class="far fa-smile text-primary me-2"></i>esprit discovery </h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0 me-n3">
                <a href="index.php" class="nav-item nav-link active">HOME</a>
                <a href="log_in.php" class="nav-item nav-link">EVENT </a>
                <a href="" class="nav-item nav-link">REVIEW</a>
                <a href="" class="nav-item nav-link">Forum</a>
                <a href="" class="nav-item nav-link">Réclamation</a>
            </div>

            <div class="navbar-nav ms-auto py-0 me-n3">
            <?php

// Check if the user is logged in
if (isset($_SESSION['id'])) {
    // Assuming you have the user ID stored in a variable named $userId
    $userId = $_SESSION['id'];
    echo '<li><a href="modifieruserfront.php?id=' . $userId . '">Update Profile</a></li>';
}
?>


</div>
<div class="navbar-nav ms-auto py-0 me-n3">
            <?php


// Check if user is logged in
if (isset($_SESSION['id'])) {
    echo '<li><a href="logout.php">Disconnect</a></li>';
} else {
    echo '<li><a href="login.php">Login</a></li>';
}
?>

</div>
<div class="navbar-nav ms-auto py-0 me-n3">
    <?php
    if (isset($_SESSION['id'])) {
        $loggedInUserId = $_SESSION['id'];
        $userC = new UserC();
        $userRole = $userC->getUserRole($loggedInUserId);

        // Check if the user's role is 'admin'
        if ($userRole === 'admin') {
            echo '<li><a href="afficheruser.php">Panel</a></li>';
        }
    }
    ?>
</div>
     
<div class="navbar-nav ms-auto py-0 me-n3">
            <?php
   
            if (isset($_SESSION['id'])) {
    $userName = $_SESSION['name']; 
    echo '<li>' . $userName . '</li>'; // Displaying the user's name
}
?>     </div>


            
        </div>
    </nav>
    <!-- Navbar End -->

<style>
    /* Basic styles you can modify these according to your design */
    form {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    .input-box {
        margin-bottom: 15px;
    }

    .input {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .button {
        text-align: center;
    }

    .input[type="submit"] {
        padding: 10px 20px;
        background-color: #4caf50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    /* Add more specific styles as needed */
</style>
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

<form action="modifieruserfront.php" method="POST" onsubmit="return validateForm()">
<center><h1>Update Profile</h1></center>

    <input type="hidden" name="id" value="<?php echo $a['id']; ?>"> <!-- Hidden field to store user ID -->

    <div class="input-box">
        <span class="details">Nom</span>
        <input type="text" class="input" placeholder="Entrer votre nom" name="nom" value="<?php echo $a['nom']; ?>" >
    </div>
    <div class="input-box">
        <span class="details">Prénom</span>
        <input type="text" class="input" placeholder="Entrer votre prénom" name="prenom" value="<?php echo $a['prenom']; ?>" >
    </div>
    <div class="input-box">
        <span class="details">Email</span>
        <input type="text" class="input" placeholder="Entrer votre email" name="emails" value="<?php echo $a['emails']; ?>" >
    </div>
    <div class="input-box">
        <span class="details">Adresse</span>
        <input type="text" class="input" placeholder="Entrer votre adresse" name="adresse" value="<?php echo $a['adresse']; ?>" >
    </div>
    <div class="input-box">
        <span class="details">Password</span>
        <input type="password" class="input" placeholder="Entrer votre mot de passe" name="pass" value="<?php echo $a['pass']; ?>" >
    </div>
    <div class="input-box">
        <span class="details">Repeat Password</span>
        <input type="password" class="input" placeholder="Confirmer votre mot de passe" name="rpass" value="<?php echo $a['rpass']; ?>" >
    </div>
    <div class="input-box">
        <span class="details">Date de naissance</span>
        <input type="date" class="input" name="dater" value="<?php echo $a['dater']; ?>" >
    </div>
    <div class="input-box">
        <span class="details">Téléphone</span>
        <input type="text" class="input" placeholder="Entrer votre téléphone" name="phone" value="<?php echo $a['phone']; ?>" >
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

    <?php
    include 'C:\xampp\htdocs\reservation1\Contoller\roleC.php';
    $roleC = new roleC();
    $resultats = $roleC->afficherrole();
    ?>
    <div class="gender-details">
        <label for="idrole">role</label>

        <select name="idrole" id="idrole" >

            <?php foreach ($resultats as $value) { ?>
                <option value="<?php echo $value['idrole']; ?>"><?php echo $value['titre']; ?></option>
            <?php } ?>
        </select>
    </div>
<br>
    <div class="button">
    <input type="submit" class="input" value="Update Profile">
      </div>
</form>















    <!-- Footer Start -->
    <div class="container-fluid bg-primary text-secondary p-5">
        <div class="row g-5">
            <div class="col-12 text-center">
                <h1 class="display-5 mb-4">Reste au courant!</h1>
                <form class="mx-auto" style="max-width: 600px;">
                    <div class="input-group">
                        <input type="text" class="form-control border-white p-3" placeholder="Your Email">
                        <button class="btn btn-dark px-4">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>

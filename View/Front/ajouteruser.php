<?php

require 'C:\xampp\htdocs\sahar_2A\user+reservation1\Contoller\userC.php';
require '../../Model/user.php';


if (
    isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['emails'])
    && isset($_POST['adresse']) && isset($_POST['pass']) && isset($_POST['rpass'])
    && isset($_POST['dater']) && isset($_POST['phone']) && isset($_POST['gender']) && isset($_POST['idrole'])
  ) {
  
  
    $user = new User(
      Null,
      $_POST['nom'],
      $_POST['prenom'],
      $_POST['emails'],
      $_POST['adresse'],
      $_POST['pass'],
      $_POST['rpass'],
      $_POST['dater'],
      $_POST['phone'],
      $_POST['gender'],
      $_POST['idrole']
    );
  
    $userC = new userC();
  
  
    $userC->createUser($user);
    header('Location:login.php');
  }
  
  ?>
  
  <!DOCTYPE html>
  <html lang="en">
  
  <head>
      <meta charset="utf-8">
      <title>esprit discovery </title>
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
                          <p class="m-0"><i class="fa fa-envelope-open me-2"></i>espritdiscovery@gmail.com</p>
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
                  <a href="" class="nav-item nav-link">EXPLORE</a>
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
      /* Basic styles, you can modify these according to your design */
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
  
      <form action="" method="POST" onsubmit="return verif();">
        <div class="user-details">
          <div class="input-box">
            <span class="details">nom</span>
            <input type="text" class="input" placeholder="entrer votre nom" id="nom" name="nom">
          </div>
          <div class="input-box">
            <span class="details">prenom</span>
            <input type="text" class="input" placeholder="entrer votre prenom" id="prenom" name="prenom">
          </div>
          <div class="input-box">
            <span class="details">email</span>
            <input type="text" class="input" placeholder="entrer votre email" id="emails" name="emails">
          </div>
          <div class="input-box">
            <span class="details">telephone</span>
            <input type="text" class="input" placeholder="entrer votre telephone" id="phone" name="phone">
          </div>
          <div class="input-box">
            <span class="details">adresse</span>
            <input type="text" class="input" placeholder="entrer votre adresse" id="adresse" name="adresse">
          </div>
          <div class="input-box">
            <span class="details">date de naissance</span>
            <input type="date" class="input" id="dater" name="dater">
          </div>
  
          <div class="input-box">
            <span class="details">mot de passe</span>
            <input type="password" class="input" placeholder="entrer votre mot de passe" id="pass" name="pass">
          </div>
          <div class="input-box">
            <span class="details">confirm mot de passe</span>
            <input type="password" class="input" placeholder="confirmer votre mot de passe" id="rpass" name="rpass">
          </div>
        </div>
        <div class="gender-details">
          <label for="gender">Gender:</label>
          <select id="gender" name="gender" style="width: 200px; padding: 8px;">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
          </select>
        </div>
  
        <?php 
                       require '../../contoller/roleC.php';
                        $roleC = new roleC();
                        $resultats = $roleC->afficherrole();
                        ?>
  <div class="form-group">
      <label for="idrole">Role</label>
      <br>
      <select name="idrole" id="idrole" >
          <option value="">--Please choose an option--</option>
          <?php 
          foreach ($resultats as $value) {
              // Check if the role is not 'admin' before displaying it in the dropdown
              if ($value['titre'] !== 'admin') {
                  echo '<option value="' . $value['idrole'] . '">' . $value['titre'] . '</option>';
              }
          } 
          ?>
      </select>
  </div>
  
  <br>
        <div class="button">
          <input class="input" type="submit" value="Envoyer">
        </div>
      </form>
  
  
  
  
  
  
  
  
  
  
  
      
  
      <!-- Footer Start -->
     
      <!-- Footer End -->
  
  
      <!-- Back to Top -->
      <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>
  <script>
    function verif() {
      var nom = document.getElementById("nom").value;
      var prenom = document.getElementById("prenom").value;
      var email = document.getElementById("emails").value;
      var phone = document.getElementById("phone").value;
      var adresse = document.getElementById("adresse").value;
      var dater = document.getElementById("dater").value;
      var pass = document.getElementById("pass").value;
      var rpass = document.getElementById("rpass").value;
  
      // Vérifier si tous les champs sont remplis
      if (nom == "" || prenom == "" || email == "" || phone == "" || adresse == "" || dater == "" || pass == "" || rpass == "") {
          alert("Tous les champs doivent être remplis");
          return false;
      }
  
      // Vérifier si les mots de passe correspondent
      if (pass != rpass) {
          alert("Les mots de passe ne correspondent pas");
          return false;
      }
  
      return true;
  }
    </script>
  
      <!-- JavaScript Libraries -->
      <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
      <script src="lib/easing/easing.min.js"></script>
      <script src="lib/waypoints/waypoints.min.js"></script>
      <script src="lib/owlcarousel/owl.carousel.min.js"></script>
      <!-- <script src="register.js"></script> -->
  
      <!-- Template Javascript -->
      <script src="js/main.js"></script>
  </body>
  
  </html>
  
  
  
  
  
  
  
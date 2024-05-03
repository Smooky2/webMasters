<?php

require_once     '../Controller/userC.php';
require_once '../Model/user.php';
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
    header('Location:afficheruser.php');
} else {
    $a = $userC->getUserById($_GET['id']);
}



?>

<html>



<!DOCTYPE html>
<html lang="en">
<html class="loading" lang="en" data-textdirection="ltr">
 
     
  <head>
    <!-- Required meta taggs -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>nutrione</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="s.css">
    <!-- End layout styles -->
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a href="afficherListeusersadmin.php"><img src="logo.PNG" style='width:43% ; margin-left:20%' /></a>
          <a class="sidebar-brand brand-logo-mini" href="../../index.html"><img src="../assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="../assets/images/faces/face15.jpg" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal">yassmin fakhfekh</h5>
                  <span>Gold Member</span>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-calendar-today text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                  </div>
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item nav-commande">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="#">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          
          <li class="nav-item menu-items">
            <a class="nav-link active" href="afficheruser.php">
              <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
              <span class="menu-title">Users</span>
            </a>
          </li>


          <li class="nav-item menu-items">
            <a class="nav-link active" href="afficherrole.php">
              <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
              <span class="menu-title">Roles</span>
            </a>
          </li>
          
  
            <a class="nav-link" href="index.php">
              <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
              <span class="menu-title">Front</span>
            </a>
          </li>
        
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="afficherListeusersadmin"><img src="../../assets/images/logo.png" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
          
            </ul>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown d-none d-lg-block">
                <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown" data-toggle="dropdown" aria-expanded="false" href="#">+ Create New Project</a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="createbuttonDropdown">
                  <h6 class="p-3 mb-0">Projects</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-file-outline text-primary"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Software Development</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-web text-info"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">UI Development</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-layers text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Software Testing</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">See all projects</p>
                </div>
              </li>
              <li class="nav-item nav-settings d-none d-lg-block">
                <a class="nav-link" href="#">
                  <i class="mdi mdi-view-grid"></i>
                </a>
              </li>
              <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                  <i class="mdi mdi-email"></i>
                  <span class="count bg-success"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                  <h6 class="p-3 mb-0">Messages</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="../../assets/images/faces/face4.jpg" alt="image" class="rounded-circle profile-pic">
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Mark send you a message</p>
                      <p class="text-muted mb-0"> 1 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="../../assets/images/faces/face2.jpg" alt="image" class="rounded-circle profile-pic">
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Cregh send you a message</p>
                      <p class="text-muted mb-0"> 15 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="../../assets/images/faces/face3.jpg" alt="image" class="rounded-circle profile-pic">
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Profile picture updated</p>
                      <p class="text-muted mb-0"> 18 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">4 new messages</p>
                </div>
              </li>
              <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-bell"></i>
                  <span class="count bg-danger"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                  <h6 class="p-3 mb-0">Notifications</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-calendar text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Event today</p>
                      <p class="text-muted ellipsis mb-0"> Just a reminder that you have an event today </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Settings</p>
                      <p class="text-muted ellipsis mb-0"> Update dashboard </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-link-variant text-warning"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Launch Admin</p>
                      <p class="text-muted ellipsis mb-0"> New admin wow! </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">See all notifications</p>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="../../assets/images/faces/face15.jpg" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name">yassmin fakhfekh</p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Profile</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Settings</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Log out</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">Advanced settings</p>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> user </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">user</a></li>
                  <li class="breadcrumb-item active" aria-current="page">List</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
     



<style>
    /* Basic styles, you can modify these according to your design */
    form {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: gray;
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


    <?php
    include '../Controller/roleC.php';
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

</main>
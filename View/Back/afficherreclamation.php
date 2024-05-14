<?php
require_once 'C:\xampp\htdocs\projetfinal\Contoller\reclamationC.php';
require_once 'C:\xampp\htdocs\projetfinal\Contoller\reponseC.php';
$reclamationC = new reclamationC();
$listereclamations = $reclamationC->afficherreclamations();
$reponseC = new reponseC();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ESPRIT-DISCOVERY - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favi.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
   

</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Accueil</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/logo.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Esprit Discovery</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.html" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Accueil</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>entité réservation</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="hotel.html" class="dropdown-item">Nos Hotels</a>
                            <a href="forfait.html" class="dropdown-item">Nos forfaits</a>
                            <a href="reservations.html" class="dropdown-item">Nos réservations </a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>entité forum</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="ajout.php" class="dropdown-item">Ajout</a>
                            <a href="modifier_forum.php" class="dropdown-item">Modifier_forum</a>
                            <a href="supp_forum.php" class="dropdown-item">Suppresion </a>
                            <a href="view_forum.php" class="dropdown-item">affichage </a>
                        </div>
                    </div>
                    <a href="evenement.html" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>entité evenement</a>
                    <a href="reclamation.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>entité réclamation</a>
                    <a href="user.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>entité user</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item active">Blank Page</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Content Start -->
     <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/logo.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">ESPRIT-DISCOVERY send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/logo.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">ESPRIT-DISCOVERY send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/logo.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">ESPRIT-DISCOVERY send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/logo.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">Esprit Discovery</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">Notre profil</a>
                            <a href="#" class="dropdown-item">paramètres</a>
                            <a href="#" class="dropdown-item">se deconnecter </a>
                        </div>
                    </div>
                </div>
            </nav>
        <!-- Sidebar End -->
        
        <!-- Spinner et barre de navigation latérale -->
    <a style='  text-decoration: none;
            right: 100px;
               position: absolute;
               color: white;
               background-color:blue;
               padding: 10px 15px;
               border-radius: 5px;
               z-index: 999;' href="statistics.php">statique</a>
    <center>
    <h1>Liste des reclamations</h1>
  </center>
  <form action="filtered_pageadmin.php" method="GET">
    <label for="typer-filter">Filter by Type:</label>
    <select id="typer-filter" name="typer">
        <?php
        $unique_types = $reclamationC->getUniqueTyperValues(); // Replace with your actual method to fetch data

        foreach ($unique_types as $type) {
            echo "<option value='$type'>$type</option>";
        }
        ?>
    </select>
    <input type="submit" value="Filter">

</form>
  <table class="my-table" border="1" align="center" id="reclamation-table">
    <tr>

    <th>Type</th>
      <th>Date</th>
      <th>Sujet</th>
      <th>Description</th>
      <th>Etat</th>
      <th>Reponse</th>
      

    </tr>
    <?php foreach ($listereclamations as $reclamation) {
          $response = $reponseC->getResponseByReclamationId($reclamation['IDR']);
          ?>
      <tr>

      <td><?php echo $reclamation['typer']; ?></td>
        <td><?php echo $reclamation['dater']; ?></td>
        <td><?php echo $reclamation['sujet']; ?></td>
        <td><?php echo $reclamation['dess']; ?></td>
        <td>
        <?php
$statut = $reclamation['statut'];
if ($statut === "pas encore") {
    echo "Pas encore traité";
}elseif ($statut === "traité") {
    echo "Traité";
}
?>


  
        </td>
        <td> <a style='  
        text-decoration: none;
        color: #fff;
        background-color: purple;
        padding: 10px 15px;
        border-radius: 5px;
    ' href="<?php echo $response ? 'modifierreponseadmin.php?IDR=' . $reclamation['IDR'] : 'ajouterreponseadmin.php?IDR=' . $reclamation['IDR']; ?>">
        <?php echo $response ? 'voir/modifier' : 'repondre'; ?>
    </a>
    <?php if ($statut == "en train") { ?>
            <form method="POST" action="mark_done.php" style="display: inline;">
            <input type="hidden" name="IDR" value="<?php echo $reclamation['IDR']; ?>">
            <input type="submit" name="MarkDone" value="traité" style="background-color: #3498db; color: #fff; ">
        </form>
    <?php } else { ?>
        <!-- Form for marking as Pas encore -->
        <form method="POST" action="mark_done.php" style="display: inline;">
            <input type="hidden" name="IDR" value="<?php echo $reclamation['IDR']; ?>">
            <input type="submit" name="MarkDone" value="traitement en cour" style="background-color: #f39c12; color: #fff;">
        </form>
          <?php } ?>


</td>
        
      </tr>
    <?php } ?>
  </table>


  <style>
    .my-table {
      background-color: white;
      border-collapse: collapse;
      width: 100%;
      font-size: 1em;
      font-family: Arial, sans-serif;
      color: #333;
    }

    .my-table th,
    .my-table td {
      padding: 0.5em;
      border: 1px solid #ccc;
    }

    .my-table th {
      background-color: #f7f7f7;
      text-align: left;
      font-weight: bold;
    }

    .my-table td {
      text-align: left;
    }

    .my-table td form {
      display: inline-block;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      /* Green color */
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    /* Style for the "annuler" link */
 
  </style>


     
            <!-- Navbar End -->


          

            </div>
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
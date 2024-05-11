 
<?php
require '../../contoller/HotelC.php';

$hotelC=new Hotels();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["idH"]) && isset($_POST['search'])) {
        $idH = $_POST["idH"];
        $list = $hotelC->afficherReservations($idH);
    } 
    $hotels=$hotelC->afficherHotel();

}?>
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
                    <a href="index.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Accueil</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>entité réservation</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="hotel.php" class="dropdown-item">Nos Hotels</a>
                            <a href="formHotel.php" class="dropdown-item">formaulaire Hotel</a>
                            <a href="table.php" class="dropdown-item">Nos réservations </a>
                            <a href="rechercherhotel.php" class="dropdown-item">rechercher </a>
                        </div>
                    </div>
                    
                    <a href="evenement.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>entité evenement</a>
                    <a href="reclamation.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>entité réclamation</a>
                    <a href="user.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>entité user</a>
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
        <!-- Sidebar End -->
        
        <!-- Content Start -->
        <div class="content">
                    <!-- Navbar End -->
            
            <!-- Form Start -->
   <style>
form {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
}

select {
    padding: 8px;
    border-radius: 5px;
    border: 1px solid #ced4da;
}

input[type="submit"] {
    padding: 8px 20px;
    border: none;
    border-radius: 5px;
    background-color: #007bff;
    color: white;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

/* Styles pour la liste de réservations */
ul {
    list-style-type: none;
    padding: 0;
}

li {
    margin-bottom: 10px;
    padding: 10px;
    background-color: #f9f9f9;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    font-family: 'Heebo', sans-serif;
    font-size: 16px;
    line-height: 1.6;
}

/* Styles pour le bouton de retour en haut de page */
.back-to-top {
    position: fixed;
    bottom: 20px;
    right: 20px;
    display: none;
    font-size: 20px;
    padding: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 50%;
    cursor: pointer;
}
.reservation-title {
    font-size: 24px;
    font-weight: bold;
    color: #333; /* Couleur de texte foncée */
    margin-bottom: 20px;

.back-to-top:hover {
    background-color: #0056b3;
}
}
</style>         



    <br>
    <h2>Reservations correspondant au hôtel sélectionné :</h2>
        <form action="" method="POST">
            <label for="idH"> selectionnez un hotel:</label>
            <select name="idH" id="idH">
                <?php
                foreach($hotels as $hotel) {
                    echo '<option value="' . $hotel["idH"] . '">' . $hotel["name"] . '</option>';
            }
                ?>
            </select>
            <input type="submit" value="Rechercher" name="search">
            </form>
        <?php if (isset($list)) { ?>
        <br>
    <h2> reservations correspondant au hotel selectionné : <h2>
        <ul>
            <?php foreach($list as $reservation){ ?>
             <li><?=$reservation["id"] ?> -<?=$reservation["start"] ?> -<?=$reservation["endDate"] ?>-<?=$reservation["idH"]?>- <?=$reservation["my_image"] ?> dt</li>
             <?php } ?>
            </ul>
            <?php
            } ?>
      
<!-- Content End -->


 
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
  
  
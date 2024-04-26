<?php
include '..\aide\EventC.php';


$eventC = new EventC();
$list = $eventC->listEvent();
?>
<!doctype html>
<html class="no-js" lang="en">


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
                    <a href="forum.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>entité_forum</a>
                    
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>evenement</a>
                        <div class="dropdown-menu bg-transparent border-0">
                           <a href="ajoutEvent.php" class="dropdown-item">Ajout evenement</a>
                           <a href="listEvents.php" class="dropdown-item">Nos evenement</a>
                            
                        </div>
                    </div>


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
        <!-- Sidebar End -->


<!-- Content Start -->
<div class="content">
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
        <!-- Navbar Brand -->
        <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
            <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
        </a>
        <!-- Sidebar Toggler -->
        <a href="#" class="sidebar-toggler flex-shrink-0">
            <i class="fa fa-bars"></i>
        </a>
        <!-- Search Form (visible on medium and larger screens) -->
        <form class="d-none d-md-flex ms-4">
            <input class="form-control border-0" type="search" placeholder="Search">
        </form>
        <!-- Navbar Items (align right) -->
        <div class="navbar-nav align-items-center ms-auto">
            <!-- Messages Dropdown -->
            <!-- Notifications Dropdown -->
            <!-- User Profile Dropdown -->
            <!-- User Profile Dropdown Menu -->
        </div>
    </nav>
    <!-- Navbar End -->
    <div class="container">
            <!-- Table (Sample Data) -->
            <br>
            <br>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Lieu</th>
                            <th>Description</th>
                            <th>Catégorie</th>
                            <th>Frais</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                   
                        <?php foreach ($list as $event)  
                        {
                            ?>
                            <tr>
                                <td><?= $event['idE']; ?></td>
                                <td><?= $event['nomE']; ?></td>
                                <td><?= $event['dateE']; ?></td>
                                <td><?= $event['heureE']; ?></td>
                                <td><?= $event['lieuE']; ?></td>
                                <td><?= $event['descrpE']; ?></td>
                                <td><?= $event['categoE']; ?></td>
                                <td><?= $event['fraisE']; ?></td>
                                <td>
                                    <form method="POST" action="../backoffice/updateEvent.php">
                                        <button type="submit" class="btn btn-primary btn-sm" name="update">Update</button>
                                        <input type="hidden" value="<?= $event['idE']; ?>" name="id">
                                    </form>
                                </td>
                                <td>
                                    <a href="../deleteEvent.php?id=<?= $event['idE']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                               
                                
                            </tr>
                        <?php 
                        }
                        
                        ?>
                    </tbody>
                </table>
                </div>
               <!-- Centered Search Form -->
<div class="text-center">
    <form method="POST" action="../backoffice/searchReview.php">
        <button type="submit" class="btn btn-primary btn-sm" name="search">Search Reviews</button>
        <input type="hidden" value="<?= $rev['idRev']; ?>" name="id">
    </form>
</div>
            </div>
        </div>
    <!-- Back to Top Button -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>
<!-- Content End -->


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
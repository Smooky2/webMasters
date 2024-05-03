<?php

include '..\aide\config.php';
include '..\aide\Event.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create new Event object
    $event = new Event(
        $_POST['idE'],
        $_POST['nomE'],
        new DateTime($_POST['dateE']),
        new DateTime($_POST['heureE']),
        $_POST['lieuE'],
        $_POST['descrpE'],
        $_POST['categoE'],
        $_POST['fraisE'],
        null // Image path will be set later
    )
    ;

    // Handle image upload
    $targetDir = "uploads/"; // Directory to save images
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
            // Set image path for the event
            $event->setImg($targetFile);

            // Now add the event to the database
            $eventController = new EventC();
            $eventController->addEvent($event);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

?>

<!DOCTYPE html>

<html lang="en">
<html class="no-js" lang="en">
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
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fa fa-envelope me-lg-2"></i>
                    <span class="d-none d-lg-inline-flex">Message</span>
                </a>
                <!-- Messages Dropdown Menu -->
                <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                    <!-- Sample Message -->
                    <a href="#" class="dropdown-item">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle" src="img/logo.jpg" alt="User" style="width: 40px; height: 40px;">
                            <div class="ms-2">
                                <h6 class="fw-normal mb-0">ESPRIT-DISCOVERY sent you a message</h6>
                                <small>15 minutes ago</small>
                            </div>
                        </div>
                    </a>
                    <!-- More Messages... -->
                </div>
            </div>
            <!-- Notifications Dropdown -->
            <div class="nav-item dropdown">
                <!-- Notifications Dropdown Toggle -->
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fa fa-bell me-lg-2"></i>
                    <span class="d-none d-lg-inline-flex">Notification</span>
                </a>
                <!-- Notifications Dropdown Menu -->
                <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                    <!-- Sample Notification -->
                    <a href="#" class="dropdown-item">
                        <h6 class="fw-normal mb-0">Profile updated</h6>
                        <small>15 minutes ago</small>
                    </a>
                    <!-- More Notifications... -->
                </div>
            </div>
            <!-- User Profile Dropdown -->
            <div class="nav-item dropdown">
                <!-- User Profile Dropdown Toggle -->
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img class="rounded-circle me-lg-2" src="img/logo.jpg" alt="User" style="width: 40px; height: 40px;">
                    <span class="d-none d-lg-inline-flex">Esprit Discovery</span>
                </a>
                <!-- User Profile Dropdown Menu -->
                <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                    <!-- User Profile Options -->
                    <a href="#" class="dropdown-item">Profile</a>
                    <a href="#" class="dropdown-item">Settings</a>
                    <a href="#" class="dropdown-item">Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Registration Form -->
    <form action="" method="POST" class="mx-auto mt-5 p-4 border rounded bg-light" style="max-width: 400px;" enctype="multipart/form-data">    <h3 class="text-center mb-4">EVENNEMENT</h3>
    <!-- Form Fields -->
    <div class="mb-3">
        <label for="idE" class="form-label">Id:</label>
        <input type="int" id="idE" name="idE" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="nomE" class="form-label">Nom:</label>
        <input type="text" id="nomE" name="nomE" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="dateE" class="form-label">Date:</label>
        <input type="date" id="dateE"  name="dateE" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="heureE" class="form-label">Time:</label>
        <input type="time" id="heureE"  name="heureE" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="lieuE" class="form-label">Lieu:</label>
        <input type="text" id="lieuE"  name="lieuE" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="descrpE" class="form-label">Description:</label>
        <textarea id="descrpE"  name="descrpE" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
        <label for="categoE" class="form-label">Catégorie:</label>
        <select id="categoE"  name="categoE" class="form-select" required>
            <option value="" disabled selected>Choisissez une catégorie</option>
            <option value="Environnemental et écologique">Environnemental et écologique</option>
            <option value="Culturel">Culturel</option>
            <option value="Sportif">Sportif</option>
            <option value="Récréatif et divertissant">Récréatif et divertissant</option>
            <option value="Éducatif">Éducatif</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="fraisE" class="form-label">Frais:</label>
        <input type="text"   name="fraisE" id="fraisE" class="form-control">
    </div>
    <div class="mb-3">
    <label for="img" class="form-label">Image:</label>
    <input type="file" id="img" name="img" class="form-control" >
    </div>

    <!-- Submit Button -->
    <input type="submit" value="Save">
     <!--<button type="submit" class="btn btn-primary w-100">S'inscrire</button>-->
     <script src="scriptEvent.js"></script>
</form>


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






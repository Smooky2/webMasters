<?php
require '../../Model/res_class.php';
require '../../Contoller/res1_class.php';
require '../../Contoller/HotelC.php';
$res = new reservations();
$resList = $res->listres();
$hotel = new Hotels();
// Initialize current month and year
$currentMonth = isset($_GET['month']) ? intval($_GET['month']) : date('n');
$currentYear = isset($_GET['year']) ? intval($_GET['year']) : date('Y');

// Get the name of the current month
$monthName = date('F', mktime(0, 0, 0, $currentMonth, 1, $currentYear));

// Get the number of days in the current month
$daysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);

// Get the first day of the month
$firstDayOfMonth = date('N', mktime(0, 0, 0, $currentMonth, 1, $currentYear));

// Create an array of weekday names
$weekdays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

// Create an array to hold reservations data in a more accessible format
$reservations = [];
foreach ($resList as $reservation) {
    $reservationDate = date_parse_from_format('Y-m-d', $reservation['start']);
    $day = $reservationDate['day'];
    $month = $reservationDate['month'];
    $year = $reservationDate['year'];

    $reservations[$year][$month][$day][] = $reservation;
}
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
    <style>
        /* CSS styles for the calendar */
        .calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
        }

        .day {
            border: 1px solid #ccc;
            padding: 5px;
        }

        .reservation {
            background-color: #f0f0f0;
            padding: 2px;
            margin-bottom: 2px;
            font-size: 12px;
        }

        .month-year {
            margin-bottom: 10px;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
        }

        .weekday {
            font-weight: bold;
            text-align: center;
            padding: 5px;
        }

        .centered {
            text-align: center;
        }
    </style>
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
                    <a href="index.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Accueil</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>entité réservation</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="hotel.php" class="dropdown-item">Nos Hotels</a>
                            <a href="formHotel.php" class="dropdown-item">formaulaire Hotel</a>
                            <a href="reservations.php" class="dropdown-item">Nos réservations </a>
                            <a href="rechercherhotel.php" class="dropdown-item">rechercher </a>
                            <a href="calendar.php" class="dropdown-item">calendrier </a>

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
            <!-- Navbar End -->

            <div id="page-wrapper">
            <div class="centered">
        <a href="?month=<?php echo $currentMonth > 1 ? ($currentMonth - 1) : 12; ?>&year=<?php echo $currentMonth > 1 ? $currentYear : ($currentYear - 1); ?>">Previous Month</a>
        <span class="month-year"><?php echo $monthName . ' ' . $currentYear; ?></span>
        <a href="?month=<?php echo $currentMonth < 12 ? ($currentMonth + 1) : 1; ?>&year=<?php echo $currentMonth < 12 ? $currentYear : ($currentYear + 1); ?>">Next Month</a>
    </div>
    <div id="calendarContainer">
        <div class="calendar">
            <?php
            // Display the names of the days of the week
            foreach ($weekdays as $weekday) {
                echo '<div class="weekday">' . substr($weekday, 0, 3) . '</div>';
            }

            // Start the calendar grid
            $dayCounter = 1 - $firstDayOfMonth; // Starting day of the month
            while ($dayCounter <= $daysInMonth) {
                echo '<div class="day">';
                if ($dayCounter > 0) {
                    echo '<strong>' . $dayCounter . '</strong>';

                    // Check if there are reservations for this day
                    if (isset($reservations[$currentYear][$currentMonth][$dayCounter])) {
                        $reservationsForDay = $reservations[$currentYear][$currentMonth][$dayCounter];

                        // Display reservations for this day
                        foreach ($reservationsForDay as $reservation) {
                            echo '<div class="reservation">' . htmlspecialchars($hotel->showHotel($reservation['idH'])['name']) . '</div>';
                        }
                    }
                }
                echo '</div>';

                // Move to the next day
                $dayCounter++;
            }
            ?>
        </div>
    </div>
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
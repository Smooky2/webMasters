<?php
// Include necessary files and establish a database connection
require_once 'C:\xampp\htdocs\user+reservation+event\Model\reclamation.php';
require_once 'C:\xampp\htdocs\user+reservation+event\Contoller\reclamationC.php';
$reclamationC = new reclamationC();
// Fetch statistics using the controller function
$statistics =  $reclamationC->getReclamationStatistics();

// Prepare data for Chart.js
$labels = [];
$data = [];

foreach ($statistics as $row) {
    $labels[] = $row['statut'];
    $data[] = $row['count_per_statut'];
}
?>

<?php
// Include your forum controller
require_once 'C:\xampp\htdocs\user+reservation+event\Model\reclamation.php';
require_once 'C:\xampp\htdocs\user+reservation+event\Contoller\reclamationC.php';

$reclamationC = new  reclamationC();

$statistics =  $reclamationC->getReclamationStatistics();


$labels1 = [];
$data1 = [];

foreach ($statistics as $row) {
  $labels1[] = $row['statut'];
  $data1[] = $row['count_per_statut'];
}
$dataJSON1 = json_encode($data1);
$labelsJSON1 = json_encode($labels1);
// Create an instance of the forum controller
/*$forumC = new forumC();

// Fetch forum data
$forum = $forumC->listForum();

// Convert data to a format suitable for Chart.js
$labels = [];
$data = [];
foreach ($forum as $single_forum) {
    $labels[] = $single_forum['titre'];
    $data[] = $single_forum['date_creation'];
}

// Convert data to JSON for JavaScript
$dataJSON = json_encode($data);
$labelsJSON = json_encode($labels);*/
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
table {
    margin-top:  100px;  
    width: 60%;
    max-width: 1000px;
    border-collapse: collapse;
    border-spacing: 0;
    margin-left: 70px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
}


table th,
table td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
    
}

table th {
    background-color: #f2f2f2;
    text-align: left;
}

table tr:nth-child(even) {
    background-color: #f2f2f2;
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
            <a style="text-decoration: none;
            right: 100px;
               position: absolute;
               color: white;
               background-color:blue;
               padding: 10px 15px;
               border-radius: 5px;
               z-index: 999;
               " href="afficherreclamation.php">Retour à la liste des réclamations</a>
            <div class="row">
                       <!-- <div class="col-md-6">
                            <h1>Nombres de vue Par Titre de poste</h1>
                            <center>
                                <div class="mt-3">
                                    <canvas id="myDoughnutChart" style="height: 400px; width: 100%;"></canvas>
                                </div>
                            </center>
                        </div>-->

                        
                        <div class="col-md-6">
                            <h1>Reclamation Listes :</h1>
                            <center>
                                <div class="mt-3">
                                    <canvas id="myBarChart" style="height: 400px; width: 100%;"></canvas>
                                </div>
                            </center>
                        </div>
                    </div>
                    <br><br>

                    <script>
                    // Utility methods for chart data manipulation
                    const Utils = {
                        // Generate an array of numbers based on configuration
                        numbers: function(config) {
                            const {
                                count,
                                min,
                                max
                            } = config;
                            const numbersArray = [];

                            for (let i = 0; i < count; i++) {
                                const randomNumber = Math.floor(Math.random() * (max - min +
                                    1)) + min;
                                numbersArray.push(randomNumber);
                            }

                            return numbersArray;
                        },
                        // Define your chart colors here
                        CHART_COLORS: {
                            red: 'rgba(255, 99, 132, 0.8',
                            orange: 'rgba(255, 159, 64, 0.',
                            yellow: 'rgba(255, 205, 86, 0.8',
                            green: 'rgba(75, 192, 192, 0.8',
                            blue: 'rgba(54, 162, 235, 0.8',
                            purple: 'rgba(153, 102, 255, 0.8',
                            grey: 'rgba(201, 203, 207, 0.8'
                            // Add other colors as needed
                        }
                        // Add other utility methods as needed
                    };

                    // Sample actions array
                    const actions = [{
                            name: 'Randomize',
                            handler(chart) {
                                chart.data.datasets.forEach(dataset => {
                                    dataset.data = Utils.numbers({
                                        count: chart.data.labels.length,
                                        min: 0,
                                        max: 100
                                    });
                                });
                                chart.update();
                            }
                        },
                        {
                            name: 'Add Dataset',
                            handler(chart) {
                                // Customize for adding a new dataset
                            }
                        },
                        {
                            name: 'Add Data',
                            handler(chart) {
                                // Customize for adding new data
                            }
                        }
                        // Add more actions as needed
                    ];

                    // Chart configuration
                    const chartConfig = {
                        type: 'doughnut',
                        data: {
                            labels: <?php echo $labelsJSON; ?>,
                            datasets: [{
                                label: 'Nbr Vue',
                                data: <?php echo $dataJSON; ?>,
                                backgroundColor: Object.values(Utils.CHART_COLORS),
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'top',
                                },
                                title: {
                                    display: true,
                                    text: 'Doughnut Chart'
                                }
                            }
                        },
                    };


                    // Assuming actions is already defined
                    const chartActions = actions.map(action => {
                        return {
                            ...action,
                            handler(chart) {
                                // Modify action handlers based on your chart data
                                if (action.name === 'Randomize') {
                                    chart.data.datasets.forEach(dataset => {
                                        dataset.data = Utils.numbers({
                                            count: chart.data.labels.length,
                                            min: 0,
                                            max: 100
                                        });
                                    });
                                    chart.update();
                                } else if (action.name === 'Add Dataset') {
                                    // Customize for adding a new dataset
                                } else if (action.name === 'Add Data') {
                                    // Customize for adding new data
                                }
                                // Add more conditions for other actions
                            }
                        };
                    });



                    const ctx = document.getElementById('myDoughnutChart').getContext('2d');
                    const myDoughnutChart = new Chart(ctx, chartConfig);

                    // Apply actions to the chart
                    chartActions.forEach(action => {
                        // Add event listeners or perform other setup for each action if needed
                        // For example, add a button click event to trigger the action
                        const buttonElement = document.getElementById(action.name.replace(
                            /\s+/g, '-').toLowerCase());
                        buttonElement.addEventListener('click', () => action.handler(
                            myDoughnutChart));
                    });
                    </script>

                    <script>
                    // Utility methods for chart data manipulation
                    const UtilsBar = {
                        // Generate an array of numbers based on configuration
                        generateNumbers: function(config) {
                            const {
                                count,
                                min,
                                max
                            } = config;
                            const numbersArray = [];

                            for (let i = 0; i < count; i++) {
                                const randomNumber = Math.floor(Math.random() * (max - min + 1)) + min;
                                numbersArray.push(randomNumber);
                            }

                            return numbersArray;
                        },
                        // Define your chart colors here
                        CHART_COLORS: {
                            red: 'rgba(255, 99, 132, 0.8',
                            orange: 'rgba(255, 159, 64, 0.8',
                            yellow: 'rgba(255, 205, 86, 0.8',
                            green: 'rgba(75, 192, 192, 0.8',
                            blue: 'rgba(54, 162, 235, 0.8',
                            purple: 'rgba(153, 102, 255, 0.8',
                            grey: 'rgba(201, 203, 207, 0.8',
                            // Add other colors as needed
                        },
                        // Add other utility methods as needed
                    };

                    // Sample actions array
                    const chartActionsBar = [{
                            name: 'Randomize',
                            handler(chart) {
                                chart.data.datasets.forEach(dataset => {
                                    dataset.data = UtilsBar.generateNumbers({
                                        count: chart.data.labels.length,
                                        min: 0,
                                        max: 100
                                    });
                                });
                                chart.update();
                            }
                        },
                        {
                            name: 'Add Dataset',
                            handler(chart) {
                                // Customize for adding a new dataset
                            }
                        },
                        {
                            name: 'Add Data',
                            handler(chart) {
                                // Customize for adding new data
                            }
                        }
                        // Add more actions as needed
                    ];

                    // Chart configuration
                    const chartConfigBar = {
                        type: 'bar', // Change the chart type to 'bar' for a Bar chart
                        data: {
                            labels: <?php echo $labelsJSON1; ?>,
                            datasets: [{
                                label: 'Nb Reclamation',
                                data: <?php echo $dataJSON1; ?>,
                                backgroundColor: Object.values(UtilsBar.CHART_COLORS),
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'top',
                                },
                                title: {
                                    display: true,
                                    text: 'Bar Chart'
                                }
                            }
                        },
                    };

                    // Assuming actions is already defined
                    const ctxBar = document.getElementById('myBarChart').getContext('2d');
                    const myBarChart = new Chart(ctxBar, chartConfigBar);

                    // Apply actions to the chart
                    chartActionsBar.forEach(action => {
                        // Add event listeners or perform other setup for each action if needed
                        // For example, add a button click event to trigger the action
                        const buttonElement = document.getElementById(action.name.replace(/\s+/g, '-')
                            .toLowerCase());
                        buttonElement.addEventListener('click', () => action.handler(myBarChart));
                    });
                    </script>



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
<?php
// Fetch event data from your database
include '..\aide\EventC.php';
$eventC = new EventC();
$eventList = $eventC->listEvent(); // Use $eventC instead of $event

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

$eventc = [];
foreach ($eventList as $event){
    $eventDate = date_parse_from_format('Y-m-d' , $event['dateE']);
    $day = $eventDate['day'];
    $month = $eventDate['month'];
    $year = $eventDate['year'];

    $eventc[$year][$month][$day][] = $event;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ESPRIT-DISCOVERY - Bootstrap Admin Template</title>
    <!-- Meta tags and other dependencies -->
    <!-- Your custom styles -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/linearicons.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/slick-theme.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootsnav.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <style>
        /* CSS styles for the calendar */
        .calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
        }

        .day {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
            font-size: 14px;
        }

        .event {
            background-color: #f0f0f0;
            padding: 2px;
            margin-bottom: 2px;
            font-size: 12px;
        }

        .month-year {
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
        }

        .weekday {
            font-weight: bold;
            text-align: center;
            padding: 10px;
            font-size: 16px;
        }

        .centered {
            text-align: center;
            margin-bottom: 20px;
        }

        .navigation-links a {
            color: black; /* Change the color to black */
            text-decoration: none;
            transition: color 0.3s;
        }

        .navigation-links a:hover {
            color: #23527c;
        }
    </style>
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!--header-top start -->
    <header id="header-top" class="header-top">
        <ul>
            <li>
                <div class="header-top-left">
                    <ul>
                        <li class="select-opt">
                            <select name="language" id="language">
                                <option value="default">EN</option>
                                <option value="Bangla">BN</option>
                                <option value="Arabic">AB</option>
                            </select>
                        </li>
                        <li class="select-opt">
                            <select name="currency" id="currency">
                                <option value="usd">USD</option>
                                <option value="euro">Euro</option>
                                <option value="bdt">BDT</option>
                            </select>
                        </li>
                        <li class="select-opt">
                            <a href="#"><span class="lnr lnr-magnifier"></span></a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="head-responsive-right pull-right">
                <div class="header-top-right">
                    <ul>
                        <li class="header-top-contact">
                            +1 222 777 6565
                        </li>
                        <li class="header-top-contact">
                            <a href="#">sign in</a>
                        </li>
                        <li class="header-top-contact">
                            <a href="#">register</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </header><!--/.header-top-->
    <!--header-top end -->

    <!-- top-area Start -->
    <section class="top-area">
        <div class="header-area">
            <!-- Start Navigation -->
            <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy" data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">
                <div class="container">
                    <!-- Start Header Navigation -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href="index.html">ESPRIT<span>-DISCOVERY</span></a>
                    </div><!--/.navbar-header-->
                    <!-- End Header Navigation -->
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
                        <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                            <li><a href="index.html">Home</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Event <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="Eventfront.php">List Event</a></li>
                                    <li><a href="searchReview.php">Event's Rate</a></li>
                                    <li><a href="EventSort.php">sort</a></li>
                                    <li><a href="Eventcalender.php">calender</a></li>
                                    <li><a href="statistiqueE.php">statistique</a></li>
                                </ul>
                            </li>
                            <li class="scroll"><a href="#explore">explore</a></li>
                            <li class="scroll"><a href="#reviews">review</a></li>
                            <li class="scroll"><a href="#blog">blog</a></li>
                            <li class="scroll"><a href="#contact">contact</a></li>
                        </ul><!--/.nav -->
                    </div><!-- /.navbar-collapse -->
                </div><!--/.container-->
            </nav><!--/nav-->
            <!-- End Navigation -->
        </div><!--/.header-area-->
        <div class="clearfix"></div>
    </section><!-- /.top-area-->
    <!-- top-area End -->

    <!--welcome-hero start -->
    <section id="home" class="welcome-hero">
        <div class="container">
            <section id="events" class="events">
                <div class="container">
                    <br>
                    <br>
                    <div class="centered navigation-links">
                        <a href="?month=<?php echo $currentMonth > 1 ? ($currentMonth - 1) : 12; ?>&year=<?php echo $currentMonth > 1 ? $currentYear : ($currentYear - 1); ?>">Previous Month</a>
                        <span class="month-year"><?php echo date("F Y", mktime(0, 0, 0, $currentMonth, 1, $currentYear)); ?></span>
                        <a href="?month=<?php echo $currentMonth < 12 ? ($currentMonth + 1) : 1; ?>&year=<?php echo $currentMonth < 12 ? $currentYear : ($currentYear + 1); ?>">Next Month</a>
                    </div>
                    <div class="calendar">
                        <!-- Display Weekdays -->
                        <?php
                        $weekdays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                        foreach ($weekdays as $weekday) {
                            echo '<div class="weekday">' . substr($weekday, 0, 3) . '</div>';
                        }
                        // Start the calendar grid
                        $dayCounter = 1 - $firstDayOfMonth;
                        while ($dayCounter <= $daysInMonth) {
                            echo '<div class="day">';
                            if ($dayCounter > 0) {
                                echo '<strong>' . $dayCounter . '</strong>';
                                // Check if there are events for this day
                                if (isset($eventc[$currentYear][$currentMonth][$dayCounter])) {
                                    $eventsForDay = $eventc[$currentYear][$currentMonth][$dayCounter];
                                    foreach ($eventsForDay as $event) {
                                        echo '<div class="event">' . htmlspecialchars($event['nomE']) . ', ' . htmlspecialchars($event['lieuE']) . ', ' . htmlspecialchars($event['categoE']) . '</div>';
                                    }
                                }
                            }
                            echo '</div>';
                            $dayCounter++;
                        }
                        ?>
                    </div>
                </div>
            </section>
        </div><!--/.container-->
    </section><!--/.welcome-hero-->
    <!--welcome-hero end -->

    <!--footer start-->
    <footer id="footer" class="footer">
        <div class="container">
            <div class="footer-menu">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="index.html">ESPRIT<span>-DISCOVERY</span></a>
                        </div><!--/.navbar-header-->
                    </div>
                    <div class="col-sm-9">
                        <ul class="footer-menu-item">
                            <li class="scroll"><a href="#works">how it works</a></li>
                            <li class="scroll"><a href="#explore">explore</a></li>
                            <li class="scroll"><a href="#reviews">review</a></li>
                            <li class="scroll"><a href="#blog">blog</a></li>
                            <li class="scroll"><a href="#contact">contact</a></li>
                            <li class=" scroll"><a href="#contact">my account</a></li>
                        </ul><!--/.nav -->
                    </div>
                </div>
            </div>
            <div class="hm-footer-copyright">
                <div class="row">
                    <div class="col-sm-5">
                        <p>
                            &copy;copyright. designed and developed by <a href="https://www.themesine.com/">themesine</a>
                        </p><!--/p-->
                    </div>
                    <div class="col-sm-7">
                        <div class="footer-social">
                            <span><i class="fa fa-phone"> +1  (222) 777 8888</i></span>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div><!--/.hm-footer-copyright-->
        </div><!--/.container-->
        <div id="scroll-Top">
            <div class="return-to-top">
                <i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
            </div>
        </div><!--/.scroll-Top-->
    </footer><!--/.footer-->
    <!--footer end-->

    <!-- Include all js compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootsnav.js"></script>
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>

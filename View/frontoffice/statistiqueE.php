<?php
// Inclure les fichiers nécessaires
include '../aide/EventC.php'; 

// Créer une instance de la classe EventC
$eventController = new EventC();

// Récupérer les statistiques des événements
$statistics = $eventController->getEventStatistics();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta data -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!--font-family-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- title of site -->
    <title>Directory Landing Page</title>

    <!-- For favicon png -->
    <link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png" />

    <!--font-awesome.min.css-->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!--linear icon css-->
    <link rel="stylesheet" href="assets/css/linearicons.css">

    <!--animate.css-->
    <link rel="stylesheet" href="assets/css/animate.css">

    <!--flaticon.css-->
    <link rel="stylesheet" href="assets/css/flaticon.css">

    <!--slick.css-->
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/slick-theme.css">

    <!--bootstrap.min.css-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- bootsnav -->
    <link rel="stylesheet" href="assets/css/bootsnav.css">

    <!--style.css-->
    <link rel="stylesheet" href="assets/css/style.css">

    <!--responsive.css-->
    <link rel="stylesheet" href="assets/css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        /* Style for blue and slightly larger text */
        .single-event h3,
        .single-event p {
            color: #ffffff; /* Blue color */
            font-size: 15px; /* Larger font size */
            font-weight: 500; /* Medium font weight */
        }

        /* Style for table */
        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 30px;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: bold;
        }

        td {
            background-color: #fff;
            color: #666;
        }

        /* Style for footer */
        #footer {
            background-color: #333;
            color: #fff;
            padding: 40px 0;
        }

        .footer-menu-item {
            text-align: center;
        }

        .footer-menu-item li {
            display: inline-block;
            margin-right: 20px;
        }

        .footer-menu-item li a {
            color: #fff;
        }

        .footer-social {
            text-align: center;
            margin-top: 20px;
        }

        .footer-social a {
            color: #fff;
            margin-right: 10px;
        }

        .return-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #333;
            color: #fff;
            width: 40px;
            height: 40px;
            text-align: center;
            line-height: 40px;
            border-radius: 50%;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .return-to-top:hover {
            background-color: #555;
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
                    <div class="row">
                        <div class="col-lg-12">
                        <br>
                            <br>
                            <h1 style="font-size: 36px;">Statistiques des événements</h1>
                            <?php if (!empty($statistics)) : ?>
                                <div class="table-responsive">
                                    <br>
                                    <br>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Catégorie</th>
                                                <th>Total d'événements</th>
                                                <th>Coût moyen (TND)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($statistics as $stat) : ?>
                                                <tr>
                                                    <td><?php echo $stat['categoE']; ?></td>
                                                    <td><?php echo $stat['totalEvents']; ?></td>
                                                    <td><?php echo number_format($stat['averageCost'], 2); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php else : ?>
                                <p>Aucune statistique disponible pour le moment.</p>
                            <?php endif; ?>
                        </div>
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

    <!--modernizr.min.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

    <!--bootstrap.min.js-->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- bootsnav js -->
    <script src="assets/js/bootsnav.js"></script>

    <!--feather.min.js-->
    <script src="assets/js/feather.min.js"></script>

    <!-- counter js -->
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>

    <!--slick.min.js-->
    <script src="assets/js/slick.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <!--Custom JS-->
    <script src="assets/js/custom.js"></script>

</body>

</html>

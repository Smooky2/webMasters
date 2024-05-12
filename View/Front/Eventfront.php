<?php
include '..\aide\EventC.php';
$eventC = new EventC();
$list = $eventC->listEvent();
?>
<?php
session_start();
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <!-- meta data -->
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        
        <!-- title of site -->
        <title>Site de reservation de voyage</title>

        <!-- For favicon png -->
		<link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png"/>
       
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
		<link rel="stylesheet" href="assets/css/bootsnav.css" >	
        
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
			    <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"  data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

			        <div class="container">

			            <!-- Start Header Navigation -->
			            <div class="navbar-header">
			                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
			                    <i class="fa fa-bars"></i>
			                </button>
			                <a class="navbar-brand" href="index.html">esprit<span>discovery</span></a>

			            </div><!--/.navbar-header-->
			            <!-- End Header Navigation -->

			            <!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
    <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
        <li><a href="index.php">acuiel</a></li>
        <li><a href="index.php">plus d'informations</a></li>
        <li><a href="index.php">réservation</a></li>
		
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

        <li><a href="index.php">forum</a></li>
        <li><a href="index.php">réclamation</a></li>

        <?php
        // Check if user is logged in
        if (isset($_SESSION['id'])) {
            // Assuming you have the user ID stored in a variable named $userId
            $userId = $_SESSION['id'];
            echo '<li><a href="modifieruserfront.php?id=' . $userId . '">Update Profile</a></li>';
            echo '<li><a href="logout.php">Déconnexion</a></li>';
            // Affichage du nom de l'utilisateur sur la même ligne
            $userName = $_SESSION['name']; 
            echo '<li>' . $userName . '</li>'; 
        } else {
            echo '<li><a href="login.php">Connexion</a></li>';
        }
        ?>
    </ul>
</div>
</div>
</div>
</div>
</div>
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
                        <?php foreach ($list as $event) { ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-event">
                               

                                <div class="event-content">
                                    <h3><?php echo $event['nomE']; ?></h3>
                                    <p><strong>Date:</strong> <?php echo $event['dateE']; ?></p>
                                    <p><strong>Time:</strong> <?php echo $event['heureE']; ?></p>
                                    <p><strong>Location:</strong> <?php echo $event['lieuE']; ?></p>
                                    <p><strong>Category:</strong> <?php echo $event['categoE']; ?></p>
                                    <p><strong>Frais:</strong> <?php echo $event['fraisE']; ?></p>
                                    <a href="add_rate.php?id=<?php echo $event['idE']; ?>" class="btn btn-primary">Review</a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
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

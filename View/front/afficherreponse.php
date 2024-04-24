<?php
require_once 'C:\xampp\htdocs\projet\Controller\reclamationC.php';
require_once 'C:\xampp\htdocs\projet\Controller\reponseC.php';

$reponseC = new reponseC();
$listereponses = $reponseC->afficherby($_GET["IDR"]); // Fetching responses, adjust this as needed


if (!empty($listereponses)) {
    $reponse = $listereponses[0]; // Considering you want to display only one response

    // Display the response in the middle of the page
    ?>


<!doctype html>
<html class="no-js" lang="en">

    <head>
        
        <!-- meta data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags must come first in the head; any other head content must come after these tags -->
        <link rel="stylesheet" href="forum.css">
        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        
        <!-- title of site -->
        <title>Forum</title>

        <!-- For favicon png -->
		<link rel="shortcut icon" type="image/icon" href="assets/img/logo.ico"/>
       
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

    </head>
    <body>
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
			                    <li class=" scroll "><a href="index.html">home</a></li>
			                    <li class="scroll"><a href="#works">how it works</a></li>
			                    <li class="scroll"><a href="#explore">explore</a></li>
			                    <li class="scroll active"><a href="afficherreclamation.php">reclamation</a></li>
			                    <li class="#"><a href="forum.html">forum</a></li>
			                    <li class="scroll"><a href="#contact">contact</a></li>
			                </ul><!--/.nav -->
			            </div><!-- /.navbar-collapse -->
			        </div><!--/.container-->
			    </nav><!--/nav-->
			    <!-- End Navigation -->
			</div><!--/.header-area-->
		    <div class="clearfix"></div>

		</section><!-- /.top-area-->
<title>Page de réponse</title>
        <style>
     

            .response-container {
                background-color: #fff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                max-width: 600px;
                width: 100%;
            }

            .response-details {
                margin-bottom: 15px;
            }

            label {
                font-weight: bold;
            }

            input[type="text"],
            textarea {
                width: 100%;
                padding: 8px;
                margin-top: 5px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 3px;
                box-sizing: border-box;
            }

            input[type="submit"] {
                background-color: purple;
                color: #fff;
                padding: 10px 15px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }
        </style>
    </head>
<center>
        <div  class="response-container">
            <h1>Réponse</h1>
            <div class="response-details">
                <label for="date">Date:</label>
                <input type="text" name="date" value="<?php echo $reponse['dater']; ?>" readonly><br>

                <label for="sujet">Sujet:</label>
                <input type="text" name="sujet" value="<?php echo $reponse['sujet']; ?>" readonly><br>

                <label for="description">Description:</label>
                <textarea name="description" readonly><?php echo $reponse['dess']; ?></textarea><br>
            </div>

            <form action="afficherreclamation.php" method="get">
                <input type="hidden" name="IDR" value="<?php echo $reponse['IDR']; ?>">
                <input type="submit" value="Retour">
            </form>
        </div>
		</center>
    </html>
    <?php
} else {
    // If no responses are available
    echo "Aucune réponse disponible pour le moment.";
}
?>
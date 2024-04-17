<?php

include 'C:/xampp/htdocs/projet/controller/forumC.php';
include 'C:/xampp/htdocs/projet/Model/forum.php';


//$forum = null;

$forumC = new forumC();

if (
    isset($_POST["title"]) &&
    isset($_POST["content"]) &&
    isset($_POST["id_user"]) 
) {
    if (
        !empty($_POST['title']) &&
        !empty($_POST["content"]) &&
        !empty($_POST["id_user"]) 
    ) {
        $currentDate = date('Y-m-d H:i:s');
        $forum = new forum(
            null,
            $_POST['title'],
            $_POST['content'],
            $currentDate ,//date systeme
            $_POST['id_user'],
             
        );
        $forumC->addForum($forum);
        header('Location: add_forum.php');
        exit();
    }
}


// Connexion à la base de données
//include 'C:\xampp\htdocs\education\back\config.php';

$forumC = new forumC();

// Traitement du formulaire
/*if (isset($_POST['submit'])) {
    // Validation des données
  
    $title = $_POST['title'];
    $content= $_POST['content'];
    $currentDate = date('Y-m-d H:i:s');
    $createur_id_forum=$_POST['id_user'];
    
    
    $forum=new forum(null,$title,$content ,$currentDate,$createur_id_forum);
    $forumC->addForum($forum);
    header("location","add_forum.php");
    exit();

   
    
}*/     


?>
<!doctype html>
<html class="no-js" lang="en">

    <head>
        
        <!-- meta data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
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
			                <a class="navbar-brand" href="index.html"><img src="C:\xampp\htdocs\projet\view\front\assets\img\logo.png" alt="" style="width: 100px;height: 100px;"></a>

			            </div><!--/.navbar-header-->
			            <!-- End Header Navigation -->

			            <!-- Collect the nav links, forms, and other content for toggling -->
			            <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
			                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
			                    <li class=" scroll "><a href="index.html">home</a></li>
			                    <li class="scroll"><a href="#works">how it works</a></li>
			                    <li class="scroll"><a href="#explore">explore</a></li>
			                    <li class="scroll"><a href="#reviews">review</a></li>
			                    <li class="scroll active"><a href="forum.html">forum</a></li>
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
        
        <form action="" method="post" onsubmit="return validateForm()">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" >
    
            <label for="content">Content:</label>
            <textarea id="content" name="content" rows="10" ></textarea>
            <input type="number" class="email_bt_2" id="id_user" name="id_user"
                        placeholder="Enter your user ID..." required>

            <input type="submit" value="Publish">
        </form>


    <script src="controle.js"></script>
    </body>
</html>








<?php
session_start();
include 'C:\xampp\htdocs\projetfinal\contoller\forumC.php';
$c = new forumC();
$forumList = $c->listForum();

if(isset($_POST['triCroissant'])) {
    $c = new forumC();
    $forumList = $c->trierforumS('ASC');
}

if(isset($_POST['triDecroissant'])) {
    $c = new forumC();
    $forumList = $c->trierforum('DESC');
}
?>
<!doctype html>
<html>

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
        <style>
		.tri {
    background-color: red;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
}

.tri:hover {
    background-color: darkred;
}
		.search-form {
    position: absolute;
    top: 100px;
    right: 50px;
	z-index: 999; 
}

/* Style for the search container */
.search-container {
    display: flex;
    align-items: center;
}

/* Style for the search input */
.search-form input[type="text"] {
    width: 150px; /* Adjust the width as needed */
    padding: 8px;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-right: 5px;
    font-size: 14px;
	margin-top: 90px;
}

/* Style for the search button */
.search-form button[type="submit"] {
    padding: 8px 15px;
    border: none;
    border-radius: 5px;
    background-color: red; /* Change the background color as needed */
    color: #fff;
    cursor: pointer;
    font-size: 14px;
}

/* Hover effect for the search button */
.search-form button[type="submit"]:hover {
 background-color: #0056b3; /* Change the hover background color as needed */

}
.single-how-works-container {
    margin-top: 50px; /* Adjust the margin as needed to create space between the search bar and single how works items */
}
	</style>
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
			                <a class="navbar-brand" href="index.php">esprit<span>discovery</span></a>

			            </div><!--/.navbar-header-->
			            <!-- End Header Navigation -->

			            <!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
    <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
        <li class="scroll active"><a href="index.php">accueil</a></li>
        <li class="scroll"><a href="#works">plus d'informations</a></li>
        <li class="scroll"><a href="#explore">réservation</a></li>
		
		<?php
    // Check if user is logged in
    if (isset($_SESSION['id'])) {
        echo '<li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Event <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="Eventfront.php">List Event</a></li>
                <li><a href="searchReview.php">Events Rate</a></li>
                <li><a href="EventSort.php">sort</a></li>
                <li><a href="Eventcalender.php">calender</a></li>
                <li><a href="statistiqueE.php">statistique</a></li>
            </ul>
        </li>';
    } else {
        echo '<li><a href="#explore" onclick="showLoginMessage()">evenement</a></li>';
    } 
?>

<script>
    function showLoginMessage() {
        // Display the login message
        alert("Veuillez vous connecter pour voir les événements.");
        // Prevent the default behavior of the link
        event.preventDefault();
    }
</script>



        <li class="#"><a href="forum.php">forum</a></li>
        <li class="#"><a href="afficherreclamation.php">réclamation</a></li>

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
		
		<form method="POST" action="">
<input type="submit" name="triCroissant" value="Tri Croissant" class="tri">
  <input type="submit" name="triDecroissant" value="Tri Décroissant" class="tri">
</form>
<div class="search-container">
		<form method="POST" action="recherche.php" class="search-form">
    
        <input type="text" id="search" name="titre" placeholder="Search..">
        <button type="submit" name="btn-search">Search</button>
    </div>
</form>
        <?php foreach ($forumList as $forum):?>
            <section id="works" class="works">
			
			<div class="single-how-works-container">
        <div class="col-md-4 col-sm-6">
							<div class="single-how-works">
								<div class="single-how-works-icon">
									<i class="flaticon-lightbulb-idea"></i>
								</div>
								<h2><?php echo $forum['titre'];?></h2>
								<p>
                                <?php echo $forum['description'];?></p>
								<p>
                                 <?php echo $forum['date_creation'];?>
								 </p>
								
								 <a href="comment.php?id_forum=<?php echo $forum['id_forum']; ?>">Add comment</a>
								
							</div>
						</div>
		</div>
                        <?php endforeach;?>
        		
        </section>


    <script src="controle.js"></script>
    <footer id="footer"  class="footer">
			<div class="container">
				<div class="footer-menu">
		           	<div class="row">
			           	
			           	<div class="col-sm-9">
			           		<ul class="footer-menu-item">
			                    <li class="scroll"><a href="#works">how it works</a></li>
			                    <li class="scroll"><a href="#explore">explore</a></li>
			                    <li class="scroll"><a href="#reviews">review</a></li>
			                    <li class="#"><a href="forum.php">forum</a></li>
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
        <script  src="assets/js/feather.min.js"></script>

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
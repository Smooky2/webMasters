<?php
    // Handle the search when the form is submitted
    include_once 'C:\xampp\htdocs\projetfinal\contoller\forumC.php'; // Adjust the path accordingly
    $forumC = new forumC();

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn-search'])) {
        $title = isset($_POST['titre']) ? $_POST['titre'] : '';
        $searchResult = $forumC->searchPublications($title);

        // Display the search result
        
    }
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
        <style>
            .btn.btn-primary
            {
                position: absolute;
                top: 100px;
                left: 50px;
	            z-index: 999; 
                background-color: red;

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
			                <a class="navbar-brand" href="index.html">esprit<span>discovery</span></a>

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
        <div class="search-container">
		
		<form method="POST" action="recherche.php" class="search-form">
    
        <input type="text" id="search" name="titre" placeholder="Search..">
        <button type="submit" name="btn-search">Search</button>
    </div>
    <a href="forum.php" class="btn btn-primary">Back</a>
    
</form>
        <?php foreach ($searchResult as $forum):?>
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
						
</form>

<script src="controle.js"></script>
    </body>
</html>
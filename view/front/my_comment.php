<?php
include_once 'C:\xampp\htdocs\projet\controller\messageC.php';
include_once 'C:\xampp\htdocs\projet\controller\forumC.php'; // Include the comment controller
$c_comment = new messageC(); // Create an instance of the comment controller
$c_forum = new forumC();
// Assuming you have some sort of authentication system where you know the current user's ID
$user_id = 3; // Example user ID, replace with actual user ID from your authentication system
//$forum_id = $_POST['forum_id'];
$forum_id = $_GET['id_forum'];
$forum = $c_forum->getForumById($forum_id);
$my_comments = $c_comment->getCommentsByUserId($user_id); // Get comments by user ID

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
    <!-- meta data -->
    <!-- Add your meta tags, title, CSS, and JavaScript includes here -->
<style>
    <style>
    table {
    margin-top:  100px;  
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
}


table th,
table td {
    padding: 100px;
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
</style>
</head>
<body>
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
        <h2>My Comments:</h2>
        <table >
  <thead>
    <tr>
      <th >contenu</th>
      <th >Date de poste</th>
      <th>titre de forum</th>
      
      
    </tr>
  </thead>   
    
    <?php if(!empty($my_comments)): ?>
        <tr style="background-color: #f2f2f2;">
            <?php foreach ($my_comments as $comment): ?>
                <td><?php echo $comment['contenu']; ?></td>
                <td ><?php echo $comment['date_poste'];?></td>
                <td ><?php echo $forum['titre'];?></td>
                </tr>
                
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No comments yet.</p>
    <?php endif; ?>
    
</body>
</html>
<?php
require_once 'C:\xampp\htdocs\projetfinal\Contoller\reclamationC.php';
require_once 'C:\xampp\htdocs\projetfinal\Contoller\reponseC.php';
$reclamationC = new reclamationC();
$typer = isset($_GET["typer"]) ? $_GET["typer"] : 'all';
$listereclamations = $reclamationC->afficherfilter($typer);

if ($listereclamations) {
    // Process $listereclamations as needed
    foreach ($listereclamations as $reclamation) {
        // Your logic here
    }
} else {
    echo "No reclamation found."; // Display a message or handle the case when no reclamation is found
}
$reponseC = new reponseC();

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
        <a style='  text-decoration: none;
            color: #fff;
            /* White color */
            background-color: #e74c3c;
            /* Red color */
            padding: 10px 15px;
            border-radius: 5px;' href="ajouterreclamation.php">Ajouter une reclamation</a>
        <center>
            <h1>Liste des reclamations</h1>
        </center>
        <form action="filtered_page.php" method="GET">
    <label for="typer-filter">Filter by Type:</label>
    <select id="typer-filter" name="typer">
        <?php
        $unique_types = $reclamationC->getUniqueTyperValues(); // Replace with your actual method to fetch data

        foreach ($unique_types as $type) {
            echo "<option value='$type'>$type</option>";
        }
        ?>
    </select>
    <a style='  text-decoration: none;
color: #fff;
/* White color */
background-color: green;
/* Red color */
padding: 10px 15px;
border-radius: 5px;' href="afficherreclamation.php">Display All</a>
    <input type="submit" value="Filter">
</form>



        <table class="my-table" border="1" align="center" id="reclamation-table">
            <tr>

                <th>Type</th>
                <th>Date</th>
                <th>Sujet</th>
                <th>Description</th>
                <th>Etat</th>
                <th>Reponse</th>
                <th>Actions</th>

            </tr>
            <?php foreach ($listereclamations as $reclamation) { 
                          $response = $reponseC->getResponseByReclamationId($reclamation['IDR']);
                          ?>
                <tr>

                    <td><?php echo $reclamation['typer']; ?></td>
                    <td><?php echo $reclamation['dater']; ?></td>
                    <td><?php echo $reclamation['sujet']; ?></td>
                    <td><?php echo $reclamation['dess']; ?></td>
                    <td>

                    <?php
$statut = $reclamation['statut'];
if ($statut === "pas encore") {
    echo "Pas encore traité";
}elseif ($statut === "traité") {
    echo "Traité";
}
elseif ($statut === "en train") {
  echo "traitement en cour";
}
?>
                    </td>  <td>
                    <?php if ($statut == "en train") { ?>
                    <?php if ($response) { ?>
            <a style='  
                text-decoration: none;
                color: #fff;
                background-color: purple;
                margin-right:5px;
                padding: 10px 15px;
                border-radius: 5px;
            ' href="afficherListereponses.php?IDR=<?php echo $reclamation['IDR']; ?>">
                voir reponse
            </a>
        <?php }} else if ($statut == "pas encore") { ?>
            <span style="color: red;">Il n'y a pas de réponse pour le moment.</span>
        <?php } else if ($statut == "traité") {  ?>
            <span style="color: green;">Réclamation bien traitée.</span>
            <?php }   ?>
    </td></td>
                    <td>
                        <form method="POST" action="modifierreclamation.php">
                            <input type="submit" name="Modifier" value="Modifier">
                            <input type="hidden" value=<?PHP echo $reclamation['IDR']; ?> name="IDR">
                        </form>



                        <a style='  text-decoration: none;
            color: #fff;
            /* White color */
            background-color: #e74c3c;
            /* Red color */
            padding: 10px 15px;
            border-radius: 5px;' href="supprimerreclamation.php?IDR=<?php echo $reclamation['IDR']; ?>">annuler</a>



                </tr>
            <?php } ?>
        </table>


        <style>
            .my-table {
                background-color: white;
                border-collapse: collapse;
                width: 100%;
                font-size: 1em;
                font-family: Arial, sans-serif;
                color: #333;
            }

            .my-table th,
            .my-table td {
                padding: 0.5em;
                border: 1px solid #ccc;
            }

            .my-table th {
                background-color: #f7f7f7;
                text-align: left;
                font-weight: bold;
            }

            .my-table td {
                text-align: left;
            }

            .my-table td form {
                display: inline-block;
            }

            input[type="submit"] {
                background-color: #4CAF50;
                /* Green color */
                color: white;
                padding: 10px 15px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            /* Style for the "annuler" link */
         
        </style>















    
</body>

</html>

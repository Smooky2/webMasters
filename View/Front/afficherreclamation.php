<?php
require_once 'C:\xampp\htdocs\user+reservation+event\Contoller\reclamationC.php';
require_once 'C:\xampp\htdocs\user+reservation+event\Contoller\reponseC.php';
session_start();
$reclamationC = new reclamationC();
$listereclamations = $reclamationC->afficherreclamations();
$reponseC = new reponseC();

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
								+216 28505563
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
			                <a class="navbar-brand" href="index.php">esprit<span>discovery</span></a>

			            </div><!--/.navbar-header-->
			            <!-- End Header Navigation -->

			            <!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
    <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
        <li class="scroll active"><a href="#home">accueil</a></li>
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



        <li class="scroll"><a href="#blog">forum</a></li>
        <li class="scroll"><a href="afficherreclamation.php">réclamation</a></li>

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
<a style='  text-decoration: none;
            color: #fff;
            /* White color */
            background-color: #e74c3c;
            /* Red color */
            padding: 10px 15px;
            border-radius: 5px;' href="ajoutreclamation.php">Ajouter une reclamation</a>
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
} elseif ($statut === "en cour de traitement") {
    echo "En cours de traitement";
} elseif ($statut === "traité") {
    echo "Traité";
}
?>



                    </td>
                    <td>  <?php if ($response) { ?>
            <a style='  
                text-decoration: none;
                color: #fff;
                background-color: purple;
                padding: 10px 15px;
                border-radius: 5px;
            ' href="afficherreponse.php?IDR=<?php echo $reclamation['IDR']; ?>">
                voir reponse
            </a>
        <?php } else { ?>
            <span style="color: red;">Il n'y a pas de réponse pour le moment.</span>
        <?php } ?>
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
<?php
session_start();
require_once 'C:\xampp\htdocs\projetfinal\Model\reclamation.php';
require_once 'C:\xampp\htdocs\projetfinal\Contoller\reclamationC.php';

$error = "";

// create reclamation
$reclamation = null;

// create an instance of the controller
$reclamationC = new reclamationC();
if (

    isset($_POST["typer"]) &&
    isset($_POST["sujet"]) &&
    isset($_POST["dess"])
) {
    if (
        !empty($_POST['typer']) &&
        !empty($_POST["sujet"]) &&
        !empty($_POST["dess"])
    ) {

        $reclamation = new reclamation(
            null,
            $_POST['typer'],
            $_POST['sujet'],
            $_POST['dess']

        );
        $reclamationC->ajouterreclamation($reclamation);
        echo "<script>";
        echo "alert('reclamation recu !');";
        echo "window.location.href = 'afficherreclamation.php';";
        echo "</script>";
    } else
        $error = "Missing information";
}
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
<!-- top-area End -->


    <a style='            text-decoration: none;
            color: #fff;
            /* White color */
            background-color: #e74c3c;
            /* Red color */
            padding: 10px 15px;
            border-radius: 5px;' href="afficherreclamation.php">Retour à la liste des reclamations</a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>
  
    <style>
        input[type="submit"] {
            background-color: #4CAF50;
            /* Green color */
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="reset"] {
            background-color: #e74c3c;
            /* Green color */
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

   

        table {
            background-color: white;
            margin: 0 auto;
            /* Centers the table horizontally */
            width: 80%;
            /* Sets the width of the table */
            max-width: 800px;
            /* Sets the maximum width of the table */
            border-collapse: collapse;
            /* Collapses the borders between table cells */
        }

        td {

            padding: 10px;
            /* Adds padding around the table cells */
            text-align: left;
            /* Aligns the text to the left */
        }

        label {
            color: black;
            font-weight: bold;
            /* Makes the label text bold */
        }
    </style>
        <center><h2>Ajouter Réclamation</h2></center>

    <form id="myForm" name="myForm" action="" onsubmit="return validateForm()" method="POST">
        <table align="center">
            <tr>
                <td>
                    <label for="typer">type de reclamation :
                    </label>
                </td>
                <td> <select id="typer" name="typer" required>
                        <option value="">--Choisir un type de réclamation--</option>
                        <option value="Problèmes de réservation ">Problèmes de réservation </option>
                        <option value="Expérience client insatisfaisante">Expérience client insatisfaisante</option>
                        <option value="Services non conformes">Services non conformes</option>
                        <option value="autre">Autre</option>
                    </select> </td>
            </tr>

         
            <tr>
                <td>
                    <label for="sujet">sujet de reclamation:
                    </label>
                </td>
                <td>
                    <input type="text" name="sujet" id="sujet">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="dess">description de reclamation :
                    </label>
                </td>
                <td>
                    <input type="text" name="dess" id="dess">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Envoyer">
                </td>
                <td>
                    <input type="reset" value="Annuler">
                </td>
            </tr>
            <tr>
           
           <td><input type="date" name="dater" id="dater" maxlength="20" hidden></td>
       </tr>
        </table>
    </form>
    <script type="text/javascript" src="script.js"></script>
                    </body>
                </html>
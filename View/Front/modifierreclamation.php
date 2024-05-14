<?php
require_once 'C:\xampp\htdocs\user+reservation+event\Model\reclamation.php';
require_once 'C:\xampp\htdocs\user+reservation+event\Contoller\reclamationC.php';

$error = "";

// create reclamation
$reclamation = null;

// create an instance of the controller
$reclamationC = new reclamationC();
if (
    isset($_POST["IDR"]) &&
    isset($_POST["typer"]) &&
    isset($_POST["sujet"]) &&
    isset($_POST["dess"])
) {
    if (
        !empty($_POST["IDR"]) &&
        !empty($_POST['typer']) &&
        !empty($_POST["sujet"]) &&
        !empty($_POST["dess"])
    ) {
        $reclamation = new reclamation(
            $_POST['IDR'],
            $_POST['typer'],
            $_POST['sujet'],
            $_POST['dess']
        );
        $reclamationC->modifierreclamation($reclamation, $_POST["IDR"]);
        header('location:afficherreclamation.php');
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
			                <a class="navbar-brand" href="index.html"><img src="C:\xampp\htdocs\projet\view\front\assets\img\logo.png" alt="" style="width: 100px;height: 100px;"></a>

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
		<!-- top-area End -->
 <a style='         text-decoration: none;
                color: #fff;
                /* White color */
                background-color: #e74c3c;
                /* Red color */
                padding: 10px 15px;
                border-radius: 5px;
            ' href="afficherreclamation.php">Retour à la liste des reclamations</a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['IDR'])) {
        $reclamation = $reclamationC->recupererreclamation($_POST['IDR']);

    ?>

        <form name="myForm" action="" onsubmit="return validateForm()" method="POST">
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

                /* Style for the "annuler" link */



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
            <center>
                <h2>modifier votre reclamation</h2>
            </center>
            <table align="center">
                <tr>
                
                    <td><input type="text" name="IDR" id="IDR" value="<?php echo $reclamation['IDR']; ?>" hidden></td>
                </tr>
                <tr>
      
             
                <td> <label for="typer">type:</label>  </td>   <td> 
     <select id="typer" name="typer">
            <option value="Problèmes de livraison" <?php if ($reclamation['typer'] === 'Problèmes de livraison') echo 'selected'; ?>>Problèmes de réservation</option>
            <option value="Défauts" <?php if ($reclamation['typer'] === 'Défauts') echo 'selected'; ?>>Expérience client insatisfaisante </option>
            <option value="auteur" <?php if ($reclamation['typer'] === 'auteur') echo 'selected'; ?>>Services non conformes</option>
            <option value="autre" <?php if ($reclamation['typer'] === 'autre') echo 'selected'; ?>>autre</option>

        </select></td>
               </tr>

                <tr>
                    <td>
                        <label for="sujet">sujet de reclamation:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="sujet" value="<?php echo $reclamation['sujet']; ?>" id="sujet">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="dess">description de reclamation:
                        </label>
                    </td>
                    <td>
                        <input type="dess" name="dess" id="dess" value="<?php echo $reclamation['dess']; ?>">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Modifier">
                    </td>
                    <td>
                        <input type="reset" value="Annuler">
                    </td>
                </tr>
                <tr>

                    <td><input type="date" name="dater" id="dater" value="<?php echo $reclamation['dater']; ?>" hidden></td>
                </tr>
            </table>

        </form>
    <?php
    }
    ?>
</body>

</html>
<script type="text/javascript" src="script.js"></script>

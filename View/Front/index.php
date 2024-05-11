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
			                <a class="navbar-brand" href="index.html">esprit<span>discovery</span></a>

			            </div><!--/.navbar-header-->
			            <!-- End Header Navigation -->

			            <!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
    <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
        <li class="scroll active"><a href="#home">accueil</a></li>
        <li class="scroll"><a href="#works">plus d'informations</a></li>
        <li class="scroll"><a href="#explore">réservation</a></li>
        <li class="scroll"><a href="#reviews">événement</a></li>
        <li class="scroll"><a href="#blog">forum</a></li>
        <li class="scroll"><a href="#contact">réclamation</a></li>

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
				<div class="welcome-hero-txt">
					<h2>bienvenue sur notre site  <br> de reservation de voyage </h2>
					<p>
						Trouvez l'endroit, l'hôtel, l'événement, le plus adéquat et qui satisfait vos besoins.
					</p>
				</div>
				<div class="welcome-hero-serch-box">
					<div class="welcome-hero-form">
						<div class="single-welcome-hero-form">
							<h3>Vous cherchez quoi</h3>
							<form action="index.html">
								<input type="text" placeholder="Ex: hotel, evenement" />
							</form>
							<div class="welcome-hero-form-icon">
								<i class="flaticon-list-with-dots"></i>
							</div>
						</div>
						<div class="single-welcome-hero-form">
							<h3>Ou </h3>
							<form action="index.html">
								<input type="text" placeholder="Ex: london, newyork, rome" />
							</form>
							<div class="welcome-hero-form-icon">
								<i class="flaticon-gps-fixed-indicator"></i>
							</div>
						</div>
					</div>
					<div class="welcome-hero-serch">
						<button class="welcome-hero-btn" onclick="window.location.href='#'">
							 chercher  <i data-feather="search*"></i> 
						</button>
					</div>
				</div>
			</div>

		</section><!--/.welcome-hero-->
		<!--welcome-hero end -->

		<!--list-topics start -->
		<section id="list-topics" class="list-topics">
			<div class="container">
				<div class="list-topics-content">
					<ul>
						<li>
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon">
									<i class="flaticon-restaurant"></i>
								</div>
								<h2><a href="#">resturent</a></h2>
								<p>150 listings</p>
							</div>
						</li>
						<li>
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon">
									<i class="flaticon-travel"></i>
								</div>
								<h2><a href="#">destination</a></h2>
								<p>214 listings</p>
							</div>
						</li>
						<li>
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon">
									<i class="flaticon-building"></i>
								</div>
								<h2><a href="#">hotels</a></h2>
								<p>185 listings</p>
							</div>
						</li>
						<li>
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon">
									<i class="flaticon-pills"></i>
								</div>
								<h2><a href="#">healthcaree</a></h2>
								<p>200 listings</p>
							</div>
						</li>
						<li>
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon">
									<i class="flaticon-transport"></i>
								</div>
								<h2><a href="#">automotion</a></h2>
								<p>120 listings</p>
							</div>
						</li>
					</ul>
				</div>
			</div><!--/.container-->

		</section><!--/.list-topics-->
		<!--list-topics end-->

		<!--works start -->
		<section id="works" class="works">
			<div class="container">
				<div class="section-header">
					<h2>Voici les hotels avec qui on travaille</h2>
					<p></p>
					<div id="page-wrapper">
            <div id="page-inner">
             <div class="row">
             <div class="col-md-12">
                <h1 class="page-head-line"> Table Hotel </h1>
                <h1 class="page-subhead-line">Only the admin can delete or update the hotel</h1>
            </div>
    
        </div>
            <!-- /. ROW  -->
            <?php
            require '../../Model/hotel.php';
            require '../../contoller/HotelC.php';
          
            
            $hotel = new Hotels();
            $hotelList = $hotel->listHotels();
            ?>
           <section id="hotels" class="hotels">
    <div class="section-header">
        <h2>Hôtels</h2>
        <p>Découvrez nos hôtels partenaires</p>
    </div><!--/.section-header-->
    <div class="row">
        <div id="carouselHotels" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php foreach ($hotelList as $key => $hotel) : ?>
                    <div class="carousel-item <?php echo $key == 0 ? 'active' : ''; ?>">
                        <div class="col-md-4">
                            <div class="single-testimonial-box">
                                <div class="testimonial-description">
                                    <div class="testimonial-info">
                                        <div class="testimonial-img">
                                           <i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									
                                        </div><!--/.testimonial-img-->
                                        <div class="testimonial-person">
                                            <h2><?php echo $hotel['name']; ?></h2>
                                            <h4><?php echo $hotel['location']; ?></h4>
                                        </div><!--/.testimonial-person-->
                                    </div><!--/.testimonial-info-->
                                    <div class="testimonial-comment">
                                        <p><?php echo $hotel['desc']; ?></p>
                                    </div><!--/.testimonial-comment-->
                                </div><!--/.testimonial-description-->
                            </div><!--/.single-testimonial-box-->
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselHotels" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselHotels" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div><!--/.row-->
</section><!--/.hotels-->
		<!--works end -->

		<!--explore start -->
		<!--explore start -->
		<!--explore start -->
<section id="explore" class="explore">
    <div class="container">
        <div class="section-header">
            <h2>Reserver votre hotel</h2>
            <p>Explorez nos hotels , nos differents forfaits </p>
        </div><!--/.section-header-->
    </div>
</section><!-- /.explore -->
<!--explore end -->
<?php


$error = "";
    try {
        $db=config::getConnexion();
        $query=$db->prepare("select * from hotel");
        $query->execute();
        $hotel = $query->fetchAll($db::FETCH_ASSOC);

        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();          
    }
?>


<section id="reservation" class="reservation">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Add reservation Page</h1>
              
            </div>
			<style>
        /* Custom CSS styles */
        #reservation .container {
            padding-top: 50px;
        }

        #reservation .page-head-line {
            color: #6c757d;
            margin-bottom: 30px;
        }

        #reservation .form-control {
            border-radius: 5px;
        }

        #reservation .help-block {
            margin-top: 5px;
            font-size: 12px;
            color: #6c757d;
        }

        #reservation select.form-control {
            width: 100%;
            height: calc(2.25rem + 2px);
            padding: .375rem .75rem;
        }

        #reservation .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
            color: #fff;
            border-radius: 5px;
        }

        #reservation .btn-info:hover {
            background-color: #138496;
            border-color: #117a8b;
        }
		label {
    font-size: 16px;
    font-weight: bold;
    color: #333; /* Couleur de texte foncée */
    margin-bottom: 10px;
        }
		select {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
    color: #333; /* Couleur de texte foncée */
    cursor: pointer;
}

/* Styles pour les options du select */
select option {
    padding: 10px;
    font-size: 16px;
    color: #333; /* Couleur de texte foncée */
}

/* Styles pour le survol de l'option */
select option:hover {
    background-color: #ddd; /* Couleur de fond lors du survol */
}
.file-input-container {
    position: relative;
}

.file-label {
    display: block;
    margin-bottom: 10px;
}

.file-input {
    position: absolute;
    opacity: 0;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    cursor: pointer;
}

.file-button {
    display: inline-block;
    padding: 8px 16px;
    background-color: #555; /* Couleur de fond grise */
    color: #fff; /* Couleur du texte blanc */
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.file-button:hover {
    background-color: #777; /* Couleur de fond gris clair au survol */
}
.message-container {
    background-color: #f8d7da; /* Couleur de fond */
    color: #721c24; /* Couleur du texte */
    padding: 10px; /* Espacement intérieur */
    border: 1px solid #f5c6cb; /* Bordure */
    border-radius: 5px; /* Coins arrondis */
    margin-bottom: 20px; /* Marge en bas */
}

    </style>
        
	</div>
	<?php
    // Vérifie si l'utilisateur est connecté
   if (isset($_SESSION['id'])) {
    // Le formulaire ne sera affiché que si l'utilisateur est connecté
    ?>  
	<div class="row g-3">
            <div class="col-md-6 col-md-offset-3">
               
			<form role="form" action="addhotel.php" method="post" enctype="multipart/form-data" id="reservationForm" class="row g-3">
    <div class="col-md-6">
        <label for="id" class="form-label">ID</label>
        <input class="form-control" type="text" id="id" name="id">
        <p class="help-block">Help text here.</p>
    </div>
    <div class="col-md-6">
        <label for="start" class="form-label">Start</label>
        <input type="date" name="start" id="start" class="form-control">
        <p class="help-block">Help text here.</p>
    </div>
    <div class="col-md-6">
        <label for="endDate" class="form-label">End</label>
        <input class="form-control" type="date" id="endDate" name="endDate">
        <p class="help-block">Help text here.</p>
    </div>
    <div class="col-md-6">
        <label for="idH" class="form-label">Choose a hotel</label>
        <select name="idH" id="idH" class="form-select">
            <?php
            foreach ($hotel as $t) {
                ?>
                <option value="<?php echo $t['idH']?>"><?php echo $t['name']?></option>
            <?php
            }
            ?>
        </select>
    </div>  
    <div class="col-12">
        <label for="my_image" class="form-label">Veuillez insérer la photo de votre identité</label>
        <input type="file" id="my_image" name="my_image" class="form-control">
        <div class="form-text mb-3">Choisir un fichier</div> <!-- Ajout de la classe mb-3 pour la marge en bas -->
    </div>
    <div class="col-12">
        <input type="submit" name="submit" value="Submit the reservation" class="btn btn-info">
        <input type="reset" value="Reset" class="btn btn-info">
    </div>
</form>
<?php
} else {
    echo '<div class="message-container">';
    echo 'Veuillez vous connecter pour effectuer une réservation.';
    echo '</div>';
}
?>

<script>
    document.getElementById('reservationForm').onsubmit = function() {
        return validateForm();
    };

    function validateForm() {
        var start = document.getElementById('start').value;
        var endDate = document.getElementById('endDate').value;

        const currentDate = new Date();
        const year = currentDate.getFullYear();
        const month = currentDate.getMonth() + 1;
        const day = currentDate.getDate();
        
        // Set time components of currentDate to midnight
        currentDate.setHours(0, 0, 0, 0);

        var startDateObj = new Date(start);
        startDateObj.setHours(0, 0, 0, 0);

        if (startDateObj <= currentDate) {
            alert("Start date must be in the future");
            return false;
        }

        var endDateObj = new Date(endDate);
        endDateObj.setHours(0, 0, 0, 0);

        if (endDateObj <= startDateObj) {
            alert("End date must be after the start date");
            return false;
        }

        return true;
    }
</script>
            </div>
        </div>
    </div>
    
		</section><!--/.explore-->

		</section><!--/.explore-->
		<!--explore end -->

		<!--reviews start -->
		<section id="reviews" class="reviews">
			<div class="section-header">
				<h2>clients reviews</h2>
				<p>What our client say about us</p>
			</div><!--/.section-header-->
			<div class="reviews-content">
				<div class="testimonial-carousel">
				    <div class="single-testimonial-box">
						<div class="testimonial-description">
							<div class="testimonial-info">
								<div class="testimonial-img">
									<img src="assets/images/clients/c1.png" alt="clients">
								</div><!--/.testimonial-img-->
								<div class="testimonial-person">
									<h2>Tom Leakar</h2>
									<h4>london, UK</h4>
									<div class="testimonial-person-star">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div><!--/.testimonial-person-->
							</div><!--/.testimonial-info-->
							<div class="testimonial-comment">
								<p>
									Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.
								</p>
							</div><!--/.testimonial-comment-->
						</div><!--/.testimonial-description-->
					</div><!--/.single-testimonial-box-->
				    <div class="single-testimonial-box">
						<div class="testimonial-description">
							<div class="testimonial-info">
								<div class="testimonial-img">
									<img src="assets/images/clients/c2.png" alt="clients">
								</div><!--/.testimonial-img-->
								<div class="testimonial-person">
									<h2>monirul islam</h2>
									<h4>london, UK</h4>
									<div class="testimonial-person-star">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div><!--/.testimonial-person-->
							</div><!--/.testimonial-info-->
							<div class="testimonial-comment">
								<p>
									Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.
								</p>
							</div><!--/.testimonial-comment-->
						</div><!--/.testimonial-description-->
					</div><!--/.single-testimonial-box-->
				    <div class="single-testimonial-box">
						<div class="testimonial-description">
							<div class="testimonial-info">
								<div class="testimonial-img">
									<img src="assets/images/clients/c3.png" alt="clients">
								</div><!--/.testimonial-img-->
								<div class="testimonial-person">
									<h2>Shohrab Hossain</h2>
									<h4>london, UK</h4>
									<div class="testimonial-person-star">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div><!--/.testimonial-person-->
							</div><!--/.testimonial-info-->
							<div class="testimonial-comment">
								<p>
									Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.
								</p>
							</div><!--/.testimonial-comment-->
						</div><!--/.testimonial-description-->
					</div><!--/.single-testimonial-box-->
				    <div class="single-testimonial-box">
						<div class="testimonial-description">
							<div class="testimonial-info">
								<div class="testimonial-img">
									<img src="assets/images/clients/c4.png" alt="clients">
								</div><!--/.testimonial-img-->
								<div class="testimonial-person">
									<h2>Tom Leakar</h2>
									<h4>london, UK</h4>
									<div class="testimonial-person-star">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div><!--/.testimonial-person-->
							</div><!--/.testimonial-info-->
							<div class="testimonial-comment">
								<p>
									Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.
								</p>
							</div><!--/.testimonial-comment-->
						</div><!--/.testimonial-description-->
					</div><!--/.single-testimonial-box-->
				    <div class="single-testimonial-box">
						<div class="testimonial-description">
							<div class="testimonial-info">
								<div class="testimonial-img">
									<img src="assets/images/clients/c1.png" alt="clients">
								</div><!--/.testimonial-img-->
								<div class="testimonial-person">
									<h2>Tom Leakar</h2>
									<h4>london, UK</h4>
									<div class="testimonial-person-star">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div><!--/.testimonial-person-->
							</div><!--/.testimonial-info-->
							<div class="testimonial-comment">
								<p>
									Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.
								</p>
							</div><!--/.testimonial-comment-->
						</div><!--/.testimonial-description-->
					</div><!--/.single-testimonial-box-->
				    <div class="single-testimonial-box">
						<div class="testimonial-description">
							<div class="testimonial-info">
								<div class="testimonial-img">
									<img src="assets/images/clients/c2.png" alt="clients">
								</div><!--/.testimonial-img-->
								<div class="testimonial-person">
									<h2>Ahmed</h2>
									<h4>london, UK</h4>
									<div class="testimonial-person-star">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div><!--/.testimonial-person-->
							</div><!--/.testimonial-info-->
							<div class="testimonial-comment">
								<p>
								Je suis un voyageur régulier et j'ai utilisé de nombreux sites de réservation par le passé, mais celui-ci se distingue vraiment. La navigation est fluide, les informations sur les destinations sont complètes et précises, et j'ai apprécié la possibilité de personnaliser mon voyage selon mes préférences. Je recommande vivement ce site à tous les voyageurs en quête d'une expérience de réservation sans tracas !
							</div><!--/.testimonial-comment-->
						</div><!--/.testimonial-description-->
					</div><!--/.single-testimonial-box-->
				    <div class="single-testimonial-box">
						<div class="testimonial-description">
							<div class="testimonial-info">
								<div class="testimonial-img">
									<img src="assets/images/clients/c3.png" alt="clients">
								</div><!--/.testimonial-img-->
								<div class="testimonial-person">
									<h2>Jean</h2>
									<h4>london, UK</h4>
									<div class="testimonial-person-star">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div><!--/.testimonial-person-->
							</div><!--/.testimonial-info-->
							<div class="testimonial-comment">
								<p>
								En tant que globe-trotter, je suis toujours à la recherche de nouvelles aventures, et ce site m'a vraiment impressionné. Non seulement j'ai trouvé des offres incroyables sur des voyages exotiques, mais j'ai également bénéficié d'un service client exceptionnel. L'équipe a été très réactive et serviable pour répondre à toutes mes questions et résoudre mes préoccupations. Je suis reconnaissant d'avoir découvert ce site et je le recommande à tous les passionnés de voyage
								</p>
							</div><!--/.testimonial-comment-->
						</div><!--/.testimonial-description-->
					</div><!--/.single-testimonial-box-->
				    <div class="single-testimonial-box">
						<div class="testimonial-description">
							<div class="testimonial-info">
								<div class="testimonial-img">
									<img src="assets/images/clients/c4.png" alt="clients">
								</div><!--/.testimonial-img-->
								<div class="testimonial-person">
									<h2>Tom Leakar</h2>
									<h4>london, UK</h4>
									<div class="testimonial-person-star">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div><!--/.testimonial-person-->
							</div><!--/.testimonial-info-->
							<div class="testimonial-comment">
								<p>
									Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.
								</p>
							</div><!--/.testimonial-comment-->
						</div><!--/.testimonial-description-->
					</div><!--/.single-testimonial-box-->
				</div>
			</div>

		</section><!--/.reviews-->
		<!--reviews end -->

		<!-- statistics strat -->
		<section id="statistics"  class="statistics">
			<div class="container">
				<div class="statistics-counter"> 
					<div class="col-md-3 col-sm-6">
						<div class="single-ststistics-box">
							<div class="statistics-content">
								<div class="counter">90 </div> <span>K+</span>
							</div><!--/.statistics-content-->
							<h3>listings</h3>
						</div><!--/.single-ststistics-box-->
					</div><!--/.col-->
					<div class="col-md-3 col-sm-6">
						<div class="single-ststistics-box">
							<div class="statistics-content">
								<div class="counter">40</div> <span>k+</span>
							</div><!--/.statistics-content-->
							<h3>listing categories</h3>
						</div><!--/.single-ststistics-box-->
					</div><!--/.col-->
					<div class="col-md-3 col-sm-6">
						<div class="single-ststistics-box">
							<div class="statistics-content">
								<div class="counter">65</div> <span>k+</span>
							</div><!--/.statistics-content-->
							<h3>visitors</h3>
						</div><!--/.single-ststistics-box-->
					</div><!--/.col-->
					<div class="col-md-3 col-sm-6">
						<div class="single-ststistics-box">
							<div class="statistics-content">
								<div class="counter">50</div> <span>k+</span>
							</div><!--/.statistics-content-->
							<h3>happy clients</h3>
						</div><!--/.single-ststistics-box-->
					</div><!--/.col-->
				</div><!--/.statistics-counter-->	
			</div><!--/.container-->

		</section><!--/.counter-->	
		<!-- statistics end -->

		<!--blog start -->
		<section id="blog" class="blog" >
			<div class="container">
				<div class="section-header">
					<h2>news and articles</h2>
					<p>Always upto date with our latest News and Articles </p>
				</div><!--/.section-header-->
				<div class="blog-content">
					<div class="row">
						<div class="col-md-4 col-sm-6">
							<div class="single-blog-item">
								<div class="single-blog-item-img">
									<img src="assets/images/blog/b1.jpg" alt="blog image">
								</div>
								<div class="single-blog-item-txt">
									<h2><a href="#">How to find your Desired Place more quickly</a></h2>
									<h4>posted <span>by</span> <a href="#">admin</a> march 2018</h4>
									<p>
										Lorem ipsum dolor sit amet, consectetur de adipisicing elit, sed do eiusmod tempore incididunt ut labore et dolore magna.
									</p>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="single-blog-item">
								<div class="single-blog-item-img">
									<img src="assets/images/blog/b2.jpg" alt="blog image">
								</div>
								<div class="single-blog-item-txt">
									<h2><a href="#">How to find your Desired Place more quickly</a></h2>
									<h4>posted <span>by</span> <a href="#">admin</a> march 2018</h4>
									<p>
										Lorem ipsum dolor sit amet, consectetur de adipisicing elit, sed do eiusmod tempore incididunt ut labore et dolore magna.
									</p>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="single-blog-item">
								<div class="single-blog-item-img">
									<img src="assets/images/blog/b3.jpg" alt="blog image">
								</div>
								<div class="single-blog-item-txt">
									<h2><a href="#">How to find your Desired Place more quickly</a></h2>
									<h4>posted <span>by</span> <a href="#">admin</a> march 2018</h4>
									<p>
										Lorem ipsum dolor sit amet, consectetur de adipisicing elit, sed do eiusmod tempore incididunt ut labore et dolore magna.
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!--/.container-->
			
		</section><!--/.blog-->
		<!--blog end -->

		<!--subscription strat -->
		<section id="contact"  class="subscription">
			<div class="container">
				<div class="subscribe-title text-center">
					<h2>
						T'as pas encore crée un compte avec nous?
					</h2>
					<p>
						Esprit Discovery offer you to list your business with us and we very much able to promote your Business.
					</p>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="subscription-input-group">
							<form action="#">
								<input type="email" class="subscription-input-form" placeholder="Enter your email here">
								<a class="appsLand-btn subscribe-btn" href="ajouteruser.php">
    Create Account
</a>
							</form>
						</div>
					</div>	
				</div>
			</div>

		</section><!--/subscription-->	
		<!--subscription end -->

		<!--footer start-->
		<footer id="footer"  class="footer">
			<div class="container">
				<div class="footer-menu">
		           	<div class="row">
			           	<div class="col-sm-3">
			           		 <div class="navbar-header">
				                <a class="navbar-brand" href="index.html">esprit<span>discovry</span></a>
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
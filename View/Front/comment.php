<?php
session_start();
include 'C:\xampp\htdocs\projetfinal\contoller\forumC.php'; // Include the forum controller
include 'C:\xampp\htdocs\projetfinal\contoller\messageC.php'; // Include the comment controller
$c_forum = new forumC(); // Create an instance of the forum controller
$c_comment = new messageC(); // Create an instance of the comment controller


/*switch ($action) {
    case 'increaseLike':
        $comment_id = $_POST['id_comment'];
        $messageC = new messageC();
        $result = $messageC->increaseLike($comment_id);
        echo $result ? 'success' : 'error';
    }*/
// Check if forum id is provided in the URL
if(isset($_GET['id_forum'])) {
    
    $forum_id = $_GET['id_forum'];
    //echo "Forum ID: " . $forum_id;
    $forum = $c_forum->getForumById($forum_id); // Get forum details by id
    $comments = $c_comment->getCommentsByForumId($forum_id); // Get comments associated with this forum
    
} else {
    // Handle error if no forum id is provided
    echo "Forum ID not provided!";
    exit();
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
</head>
<body>
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
        <section class="comment-section">
        <div class="container">
            <!-- Display Forum Details -->
            <h2><?php echo $forum['titre']; ?></h2>
            <p><?php echo $forum['description']; ?></p>
            <p>Date de création: <?php echo $forum['date_creation']; ?></p>

            <!-- Display Comments in a Table -->
            <?php if(!empty($comments)): ?>
                <h3>Comments:</h3>
                <table class="comment-table">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Comment Content</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($comments as $comment): ?>
                            <tr>
                                <td><?php echo $comment['id_user']; ?></td>
                                <td><?php echo $comment['contenu']; ?></td>
                                
                                <td><button type="button" class="like-button" data-comment-id="<?= htmlspecialchars($comment['id_message']) ?>">Like</button>
<span class="like-count" id="like-count-<?= htmlspecialchars($comment['id_message']) ?>"><?= htmlspecialchars($comment['like']) ?></span></td>
<td><button type="button" class="dislike-button" data-comment-id="<?= htmlspecialchars($comment['id_message']) ?>">disLike</button>
<span class="dislike-count" id="dislike-count-<?= htmlspecialchars($comment['id_message']) ?>"><?= htmlspecialchars($comment['dislike']) ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No comments yet.</p>
            <?php endif; ?>

            <!-- Form to Add Comment -->
            <div class="comment-form">
                <form action="add_comment.php" method="post" onsubmit="return validateForm()">
                    <input type="hidden" name="forum_id" value="<?php echo $forum_id; ?>">
                    <textarea name="comment_content" id="comment" placeholder="Enter your comment"></textarea>
                    <button type="submit">Add Comment</button>
                </form>
                <!--<button onclick="window.location='my_comment.php'">View My Comments</button>-->
                <a href="my_comment.php?id_forum=<?php echo $forum['id_forum']; ?>">view my comment</a>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
function validateForm() {
    var comment = document.getElementById('comment').value;
    if (comment == "") {
        alert("Comment field cannot be empty!");
        return false;
    }
    return true;
}
// Add this code before the closing </body> tag
$(document).ready(function() {
    $('.like-button').click(function() {
        const commentId = $(this).data('comment-id');
        increaseLike(commentId);
    });
});
$(document).ready(function() {
    $('.dislike-button').click(function() {
        const commentId = $(this).data('comment-id');
        increasedisLike(commentId);
    });
});

function increaseLike(commentId) {
    // Send an AJAX request to the server to increase the like count
    const xhr = new XMLHttpRequest();
    xhr.open('GET', `increaseLike.php?id_message=${commentId}`, true);
    xhr.onload = () => {
        if (xhr.status === 200) {
            const likeCountSpan = document.getElementById(`like-count-${commentId}`);
            if (likeCountSpan) {
                likeCountSpan.textContent = xhr.responseText;
            }
        }
    };
    xhr.send();
}
function increasedisLike(commentId) {
    // Send an AJAX request to the server to increase the like count
    const xhr = new XMLHttpRequest();
    xhr.open('GET', `increasedisLike.php?id_message=${commentId}`, true);
    xhr.onload = () => {
        if (xhr.status === 200) {
            const likeCountSpan = document.getElementById(`dislike-count-${commentId}`);
            if (likeCountSpan) {
                likeCountSpan.textContent = xhr.responseText;
            }
        }
    };
    xhr.send();
}

</script>
<!-- Add jQuery library if not already included -->


<!-- Add JavaScript code for like and dislike functionality -->

    <!-- Add your footer content here -->
    <!-- Button to View My Comments -->
    
</body>
</html>

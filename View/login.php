<?php
session_start();

require_once '../Controller/userC.php';
require_once '../Model/user.php';

$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userC = new UserC();
    $emails = $_POST['emails'] ?? '';
    $pass = $_POST['pass'] ?? '';

    $loggedInUser = $userC->loginUser($emails, $pass);

    if ($loggedInUser) {
        $_SESSION['id'] = $loggedInUser['id'];

        $_SESSION['name'] = $loggedInUser['nom'];

        $_SESSION['emails'] = $loggedInUser['emails'];
        header('Location:index.php');
        exit();
    } else {
        $errorMessage = 'Login failed. Please check your credentials or your account can be inactive';
    }
}
?>

<a href="index.html" class="navbar-brand p-0">
    <h1 style="color:red" class="m-0 text-uppercase text-primary"><i class="far fa-smile text-primary me-2"></i>esprit-discovery
    </h1>
</a>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="login.css">
    <title>LOGIN PAGE</title>
</head>

<body>
    <div id="slideout-menu">
        <ul>
            <li>
                <a href="index.php">Acceuil</a>
            </li>
            <li>
                <a href="blogslist.html">Produits</a>
            </li>
            <li>
                <a href="blogslist.html">Commandes</a>
            </li>
            <li>
                <a href="about.html">Forum</a>
            </li>
            <li>
                <a href="about.html">Réclamation</a>
            </li>
            <li>
                <a href="login.php">Compte</a>
            </li>
            <li>
                <input type="text" placeholder="Search Here">
            </li>
            <li>
                <a href="forum.html">forum</a>
            </li>
        </ul>
    </div>



    <div class="container" id="container">
        <div class="form-container sign-up">
            <form>
                <h1>Créer un compte</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <!--<span>ou utlisez votre Email</span>
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Password">-->
                <button type="submit" id="signup-button">S'inscrire</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form onsubmit="return verif()" action="login.php" method="POST">
                <h1>Login</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fab fa-linkedin-in"></i></a>
                </div>

                <?php if (!empty($errorMessage)): ?>
                    <div class="error-message">
                        <?php echo $errorMessage; ?>
                    </div>
                <?php endif; ?>

                <input type="text" class="input" placeholder="Enter your email" name="emails" id="emails">
                <input type="password" class="input" placeholder="Enter your password" name="pass" id="pass">
                <a href="forget.php">Avez vouz oublié votre mot de passe?</a>
                <a href="ajouteruser.php" type="submit" id="signup-button">S'inscrire</a>
                <input type="submit" class="input" value="Login">
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome!</h1>
                    <p>Connectez-vous pour accéder au site!</p>
                    <button class="hidden" id="login">Se coonecter</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Welcome!</h1>
                    <p>Connectez-vous pour accéder au site!</p>
                    <a href="ajouteruser.php" class="button-link">S'inscrire</a>
                    <style>
                        .button-link {
                            display: inline-block;
                            padding: 10px 20px;
                            text-decoration: none;
                            background-color: #f1f1f1;
                            color: #333;
                            border-radius: 5px;
                            border: 1px solid #ccc;
                        }

                        .button-link:hover {
                            background-color: #e0e0e0;
                        }
                    </style>
                </div>
            </div>
        </div>
    </div>

    <script src="register.js"></script>

</body>

</html>
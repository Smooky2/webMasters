<?php
include"../aide/ReviewC.php";

$reviewC = new ReviewC();

//traitement du formulaire

if ($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['nomE']))
    {
        $list=$reviewC->AfficherReview($_POST['nomE']);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chercher événement</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Recherche évaluation d'un événement</h1>
        <form action="" method="POST" class="mx-auto p-4 border rounded bg-light" style="max-width: 400px;">
            <div class="form-group">
                <label for="nomE">Nom de l'événement:</label>
                <input type="text" class="form-control" id="nomE" name="nomE" placeholder="Entrez le nom de l'événement">
            </div>
            <input type="submit" class="btn btn-primary btn-sm" value="rechercher" name="search">
        </form>
    </div>
    <?php if (isset($list) && !empty($list)) {?>
        <div class="container mt-5">
            <h2 class="text-center mb-4">Les reviews :</h2>
            
            <ul class="list-group">
                <?php foreach ($list as $review) { ?>
                    <li class="list-group-item"><?= $review['stars'] ?> - <?= $review['dateRev'] ?></li>
                <?php } ?>
            </ul>
        </div>
    <?php } ?>
</body>
</html>


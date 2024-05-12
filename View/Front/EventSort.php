<?php
include "../aide/ReviewC.php";

$reviewC = new ReviewC();

// Get sorted events
$sortedEvents = $reviewC->sortEventsByRate();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorted Events by Rate</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
        }

        .card-text {
            color: #666;
            font-size: 1rem;
        }

        .text-center {
            margin-bottom: 30px;
            color: #333;
        }

        @media (max-width: 576px) {
            .card {
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Events Sorted by Rate</h1>
        <div class="row">
            <?php foreach ($sortedEvents as $event) : ?>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $event['nomE'] ?></h5>
                            <p class="card-text">Average Rate: <?= $event['average_rate'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Button to return to Eventfront.php -->
        <div class="text-center mt-4">
            <a href="Eventfront.php" class="btn btn-primary">Return</a>
        </div>
    </div>
</body>

</html>

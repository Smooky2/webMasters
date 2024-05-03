<?php
include "../aide/ReviewC.php";

$reviewC = new ReviewC();

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nomE'])) {
        $percentage = $reviewC->getReviewPercentage($_POST['nomE']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Evaluation Search</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css"
        integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .search-form {
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.1);
        }

        .search-btn {
            background-color: #007bff;
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-btn:hover {
            background-color: #0056b3;
        }

        .percentage-container {
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .percentage {
            font-size: 40px;
            color: #007bff;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="search-form">
                    <h1 class="text-center mb-4">Find Event Evaluation</h1>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="nomE">Event Name:</label>
                            <input type="text" class="form-control" id="nomE" name="nomE"
                                placeholder="Enter the event name">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary search-btn">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php if (isset($percentage)) { ?>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="percentage-container">
                    <h2 class="text-center mb-4">Event Evaluation Percentage:</h2>
                    <div class="text-center">
                        <h3 class="percentage"><?= $percentage ?>%</h3>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

</div>


</body>






</html>
<?php

include '..\aide\ReviewC.php';
$error= "";
// create review
$rev = null;
if (isset($_GET["id"])){
    $idEvent = $_GET["id"];
    //echo $idEvent;
}
if (isset($_POST["idEvent"])){
    $idEvent = $_POST["idEvent"];
    //echo $idEvent;
}
// create an instance of the controller
$revC = new ReviewC();
if (
    isset($_POST["stars"]) &&
    isset($_POST["idEvent"])
) {
    if (
        !empty($_POST['stars'])
    ) {
       echo  $_POST["idEvent"];
        $rev = new Review(
            $_POST['stars'],
            $_POST["idEvent"]
        );
        $revC->addrate($rev);
        header('Location: Eventfront.php');
    } else {
        $error = "Missing information";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate this event</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            margin-top: 50px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h3 {
            text-align: center;
            margin-bottom: 30px;
        }
        .result {
            font-size: 18px;
            font-weight: bold;
        }
        .submit-btn {
            margin-top: 20px;
            text-align: center;
        }
        .back-btn {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h3>Rate this event</h3>
            <div class="rateyo" id="rating"
                 data-rateyo-rating="4"
                 data-rateyo-num-stars="5"
                 data-rateyo-score="3">
            </div>
            <div class="result">Rating: 0</div>
            <form action="add_rate.php" method="post">
                <!-- Hidden input field to capture the rating value -->
                <input type="hidden" name="stars">
                <!-- Hidden input field to capture the event ID -->
                <input type="hidden" name="idEvent" value="<?= $idEvent ?>">
                <div class="submit-btn">
                    <button type="submit" class="btn btn-primary">Submit Rating</button>
                </div>
            </form>
            <!-- Button to return to Eventfront.php -->
            <div class="back-btn">
                <a href="Eventfront.php" class="btn btn-secondary">Back to Eventfront</a>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script>
        $(function () {
            $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
                var rating = data.rating;
                // Update the result span with the current rating
                $(this).parent().find('.result').text('Rating: ' + rating);
                // Set the rating value in the hidden input field
                $(this).parent().find('input[name=stars]').val(rating);
            });
        });
    </script>
   
</body>
</html>























<?php

/*nclude '..\aide\config.php';
//require 'db_connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $stars = $_POST["stars"];

    $sql = "INSERT INTO reviews (stars) VALUES ('$stars')";
    if (mysqli_query($conn, $sql))
    {
        echo "New Rate addedddd successfully";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}*/
/*include '..\aide\config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $stars = $_POST["stars"];

    try {
        // Get the PDO connection
        $pdo = config::getConnexion();

        // Prepare the SQL statement
        $stmt = $pdo->prepare("INSERT INTO reviews (stars) VALUES (:stars)");

        // Bind parameters
        $stmt->bindParam(':stars', $stars);

        // Execute the statement
        $stmt->execute();

        // Output success message
        echo "New Rate added successfully";
    } catch (PDOException $e) {
        // Output error message
        echo "Error: " . $e->getMessage();
    }
}
?>*/
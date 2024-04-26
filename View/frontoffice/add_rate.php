<?php

include '..\aide\ReviewC.php';
$error= "";
// create review
$rev = null;
if (isset($_GET["id"])){
    $idEvent = $_GET["id"];
    echo $idEvent;
}
if (isset($_POST["idEvent"])){
    $idEvent = $_POST["idEvent"];
    echo $idEvent;
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
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
</head>
<body>
<div class="container">
    <div class="row">

<form action="add_rate.php" method="post">

    <div>
        <h3>Student Rating System</h3>
    </div>
    <div class="rateyo" id="rating"
         data-rateyo-rating="4"
         data-rateyo-num-stars="5"
         data-rateyo-score="3">
    </div>
    <span class='result'>0</span>
    <!-- Hidden input field to capture the rating value -->
    <input type="hidden" name="stars">
    <input type="hidden" name="idEvent" value = "<?= $idEvent ?>">
    <div><input type="submit" name="add"> </div>

</form>
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
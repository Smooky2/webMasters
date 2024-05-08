<?php

include '..\aide\ReviewC.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the necessary data is provided
    if (isset($_POST["idRev"]) && isset($_POST["stars"])) {
        $idRev = $_POST["idRev"];
        $stars = $_POST["stars"];

        // Assuming you have a ReviewC object
        $reviewC = new ReviewC();

        // Update the review
        $reviewC->updateReview($idRev, $stars);

        // Redirect to some page after updating
        header("Location: listReviews.php");
        exit(); // Make sure to exit after redirection
    } else {
        // Handle error if data is missing
        echo "Error: Missing data";
    }
}

// Assuming you passed the review ID via GET method
if (isset($_GET["idRev"])) {
    // Get the review details from the database
    $reviewC = new ReviewC();
    $review = $reviewC->getReview($_GET["idRev"]);
} else {
    // Initialize review as an empty array
    $review = array("idRev" => "");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Review</title>
    <!-- Add your CSS links here -->
</head>

<body>

    <!-- Your HTML form for updating review -->
    <h2>Update Review</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="idRev">Review ID:</label>
        <input type="text" name="idRev" id="idRev" value="<?php echo $review['idRev']; ?>">
        <label for="stars">Stars:</label>
        <input type="number" name="stars" id="stars" value="<?php echo $review['stars']; ?>>
        <button type="submit">Update Review</button>
    </form>

</body>

</html>

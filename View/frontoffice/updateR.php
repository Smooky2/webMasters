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











<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ESPRIT-DISCOVERY - Bootstrap Admin Template</title>
    <!-- Meta tags and other dependencies -->
    <!-- Your custom styles -->
    <style>
        /* CSS styles for the calendar */
        .calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
        }

        .day {
            border: 1px solid #ccc;
            padding: 5px;
        }

        .event {
            background-color: #f0f0f0;
            padding: 2px;
            margin-bottom: 2px;
            font-size: 12px;
        }

        .month-year {
            margin-bottom: 10px;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
        }

        .weekday {
            font-weight: bold;
            text-align: center;
            padding: 5px;
        }

        .centered {
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- Your existing HTML structure -->
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner, Sidebar, and Navbar -->
        <div id="page-wrapper">
            <!-- Navigation Links for Previous and Next Month -->
            <div class="centered">
                <a href="?month=<?php echo $currentMonth > 1 ? ($currentMonth - 1) : 12; ?>&year=<?php echo $currentMonth > 1 ? $currentYear : ($currentYear - 1); ?>">Previous Month</a>
                <span class="month-year"><?php echo date("F Y", mktime(0, 0, 0, $currentMonth, 1, $currentYear)); ?></span>
                <a href="?month=<?php echo $currentMonth < 12 ? ($currentMonth + 1) : 1; ?>&year=<?php echo $currentMonth < 12 ? $currentYear : ($currentYear + 1); ?>">Next Month</a>
            </div>
            <!-- Calendar Container -->
            <div id="calendarContainer">
                <div class="calendar">
                    <!-- Display Weekdays -->
                    <?php
                    $weekdays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                    foreach ($weekdays as $weekday) {
                        echo '<div class="weekday">' . substr($weekday, 0, 3) . '</div>';
                    }
                    // Start the calendar grid
                    $dayCounter = 1 - $firstDayOfMonth;
                    while ($dayCounter <= $daysInMonth) {
                        echo '<div class="day">';
                        if ($dayCounter > 0) {
                            echo '<strong>' . $dayCounter . '</strong>';
                            // Check if there are events for this day
                            if (isset($eventc[$currentYear][$currentMonth][$dayCounter])) {
                                $eventsForDay = $eventc[$currentYear][$currentMonth][$dayCounter];
                                foreach ($eventsForDay as $event) {
                                    echo '<div class="event">' . htmlspecialchars($event['nomE']) . ', ' . htmlspecialchars($event['lieuE']) . ', ' . htmlspecialchars($event['categoE']) . '</div>';
                                }
                            }
                        }
                        echo '</div>';
                        $dayCounter++;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap and other JS dependencies -->
</body>

</html>
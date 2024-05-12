

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "PHP script is running."; // Debugging statement

include '../aide/EventC.php'; // Adjust the path as needed

// Check if the file is being accessed via POST
// Vérifier si la demande est une demande POST et si l'action est définie
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    if ($_POST['action'] == 'getEventsForCalendar') {
        $eventC = new EventC();
        $events = $eventC->getEventsForCalendar();
        echo json_encode($events); // Renvoyer les événements au format JSON
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Calendar</title>
    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar" rel="stylesheet" />
<body>

    <!-- Calendar Container -->
    <div id='calendar'></div>

    <!-- FullCalendar JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11"></script>
   
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: [
                    // Définissez vos événements ici
                    {title: 'ss',
                        start: '2024-05-09',},
                    {title: 'fest',
                        start: '2024-04-03', },
                    {title: 'lol',
                        start: '2024-04-05',
                    },
                    { title: 'Festival des Arts de Rue',
                        start: '2024-05-07'   
                    },
                    { title: 'Tournoi de Beach Volley',
                        start: '2024-05-17', },
                    {title: 'Spectacle de Feux d Artifice',
                    start: '2024-05-20',}
                ]
            });
            calendar.render();
            console.log('Bienvenue 4!'); // Debugging statement
        });
    </script>
</body>
</html>
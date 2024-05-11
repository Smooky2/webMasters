<?php

require 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$dompdf = new Dompdf();

require '../../config.php'; 
$pdo = Config::getConnexion();

$sql = "SELECT name, location, `desc`, images FROM hotel";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$hotels = $stmt->fetchAll(PDO::FETCH_ASSOC);

$html = <<<HTML
<style>
 
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin-bottom: 20px;
                    }
                    th, td {
                        border: 1px solid #dddddd;
                        text-align: left;
                        padding: 8px;
                    }
                    th {
                        background-color: #f2f2f2;
                    }
                </style>';
<h1>Hotel Details</h1>
<table>
    <tr>
        <th>name</th>
        <th>location</th>
        <th>description</th>
        <th>images</th>
    </tr>
HTML;

foreach ($hotels as $hotel) {
    $html .= <<<HTML
    <tr>
        <td>{$hotel['name']}</td>
        <td>{$hotel['location']}</td>
        <td>{$hotel['desc']}</td>
        <td>{$hotel['images']}</td>
    </tr>
    HTML;
}

$html .= '</table>';

$dompdf->loadHtml($html);

// Set paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the PDF
$dompdf->render();

// Stream the PDF to the browser
$dompdf->stream("hotel_file", array('Attachment' => 0));


?>

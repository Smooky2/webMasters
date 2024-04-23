<?php
include 'C:/xampp/htdocs/projet/controller/messageC.php'; // Include the comment controller
$c_comment = new messageC(); // Create an instance of the comment controller

// Check if form is submitted
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from form
    $forum_id = $_POST['forum_id'];
    $comment_content = $_POST['comment_content'];
    $date_sys = date('Y-m-d'); // Current date
    // Insert comment into database
    $result = $c_comment->addComment($forum_id, $comment_content,$date_sys);
    // Redirect to forum page
    header("Location: comment.php?id_forum=$forum_id");
    // Check if comment was added successfully
    
}

?>

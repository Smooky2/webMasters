<?php
include 'C:\xampp\htdocs\projet\controller\messageC.php';

// Check if the comment ID is provided
if (isset($_GET['id_message'])) {
    $id_comment_to_delete = $_GET['id_message'];

    // Create an instance of CommentC
    $messageC = new messageC();

    // Call the method to delete the comment
    $messageC->deleteComment($id_comment_to_delete);

    // Redirect back to the page where the comment was deleted from
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
} else {
    // Handle the case when no ID is provided
    echo "Comment ID not provided.";
}
?>
<?php
include 'C:\xampp\htdocs\projet\controller\messageC.php'; // Include the comment controller

$comment_id = $_GET['id_message'];
$messageC = new messageC();
$result = $messageC->increasedisLike($comment_id);
echo $result;
?>
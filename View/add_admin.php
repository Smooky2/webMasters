<?php
if(isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Perform necessary actions to make the user an admin
    // For example, assuming you have a method in your UserC class to update the user's role to admin
    include '../Controller/UserC.php';
    $userC = new UserC();
    $result = $userC->makeUserAdmin($user_id); // Adjust method name accordingly

    if ($result) {
        // User successfully promoted to admin, redirect to a success page or back to the previous page
        header("Location: afficheruser.php");
        exit();
    } else {
        // Handle failure to make the user admin
        echo "Failed to make the user admin.";
    }
} else {
    // Handle case when user_id is not provided in the URL
    echo "User ID not provided.";
}
?>
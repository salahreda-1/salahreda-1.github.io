<?php
session_start();

// Logout action
if(isset($_POST['logout'])) {
    // Check if user is logged in
    if(isset($_SESSION['user_id'])) {
        // Unset all session variables
        $_SESSION = array();

        // Destroy the session
        session_destroy();

        // Redirect to login page
        header("Location: login1.php");
        exit();
    } else {
        // If user is not logged in, redirect to login page
        header("Location: login1.php");
        exit();
    }
}
?>
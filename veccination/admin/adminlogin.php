<?php
include"connect.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    // Hardcoded admin credentials for demonstration purposes
    $correctUsername = 'admin@gmail.com';
    $correctPassword = '123';

    // Check if the provided credentials match
    if ($username === $correctUsername && $password === $correctPassword) {
        // Successful login
        header("Location: all_appointments.php");
        exit();
    } else {
        // Invalid login
        echo "Invalid username or password";
        header("Location:admin_login.html");
        

    }
}
?>

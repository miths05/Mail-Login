<?php
session_start();

// Check if email and password are correct (Replace with your authentication logic)
$email = $_POST['email'];
$password = $_POST['password'];

// Dummy authentication logic (Replace with your actual logic)
$valid_email = 'mithilesh.22210486@viit.ac.in';
$valid_password = '123';

if ($email === $valid_email && $password === $valid_password) {
    $_SESSION['email'] = $email; // Set session ID to user's email
    $_SESSION['loggedin']=true;
    header("Location: Unreadallmails.php"); // Redirect to inbox page after successful login
    exit;
} else {
    echo "Invalid email or password. Please try again.";
}
?>
<?php
// login_process.php
session_start();
include('db_connection.php');

// Get user login data from the form
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = $_POST['password'];

// Retrieve user data from the database
$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);

    // Verify password
    if (password_verify($password, $user['password'])) {
        // Password is correct, create a session
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];

        // Redirect to the home page after successful login
        header("Location: home.php");
        exit();
    }
}

// Redirect back to the login page on failure
header("Location: index.php?error=InvalidCredentials");
exit();
?>

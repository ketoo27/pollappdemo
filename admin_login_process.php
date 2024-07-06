<?php
// admin/admin_login_process.php

// Include database connection
include('db_connection.php');

// Start the session
session_start();

// Get admin credentials from the form
$username = $_POST['username'];
$password = $_POST['password'];

// Validate credentials against the database
$query = "SELECT * FROM admins WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $query);

if ($result) {
    if (mysqli_num_rows($result) == 1) {
        // Admin login successful, set session variable and redirect to admin dashboard
        $admin = mysqli_fetch_assoc($result);
        $_SESSION['admin_id'] = $admin['admin_id'];
        header("Location: admin_dashboard.php");
        exit();
    } else {
        // Admin login failed, redirect back to login page
        header("Location: admin_login.php?error=InvalidCredentials");
        exit();
    }
} else {
    // Handle query error
    echo "Query failed: " . mysqli_error($conn);
}
?>

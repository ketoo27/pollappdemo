<?php
// register_process.php
include('db_connection.php');

// Get user registration data from the form
$username = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$full_name = mysqli_real_escape_string($conn, $_POST['full_name']);

// Validate unique username and email
$check_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
$check_result = mysqli_query($conn, $check_query);

if (mysqli_num_rows($check_result) > 0) {
    // Username or email already exists
    header("Location: create_account.php?error=UsernameOrEmailTaken");
    exit();
}

// Insert user data into the database
$insert_query = "INSERT INTO users (username, email, password, full_name) VALUES ('$username', '$email', '$password', '$full_name')";
mysqli_query($conn, $insert_query);

// Redirect to the login page after successful registration
header("Location: index.php?success=RegistrationSuccessful");
exit();
?>

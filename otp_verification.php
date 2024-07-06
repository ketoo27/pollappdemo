<?php
// otp_verification.php
session_start(); // Start a session

include('db_connection.php');

// Get email from the URL parameter
$email = mysqli_real_escape_string($conn, $_GET['email']);

// Handle form submission for OTP verification
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $enteredOTP = mysqli_real_escape_string($conn, $_POST['otp']);

    // Retrieve hashed OTP from the session
    $storedHashedOTP = $_SESSION['otp'];

    // Compare entered OTP with stored hashed OTP
    if (password_verify($enteredOTP, $storedHashedOTP)) {
        // OTP is valid
        // Update user status or perform additional actions
        header("Location: index.php?success=RegistrationAndOTPVerified");
        exit();
    } else {
        // Invalid OTP
        $error = "Invalid OTP. Please try again.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
</head>
<body>
    <h2>OTP Verification</h2>
    <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
    <form method="post">
        <label for="otp">Enter OTP:</label>
        <input type="text" name="otp" required>
        <button type="submit">Verify OTP</button>
    </form>
</body>
</html>

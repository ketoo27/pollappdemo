<!-- update_profile_process.php -->
<?php
session_start();
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['user_id'];
    $currentPassword = $_POST['current_password']; // Get the entered current password
    $newUsername = mysqli_real_escape_string($conn, $_POST['new_username']);
    $newPassword = password_hash($_POST['new_password'], PASSWORD_DEFAULT); // Hash the new password
    $newFullName = mysqli_real_escape_string($conn, $_POST['new_full_name']);
    $newEmail = mysqli_real_escape_string($conn, $_POST['new_email']);

    // Verify the current password
    $verifyPasswordQuery = "SELECT password FROM users WHERE user_id = $userId";
    $verifyPasswordResult = mysqli_query($conn, $verifyPasswordQuery);
    $user = mysqli_fetch_assoc($verifyPasswordResult);

    if (password_verify($currentPassword, $user['password'])) {
        // Update user information in the 'users' table
        $updateUserQuery = "UPDATE users SET username = '$newUsername', password = '$newPassword', full_name = '$newFullName', email = '$newEmail' WHERE user_id = $userId";
        mysqli_query($conn, $updateUserQuery);

        // Redirect back to the profile page or display a success message
        header("Location: profile.php?success=UpdateSuccessful");
        exit();
    } else {
        // Password verification failed, redirect back to the update profile page with an error message
        header("Location: update_profile.php?error=IncorrectPassword");
        exit();
    }
}
?>

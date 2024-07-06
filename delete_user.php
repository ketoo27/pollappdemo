<!-- delete_user.php -->
<?php
// Include admin_functions.php
include('admin_functions.php');

// Check if user_id is set in the URL
if (isset($_GET['user_id'])) {
    $userId = $_GET['user_id'];

    // Call the deleteUser function
    deleteUser($userId);

    // Redirect back to manage_users.php after deletion
    header("Location: manage_users.php");
    exit();
} else {
    // Redirect to manage_users.php if user_id is not set
    header("Location: manage_users.php");
    exit();
}
?>

<!-- delete_poll.php -->
<?php
// Include admin_functions.php
include('admin_functions.php');

// Check if poll_id is set in the URL
if (isset($_GET['poll_id'])) {
    $pollId = $_GET['poll_id'];

    // Call the deletePoll function
    deletePoll($pollId);

    // Redirect back to manage_polls.php after deletion
    header("Location: manage_polls.php");
    exit();
} else {
    // Redirect to manage_polls.php if poll_id is not set
    header("Location: manage_polls.php");
    exit();
}
?>

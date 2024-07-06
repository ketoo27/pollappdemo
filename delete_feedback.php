<?php
// Include admin_functions.php and database connection
include('admin_functions.php');
include('db_connection.php');

// Check if feedback_id is set and not empty
if(isset($_GET['feedback_id']) && !empty($_GET['feedback_id'])) {
    // Get feedback_id from the URL
    $feedback_id = $_GET['feedback_id'];
    
    // Call the deleteFeedback function to delete the feedback
    deleteFeedback($feedback_id);
    
    // Redirect back to the manage_feedback.php page
    header("Location: manage_feedback.php");
    exit();
} else {
    // Redirect to an error page or display an error message
    header("Location: error_page.php");
    exit();
}
?>

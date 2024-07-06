<?php
// create_poll_process.php
session_start();
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['user_id'];
    $question = mysqli_real_escape_string($conn, $_POST['question']);
    $option1 = mysqli_real_escape_string($conn, $_POST['option1']);
    $option2 = mysqli_real_escape_string($conn, $_POST['option2']);

    // Insert poll data into the 'polls' table
    $insertPollQuery = "INSERT INTO polls (user_id, question) VALUES ($userId, '$question')";
    mysqli_query($conn, $insertPollQuery);

    // Get the ID of the inserted poll
    $pollId = mysqli_insert_id($conn);

    // Insert options into the 'options' table
    $insertOption1Query = "INSERT INTO options (poll_id, option_text) VALUES ($pollId, '$option1')";
    $insertOption2Query = "INSERT INTO options (poll_id, option_text) VALUES ($pollId, '$option2')";
    mysqli_query($conn, $insertOption1Query);
    mysqli_query($conn, $insertOption2Query);

    // Redirect back to the home page or display a success message
    header("Location: home.php?success=PollCreated");
    exit();
}
?>

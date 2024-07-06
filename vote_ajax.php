<?php
session_start();
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['user_id'];
    $pollId = $_POST['poll_id'];
    $optionId = $_POST['option_id'];

    // Check if the user has already voted for this poll
    $checkVoteQuery = "SELECT * FROM votes WHERE user_id = $userId AND poll_id = $pollId";
    $checkVoteResult = mysqli_query($conn, $checkVoteQuery);

    if (mysqli_num_rows($checkVoteResult) > 0) {
        // The user has already voted for this poll
        exit();
    }

    // Insert the vote into the 'votes' table
    $insertVoteQuery = "INSERT INTO votes (user_id, poll_id, option_id) VALUES ($userId, $pollId, $optionId)";
    mysqli_query($conn, $insertVoteQuery);

    // Update the vote count for the selected option in the 'options' table
    $updateOptionQuery = "UPDATE options SET vote_count = vote_count + 1 WHERE option_id = $optionId";
    mysqli_query($conn, $updateOptionQuery);

    exit();
}
?>

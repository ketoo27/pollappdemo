<?php
// admin_functions.php

// Include database connection
include('db_connection.php');

function deleteUser($userId) {
    global $conn;
    $query = "DELETE FROM users WHERE user_id = $userId";
    mysqli_query($conn, $query);
}

function deletePoll($pollId) {
    global $conn;
    // You may also want to delete related votes and options
    $query = "DELETE FROM polls WHERE poll_id = $pollId";
    mysqli_query($conn, $query);
}

function deleteFeedback($feedbackId) {
    global $conn;
    $query = "DELETE FROM feedback WHERE feedback_id = $feedbackId";
    mysqli_query($conn, $query);
}
?>

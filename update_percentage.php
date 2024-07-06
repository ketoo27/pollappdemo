<?php
include('db_connection.php');

if(isset($_POST['option_id'])) {
    $optionId = $_POST['option_id'];

    // Get the poll ID associated with this option
    $pollIdQuery = "SELECT poll_id FROM options WHERE option_id = $optionId";
    $pollIdResult = mysqli_query($conn, $pollIdQuery);
    $pollIdRow = mysqli_fetch_assoc($pollIdResult);
    $pollId = $pollIdRow['poll_id'];

    // Calculate percentage for this option
    $totalVotesQuery = "SELECT COUNT(*) as total_votes FROM votes WHERE poll_id = $pollId";
    $totalVotesResult = mysqli_query($conn, $totalVotesQuery);
    $totalVotes = mysqli_fetch_assoc($totalVotesResult)['total_votes'];

    $optionVotesQuery = "SELECT COUNT(*) as option_votes FROM votes WHERE poll_id = $pollId AND option_id = $optionId";
    $optionVotesResult = mysqli_query($conn, $optionVotesQuery);
    $optionVotes = mysqli_fetch_assoc($optionVotesResult)['option_votes'];

    $percentage = ($totalVotes > 0) ? round(($optionVotes / $totalVotes) * 100, 2) : 0;

    // Return the updated percentage
    echo "<div class='vote-progress-container'>";
    echo "<div class='vote-progress'>";
    echo "<div class='vote-progress-bar' style='width:{$percentage}%'></div>";
    echo "</div>";
    echo "<span class='vote-percentage'>{$percentage}%</span>";
    echo "</div>";
}
?>

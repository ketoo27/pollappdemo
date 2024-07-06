<!-- vote.php -->
<?php
session_start();
include('db_connection.php');

if (isset($_GET['poll_id'])) {
    $pollId = $_GET['poll_id'];
    $userId = $_SESSION['user_id'];

    // Check if the user has already voted for this poll
    $checkVoteQuery = "SELECT * FROM votes WHERE user_id = $userId AND poll_id = $pollId";
    $checkVoteResult = mysqli_query($conn, $checkVoteQuery);

    if (mysqli_num_rows($checkVoteResult) > 0) {
        // The user has already voted for this poll
        header("Location: home.php?error=AlreadyVoted");
        exit();
    }

    // Assuming you have options associated with each poll
    // For example, you might have an 'options' table linked to each poll

    // Check if the selected option is valid
    if (isset($_POST['selected_option'])) {
        $selectedOption = $_POST['selected_option'];

        // Insert the vote into the 'votes' table
        $insertVoteQuery = "INSERT INTO votes (user_id, poll_id, option_id) VALUES ($userId, $pollId, $selectedOption)";
        mysqli_query($conn, $insertVoteQuery);

        // Update the vote count for the selected option in the 'options' table
        $updateOptionQuery = "UPDATE options SET vote_count = vote_count + 1 WHERE option_id = $selectedOption";
        mysqli_query($conn, $updateOptionQuery);

        // Redirect back to the home page
        header("Location: home.php?success=VoteSuccessful");
        exit();
    } else {
        // Invalid option selected
        header("Location: home.php?error=InvalidOption");
        exit();
    }
} else {
    // Invalid poll ID
    header("Location: home.php?error=InvalidPoll");
    exit();
}
?>

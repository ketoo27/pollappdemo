<?php
include('db_connection.php');

// Fetch and display the latest polls
$pollsQuery = "SELECT polls.*, users.username AS creator_username
               FROM polls
               INNER JOIN users ON polls.user_id = users.user_id
               ORDER BY created_at DESC";
$pollsResult = mysqli_query($conn, $pollsQuery);

while ($poll = mysqli_fetch_assoc($pollsResult)) {
    echo '<div class="options-container">';
    
    echo '<div>';
    echo '<h4 class="text-white mb-2"><strong></strong> ' . $poll['question'] . '</h4><br>';
    
    // Fetch and display options for the poll
    $optionsQuery = "SELECT * FROM options WHERE poll_id = {$poll['poll_id']}";
    $optionsResult = mysqli_query($conn, $optionsQuery);

    // Calculate total votes for the poll
    $totalVotesQuery = "SELECT COUNT(*) as total_votes FROM votes WHERE poll_id = {$poll['poll_id']}";
    $totalVotesResult = mysqli_query($conn, $totalVotesQuery);
    $totalVotes = mysqli_fetch_assoc($totalVotesResult)['total_votes'];

    echo '<form action="vote_ajax.php" method="post" class="custom-form contact-form" role="form">';
    
    while ($option = mysqli_fetch_assoc($optionsResult)) {
        echo '<div class="option">';
        echo "<label class='vote-option' data-poll-id='{$poll['poll_id']}' data-option-id='{$option['option_id']}'>";
        echo "<span>{$option['option_text']}</span>";

        // Calculate and display percentage relative to total votes for the poll
        $optionVotesQuery = "SELECT COUNT(*) as option_votes FROM votes WHERE poll_id = {$poll['poll_id']} AND option_id = {$option['option_id']}";
        $optionVotesResult = mysqli_query($conn, $optionVotesQuery);
        $optionVotes = mysqli_fetch_assoc($optionVotesResult)['option_votes'];

        $percentage = ($totalVotes > 0) ? round(($optionVotes / $totalVotes) * 100, 2) : 0;
        echo "<div class='vote-progress-container'>";
echo "<div class='vote-progress'>";
echo "<div class='vote-progress-bar' style='width:{$percentage}%'></div>";
echo "</div>";
echo "<span class='vote-percentage'>{$percentage}%</span>";
echo "</div>";

        echo '</label>';
        echo '</div>';
    }

    echo '</form>';
    echo '</div>';

    // Display creator's username and created date to the right
    echo '<div class="top-right">';
    echo '<p style="color:white;font-size:16px;" ><strong>Created By:</strong> ' . $poll['creator_username'] . ' | ' . $poll['created_at'] . '</p>';

    echo '</div>';

    echo '</div>';
}

// Include the JavaScript at the end to handle AJAX voting
?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    // Use jQuery for AJAX requests to handle voting
    $(document).ready(function () {
        $('.vote-option').click(function () {
            var pollId = $(this).data('poll-id');
            var optionId = $(this).data('option-id');

            $.ajax({
                url: 'vote_ajax.php',
                type: 'POST',
                data: { poll_id: pollId, option_id: optionId },
                success: function () {
                    // Reload polls after voting
                    loadPolls();
                }
            });
        });

        function loadPolls() {
            $.ajax({
                url: 'load_polls.php',
                type: 'GET',
                success: function (data) {
                    $('#polls-container').html(data);
                }
            });
        }
    });
</script>

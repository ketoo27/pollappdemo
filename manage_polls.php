<?php
// Include admin_functions.php
include('admin_functions.php');
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

// Display polls and provide an option to delete
$polls = mysqli_query($conn, "SELECT * FROM polls");

// Display header
echo "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Manage Polls</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN' crossorigin='anonymous'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL' crossorigin='anonymous'></script>
    <style>
        body {
            background-color: #80d0c7; /* Set your desired background color */
        }

        .navbar {
            background-color: #13547a;
            padding: 15px;
        }

        .navbar-brand {
            color: white;
            font-size: 24px;
            font-weight: bold;
        }

        .nav-link {
            color: white;
            font-size: 18px;
            margin-right: 20px;
        }

        .nav-link:hover {
            text-decoration: underline;
        }

        .manage-polls-container {
            max-width: 75%;
            margin: 20px auto;
            background-image: linear-gradient(15deg, #13547a 0%, #80d0c7 100%);
            border-radius: 15px;
            padding: 20px;
        }

        .poll-details {
            color: white;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .delete-poll-link {
            color: #ff4d4d; /* Set your desired delete link color */
            font-size: 16px;
            text-decoration: underline;
            cursor: pointer;
        }

        .delete-poll-link:hover {
            color: #e60000; /* Set your desired delete link hover color */
        }
    </style>
</head>
<body>
    <nav class='navbar navbar-expand-lg'>
        <div class='container'>
            <a class='navbar-brand' href='admin_dashboard.php'>Admin Dashboard</a>
            <div class='collapse navbar-collapse'>
                <ul class='navbar-nav ms-auto'>
                    <li class='nav-item'><a class='nav-link' href='manage_users.php'>Manage Users</a></li>
                    <li class='nav-item'><a class='nav-link' href='manage_polls.php'>Manage Polls</a></li>
                    <li class='nav-item'><a class='nav-link' href='manage_feedback.php'>Manage feedbacks</a></li>
                    <li class='nav-item'><a class='nav-link' href='admin_logout.php'>Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class='container'>
        <div class='manage-polls-container'>
            <h2 class='text-white mb-4'>Manage Polls</h2>";
            
while ($poll = mysqli_fetch_assoc($polls)) {
    echo "<div class='poll-details'>";
    echo "<strong>Question:</strong> {$poll['question']}<br>";
    echo "<strong>Created At:</strong> {$poll['created_at']}<br>";

    // You may add additional details or options here

    echo "<a class='delete-poll-link' href='delete_poll.php?poll_id={$poll['poll_id']}'>Delete Poll</a><br>";
    echo "</div><br>";
}

echo "
        </div>
    </div>
</body>
</html>
";
?>

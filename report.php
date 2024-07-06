<?php
// Include admin_functions.php
include('admin_functions.php');
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

// Fetch user information
$users = mysqli_query($conn, "SELECT * FROM users");

// Fetch poll information
$polls = mysqli_query($conn, "
    SELECT p.poll_id, p.question, p.created_at, u.username 
    FROM polls p 
    JOIN users u ON p.user_id = u.user_id
");

// Fetch options and votes
$options_votes = mysqli_query($conn, "
    SELECT o.option_id, o.poll_id, o.option_text, COUNT(v.vote_id) as vote_count 
    FROM options o 
    LEFT JOIN votes v ON o.option_id = v.option_id 
    GROUP BY o.option_id
");

$options = [];
while ($row = mysqli_fetch_assoc($options_votes)) {
    $options[$row['poll_id']][] = $row;
}

// Display header
echo "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Admin Report</title>
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

        .report-container {
            max-width: 75%;
            margin: 20px auto;
            background-image: linear-gradient(15deg, #13547a 0%, #80d0c7 100%);
            border-radius: 15px;
            padding: 20px;
        }

        .section-title {
            color: white;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .report-section {
            margin-bottom: 40px;
        }

        .report-section h2 {
            color: white;
            font-size: 22px;
        }

        .report-section table {
            width: 100%;
            margin-bottom: 20px;
        }

        .report-section table th, .report-section table td {
            color: white;
            padding: 10px;
            border-bottom: 1px solid #fff;
        }

        .poll-details {
            color: white;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .vote-details {
            margin-left: 20px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <nav class='navbar navbar-expand-lg'>
        <div class='container'>
            <a class='navbar-brand' href='admin_dashboard.php'>Admin Dashboard</a>
            <div class='collapse navbar-collapse'>
                <ul class='navbar-nav ms-auto'>
                    <li class='nav-item'><a class='nav-link' href='admin_dashboard.php'>Dashboard</a></li>
                    
                </ul>
            </div>
        </div>
    </nav>

    <div class='container'>
        <div class='report-container'>
            <div class='report-section'>
                <h2 class='section-title'>Users</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Full Name</th>
                            <th>Registration Date</th>
                        </tr>
                    </thead>
                    <tbody>";
                    while ($user = mysqli_fetch_assoc($users)) {
                        echo "<tr>
                            <td>{$user['username']}</td>
                            <td>{$user['email']}</td>
                            <td>{$user['full_name']}</td>
                            <td>{$user['registration_date']}</td>
                        </tr>";
                    }
                    echo "</tbody>
                </table>
            </div>

            <div class='report-section'>
                <h2 class='section-title'>Polls</h2>";
                while ($poll = mysqli_fetch_assoc($polls)) {
                    echo "<div class='poll-details'>
                        <p><strong>Question:</strong> {$poll['question']}</p>
                        <p><strong>Created At:</strong> {$poll['created_at']}</p>
                        <p><strong>Uploaded By:</strong> {$poll['username']}</p>";

                    if (isset($options[$poll['poll_id']])) {
                        echo "<div class='vote-details'>
                            <ul>";
                            foreach ($options[$poll['poll_id']] as $option) {
                                echo "<li>{$option['option_text']} (Votes: {$option['vote_count']})</li>";
                            }
                            echo "</ul>
                        </div>";
                    }
                    echo "</div><hr>";
                }
            echo "</div>
        </div>
    </div>
</body>
</html>
";
?>

<?php
// Start the session (ensure it's started at the top of the file)
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

// Assuming you have a database connection
include('db_connection.php');

// Function to get the number of users
function getNumberOfUsers($conn) {
    $query = "SELECT COUNT(*) AS total_users FROM users";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['total_users'];
}

// Function to get the total number of polls
function getTotalPolls($conn) {
    $query = "SELECT COUNT(*) AS total_polls FROM polls";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['total_polls'];
}

// Function to get the total number of votes
function getTotalVotes($conn) {
    $query = "SELECT SUM(o.vote_count) AS total_votes
              FROM polls p
              JOIN options o ON p.poll_id = o.poll_id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['total_votes'];
}

// Get real data from the database
$numberOfUsers = getNumberOfUsers($conn);
$totalPolls = getTotalPolls($conn);
$totalVotes = getTotalVotes($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

        .container {
            margin-top: 20px;
        }

        .welcome-text {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #13547a;
        }

        .dashboard-info {
            display: flex;
            justify-content: space-around;
            margin-bottom: 30px;
        }

        .info-box {
            background-color: #13547a; /* Updated color */
            color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s;
        }

        .info-box:hover {
            transform: scale(1.05);
        }

        canvas {
            width: 100%; /* Make the chart take full width of the container */
            max-width: 1000px; /* Adjust the maximum width as needed */
            margin: 0 auto;
            display: block;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="admin_dashboard.php">Admin Dashboard</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="manage_users.php">Manage Users</a></li>
                    <li class="nav-item"><a class="nav-link" href="manage_polls.php">Manage Polls</a></li>
                    <li class="nav-item"><a class="nav-link" href="manage_feedback.php">Manage FeedBack</a></li>
                    <li class="nav-item"><a class="nav-link" href="report.php">Report</a></li>
                    <li class="nav-item"><a class="nav-link" href="admin_logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="welcome-text">Welcome, Admin!</div>
        
        <div class="row dashboard-info">
            <div class="col-md-4">
                <div class="info-box">
                    <h3>Total Users</h3>
                    <p class="display-4"><?php echo $numberOfUsers; ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box">
                    <h3>Total Polls</h3>
                    <p class="display-4"><?php echo $totalPolls; ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box">
                    <h3>Total Votes</h3>
                    <p class="display-4"><?php echo $totalVotes; ?></p>
                </div>
            </div>
        </div>

        <!-- Chart to visualize data -->
        <canvas id="dashboardChart"></canvas>
    </div>

    <script>
        // Chart.js code to create a bar chart
        var ctx = document.getElementById('dashboardChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Total Users', 'Total Polls', 'Total Votes'],
                datasets: [{
                    label: 'Statistics',
                    data: [<?php echo $numberOfUsers; ?>, <?php echo $totalPolls; ?>, <?php echo $totalVotes; ?>],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(75, 192, 192, 0.7)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>

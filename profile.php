<?php
session_start();
include('db_connection.php');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect or handle unauthorized access
    exit("Unauthorized access");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Profile - POLLHUB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap-icons.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
    <link href="css/templatemo-topic-listing.css" rel="stylesheet">
    <style>
        /* Add any additional styles specific to your profile page here */
        /* You can customize this based on your requirements */
        body {
            background-color: #80d0c7; /* Set your desired background color */
        }

        .featured-section {
            padding: 80px 0;
        }

        .custom-block {
            width: 100%;
        }
       
        .featured-container {
            max-width: 75%; /* Set your desired maximum width (70-75%) */
            margin: 0 auto;
        }

        .profile-card {
            background-color: #13547a; /* Set the background color for the profile card */
            border-radius: 15px; /* Set the border radius for the profile card */
            padding: 20px; /* Set padding for the profile card */
            margin-top: 20px; /* Set margin for the profile card */
        }

        .profile-info {
            text-align: left; /* Align the text to the left within the profile info */
            margin-top: 20px; /* Set margin for the profile info */
        }

        .poll-list-item {
            margin-bottom: 20px;
            background-image: linear-gradient(15deg, #13547a 0%, #80d0c7 100%);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .btn-custom {
            background-color: #007bff;
            color: #fff;
            margin-right: 10px;
        }
        .featured-section {
            padding: 80px 0;
        }

        .custom-block {
            width: 100%;
        }

        .featured-container {
            max-width: 75%; /* Set your desired maximum width (70-75%) */
            margin: 0 auto;
        }
        .options-container {
            background-image: linear-gradient(15deg, #13547a 0%, #80d0c7 100%);
            border-radius: var(--border-radius-medium);
            position: relative;
            overflow: hidden;
            padding: 30px;
            transition: all 0.3s ease;
            margin-bottom: 20px; /* Add margin for separation between polls */
        }

        .options-container:hover {
        
            transform: translateY(-3px);
        }

        .top-right {
         position: absolute;
         top: 8px;
         right: 16px;
        }
        .vote-option{
            line-height: 2;
            color: white;
            font-size: 20px
        }
       /* Add this CSS to your existing stylesheet or create a new one */
        .vote-progress-container {
         display: flex;
         align-items: center;
         gap: 10px;
        }

        .vote-progress {
         width: 300px; /* Adjust this value according to your preference */
         height: 20px;
         border-radius: 10px;
         overflow: hidden;
         border: 1px solid #ddd;
        }

        .vote-progress-bar {
             height: 100%;
             background: linear-gradient(45deg, #3498db, #1abc9c); /* Use your preferred color scheme */
            transition: width 0.5s ease-in-out;
        }

        .vote-percentage {
             font-size: 14px;
             color: white;
        }
        

        .create-poll-form {
            display: flex;
            gap: 20px;
        }

        .create-poll-form input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 20px;
            box-sizing: border-box;
        }
    </style>
</head>

<body id="top">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <i class="bi-back"></i>
                    <span>POLLHUB</span>
                </a>

                <div class="d-lg-none ms-auto me-4">
                    <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-5 me-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="home.php">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="profile.php">PROFILE</a>
                        </li>

                       

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="logout.php">LOGOUT</a>
                        </li>

                    

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="contact.php">feedback</a>
                        </li>
                    </ul>

                    <div class="d-none d-lg-block">
                        <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
                    </div>
                </div>
            </div>
        </nav>

        <main>
        <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-12 mx-auto">
                        <div class="profile-card p-4 text-center shadow">
                            <h1 class="text-white mb-4">Your Profile</h1>
                            <div class="profile-info">
                                <?php
                                // Display user's personal information
                                $userId = $_SESSION['user_id'];
                                $userQuery = "SELECT * FROM users WHERE user_id = $userId";
                                $userResult = mysqli_query($conn, $userQuery);
                                $user = mysqli_fetch_assoc($userResult);

                                echo "<h2 class='text-white'><strong>Username:</strong> {$user['username']}</h2>";
                                echo "<h2 class='text-white'><strong>Email:</strong> {$user['email']}</h2>";
                                echo "<h2 class='text-white'><strong>Full Name:</strong> {$user['full_name']}</h2>";
                                ?>
                            </div>
                            <a href="update_profile.php" class="btn custom-btn">Update Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 mx-auto">
                    <section class="profile-section">
                        <h2>Polls Uploaded by You</h2>
                        <ul class="poll-list">
                            <?php
                            // Display polls uploaded by the user
                            $pollsQuery = "SELECT * FROM polls WHERE user_id = $userId";
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
                                echo '<p style="color:white;font-size:16px;" ><strong>Created By:</strong> ' . $poll['created_at'] . '</p>';
                            
                                echo '</div>';
                            
                                echo '</div>';
                            }
                            
                            ?>
                        </ul>
                    </section>
                </div>
            </div>
        </div>
    </main>

    <footer id="footer" class="site-footer section-padding">
        <div class="container">
            <!-- Add your footer content here -->
        </div>
    </footer>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/custom.js"></script>
    <!-- Add any additional scripts specific to your profile page here -->
</body>

</html>

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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap"rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/templatemo-topic-listing.css" rel="stylesheet">
    <style>
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
    <main style="margin-bottom: 300px;" >
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
                            <a class="nav-link click-scroll" href="index.php">LOGOUT</a>
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

        <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-12 mx-auto">
                        <h1 class="text-white text-center">Your Opinions Matter, Amplify Them with PollHub</h1>
                        <h6 class="text-center">Platform For Where Polls Transform into Powerful Insights</h6>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="options-container">
                     <h2 class="text-white mb-4">Create Poll</h2>
                    <form class="create-poll-form" action="create_poll_process.php" method="post">
                        <div class="mb-3">
                         <label for="pollQuestion" class="form-label">Poll Question:</label>
                         <input type="text" class="form-control" id="pollQuestion" name="question" placeholder="Enter your poll question" required>
                        </div>
                        <div class="mb-3">
                         <label for="option1" class="form-label">Option 1:</label>
                         <input type="text" class="form-control" id="option1" name="option1" placeholder="Enter option 1" required>
                        </div>
                        <div class="mb-3">
                            <label for="option2" class="form-label">Option 2:</label>
                            <input type="text" class="form-control" id="option2" name="option2" placeholder="Enter option 2" required>
                        </div>
                        <div class="mb-3 d-flex justify-content-end">
                        <button type="submit" class="btn custom-btn" style="width: 170px; height: 50px; ">Create Poll</button>
                        </div>
                    </form>
                </div>

            <div id="polls-container" class="container">
            </div>
        </div>
        

    </main>

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/custom.js"></script>

    <script>
        // Use jQuery for AJAX requests to dynamically load polls
        $(document).ready(function () {
            loadPolls();
        });

        function loadPolls() {
            $.ajax({
                url: 'load_polls.php', // Create this file to load polls dynamically
                type: 'GET',
                success: function (data) {
                    $('#polls-container').html(data);
                }
            });
        }
    </script>
</body>

</html>

<?php
session_start();
include('db_connection.php');

// Fetch current user data
$userId = $_SESSION['user_id'];
$userQuery = "SELECT * FROM users WHERE user_id = $userId";
$userResult = mysqli_query($conn, $userQuery);
$user = mysqli_fetch_assoc($userResult);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Profile - POLLHUB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
    <link href="css/templatemo-topic-listing.css" rel="stylesheet">
    <style>
        body {
            background-color: #80d0c7; /* Set your desired background color */
        }

        .custom-form {
            margin-top: 20px;
            padding: 20px;
            background-color: #13547a; /* Set your desired background color */
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .btn-custom {
            background-color: #007bff;
            color: #fff;
        }

        .btn-custom-lg {
            padding: 10px 20px; /* Adjust padding according to your preference */
            font-size: 1.5rem; /* Adjust font size according to your preference */
        }

        .form-label {
            color: #fff; /* Set label color */
        }

        .error-message {
            color: red; /* Set error message color */
        }
    </style>
</head>
<body>

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
                        <a class="nav-link click-scroll" href="create_poll.php">CREATE POLL</a>
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
    </nav>

    <main>
        <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-12 mx-auto">
                    <?php
                     // Display error message if present
                     if (isset($_GET['error']) && $_GET['error'] == 'IncorrectPassword') {
                       echo '<p class="error-message">Incorrect password. Please try again.</p>';
                         }
                    ?>
                        <form action="update_profile_process.php" method="post" class="custom-form contact-form" role="form">
                            <h2 class="text-white mb-4">Update Profile</h2>

                            <!-- Username Field -->
                            <div class="mb-3">
                                <label for="new_username" class="form-label">New Username:</label>
                                <input type="text" name="new_username" class="form-control" value="<?php echo $user['username']; ?>" required>
                            </div>

                            <!-- Password Field -->
                            <div class="mb-3">
                                <label for="new_password" class="form-label">New Password:</label>
                                <input type="password" name="new_password" class="form-control" required>
                            </div>

                            <!-- Full Name Field -->
                            <div class="mb-3">
                                <label for="new_full_name" class="form-label">New Full Name:</label>
                                <input type="text" name="new_full_name" class="form-control" value="<?php echo $user['full_name']; ?>" required>
                            </div>

                            <!-- Email Field -->
                            <div class="mb-3">
                                <label for="new_email" class="form-label">New Email:</label>
                                <input type="email" name="new_email" class="form-control" value="<?php echo $user['email']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="current_password" class="form-label">Current Password:</label>
                                <input type="password" name="current_password" class="form-control" required>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-custom btn-custom-lg">Update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>
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

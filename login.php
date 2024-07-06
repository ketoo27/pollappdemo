<!-- login.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>POLLHUB</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa; /* Light background color */
            color: #000; /* Dark text color */
            font-family: 'Arial', sans-serif;
            background-image: url('pexels-pixabay-531880.jpg'); /* Add your background image URL */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .container {
            margin-top: 50px;
            max-width: 400px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            background-color: #99c2ff; /* Friendlier dark blue color for login box */
        }

        h2 {
            text-align: center;
            color: #007bff; /* Friendlier blue text color */
            margin-bottom: 20px;
        }

        form {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #000; /* Dark text color for labels */
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            background-color: #f2f5f8; /* Light gray background for input fields */
            color: #000; /* Dark text color for input text */
        }

        input[type="submit"] {
            background-color: #007bff; /* Friendlier blue color for login button */
            color: #fff; /* White text color for login button */
            cursor: pointer;
            transition: background-color 0.3s ease; /* Smooth transition on hover */
        }

        input[type="submit"]:hover {
            background-color: #0056b3; /* Darker blue color on hover */
        }

        p {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 0;
            color: #555; /* Dark text color */
        }

        a {
            color: #007bff; /* Friendlier blue text color for links */
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        figure {
            text-align: center;
            margin-top: 20px;
        }

        blockquote {
            color: #555; /* Dark text color for the quote */
        }
    </style>
</head>
<body>
    <figure>
        <blockquote class="blockquote">
            <p>"PollHub - Where Polls Transform into Powerful Insights."</p>
        </blockquote>
        <figcaption class="blockquote-footer">
            Developer of this web application <cite title="Source Title">KRISHNA TIKULE</cite>
        </figcaption>
    </figure>

    <div class="container">
        <h2 class="mb-4">User Login</h2>
        <form action="login_process.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php">Register here</a>.</p>
        <p>Are you an admin? <a href="admin_login.php">Admin Login</a>.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

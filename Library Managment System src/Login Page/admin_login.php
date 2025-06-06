<?php
   session_start();

   // Handle login form submission
   if (isset($_POST['login'])) {
       $connection = mysqli_connect("localhost", "root", "");
       $db = mysqli_select_db($connection, "lms");
   
       // Check if email exists in the database
       $query = "SELECT * FROM admins WHERE email = '$_POST[email]'";
       $query_run = mysqli_query($connection, $query);
   
       if (mysqli_num_rows($query_run) > 0) {
           // Email found, now check for password match
           $row = mysqli_fetch_assoc($query_run);
           if ($row['password'] == $_POST['password']) {
               $_SESSION['name'] = $row['name'];
               $_SESSION['email'] = $row['email'];
               $_SESSION['id'] = $row['id'];
               header("Location: http://localhost:3000/Admin%20Dashboard/admin_dashboard.php");
               exit;  // Stop further execution after redirect
           } else {
               // Incorrect password
               $error_message = "Incorrect Password!";
           }
       } else {
           // Email not found
           $error_message = "Email not found! Please check your credentials.";
       }
   }
?>
<!DOCTYPE html>
<html>
<head>
    <title>LMS | Admin Login</title>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="../bootstrap-4.4.1/js/jquery_latest.js"></script>
    <script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        body {
            background-image: url("https://img.freepik.com/free-vector/bookshelf-library-interior-with-table-chair-background-illustration-cartoon-librarian-wooden-shelf-school-college-archive-cartoon-graphic-bookstore-furniture-with-desk-lamp-hall_107791-22653.jpg?w=1480");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
        }
        /* Navbar styling */
        .top-container {
            border-radius: 5px 5px;
            background-color: #007bff;
            padding: 15px;
            color: #fff;
        }
        .navbar-brand {
            padding: 2px;
            font-weight: bold;
            color: #fff !important;
        }
        .nav-link {
            color: #fff !important;
            font-weight: bold;
        }
        /* Main Content styling */
        .container {
            max-width: 500px;
            padding: 40px;
            margin: auto;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            margin-top: 30px;
        }
        h3 {
            color: #333;
            text-align: center;
        }
        .form-control {
            border-radius: 20px;
        }
        .btn-primary {
            border-radius: 20px;
            width: 100%;
            font-weight: bold;
        }
        /* Side information box */
        .side-info {
            text-align: center;
            padding: 10px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            margin-top: 20px;
        }
        /* Alert box for incorrect credentials */
        .alert-box {
            display: none;
            position: fixed;
            top: 0;
            width: 100%;
            background-color: #dc3545;
            color: white;
            text-align: center;
            padding: 10px;
            font-weight: bold;
            z-index: 999;
        }
    </style>
    <script>
        function showError(message) {
            const alertBox = document.getElementById("alert-box");
            alertBox.innerHTML = message;
            alertBox.style.display = "block";
            setTimeout(() => {
                alertBox.style.display = "none";
            }, 3000);
        }
    </script>
</head>
<body>
    <!-- Alert Box -->
    <div id="alert-box" class="alert-box"></div>

    <!-- Navbar -->
    <div class="top-container">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand">Library Management System</a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">User Login</a></li>
                <li class="nav-item"><a class="nav-link" href="admin_login.php">Admin Login</a></li>
                <li class="nav-item"><a class="nav-link" href="signup.php">Signup</a></li>
            </ul>
        </nav>
    </div>

    <!-- Main Admin Login Form -->
    <div class="container">
        <h3><u>Admin Login Form</u></h3>
        <form action="" method="post">
            <div class="form-group">
                <label for="email">Email ID:</label>
                <input type="text" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" name="login" class="btn btn-primary">Login</button>
        </form>
    </div>

    <div class="container side-info mt-3">
        <h5>Library Timing</h5>
        <p>Opening: 9:00 AM | Closing: 12:00 PM</p>
        <h5>What We Provide:</h5>
        <p>Free Wi-Fi | Ideal Learning Environment | Discussion Room</p>
    </div>

    <?php 
        if (isset($_POST['login'])) {
            $connection = mysqli_connect("localhost", "root", "");
            $db = mysqli_select_db($connection, "lms");

            // Check if email exists in the database
            $query = "SELECT * FROM admins WHERE email = '$_POST[email]'";
            $query_run = mysqli_query($connection, $query);

            if (mysqli_num_rows($query_run) > 0) {
                // Email found, now check for password match
                $row = mysqli_fetch_assoc($query_run);
                if ($row['password'] == $_POST['password']) {
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['id'] = $row['id'];
                    header("Location: http://localhost:3000/Admin%20Dashboard/admin_dashboard.php");
                    exit;
                } else {
                    echo "<script>showError('Incorrect Password!');</script>";
                }
            } else {
                echo "<script>showError('Email not found! Please check your credentials.');</script>";
            }
        }
    ?>
</body>
</html>

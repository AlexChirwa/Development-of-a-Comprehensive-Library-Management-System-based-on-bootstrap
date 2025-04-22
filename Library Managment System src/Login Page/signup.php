<!DOCTYPE html>
<html>
<head>
    <title>LMS | Signup</title>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-4.4.1/js/jquery_latest.js"></script>
    <script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
         body {
            background-image: url("https://img.freepik.com/free-vector/bookshelf-library-interior-with-table-chair-background-illustration-cartoon-librarian-wooden-shelf-school-college-archive-cartoon-graphic-bookstore-furniture-with-desk-lamp-hall_107791-22653.jpg?w=1480");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
        }
        /* Top Container Style */
        .navbar {
            background-color: #007bff;
            padding: 15px;
            color: #fff;
        }
        .navbar-brand, .navbar-nav .nav-link {
            font-weight: bold;
            color: #fff !important;
        }
        .nav-link {
            color: #fff !important;
            font-weight: bold;
        }
        /* Main Content Style */
        .container {
            max-width: 500px;
            padding: 40px;
            margin: auto;
            background-color: rgba(255, 255, 255, 0.9); /* Light background with transparency */
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.2);
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
        .side-info {
            text-align: center;
            padding: 10px;
            background-color: rgba(255, 255, 255, 0.8); /* Light background with transparency */
            border-radius: 10px;
            margin-top: 20px;
        }
        .dropdown-alert {
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
        body {
            background-image: url("https://img.freepik.com/free-vector/bookshelf-library-interior-with-table-chair-background-illustration-cartoon-librarian-wooden-shelf-school-college-archive-cartoon-graphic-bookstore-furniture-with-desk-lamp-hall_107791-22653.jpg?t=st=1730780652~exp=1730784252~hmac=37f8883d33baa42d8955f6c916cb1af7562c91ef41fcf1d1283da55e66b982dd&w=1480");
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #007bff;
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: white !important;
            font-weight: bold;
        }
        #side_bar {
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            margin-top: 20px;
            border-radius: 8px;
        }
        #main_content {
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            margin-top: 20px;
            border-radius: 8px;
        }
        /* Top Notification Styling */
        #notification {
            display: none;
            position: fixed;
            top: 0;
            width: 100%;
            background-color: #28a745;
            color: white;
            text-align: center;
            padding: 10px;
            font-weight: bold;
            z-index: 1000;
        }
        @keyframes slideDown {
            from { top: -50px; }
            to { top: 0; }
        }
        #notification.show {
            display: block;
            animation: slideDown 0.5s ease;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand mx-auto">Library Management System</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="index.php">User Login</a></li>
            <li class="nav-item"><a class="nav-link" href="admin_login.php">Admin Login</a></li>
            <li class="nav-item"><a class="nav-link" href="signup.php">Signup</a></li>
        </ul>
    </nav>

    <!-- Signup Form Content -->
    <div class="col-md-8" id="main_content">
                <center><h3><u>User Registration Form</u></h3></center>
                <form action="register.php" method="post">
                    <div class="form-group">
                        <label for="name">Full Name:</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email ID:</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile:</label>
                        <input type="text" name="mobile" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <textarea name="address" class="form-control" required></textarea> 
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>    
                </form>
            </div>

            <div class="container side-info mt-3">
        <h5>Library Timing</h5>
        <p>Opening: 9:00 AM | Closing: 12:00 PM</p>
        <h5>What We Provide:</h5>
        <p>Free Wi-Fi | Ideal Learning Environment | Discussion Room</p>
    </div>

    <?php
        if (isset($_POST['register'])) {
            // Database connection and insertion logic here
            // Assuming successful registration:
            echo "<script>
                document.getElementById('notification').classList.add('show');
                setTimeout(function() {
                    document.getElementById('notification').classList.remove('show');
                }, 3000);
            </script>";
        }
    ?>
</body>
</html>

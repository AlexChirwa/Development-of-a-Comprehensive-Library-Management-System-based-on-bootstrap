<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Change Password</title>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-4.4.1/js/jquery_latest.js"></script>
    <script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            background: #f0f0f0;
            background-image: url("https://img.freepik.com/free-vector/bookshelf-library-interior-with-table-chair-background-illustration-cartoon-librarian-wooden-shelf-school-college-archive-cartoon-graphic-bookstore-furniture-with-desk-lamp-hall_107791-22653.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
        }
        .navbar {
            border-radius: 5px 5px;
            background-color: #007bff;
        }
        .navbar-brand, .navbar-nav .nav-link {
            padding: 2px;
            color: white !important;
            font-weight: bold;
        }
        .container {
            max-width: 500px;
            padding: 40px;
            margin: 50px auto;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.2);
        }
        h4 {
            color: #333;
            text-align: center;
            font-weight: bold;
        }
        .form-control {
            border-radius: 20px;
        }
        .btn-primary {
            border-radius: 20px;
            width: 100%;
            font-weight: bold;
        }
        .marquee-text {
            font-weight: bold;
            color: #333;
            padding: 10px;
            background-color: rgba(255, 255, 255, 0.8);
            margin: 20px auto;
            border-radius: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand">Library Management System</a>
        <div class="dropdown-divider"></div>
        <a class="nav-link" href="user_dashboard.php">Home</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile</a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="view_profile.php">View Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="edit_profile.php">Edit Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="change_password.php">Change Password</a>
                </div>
            </li>
            <li class="nav-item"><a class="nav-link" href="http://localhost:3000/Login%20Page/index.php">Logout</a></li>
        </ul>
    </nav>

    <!-- Marquee Text 
    <div class="marquee-text">
        This is the library management system. Library opens at 8:00 AM and closes at 8:00 PM.
    </div>
        -->
    
    <!-- Change Password Form -->
    <div class="container">
        <h4>Change Student Password</h4>
        <form action="update_password.php" method="post">
            <div class="form-group">
                <label for="old_password">Enter Current Password:</label>
                <input type="password" class="form-control" name="old_password" required>
            </div>
            <div class="form-group">
                <label for="new_password">Enter New Password:</label>
                <input type="password" name="new_password" class="form-control" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update Password</button>
        </form>
    </div>

</body>
</html>

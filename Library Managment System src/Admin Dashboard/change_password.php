<?php
    require("functions.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Change Admin Password</title>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="../bootstrap-4.4.1/js/jquery_latest.js"></script>
    <script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            background: #f0f0f0;
            background-image: url("https://img.freepik.com/free-vector/bookshelf-library-interior-with-table-chair-background-illustration-cartoon-librarian-wooden-shelf-school-college-archive-cartoon-graphic-bookstore-furniture-with-desk-lamp-hall_107791-22653.jpg?t=st=1730780652~exp=1730784252~hmac=37f8883d33baa42d8955f6c916cb1af7562c91ef41fcf1d1283da55e66b982dd&w=1480");
            background-size: cover;
            background-position: center;
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
            margin: auto;
            max-width: 600px;
            padding: 40px;
            margin-top: auto;
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
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand">Library Management System</a>
            <div class="dropdown-divider"></div>
            <a class="nav-link" href="admin_dashboard.php">Home</a>
            <div class="navbar-collapse collapse">
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
            </div>
        </div>
    </nav>
    
    <!-- Marquee 
    <marquee style="font-weight: bold; color: #333;">This is a library management system. Library opens at 8:00 AM and closes at 8:00 PM.</marquee>
    -->

    <!-- Change Password Form -->
    <div class="container mt-4">
        <h4>Change Admin Password</h4>
        <form action="update_password.php" method="post">
            <div class="form-group">
                <label for="old_password">Enter Old Password:</label>
                <input type="password" class="form-control" name="old_password" required>
            </div>
            <div class="form-group">
                <label for="new_password">Enter New Password:</label>
                <input type="password" class="form-control" name="new_password" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update Password</button>
        </form>
    </div>

</body>
</html>

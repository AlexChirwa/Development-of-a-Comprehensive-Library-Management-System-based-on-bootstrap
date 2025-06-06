<?php
    require("functions.php");
    session_start();
    #fetch data from database
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"lms");
    $name = "";
    $email = "";
    $mobile = "";
    $query = "select * from admins where email = '$_SESSION[email]'";
    $query_run = mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($query_run)){
        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['mobile'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Profile Detail</title>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap-4.4.1/css/bootstrap.min.css">
    <script src="../bootstrap-4.4.1/js/jquery_latest.js"></script>
    <script src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            background-image: url("https://img.freepik.com/free-vector/bookshelf-library-interior-with-table-chair-background-illustration-cartoon-librarian-wooden-shelf-school-college-archive-cartoon-graphic-bookstore-furniture-with-desk-lamp-hall_107791-22653.jpg?w=1480");
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
            margin-bottom: 30px;
        }
        .form-control {
            border-radius: 20px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand">Library Management System</a>
        <div class="dropdown-divider"></div>
        <a class="nav-link" href="admin_dashboard.php">Home</a>
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

    <!-- Marquee 
    <marquee style="font-weight: bold; color: #333;">This is a library management system. Library opens at 8:00 AM and closes at 8:00 PM.</marquee>
    -->

    <!-- Admin Profile Section -->
    <div class="container">
        <h4>Admin Profile Detail</h4>
        <form>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" value="<?php echo $name;?>" disabled>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" value="<?php echo $email;?>" class="form-control" disabled>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile:</label>
                <input type="text" value="<?php echo $mobile;?>" class="form-control" disabled>
            </div>
        </form>
    </div>

</body>
</html>

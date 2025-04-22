<?php
    session_start();
    #fetch data from database
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"lms");
    $name = $email = $mobile = $address = "";

    $query = "SELECT * FROM users WHERE email = '$_SESSION[email]'";
    $query_run = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($query_run)) {
        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['mobile'];
        $address = $row['address'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <script src="bootstrap-4.4.1/js/jquery_latest.js"></script>
    <script src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            background-image: url("https://img.freepik.com/free-vector/bookshelf-library-interior-with-table-chair-background-illustration-cartoon-librarian-wooden-shelf-school-college-archive-cartoon-graphic-bookstore-furniture-with-desk-lamp-hall_107791-22653.jpg?t=st=1730780652~exp=1730784252~hmac=37f8883d33baa42d8955f6c916cb1af7562c91ef41fcf1d1283da55e66b982dd&w=1480");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat; /* Prevents background from repeating */
            background-attachment: fixed; /* Fixes background when scrolling */
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
        .wrapper {
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .container {
            margin: auto;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin-top: 50px auto;
        }
        h4 {
            color: #333;
            text-align: center;
        }
        .form-control {
            border-radius: 20px;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand mx-auto">Library Management System</a>
            <div class="dropdown-divider"></div>
            <a class="nav-link" href="user_dashboard.php">Home</a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="profileDropdown" role="button" data-toggle="dropdown">My Profile</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="view_profile.php">View Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="edit_profile.php">Edit Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="change_password.php">Change Password</a>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="http://localhost:3000/Login%20Page/admin_login.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <!-- Welcome Message -->
    <div class="wrapper">
    <div class="container">
        <h4>Student Profile Details</h4>
        <form>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" value="<?php echo $name; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" value="<?php echo $email; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile:</label>
                <input type="text" class="form-control" value="<?php echo $mobile; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea rows="3" name="address" class="form-control" disabled><?php echo $address;?></textarea>
            </div>
        </form>
    </div>
</body>
</html>

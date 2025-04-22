<?php
    require("../Admin Dashboard/functions.php");
    session_start();

    // Form processing code at the top
    $author_added = false; // Track if the author was successfully added

    if (isset($_POST['add_author'])) {
        $connection = mysqli_connect("localhost", "root", "");
        $db = mysqli_select_db($connection, "lms");

        $query = "insert into authors values('', '$_POST[author_name]')";
        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            $author_added = true; // Set to true if the query was successful
        }
    }

    // Fetch data from the database
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "lms");
    $name = "";
    $email = "";
    $mobile = "";
    $query = "select * from admins where email = '$_SESSION[email]'";
    $query_run = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($query_run)) {
        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['mobile'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add New Author</title>
    <meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="../bootstrap-4.4.1/css/bootstrap.min.css">
    <script src="../bootstrap-4.4.1/js/jquery_latest.js"></script>
    <script src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
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
            max-width: 600px;
            padding: 40px;
            margin: auto;
            margin-top: 50px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.2);
        }
        h4 {
            color: #333;
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .form-control, .btn {
            border-radius: 20px;
        }
        /* Notification styling */
        #notification {
            display: none;
            position: fixed;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            background-color: #28a745;
            color: white;
            padding: 15px 30px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 0 0 10px 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }
        /* Slide down animation */
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
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand">Library Management System</a>
            <div class="dropdown-menu dropdown-menu-right">
            <a class="navbar-brand" href="http://localhost:3000/Admin%20Dashboard/admin_dashboard.php">Home</a>
            <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-menu">
            <a class="dropdown-item" href="http://localhost:3000/Authors/add_author.php">Add New Author</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="http://localhost:3000/Authors/manage_author.php">Manage Authors</a>
            
        </div>
    </nav>


    <!-- Notification -->
    <div id="notification">Author has been successfully added!</div>

    <!-- Header Section -->
    <div class="container">
    <center><h4>Add a New Author</h4></center>
        <form action="" method="post">
            <div class="form-group">
                <label for="author_name">Author Name:</label>
                <input type="text" class="form-control" name="author_name" required>
            </div>
            <button type="submit" name="add_author" class="btn btn-primary btn-block">Add Author</button>
        </form>
    </div>

    <?php if ($author_added): ?>
        <script>
            // Show the notification when the author is added successfully
            document.getElementById("notification").classList.add("show");
            // Hide the notification after 3 seconds
            setTimeout(() => document.getElementById("notification").classList.remove("show"), 3000);
        </script>
    <?php endif; ?>

</body>
</html>

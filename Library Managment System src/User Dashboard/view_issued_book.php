<?php
    session_start();
    #fetch data from database
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"lms");
    $query = "select book_name, book_author, book_no, issue_date from issued_books where student_id = $_SESSION[id] and status = 1";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Issued Books</title>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-4.4.1/js/jquery_latest.js"></script>
    <script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
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
            margin: auto;
            max-width: 900px;
            padding: 40px;
            margin-top: 50px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.2);
        }
        h4 {
            color: #333;
            text-align: center;
            font-weight: bold;
        }
        .table {
            width: 100%;
            background-color: white;
            text-align: center;
            border-radius: 5px;
            box-shadow: 0px 4px 8px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 15px;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        td {
            background-color: #f9f9f9;
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
        <div class="container-fluid">
            <a class="navbar-brand">Library Management System</a>
            <div class="dropdown-divider"></div>
            <a class="navbar-brand" href="user_dashboard.php">Home</a>
            
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
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost:3000/Login%20Page/index.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!--
    <div class="marquee-text">
        This is the library management system. Library opens at 8:00 AM and closes at 8:00 PM.
    </div>
    -->
    
    <!-- Issued Books Table -->
    <div class="container mt-5">
        <h4>Borrowed Books</h4>
        <table class="table table-bordered table-hover mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Author</th>
                    <th>Number</th>
                    <th>Issue Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query_run = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($query_run)) {
                        echo "<tr>";
                        echo "<td>{$row['book_name']}</td>";
                        echo "<td>{$row['book_author']}</td>";
                        echo "<td>{$row['book_no']}</td>";
                        echo "<td>{$row['issue_date']}</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

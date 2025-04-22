<?php
    session_start();
    #fetch data from database
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "lms");
    $query = "SELECT * FROM users";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>All Registered Users</title>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="../bootstrap-4.4.1/js/jquery_latest.js"></script>
    <script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
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
            padding: 5px;
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
            <div class="dropdown-menu dropdown-menu-right">
            <a class="navbar-brand" href="admin_dashboard.php">Home</a>
            <div class="dropdown-menu dropdown-menu-right">
        </div>
    </nav>

    <!-- Marquee 
    <div class="bg-info text-white py-2">
        <marquee>This is the library management system. The library opens at 8:00 AM and closes at 8:00 PM.</marquee>
    </div>
    -->

    <!-- Registered Users Table -->
    <div class="container">
        <h4>Registered Users</h4>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query_run = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($query_run)) {
                        echo "<tr>";
                        echo "<td>{$row['name']}</td>";
                        echo "<td>{$row['email']}</td>";
                        echo "<td>{$row['mobile']}</td>";
                        echo "<td>{$row['address']}</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
    require("functions.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="../bootstrap-4.4.1/js/jquery_latest.js"></script>
    <script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            background-image: url("https://img.freepik.com/free-vector/bookshelf-library-interior-with-table-chair-background-illustration-cartoon-librarian-wooden-shelf-school-college-archive-cartoon-graphic-bookstore-furniture-with-desk-lamp-hall_107791-22653.jpg?w=1480");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
        }
        .navbar, .navbar-light {
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
            padding: 10px;
            margin: auto;
        }
        .card {
            border-radius: 10px;
            background-color: #ffffff; /* Solid white background */
            box-shadow: 0px 4px 10px rgba(0,0,0,0.2);
        }
        .card-header {
            font-weight: bold;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .card-body {
            text-align: center;
        }
        .btn {
            border-radius: 20px;
            width: 80%;
            margin: 5px auto;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand">Library Management System</a>
            <div class="dropdown-divider"></div>
            <a class="navbar-brand">Admin Dashboard</a>
            <div class="ml-auto text-white">
            
            <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="http://localhost:3000/Admin%20Dashboard/view_profile.php">My Profile</a></li>
            </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost:3000/Login%20Page/index.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Submenu Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://localhost:3000/AddManage%20Book/add_book.php">Books</a>
                    
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href= http://localhost:3000/AddManage%20Book%20Category/add_cat.php>Category</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href= http://localhost:3000/Authors/add_author.php>Authors</a>
                    
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://localhost:3000/Issue%20Book/issue_book.php">Issue Book</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Dashboard Cards -->
    <div class="container">
        <div class="row">
            <!-- Registered Users Card -->
            <div class="col-md-3 mb-3">
                <div class="card bg-light text-dark">
                    <div class="card-header">Registered Users</div>
                    <div class="card-body">
                        <p class="card-text">Total Users: <?php echo get_user_count(); ?></p>
                        <a href="Regusers.php" class="btn btn-danger" target="_blank">View Users</a>
                    </div>
                </div>
            </div>
            <!-- Total Books Card -->
            <div class="col-md-3 mb-3">
                <div class="card bg-light text-dark">
                    <div class="card-header">Total Books</div>
                    <div class="card-body">
                        <p class="card-text">Books Available: <?php echo get_book_count(); ?></p>
                        <a href="http://localhost:3000/AddManage%20Book/Regbooks.php" class="btn btn-success" target="_blank">View Books</a>
                    </div>
                </div>
            </div>
            <!-- Book Categories Card -->
            <div class="col-md-3 mb-3">
                <div class="card bg-light text-dark">
                    <div class="card-header">Book Categories</div>
                    <div class="card-body">
                        <p class="card-text">Categories: <?php echo get_category_count(); ?></p>
                        <a href="http://localhost:3000/AddManage%20Book%20Category/Regcat.php" class="btn btn-warning" target="_blank">View Categories</a>
                    </div>
                </div>
            </div>
            <!-- Authors Card -->
            <div class="col-md-3 mb-3">
                <div class="card bg-light text-dark">
                    <div class="card-header">Authors</div>
                    <div class="card-body">
                        <p class="card-text">Total Authors: <?php echo get_author_count(); ?></p>
                        <a href="http://localhost:3000/Authors/Regauthor.php" class="btn btn-primary" target="_blank">View Authors</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Issued Books Card -->
            <div class="col-md-3 mb-3">
                <div class="card bg-light text-dark">
                    <div class="card-header">Issued Books</div>
                    <div class="card-body">
                        <p class="card-text">Books Issued: <?php echo get_issue_book_count(); ?></p>
                        <a href="view_issued_book.php" class="btn btn-success" target="_blank">View Issued Books</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

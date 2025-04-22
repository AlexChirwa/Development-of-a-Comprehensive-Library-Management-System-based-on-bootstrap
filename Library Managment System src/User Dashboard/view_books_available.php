<?php
    session_start();
    #fetch data from database
    $connection = mysqli_connect("localhost", "root", "", "lms");
    $query = "
        SELECT 
            books.book_name,
            books.book_no,
            books.book_price,
            category.cat_name,
            authors.author_name
        FROM books
        LEFT JOIN authors ON books.author_id = authors.author_id
        LEFT JOIN category ON books.cat_id = category.cat_id
    ";
?>
<!DOCTYPE html>
<html>
<head>
    <title>All Registered Books</title>
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
            padding: 2x;
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
            margin-bottom: 20px;
        }
        table {
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
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand">Library Management System</a>
            <div class="dropdown-divider"></div>
            <a class="navbar-brand" href="user_dashboard.php">Home</a>
            <div class="dropdown-divider"></div>
            
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

    <!-- Registered Books Section -->
    <div class="container">
        <h4>Registered Books</h4>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Author</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Number</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query_run = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                    <tr>
                        <td><?php echo $row['book_name']; ?></td>
                        <td><?php echo $row['author_name']; ?></td>
                        <td><?php echo $row['book_price']; ?></td>
                        <td><?php echo $row['cat_name']; ?></td>
                        <td><?php echo $row['book_no']; ?></td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

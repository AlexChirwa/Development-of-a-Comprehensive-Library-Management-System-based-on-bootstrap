<?php
    session_start();
    function get_user_issue_book_count(){
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"lms");
        $user_issue_book_count = 0;
        $query = "SELECT count(*) AS user_issue_book_count FROM issued_books WHERE student_id = $_SESSION[id]";
        $query_run = mysqli_query($connection,$query);
        while ($row = mysqli_fetch_assoc($query_run)){
            $user_issue_book_count = $row['user_issue_book_count'];
        }
        return($user_issue_book_count);
    }

    function get_book_count(){
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"lms");
        $book_count = 0;
        $query = "SELECT count(*) AS book_count FROM books";
        $query_run = mysqli_query($connection,$query);
        while ($row = mysqli_fetch_assoc($query_run)){
            $book_count = $row['book_count'];
        }
        return($book_count);
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-4.4.1/js/jquery_latest.js"></script>
    <script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            background-image: url("https://img.freepik.com/free-vector/bookshelf-library-interior-with-table-chair-background-illustration-cartoon-librarian-wooden-shelf-school-college-archive-cartoon-graphic-bookstore-furniture-with-desk-lamp-hall_107791-22653.jpg?w=1480");
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
        .dashboard-header {
            text-align: center;
            color: #fff;
            margin-top: 20px;
        }
        .dashboard-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 40px;
        }
        .card {
            width: 250px;
            margin: 20px;
            border-radius: 10px;
            background-color: #ffffff; /* Solid white background */
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
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
        .card-text {
            font-size: 18px;
            color: #333;
        }
        .btn-success {
            margin-top: 10px;
            width: 100%;
            border-radius: 20px;
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

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand mx-auto">Library Management System</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="http://localhost:3000/User%20Dashboard/view_profile.php">My Profile</a></li>
            <li class="nav-item"><a class="nav-link" href="http://localhost:3000/Login%20Page/index.php">Logout</a></li>
        </ul>
    </nav>

    <!-- Welcome Message -->
    <div class="dashboard-header">
        <h2>Welcome <?php echo $_SESSION['name']; ?></h2>
    </div>

    <!-- Marquee Text -->
    <div class="marquee-text">
        This is the library management system. Library opens at 8:00 AM and closes at 8:00 PM.
    </div>

    <!-- Dashboard Content -->
    <div class="container dashboard-container">
        <div class="card">
            <div class="card-header">Borrowed Books</div>
            <div class="card-body">
                <p class="card-text">No of borrowed books: <?php echo get_user_issue_book_count(); ?></p>
                <a href="http://localhost:3000/User%20Dashboard/view_issued_book.php" class="btn btn-success">View Borrowed Books</a>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Available Books</div>
            <div class="card-body">
                <p class="card-text">No of books available: <?php echo get_book_count(); ?></p>
                <a href="view_books_available.php" class="btn btn-success">View Books Available</a>
            </div>
        </div>
    </div>

</body>
</html>

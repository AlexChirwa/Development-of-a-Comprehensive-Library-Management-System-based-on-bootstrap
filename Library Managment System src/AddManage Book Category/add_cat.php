<?php
    require("../Admin Dashboard/functions.php");
    session_start();

    // Initialize database connection
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "lms");

    // Fetch Admin Data
    $name = $email = $mobile = "";
    $query = "SELECT * FROM admins WHERE email = '$_SESSION[email]'";
    $query_run = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($query_run)) {
        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['mobile'];
    }

    // Initialize flag for success message
    $categoryAdded = false;

    // Process the form when submitted
    if (isset($_POST['add_cat'])) {
        $query = "INSERT INTO category VALUES('', '$_POST[cat_name]')";
        mysqli_query($connection, $query);
        $categoryAdded = true; // Set success flag to true
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add New Category</title>
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
            border-radius: 5px;
            background-color: #007bff;
        }
        .navbar-brand, .navbar-nav .nav-link {
            padding: 5px;
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
        .btn-primary {
            width: 100%;
            font-weight: bold;
            border-radius: 20px;
        }
        /* Notification Styling */
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
            box-shadow: 0px 4px 10px rgba(0,0,0,0.2);
            z-index: 1000;
        }
        /* Slide Down Animation */
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
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand">Library Management System</a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="navbar-brand" href="http://localhost:3000/Admin%20Dashboard/admin_dashboard.php">Home</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="http://localhost:3000/AddManage%20Book%20Category/add_cat.php">Add New Category</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="http://localhost:3000/AddManage%20Book%20Category/manage_cat.php">Manage Category</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Notification -->
    <?php if ($categoryAdded): ?>
        <div id="notification" class="show">Category added successfully!</div>
        <script>
            setTimeout(() => {
                document.getElementById("notification").classList.remove("show");
            }, 3000);
        </script>
    <?php endif; ?>

    <div class="container">
        <h4 class="text-center">Add a New Category</h4>
        <form action="" method="post">
            <div class="form-group">
                <label for="name">Category Name:</label>
                <input type="text" class="form-control" name="cat_name" required>
            </div>
            <button type="submit" name="add_cat" class="btn btn-primary">Add Category</button>
        </form>
    </div>
</body>
</html>

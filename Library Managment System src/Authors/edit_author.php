<?php
    session_start();
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "lms");

    // Initialize variables
    $author_id = "";
    $author_name = "";
    $updateSuccess = false; // To track if the update was successful

    if (isset($_GET['aid'])) {
        $author_id = mysqli_real_escape_string($connection, $_GET['aid']);
        $query = "SELECT * FROM authors WHERE author_id = '$author_id'";
        $query_run = mysqli_query($connection, $query);

        if ($query_run && mysqli_num_rows($query_run) > 0) {
            $row = mysqli_fetch_assoc($query_run);
            $author_name = $row['author_name'];
        } else {
            echo "<script>
                alert('Error fetching author data.');
                window.location.href = 'manage_author.php';
                </script>";
            exit();
        }
    } else {
        echo "<script>
            alert('Author ID (aid) is not provided in the URL.');
            window.location.href = 'manage_author.php';
            </script>";
        exit();
    }

    if (isset($_POST['update_author'])) {
        $author_name = mysqli_real_escape_string($connection, $_POST['author_name']);
        $query = "UPDATE authors SET author_name = '$author_name' WHERE author_id = '$author_id'";
        $query_run = mysqli_query($connection, $query);
        if ($query_run) {
            $updateSuccess = true; // Update was successful
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Author</title>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
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
            max-width: 500px;
            padding: 40px;
            margin: 30px auto;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.2);
        }
        h4 {
            text-align: center;
            color: #333;
            font-weight: bold;
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
            <a class="dropdown-item" href="http://localhost:3000/Authors/add_author.php">Add New Author</a>
            <div class="dropdown-menu dropdown-menu-right">
            <a class="navbar-brand" href="http://localhost:3000/Authors/manage_author.php">Manage Author</a>
        </div>
    </nav>

    <!-- Notification -->
    <?php if ($updateSuccess): ?>
        <div id="notification" class="show">Author updated successfully.</div>
        <script>
            setTimeout(() => {
                document.getElementById("notification").classList.remove("show");
            }, 3000);
        </script>
    <?php endif; ?>

    <div class="container">
        <h4>Edit Author</h4>
        <form action="" method="post">
            <div class="form-group">
                <label for="author_name">Author Name:</label>
                <input type="text" class="form-control" name="author_name" value="<?php echo $author_name; ?>" required>
            </div>
            <button type="submit" name="update_author" class="btn btn-primary btn-block">Update Author</button>
        </form>
    </div>

</body>
</html>

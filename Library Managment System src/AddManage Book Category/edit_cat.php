<?php
    session_start();
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "lms");

    $cat_id = "";
    $cat_name = "";

    if (isset($_GET['cid'])) {
        $cat_id = mysqli_real_escape_string($connection, $_GET['cid']);
        $query = "SELECT * FROM category WHERE cat_id = '$cat_id'";
        $query_run = mysqli_query($connection, $query);

        if ($query_run && mysqli_num_rows($query_run) > 0) {
            $row = mysqli_fetch_assoc($query_run);
            $cat_name = $row['cat_name'];
        } else {
            echo "<script>alert('Error fetching category data.'); window.location.href = 'manage_cat.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Category ID (cid) is not provided in the URL.'); window.location.href = 'manage_cat.php';</script>";
        exit();
    }

    // Initialize flag for success message
    $categoryUpdated = false;

    if (isset($_POST['update_cat'])) {
        $cat_name = mysqli_real_escape_string($connection, $_POST['cat_name']);
        $query = "UPDATE category SET cat_name = '$cat_name' WHERE cat_id = '$cat_id'";
        $query_run = mysqli_query($connection, $query);
        $categoryUpdated = true;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Category</title>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
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
            background-color: #007bff;
            border-radius: 5px;
        }
        .navbar-brand, .nav-link {
            color: white !important;
            font-weight: bold;
        }
        .container {
            max-width: 600px;
            padding: 20px;
            margin: 40px auto;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }
        h4 {
            color: #333;
            text-align: center;
            font-weight: bold;
        }
        .form-control, .btn-primary {
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
            <div class="dropdown-divider"></div>
            <a class="navbar-brand" href="http://localhost:3000/Admin%20Dashboard/admin_dashboard.php">Home</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="http://localhost:3000/AddManage%20Book%20Category/add_cat.php">Add New Category</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="http://localhost:3000/AddManage%20Book%20Category/manage_cat.php">Manage Category</a>
        </div>
    </nav>

    <!-- Notification -->
    <?php if ($categoryUpdated): ?>
        <div id="notification" class="show">Category updated successfully!</div>
        <script>
            setTimeout(() => {
                document.getElementById("notification").classList.remove("show");
            }, 3000);
        </script>
    <?php endif; ?>

    <div class="container">
        <h4>Edit Category</h4>
        <form action="" method="post">
            <div class="form-group">
                <label for="name">Category Name:</label>
                <input type="text" class="form-control" name="cat_name" value="<?php echo $cat_name; ?>" required>
            </div>
            <button type="submit" name="update_cat" class="btn btn-primary btn-block">Update Category</button>
        </form>
    </div>
</body>
</html>

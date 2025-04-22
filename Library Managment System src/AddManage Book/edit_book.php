<?php
    session_start();
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "lms");

    // Initialize variables
    $book_name = "";
    $book_no = "";
    $author_id = "";
    $cat_id = "";
    $book_price = "";
    $updateSuccess = false;

    // Check if 'bn' is provided in the GET request
    if (isset($_GET['bn']) && !empty($_GET['bn'])) {
        $bn = $_GET['bn'];
        
        // Prepare the query securely
        $query = "SELECT * FROM books WHERE book_no = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("i", $bn);
        $stmt->execute();
        $result = $stmt->get_result();

        // Fetch the data if the book exists
        if ($row = $result->fetch_assoc()) {
            $book_name = $row['book_name'];
            $book_no = $row['book_no'];
            $author_id = $row['author_id'];
            $cat_id = $row['cat_id'];
            $book_price = $row['book_price'];
        } else {
            echo "No book found with the provided book number.";
        }

        $stmt->close();
    } else {
        echo "Book number (bn) is not provided in the URL.";
    }

    if (isset($_POST['update'])) {
        $query = "UPDATE books SET book_name = ?, author_id = ?, cat_id = ?, book_price = ? WHERE book_no = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("siiii", $_POST['book_name'], $_POST['author_id'], $_POST['cat_id'], $_POST['book_price'], $bn);
        if ($stmt->execute()) {
            $updateSuccess = true;
        }
        $stmt->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Book</title>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
    <script src="../bootstrap-4.4.1/js/jquery_latest.js"></script>
    <script src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #f0f0f0;
            background-image: url("https://img.freepik.com/free-vector/bookshelf-library-interior-with-table-chair-background-illustration-cartoon-librarian-wooden-shelf-school-college-archive-cartoon-graphic-bookstore-furniture-with-desk-lamp-hall_107791-22653.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #007bff;
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
            margin-bottom: 20px;
        }
        .form-control, .btn-primary {
            border-radius: 20px;
        }
        .btn-primary {
            width: 100%;
            font-weight: bold;
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
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
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
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand">Library Management System</a>
            <div class="dropdown-menu dropdown-menu-right">
            <a class="navbar-brand" href="http://localhost:3000/Admin%20Dashboard/admin_dashboard.php">Home</a>
            <div class="dropdown-menu">
            <a class="dropdown-item" href="http://localhost:3000/AddManage%20Book/add_book.php">Add New Book</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="http://localhost:3000/AddManage%20Book/manage_book.php">Manage Books</a>
            </div>
        </div>
    </nav>

    <!-- Notification -->
    <?php if ($updateSuccess): ?>
        <div id="notification" class="show">Book updated successfully.</div>
        <script>
            setTimeout(() => {
                document.getElementById("notification").classList.remove("show");
            }, 3000);
        </script>
    <?php endif; ?>

    <!-- Edit Book Form -->
    <div class="container">
        <h4>Edit Book</h4>
        <form action="" method="post">
            <div class="form-group">
                <label for="book_no">Book Number:</label>
                <input type="text" name="book_no" value="<?php echo $book_no; ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="book_name">Book Name:</label>
                <input type="text" name="book_name" value="<?php echo $book_name; ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="author_id">Author ID:</label>
                <input type="text" name="author_id" value="<?php echo $author_id; ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="cat_id">Category ID:</label>
                <input type="text" name="cat_id" value="<?php echo $cat_id; ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="book_price">Book Price:</label>
                <input type="text" name="book_price" value="<?php echo $book_price; ?>" class="form-control" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update Book</button>
        </form>
    </div>
</body>
</html>

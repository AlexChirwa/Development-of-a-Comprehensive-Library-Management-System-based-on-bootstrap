<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Issue Book</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
            border-radius: 5px;
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
        .form-control, .btn {
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
    <!-- Notification -->
    <div id="notification">Book issued successfully!</div>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand">Library Management System</a>
                <div class="dropdown-menu dropdown-menu-right">
                <a class="navbar-brand" href="http://localhost:3000/Admin%20Dashboard/admin_dashboard.php">Home</a>
            </div>
        </div>
    </nav>
    
    <div class="container">
        <center><h4>Issue Book</h4></center>
        <form action="" method="post">
            <div class="form-group">
                <label for="book_name">Book Name:</label>
                <input type="text" name="book_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="book_author">Author Name:</label>
                <select class="form-control" name="book_author" required>
                    <option value="">-Select author-</option>
                    <?php  
                        $connection = mysqli_connect("localhost","root","");
                        $db = mysqli_select_db($connection,"lms");
                        $query = "select author_name from authors";
                        $query_run = mysqli_query($connection, $query);
                        while($row = mysqli_fetch_assoc($query_run)) {
                            echo "<option>" . $row['author_name'] . "</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="book_no">Book Number:</label>
                <input type="text" name="book_no" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="student_id">Student ID:</label>
                <input type="text" name="student_id" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="issue_date">Issue Date:</label>
                <input type="text" name="issue_date" class="form-control" value="<?php echo date("Y-m-d"); ?>" required>
            </div>
            <button type="submit" name="issue_book" class="btn btn-primary">Issue Book</button>
        </form>
    </div>

    <?php
        if(isset($_POST['issue_book'])) {
            $query = "INSERT INTO issued_books VALUES (NULL, $_POST[book_no], '$_POST[book_name]', '$_POST[book_author]', $_POST[student_id], 1, '$_POST[issue_date]')";
            $query_run = mysqli_query($connection, $query);

            echo "<script>
                document.getElementById('notification').classList.add('show');
                setTimeout(() => {
                    document.getElementById('notification').classList.remove('show');
                    window.location.href = 'http://localhost:3000/Admin%20Dashboard/admin_dashboard.php';
                }, 3000);
            </script>";
        }
    ?>
</body>
</html>

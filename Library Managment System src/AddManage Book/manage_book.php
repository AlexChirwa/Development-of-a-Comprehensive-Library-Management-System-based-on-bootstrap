<!DOCTYPE html>
<html>
<head>
    <title>Manage Books</title>
    <meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
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
        .table {
            max-width: 500px;
            margin: auto;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.15);
        }
        .table th {
            border-radius: 8px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
        }
        .table td {
            text-align: center;
            vertical-align: middle;
        }
        .btn {
            border-radius: 5px;
            padding: 5px 10px;
            font-weight: bold;
        }
        .btn a {
            color: #fff;
            text-decoration: none;
        }
        .btn-edit {
            background-color: #28a745;
        }
        .btn-delete {
            background-color: #dc3545;
        }
        
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand">Library Management System</a>
                <div class="dropdown-menu dropdown-menu-right">
                <a class="navbar-brand" href="http://localhost:3000/Admin%20Dashboard/admin_dashboard.php">Home</a>
                <div class="dropdown-menu">
                <a class="dropdown-item" href="http://localhost:3000/AddManage%20Book/add_book.php">Add New Book</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="http://localhost:3000/AddManage%20Book/manage_book.php">Manage Books</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content: Manage Books Table \\ review explaination-->
    <div class="container mt-4">
        <center><h4>Manage Books</h4></center>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>ISBN No.</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $connection = mysqli_connect("localhost","root","");
                        $db = mysqli_select_db($connection,"lms");
                        $query = "SELECT * FROM books";
                        $query_run = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_assoc($query_run)) {
                            echo "<tr>";
                            echo "<td>" . $row['book_name'] . "</td>";
                            echo "<td>" . $row['author_id'] . "</td>";
                            echo "<td>" . $row['cat_id'] . "</td>";
                            echo "<td>" . $row['book_no'] . "</td>";
                            echo "<td>$" . $row['book_price'] . "</td>";
                            echo "<td><button class='btn btn-edit'><a href='edit_book.php?bn=" . $row['book_no'] . "'>Edit</a></button>
                            <button class='btn btn-delete'><a href='delete_book.php?bn=" . $row['book_no'] . "'>Delete</a></button></td>";
                            echo "</tr>";
                        } 
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

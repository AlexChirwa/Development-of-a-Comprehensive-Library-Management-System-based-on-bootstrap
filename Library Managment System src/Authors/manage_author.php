<?php
    require("../Admin Dashboard/functions.php");
    session_start();
    #fetch data from database
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "lms");
    $name = "";
    $email = "";
    $mobile = "";
    $query = "select * from admins where email = '$_SESSION[email]'";
    $query_run = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($query_run)) {
        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['mobile'];
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Author</title>
    <meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">Library Management System</a>
            <div class="dropdown-menu dropdown-menu-right">
            <a class="navbar-brand" href="http://localhost:3000/Admin%20Dashboard/admin_dashboard.php">Home</a>
            <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="http://localhost:3000/Authors/add_author.php">Add New Author</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="http://localhost:3000/Authors/manage_author.php">Manage Authors</a>
        </div>
    </nav>
    
    <div class="container">
    <center><h4 class="text-center my-4">Manage Authors</h4></center>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Author Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM authors";
                        $query_run = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_assoc($query_run)) {
                    ?>
                    <tr>
                        <td><?php echo $row['author_name']; ?></td>
                        <td>
                            <button class="btn btn-edit"><a href="edit_author.php?aid=<?php echo $row['author_id']; ?>">Edit</a></button>
                            <button class="btn btn-delete"><a href="delete_author.php?aid=<?php echo $row['author_id']; ?>">Delete</a></button>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

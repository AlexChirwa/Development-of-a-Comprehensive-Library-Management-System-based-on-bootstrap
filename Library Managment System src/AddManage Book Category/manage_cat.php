<?php
    require("../Admin Dashboard/functions.php");
    session_start();
    #fetch data from database
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"lms");
    $name = "";
    $email = "";
    $mobile = "";
    $query = "select * from admins where email = '$_SESSION[email]'";
    $query_run = mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($query_run)){
        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['mobile'];
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Category</title>
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
            padding: 5px;
            color: white !important;
            font-weight: bold;
        }
        .container {
            margin: auto;
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
            border-radius: 4px;
            font-weight: bold;
        }
        .btn-edit {
            color: white;
            background-color: #007bff;
        }
        .btn-delete {
            color: white;
            background-color: #dc3545;
        }
        h4 {
            color: #333;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
    </nav>
    
    <div class="container">
        <div class="text-center">
        <center><h4>Manage Categories</h4></center>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="table-container">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Category Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = "SELECT * FROM category";
                                $query_run = mysqli_query($connection,$query);
                                while ($row = mysqli_fetch_assoc($query_run)){
                            ?>
                            <tr>
                                <td><?php echo $row['cat_name'];?></td>
                                <td>
                                    <a href="edit_cat.php?cid=<?php echo $row['cat_id'];?>" class="btn btn-edit">Edit</a>
                                    <a href="delete_cat.php?cid=<?php echo $row['cat_id'];?>" class="btn btn-delete">Delete</a>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

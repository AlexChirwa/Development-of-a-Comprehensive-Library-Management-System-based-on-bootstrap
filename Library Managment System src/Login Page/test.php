<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>


<?php
$connection = mysqli_connect("localhost", "root", "", "lms");
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
} else {
    echo "Database connection successful!";
}
?>

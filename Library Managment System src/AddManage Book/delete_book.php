<?php
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "lms");

    if (isset($_GET['bn'])) {
        $book_no = mysqli_real_escape_string($connection, $_GET['bn']);  // Sanitize the input
        $query = "DELETE FROM books WHERE book_no = '$book_no'";
        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            echo "<script type='text/javascript'>
                alert('Book deleted successfully...');
                window.location.href = 'manage_book.php';
                </script>";
        } else {
            echo "<script type='text/javascript'>
                alert('Error deleting book.');
                window.location.href = 'manage_book.php';
                </script>";
        }
    } else {
        echo "<script type='text/javascript'>
            alert('Book number (bn) is not provided in the URL.');
            window.location.href = 'manage_book.php';
            </script>";
    }
?>

<?php
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"lms");
    $query = "insert into users values('','$_POST[name]','$_POST[email]','$_POST[password]',$_POST[mobile],'$_POST[address]')";
    $query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
    alert("Registration successfull...You may Login now !!");
    window.location.href = "http://localhost:3000/Login%20Page/signup.php";
</script>

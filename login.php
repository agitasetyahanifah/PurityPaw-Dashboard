<?php

include "ajax/db_connection.php";

$username = $_POST['user'];
$password = $_POST['password'];

$query = mysql_query("SELECT * FROM user where user='$user' and password='$password'");
if(mysqli_num_rows($data)==1){
    header("location:index.html");
} else {
    echo "username dan password tidak ditemukan <br>";
    echo "<a href=login.html>Login</a>";
    exit;
  }

?>

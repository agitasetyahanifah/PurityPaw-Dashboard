<?php
// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // include Database connection file
    include("db_connection.php");

    // get user id
    $id = $_POST['id'];

    // delete User
    $query = "DELETE FROM ring_all WHERE id = '$id'";
    if (mysqli_query($koneksi,$query)) {
    	 echo "<script>alert('Username Sudah Digunakan'); </script>";
    }
    if (!$result = mysqli_query($koneksi,$query)) {
        exit(mysqli_error());
    }
       
}
?>
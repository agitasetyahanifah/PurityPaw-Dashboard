<?php
session_start();
$username = $_SESSION['user'];

$isLoggedIn = $_SESSION['isLoggedIn'];
 $date = date('Y-m-d');
if($isLoggedIn != '1'){
    session_destroy();
    header('Location: login.php');
}
	if(isset($_POST['number']))
	{
		// include Database connection file 
		include("db_connection.php");
		// get values 
		$number = $_POST['number'];
		$cekdulu= "select * from scratch_code where kode='$_POST[number]'"; 
		$prosescek= mysqli_query($koneksi, $cekdulu);
					if (mysqli_num_rows($prosescek)>0) { //proses mengingatkan data sudah ada
						echo "Kode Sudah Digunakan.";
					}else
					
						{ $q = mysqli_query($koneksi, "select kode,point from kode_raw where kode='$number'");
						  $row = mysqli_fetch_array ($q);
						  if (mysqli_num_rows($q) == 1) {
							$point = $row['point'];
							$query = "INSERT INTO scratch_code (scratch_id,Tanggal,username,kode,point) VALUES('','$date','$username','$number','$point')";
						  }
							if(mysqli_query($koneksi, $query)){
						echo "Records added successfully.";
					} else{
						echo "ERROR: Could not able to execute $query. " . mysqli_error($koneksi);
					}
		
		
echo "1 Record Added!";}
	}
	?>
<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST['number']))
{
    // get values
    $id = $_POST['id'];
    $number = $_POST['number'];
 
	$number = $_POST['number'];
$cekdulu= "select * from ring_all where number='$_POST[number]' and status = '1'"; //username dan $_POST[un] diganti sesuai dengan yang kalian gunakan

// $cek_ring3= mysql_query("select * from ring_tiga where number='$_POST[number]'");
// $cek_ring4= mysql_query("select * from ring_empat where number='$_POST[number]'");
$prosescek= mysql_query($cekdulu);
if (mysql_num_rows($prosescek)>0) { //proses mengingatkan data sudah ada
    // echo "<script>alert('Username Sudah Digunakan');history.go(-1) </script>";
    // if (mysql_num_rows($cek_ring1)>0) {
    //     echo "number berada di ring satu";
    // }else if (mysql_num_rows($cek_ring2)>0){
    //     echo "number berada di ring dua";
	 while ( $hasilcek = mysql_fetch_array($prosescek) ) {
    // }else{
	echo "Peserta Sedang berada di ".$hasilcek['ring']."...";}
    // }
}
else{
    // Updaste User details
    $query = "UPDATE ring_all SET number = '$number' WHERE id = '$id'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
echo "1 Record Update!";}
}
?>
<?php

session_start();
$username = $_SESSION['user'];
$isLoggedIn = $_SESSION['isLoggedIn'];
 
if($isLoggedIn != '1'){
    session_destroy();
    header('Location: login.php');
}?>

<table class="table table-bordered table-striped">
					<tr>
							<th>No.</th>
							<th>Tanggal Input</th>
							<th>Number</th>
							<th>Point</th>
						
							
						</tr>
						<?php

	// include Database connection file 
	include("db_connection.php");

	// Design initial table header 
	 $data = $koneksi->query("select * from scratch_code where username = '$username'");
	 
	 $no = 1; // nomor urut
    while ($dt = $data->fetch_assoc()) :


	
			?> 
			
				<tr>
					<td><?php echo $no++;?></td>
					<td><?php echo $dt['Tanggal'];?></td>
					<td><?php echo $dt['kode'];?></td>
					<td><?php echo $dt['point'];?></td>
					
					
				</tr>
			
					
    		<?php
		
    	
	
    
   endwhile;

  
?></table>	
<?php
$qry = "SELECT SUM(point) AS count 
        FROM scratch_code where username = '$username'";

$res = $koneksi->query($qry);

$total = 0;
$rec = $res->fetch_assoc();
$total = $rec['count'];

echo "Total: " . $total . "\n Point" ;
   ?>








<?php
//get data dari form
$id           = $_POST['id'];
$name 		  = $_POST['name'];
$domisili       = $_POST['domisili'];
$email       = $_POST['email'];
$phone       = $_POST['phone'];
$pass		 = $_POST['pass'];

?>

<?php
$servername = "localhost";
// $username = "n1609672_member";
$username = "root";
// $password = "Z5i1ec(6hMa4";
$password = "";
$dbname = "n1609672_ppcmember";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO members (member_id, name,domisili,email,phone)
VALUES ('$id', '$name', '$domisili','$email','$phone');";
$sql .= "INSERT INTO user (user_id, user, password)
VALUES ('', '$email', 'b32a93e6d7dde643593b4238f05c27b3');";

if ($conn->multi_query($sql) === TRUE) {
  echo "New records created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
 header("location: index.html");
?>

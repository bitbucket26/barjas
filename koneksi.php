
<?php 
$servername = "localhost";
$database = "barjas";
$username = "root";
$password = "";
$koneksi = mysqli_connect("localhost","root","","barjas");
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>
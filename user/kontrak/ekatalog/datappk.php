<?php 
include "../../../koneksi.php";

$namappk = $_POST['namappk'];
$query = mysqli_query($koneksi,"select * from ppk where namappk= '$namappk'");
$data = mysqli_fetch_array($query);
echo json_encode ($data);

?>

<?php 
include "../../koneksi.php";

$namapejabatpemeriksa = $_POST['namapejabatpemeriksa'];
$query = mysqli_query($koneksi,"select * from pemeriksa2 where namapejabatpemeriksa= '$namapejabatpemeriksa'");
$data = mysqli_fetch_array($query);
echo json_encode ($data);

?>

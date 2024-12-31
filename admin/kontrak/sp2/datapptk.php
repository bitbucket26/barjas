<?php 
include "../../koneksi.php";

$pekerjaan = $_POST['pekerjaan'];
$query = mysqli_query($koneksi,"select * from pptk where pekerjaan= '$pekerjaan'");
$data = mysqli_fetch_array($query);
echo json_encode ($data);

?>

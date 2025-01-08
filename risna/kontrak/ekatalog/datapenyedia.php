<?php 
include "../../../koneksi.php";

$namaperusahaan = $_POST['namaperusahaan'];
$query = mysqli_query($koneksi,"select * from penyedia where namaperusahaan= '$namaperusahaan'");
$data = mysqli_fetch_array($query);
echo json_encode ($data);

?>

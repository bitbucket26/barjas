<?php 
include "../../koneksi.php";

$namapejabatbarjas = $_POST['namapejabatbarjas'];
$query = mysqli_query($koneksi,"select * from pejabat where namapejabatbarjas= '$namapejabatbarjas'");
$data = mysqli_fetch_array($query);
echo json_encode ($data);

?>

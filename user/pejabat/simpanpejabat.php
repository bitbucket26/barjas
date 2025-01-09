<?php
// <!-- tampilkan data dari database -->
include "../../koneksi.php";

// Check connection
if (mysqli_connect_error()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
// menangkap data yang di kirim dari form 
  $id = $_POST['id'];
  $namapejabatbarjas   = $_POST['namapejabatbarjas'];
  $nippejabatbarjas   = $_POST['nippejabatbarjas'];
  $nomorskpejabatbarjas  = $_POST['nomorskpejabatbarjas'];
  $tglskpejabatbarjas   = $_POST['tglskpejabatbarjas'];
  $jabatanpejabatbarjas   = $_POST['jabatanpejabatbarjas'];

 


  $sql_admin = "INSERT INTO pejabat VALUES(
                                      '$id',
                                      '$namapejabatbarjas',
                                      '$nippejabatbarjas',
                                      '$nomorskpejabatbarjas',
                                      '$tglskpejabatbarjas',
                                      '$jabatanpejabatbarjas')";

  mysqli_query($koneksi, $sql_admin);

  header ("location: pejabat.php");
  
?>
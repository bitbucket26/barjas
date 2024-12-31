<?php
// <!-- tampilkan data dari database -->
include "../../koneksi.php";

// Check connection
if (mysqli_connect_error()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
// menangkap data yang di kirim dari form 
  $id = $_POST['id'];
  $namapejabatpemeriksa   = $_POST['namapejabatpemeriksa'];
  $nippejabatpemeriksa   = $_POST['nippejabatpemeriksa'];
  $nomorskpejabatpemeriksa   = $_POST['nomorskpejabatpemeriksa'];
  $tglskpejabatpemeriksa   = $_POST['tglskpejabatpemeriksa'];
  // $jabatanpejabatpemeriksa   = $_POST['jabatanpejabatpemeriksa'];

 


  $sql_admin = "INSERT INTO pemeriksa VALUES(
                                      '$id',
                                      '$namapejabatpemeriksa',
                                      '$nippejabatpemeriksa',
                                      '$nomorskpejabatpemeriksa',
                                      '$tglskpejabatpemeriksa')";

  mysqli_query($koneksi, $sql_admin);

  header ("location: pemeriksa.php");
  
?>
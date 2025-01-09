<?php
// <!-- tampilkan data dari database -->
include "../../koneksi.php";

// Check connection
if (mysqli_connect_error()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
// menangkap data yang di kirim dari form 
  $id = $_POST['id'];
  $namappk   = $_POST['namappk'];
  $nipppk   = $_POST['nipppk'];
  $nomorskppk  = $_POST['nomorskppk'];
  $tglskppk   = $_POST['tglskppk'];
  $jabatanppk   = $_POST['jabatanppk'];

 


  $sql_admin = "INSERT INTO ppk VALUES(
                                      '$id',
                                      '$namappk',
                                      '$nipppk',
                                      '$nomorskppk',
                                      '$tglskppk',
                                      '$jabatanppk')";

  mysqli_query($koneksi, $sql_admin);

  header ("location: ppk.php");
  
?>
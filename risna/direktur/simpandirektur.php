<?php
// <!-- tampilkan data dari database -->
include "../../koneksi.php";

// Check connection
if (mysqli_connect_error()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
// menangkap data yang di kirim dari form 
  $id = $_POST['id'];
  $namadirektur   = $_POST['namadirektur'];
  $nipdirektur   = $_POST['nipdirektur'];
  $nomorskdirektur  = $_POST['nomorskdirektur'];
  $tglskdirektur   = $_POST['tglskdirektur'];
  $jabatandirektur   = $_POST['jabatandirektur'];

 


  $sql_admin = "INSERT INTO direktur VALUES(
                                      '$id',
                                      '$namadirektur',
                                      '$nipdirektur',
                                      '$nomorskdirektur',
                                      '$tglskdirektur',
                                      '$jabatandirektur')";

  mysqli_query($koneksi, $sql_admin);

  header ("location: direktur.php");
  
?>
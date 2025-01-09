<?php
// <!-- tampilkan data dari database -->
include "../../koneksi.php";

// Check connection
if (mysqli_connect_error()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
// menangkap data yang di kirim dari form 
  $id = $_POST['id'];
  $namaperusahaan = $_POST['namaperusahaan'];
  $alamat = $_POST['alamat'];
  $kota = $_POST['kota'];
  $namapimpinan   = $_POST['namapimpinan'];
  $jabatan   = $_POST['jabatan'];
  $npwp   = $_POST['npwp'];
  $norekening   = $_POST['norekening'];
  $namabank   = $_POST['namabank'];
  $namarekbank   = $_POST['namarekbank'];
  $kop   = $_POST['kop'];
 


  $sql_admin = "INSERT INTO penyedia VALUES(
                                      '$id',
                                      '$namaperusahaan',
                                      '$alamat',
                                      '$kota',
                                      '$namapimpinan',
                                      '$jabatan',
                                      '$npwp',
                                      '$norekening',
                                      '$namabank',
                                      '$namarekbank',
                                      '$kop')";

  mysqli_query($koneksi, $sql_admin);

  header ("location: penyedia.php");
  
?>
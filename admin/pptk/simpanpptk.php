<?php
// <!-- tampilkan data dari database -->
include "../../koneksi.php";

// Check connection
if (mysqli_connect_error()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
// menangkap data yang di kirim dari form 
  $id = $_POST['id'];
  $pekerjaan = $_POST['pekerjaan'];
  $koderekeningkegiatan = $_POST['koderekeningkegiatan'];
  $noreksubkegiatan = $_POST['noreksubkegiatan'];
  $namapptk   = $_POST['namapptk'];
  $nippptk   = $_POST['nippptk'];
  $kegiatan   = $_POST['kegiatan'];
  $subkegiatan   = $_POST['subkegiatan'];
  $namarekening   = $_POST['namarekening'];
  $nomorskpptk   = $_POST['nomorskpptk'];
  $tglskpptk   = $_POST['tglskpptk'];
  $jabatanpptk   = $_POST['jabatanpptk'];
  $nomordpa   = $_POST['nomordpa'];
  $tgldpa   = $_POST['tgldpa'];

 


  $sql = "INSERT INTO pptk VALUES(
                                      '$id',
                                      '$pekerjaan',
                                      '$koderekeningkegiatan',
                                      '$noreksubkegiatan',
                                      '$namapptk',
                                      '$nippptk',
                                      '$kegiatan',
                                      '$subkegiatan',
                                      '$namarekening',
                                      '$nomorskpptk',
                                      '$tglskpptk',
                                      '$jabatanpptk',
                                      '$nomordpa',
                                      '$tgldpa')";

  mysqli_query($koneksi, $sql);

  header ("location: pptk.php");
  
?>
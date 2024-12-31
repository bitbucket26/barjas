
<?php 
include "../../koneksi.php";


  $id = $_POST['id'];
  $no = $_POST['no'];
  $namaproduk = $_POST['namaproduk'];
  $satuan = $_POST['satuan'];
  $volumehps = $_POST['volumehps'];
  $hargasatuanhps   = $_POST['hargasatuanhps'];
  $jumlahhps   = $_POST['jumlahhps'];
  $volumenego = $_POST['volumenego'];
  $hargasatuannego   = $_POST['hargasatuannego'];
  $jumlahnego   = $_POST['jumlahnego'];
 
  $sql = "INSERT INTO barangekatalog VALUES(
                                                                            '$id',
                                                                            '$no',
                                                                            '$namaproduk',
                                                                            '$satuan',
                                                                            '$volumehps',
                                                                            '$hargasatuanhps',
                                                                            '$jumlahhps',
                                                                            '$volumenego',
                                                                            '$hargasatuannego',
                                                                            '$jumlahnego')";

mysqli_query($koneksi, $sql);
// header ("location: inputbarang4.php");
?>
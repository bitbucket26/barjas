<?php
include "../../koneksi.php";
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}


$id = $_GET['id'];
$namaperusahaan = $_GET['namaperusahaan'];
$alamat = $_GET['alamat'];
$kota = $_GET['kota'];
$namapimpinan   = $_GET['namapimpinan'];
$jabatan   = $_GET['jabatan'];
$npwp   = $_GET['npwp'];
$norekening   = $_GET['norekening'];
$namabank   = $_GET['namabank'];
$namarekbank   = $_GET['namarekbank'];


//query update
mysqli_query($koneksi, "UPDATE penyedia 
                                SET namaperusahaan='$namaperusahaan', 
                                alamat='$alamat', 
                                kota='$kota', 
                                namapimpinan='$namapimpinan', 
                                jabatan='$jabatan', 
                                npwp='$npwp', 
                                norekening='$norekening', 
                                namabank='$namabank', 
                                namarekbank='$namarekbank'
                                 WHERE id='$id' ");

// mengalihkan halaman kembali ke index.php
header("location: penyedia.php");
?>
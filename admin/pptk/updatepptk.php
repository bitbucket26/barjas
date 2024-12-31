<?php
include "../../koneksi.php";
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}


$id = $_GET['id'];
$pekerjaan = $_GET['pekerjaan'];
$koderekeningkegiatan = $_GET['koderekeningkegiatan'];
$noreksubkegiatan = $_GET['noreksubkegiatan'];
$namapptk   = $_GET['namapptk'];
$nippptk   = $_GET['nippptk'];
$kegiatan   = $_GET['kegiatan'];
$subkegiatan   = $_GET['subkegiatan'];
$namarekening   = $_GET['namarekening'];
$nomorskpptk   = $_GET['nomorskpptk'];
$tglskpptk   = $_GET['tglskpptk'];
$jabatanpptk   = $_GET['jabatanpptk'];
$nomordpa   = $_GET['nomordpa'];
$tgldpa   = $_GET['tgldpa'];

//query update
mysqli_query($koneksi, "UPDATE pptk 
                                SET pekerjaan='$pekerjaan', 
                                koderekeningkegiatan='$koderekeningkegiatan', 
                                noreksubkegiatan='$noreksubkegiatan', 
                                namapptk='$namapptk', 
                                nippptk='$nippptk', 
                                kegiatan='$kegiatan', 
                                subkegiatan='$subkegiatan', 
                                namarekening='$namarekening', 
                                nomorskpptk='$nomorskpptk',
                                tglskpptk='$tglskpptk',
                                jabatanpptk='$jabatanpptk',
                                nomordpa='$nomordpa',
                                tgldpa='$tgldpa'
                                 WHERE id='$id' ");

// mengalihkan halaman kembali ke index.php
header("location:pptk.php");
?>
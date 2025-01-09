<?php
include "../../koneksi.php";
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}


    $id = $_GET['id'];
    $namapejabatbarjas   = $_GET['namapejabatbarjas'];
    $nippejabatbarjas   = $_GET['nippejabatbarjas'];
    $nomorskpejabatbarjas   = $_GET['nomorskpejabatbarjas'];
    $tglskpejabatbarjas   = $_GET['tglskpejabatbarjas'];
    $jabatanpejabatbarjas   = $_GET['jabatanpejabatbarjas'];


//query update
mysqli_query($koneksi, "UPDATE pejabat 
                                SET namapejabatbarjas='$namapejabatbarjas', 
                                nippejabatbarjas='$nippejabatbarjas', 
                                nomorskpejabatbarjas='$nomorskpejabatbarjas',
                                tglskpejabatbarjas='$tglskpejabatbarjas',
                                jabatanpejabatbarjas='$jabatanpejabatbarjas'
                                 WHERE id='$id' ");

// mengalihkan halaman kembali ke index.php
header("location:pejabat.php");
?>
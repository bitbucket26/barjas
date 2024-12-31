<?php
include "../../koneksi.php";
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}


    $id = $_GET['id'];
    $namapejabatpemeriksa   = $_GET['namapejabatpemeriksa'];
    $nippejabatpemeriksa   = $_GET['nippejabatpemeriksa'];
    $nomorskpejabatpemeriksa   = $_GET['nomorskpejabatpemeriksa'];
    $tglskpejabatpemeriksa   = $_GET['tglskpejabatpemeriksa'];
    $jabatanpejabatpemeriksa   = $_GET['jabatanpejabatpemeriksa'];


//query update
mysqli_query($koneksi, "UPDATE pemeriksa2 
                                SET namapejabatpemeriksa='$namapejabatpemeriksa', 
                                nippejabatpemeriksa='$nippejabatpemeriksa', 
                                nomorskpejabatpemeriksa='$nomorskpejabatpemeriksa',
                                tglskpejabatpemeriksa='$tglskpejabatpemeriksa'
                                -- jabatanpejabatpemeriksa='$jabatanpejabatpemeriksa'
                                 WHERE id='$id' ");

// mengalihkan halaman kembali ke index.php
header("location:pemeriksa2.php");
?>
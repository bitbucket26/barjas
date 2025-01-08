<?php
include "../../koneksi.php";
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}


    $id = $_GET['id'];
    $namappk   = $_GET['namappk'];
    $nipppk   = $_GET['nipppk'];
    $nomorskppk   = $_GET['nomorskppk'];
    $tglskppk   = $_GET['tglskppk'];
    $jabatanppk   = $_GET['jabatanppk'];


//query update
mysqli_query($koneksi, "UPDATE ppk 
                                SET namappk='$namappk', 
                                nipppk='$nipppk', 
                                nomorskppk='$nomorskppk',
                                tglskppk='$tglskppk',
                                jabatanppk='$jabatanppk'
                                 WHERE id='$id' ");

// mengalihkan halaman kembali ke index.php
header("location:ppk.php");
?>
<?php
include "../../koneksi.php";
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}


    $id = $_GET['id'];
    $namadirektur   = $_GET['namadirektur'];
    $nipdirektur   = $_GET['nipdirektur'];
    $nomorskdirektur   = $_GET['nomorskdirektur'];
    $tglskdirektur   = $_GET['tglskdirektur'];
    $jabatandirektur   = $_GET['jabatandirektur'];


//query update
mysqli_query($koneksi, "UPDATE direktur 
                                SET namadirektur='$namadirektur', 
                                nipdirektur='$nipdirektur', 
                                nomorskdirektur='$nomorskdirektur',
                                tglskdirektur='$tglskdirektur',
                                jabatandirektur='$jabatandirektur'
                                 WHERE id='$id' ");

// mengalihkan halaman kembali ke index.php
header("location:direktur.php");
?>
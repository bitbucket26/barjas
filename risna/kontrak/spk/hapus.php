<?php 
include "../../../koneksi.php";
if (mysqli_connect_error()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

    if(isset($_GET['id'])){
    mysqli_query($koneksi, "delete from kontrak where id='$_GET[id]'")
                                      or die(mysqli_error($koneksi));

    mysqli_query($koneksi, "delete from barang where id='$_GET[id]'")
                                      or die(mysqli_error($koneksi));
                                      
    echo "<p><b> Data Berhasil Dihapus </b></p>";
    echo "<meta http-equiv=refresh-content=2;URL='index.php'>";
    header("location:spk.php");
    }
?>

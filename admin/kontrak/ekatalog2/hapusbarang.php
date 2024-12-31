<?php 
include "../../koneksi.php";
if (mysqli_connect_error()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
    $id = $_POST['id'];
    $no = $_POST['no'];
    mysqli_query($koneksi,"delete from barangekatalog where id='$id' and no='$no'"); 
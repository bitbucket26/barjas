<?php
// <!-- tampilkan data dari database -->
include "koneksi.php";

// Check connection
if (mysqli_connect_error()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
// menangkap data yang di kirim dari form 
  $iduser = $_POST['iduser'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $name = $_POST['name'];
  $role   = $_POST['role'];

 


  $sql = "INSERT INTO users VALUES(
                                      '$iduser',
                                      '$username',
                                      '$password',
                                      '$name',
                                      '$role'
                                      ')";

  mysqli_query($koneksi, $sql);

  header ("location: index.php");
  
?>
<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'koneksi.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];

 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from users where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['role']=="admin"){
		session_start();
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:admin/dashboard.php");
 
	// cek jika user login sebagai pegawai
	}else if($data['role']=="user1"){
		session_start();
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "user1";
		// alihkan ke halaman dashboard pegawai
		header("location:hanik/dashboard.php");

	// cek jika user login sebagai pegawai
	}else if($data['role']=="user2"){
		session_start();
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "user2";
		// alihkan ke halaman dashboard pegawai
		header("location:risna/dashboard.php");
 
	// cek jika user login sebagai pengurus
	}else if($data['role']=="vendor"){
		session_start();
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "vendor";
		// alihkan ke halaman dashboard pengurus
		header("location:perusahaan/dashboard.php");

	}else{
 
		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}	
}else{
	header("location:index.php?pesan=gagal");
}
 
?>
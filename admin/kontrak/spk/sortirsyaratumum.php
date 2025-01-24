<?php 
                                    include "../../../koneksi.php";
                                        
                                    if (mysqli_connect_error()){
                                        echo "Koneksi database gagal : " . mysqli_connect_error();
                                    }
                                        // $id = $_GET['id'];
                                        $sql=mysqli_query($koneksi, "SELECT * FROM kontrak WHERE id='$_GET[id]'");
                                        $e=mysqli_fetch_array($sql);


                                    if($e['nilaitotalnego']>200000000){
                                        header('location:cetak/suspk+.php?id=' .$e['id']);
                                    } else {
                                        header('location:cetak/suspk-.php?id=' .$e['id']);
                                    }	
                                ?>
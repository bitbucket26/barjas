<?php

                                    include "koneksi.php";

                                    // Check connection
                                    if (mysqli_connect_error()){
                                        echo "Koneksi database gagal : " . mysqli_connect_error();
                                    }

                                    $sql = mysqli_query($koneksi, "select max(iduser) as maxID from users");
                                    $data = mysqli_fetch_array($sql) or die( mysqli_error($data));
                                    $kode = $data['maxID'];
                                    $kode++;
                                    $ket = "";
                                    $kodeauto = $ket . sprintf("%01s", $kode)
                                    ?>
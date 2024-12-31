<?php

                                    include "../../../koneksi.php";

                                    // Check connection
                                    if (mysqli_connect_error()){
                                        echo "Koneksi database gagal : " . mysqli_connect_error();
                                    }

                                    $sql = mysqli_query($koneksi, "select max(no) as maxID from barangekatalog");
                                    $data = mysqli_fetch_array($sql) or die( mysqli_error($data));
                                    $kode = $data['maxID'];
                                    $kode++;
                                    $ket = "";
                                    $kodeautono = $ket . sprintf("%1s", $kode)
                                    ?>
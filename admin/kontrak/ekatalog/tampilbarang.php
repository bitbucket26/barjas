<!-- <div class="tampil_data" id="tampil_data"> -->
<?php 
                include "../../../koneksi.php";
                            if(isset($_GET['id'])) {
                                    $row = mysqli_real_escape_string($koneksi, $_GET['id']);

                            }
                    ?>
<table class="table table-hover barang">
                                <tr>
                                            <th class="text-center" hidden>ID</th>
                                            <th class="text-center" hidden>No</th>
                                            <th class="text-center">No</th>
                                            <th class="text-start">Nama Produk</th>
                                            <th class="text-center">Satuan</th>
                                            <th class="text-center">Volume HPS</th>
                                            <th class="text-center">Harga Satuan HPS</th>
                                            <th class="text-center">Jumlah HPS</th>
                                            <th class="text-center">Volume Nego</th>
                                            <th class="text-center">Harga Satuan Nego</th>
                                            <th class="text-center">Jumlah Nego</th>
                                            <th class="text-center">AKsi</th>
                                </tr>
                                <?php
                                $no=1;
                                 $data = mysqli_query($koneksi,"select * from barang where id='$_GET[id]'");
                                 while($d = mysqli_fetch_array($data)){
                                ?>
                                <tr>
                                    <td class="text-center" hidden><?php echo $d['id']; ?></td>
                                    <td class="text-center" hidden><?php echo $d['no']; ?></td>
                                    <td class="text-center"><?php echo $no++; ?></td>
                                    <td class="text-uppercase"><?php echo $d['namaproduk']; ?></td>
                                    <td class="text-center text-uppercase"><?php echo $d['satuan'] ?></td>
                                    <td class="text-center"><?php echo $d['volumehps'] ?></td>
                                    <td class="text-center"><?php echo number_format($d['hargasatuanhps'],2) ?></td>
                                    <td class="text-center"><?php echo number_format($d['jumlahhps']) ?></td>
                                    <td class="text-center"><?php echo $d['volumenego'] ?></td>
                                    <td class="text-center"><?php echo number_format($d['hargasatuannego'],2) ?></td>
                                    <td class="text-center"><?php echo number_format($d['jumlahnego']) ?></td>
                                    <td>
                                    <button id="<?php echo $d['id']; ?>" data-no="<?php echo $d['no']; ?>" class="btn btn-danger btn-sm hapus_data"><i class="fa fa-trash"></i></button>
                                 </td>
                                </tr>
                                
                                <?php 
                                } 
                                ?>
                            </table>
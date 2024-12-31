<!-- <div class="tampil_data" id="tampil_data"> -->
<?php 
                include "../../koneksi.php";
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
                                 $data = mysqli_query($koneksi,"select * from barangspk where id='$_GET[id]'");
                                 while($d = mysqli_fetch_array($data)){
                                ?>
                                <t
                                    <td class="text-center" hidden><?php echo $d['id']; ?></td>
                                    <td class="text-center" hidden><?php echo $d['no']; ?></td>
                                    <td class="text-center"><?php echo $no++; ?></td>
                                    <td class="text-uppercase"><?php echo $d['namaproduk']; ?></td>
                                    <td class="text-center text-uppercase"><?php echo $d['satuan'] ?></td>
                                    <td class="text-center"><?php echo $d['volumehps'] ?></td>
                                    <td class="text-end"><?php echo number_format($d['hargasatuanhps']) ?></td>
                                    <td class="text-end"><?php echo number_format($d['jumlahhps']) ?></td>
                                    <td class="text-center"><?php echo $d['volumenego'] ?></td>
                                    <td class="text-end"><?php echo number_format($d['hargasatuannego']) ?></td>
                                    <td class="text-end"><?php echo number_format($d['jumlahnego']) ?></td>
                                    <td>
                                    <button id="<?php echo $d['id']; ?>" data-no="<?php echo $d['no']; ?>" class="btn btn-danger btn-sm hapus_data"><i class="fa fa-trash"></i></button>
                                 </td>
                                </tr>
                                
                                <?php 
                                } 
                                ?>
                                <!-- <?php
                                    include "../../koneksi.php";
 
                                    // Check connection
                                    if (mysqli_connect_error()){
                                        echo "Koneksi database gagal : " . mysqli_connect_error();
                                    }
                                    $id = $_GET['id']; 
                                    // $jumlahhps = $_GET['jumlahhps']; 

                                    $query = mysqli_query($koneksi,"SELECT sum(jumlahhps) as total from barangspk where (id)= '$id'");
                                    $rows = $query->fetch_array();
                                    $totalhps[] = $rows['total'];

                                    $querys = mysqli_query($koneksi,"SELECT sum(jumlahnego) as totaly from barangspk where (id)= '$id'");
                                    $rowss = $querys->fetch_array();
                                    $totalnego[] = $rowss['totaly'];
                                    
                                ?>
                                <tfoot>
                                    <tr>
                                        <td colspan="5" >Jumlah</td>
                                        <td id="ttlhps" class="fw-bold text-end"><?php echo number_format($totalhps[0]);?></td>
                                        <td colspan="2" ></td>
                                        <td colspan="3" id="ttlnego" class="fw-bold text-end"><?php echo number_format($totalnego[0]);?></td>

                                    </tr>
                                </tfoot> -->
                            </table>
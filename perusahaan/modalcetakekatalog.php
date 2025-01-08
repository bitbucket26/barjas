

<!-- Modal Edit Mahasiswa-->
<div class="modal fade" id="modalcetak<?php echo $d['id']; ?>" role="dialog">
                                            <div class="modal-dialog">

                                            <!-- Modal content -->
                                            <div class="modal-content" style="border-radius: 30px;">
                                            <div class="modal-header">
                                            <h4 class="modal-title">Pilih dokumen yang ingin dicetak E-katalog !</h4>
                                            <button type="button" class="btn btn-close btn-danger btn-sm" data-bs-dismiss="modal" aria-label="Close">
                                                <i class="bi bi-x-lg"></i>
                                            </button>
                                            </div>
                                            <div class="modal-body" style="font-size: 15px;">
                                                    <?php
                                                        include '../koneksi.php';
                                                        // $id = $d['id']; 
                                                        $query_edit = mysqli_query($koneksi,"SELECT * FROM kontrak WHERE id='$_GET[id]'");
                                                        while ($row = mysqli_fetch_array($query_edit)) {
                                                    ?>
                                            
                                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                                                        
                                                        <a class="dropdown-item" href="cetakekatalog/cover.php?id=<?php echo $d['id']; ?>" target="_blank">21. Cover</a>
                                                        <a class="dropdown-item" href="cetakekatalog/undanganpt.php?id=<?php echo $d['id']; ?>" target="_blank">22. Undangan PT</a>
                                                        <a class="dropdown-item" href="sortirundanganppk.php?id=<?php echo $d['id']; ?>" target="_blank">23. Undangan PPK</a>
                                                        <a class="dropdown-item" href="sortirbaphp.php?id=<?php echo $d['id']; ?>" target="_blank">24. BAPHP</a>
                                                        <a class="dropdown-item" href="cetakekatalog/bastb.php?id=<?php echo $d['id']; ?>" target="_blank">25. BASTB</a>
                                                        <a class="dropdown-item" href="cetakekatalog/ppembayaran.php?id=<?php echo $d['id']; ?>" target="_blank">26. Pembayaran</a>
                                                        <a class="dropdown-item" href="cetakekatalog/bap.php?id=<?php echo $d['id']; ?>" target="_blank">27. BAP (3 rangkap, Materai silang)</a>
                                                        <a class="dropdown-item" href="cetakekatalog/sptjm.php?id=<?php echo $d['id']; ?>" target="_blank">28. SPTJM</a>
                                                        <a class="dropdown-item" href="cetakekatalog/ringkasan.php?id=<?php echo $d['id']; ?>" target="_blank">29. Ringkasan</a>
                                                        <a class="dropdown-item" href="cetakekatalog/kwitansi.php?id=<?php echo $d['id']; ?>" target="_blank">30. Kwitansi (2 rangkap, Materai penyedia)</a>
                                                <!-- </ul> -->
                                                    
                                                    </div>

                                            <?php 
                                                }
                                            ?> 
                                                       
        </div>
    </div>
    </div>
</div>
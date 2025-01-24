

<!-- Modal Edit Mahasiswa-->
<div class="modal fade" id="modalcetak<?php echo $d['id']; ?>" role="dialog">
                                            <div class="modal-dialog">

                                            <!-- Modal content -->
                                            <div class="modal-content" style="border-radius: 30px;">
                                            <div class="modal-header">
                                            <h4 class="modal-title">Pilih dokumen yang ingin dicetak !</h4>
                                            <button type="button" class="btn btn-close btn-danger btn-sm" data-bs-dismiss="modal" aria-label="Close">
                                                <i class="bi bi-x-lg"></i>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                    <?php
                                                        include '../../../koneksi.php';
                                                        $id = $d['id']; 
                                                        $query_edit = mysqli_query($koneksi,"SELECT * FROM kontrak WHERE id='$id'");
                                                        while ($row = mysqli_fetch_array($query_edit)) {
                                                    ?>
                                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                        <div class="modal-body text-start" style="font-size: 15px;">
                                                        <a class="dropdown-item" href="cetak/undanganpt.php?id=<?php echo $d['id']; ?>" target="_blank">1.  Undangan PT</a>
                                                        <a class="dropdown-item" href="sortirundanganppk.php?id=<?php echo $d['id']; ?>" target="_blank">2.  Undangan PPK</a>
                                                        <a class="dropdown-item" href="sortiropnamefisik.php?id=<?php echo $d['id']; ?>" target="_blank">3.  Opname Fisik </a>
                                                        <a class="dropdown-item" href="sortirbaphp.php?id=<?php echo $d['id']; ?>" target="_blank">4.  BAPHP</a>
                                                        <a class="dropdown-item" href="cetak/bastb.php?id=<?php echo $d['id']; ?>" target="_blank">5.  BASTB</a>
                                                        <a class="dropdown-item" href="cetak/ppembayaran.php?id=<?php echo $d['id']; ?>" target="_blank">6.  Permohonan Pembayaran</a>
                                                        <a class="dropdown-item" href="cetak/bap.php?id=<?php echo $d['id']; ?>" target="_blank">7.  BAP (3 rangkap, Materai silang)</a>
                                                        <a class="dropdown-item" href="cetak/sptjm.php?id=<?php echo $d['id']; ?>" target="_blank">8.  SPTJM</a>
                                                        <a class="dropdown-item" href="cetak/ringkasan.php?id=<?php echo $d['id']; ?>" target="_blank">9.  Ringkasan Kontrak</a>
                                                        <a class="dropdown-item" href="cetak/kwitansi.php?id=<?php echo $d['id']; ?>" target="_blank"> 10. Kwitansi (2 rangkap, Materai penyedia)</a>
                                                        <a class="dropdown-item" href="cetak/cover.php?id=<?php echo $d['id']; ?>" target="_blank">11.  Cover</a>
                                                    
                                                    </div>

                                            <?php 
                                                }
                                            ?> 
                                                       
        </div>
    </div>
    </div>
</div>
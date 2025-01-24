

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
                                            <div class="modal-body" style="font-size: 15px;">
                                                    <?php
                                                        include '../../../koneksi.php';
                                                        $id = $d['id']; 
                                                        $query_edit = mysqli_query($koneksi,"SELECT * FROM kontrak WHERE id='$id'");
                                                        while ($row = mysqli_fetch_array($query_edit)) {
                                                    ?>
                                            
                                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                                                        <!-- <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink"> -->
                                                        <a class="dropdown-item" href="cetak/permindasung.php?id=<?php echo $d['id']; ?>" target="_blank">1. Pengadaan Langsung</a>
                                                        <a class="dropdown-item" href="cetak/hps.php?id=<?php echo $d['id']; ?>" target="_blank">2. HPS</a>
                                                        <a class="dropdown-item" href="cetak/kuantitas.php?id=<?php echo $d['id']; ?>" target="_blank">3. Kuantitas</a>
                                                        <a class="dropdown-item" href="cetak/pakta.php?id=<?php echo $d['id']; ?>" target="_blank">4. Pakta Integritas</a>
                                                        <a class="dropdown-item" href="cetak/formkualifikasi.php?id=<?php echo $d['id']; ?>" target="_blank">5. Form Kualifikasi</a>
                                                        <a class="dropdown-item" href="cetak/penawaran.php?id=<?php echo $d['id']; ?>" target="_blank">6. Penawaran</a>
                                                        <a class="dropdown-item" href="cetak/undangan.php?id=<?php echo $d['id']; ?>" target="_blank">7. Undangan</a>
                                                        <a class="dropdown-item" href="cetak/pembukaan.php?id=<?php echo $d['id']; ?>" target="_blank">8. Pembukaan</a>
                                                        <a class="dropdown-item" href="cetak/lampevalpenawaran.php?id=<?php echo $d['id']; ?>" target="_blank">9. Lamp. Evaluasi Penawaran</a>
                                                        <a class="dropdown-item" href="cetak/lampbaklarnego.php?id=<?php echo $d['id']; ?>" target="_blank">10. Lampiran BA.Klarifikasi Nego </a>
                                                        <a class="dropdown-item" href="cetak/baevalpenawaran.php?id=<?php echo $d['id']; ?>" target="_blank">11. BA.Evaluasi Penawaran</a>
                                                        <a class="dropdown-item" href="cetak/baklarnego.php?id=<?php echo $d['id']; ?>" target="_blank">12. BA.Klarifiksi Nego</a>
                                                        <a class="dropdown-item" href="cetak/bahpl.php?id=<?php echo $d['id']; ?>" target="_blank">13. BAHPL</a>
                                                        <a class="dropdown-item" href="cetak/bapenpemenang.php?id=<?php echo $d['id']; ?>" target="_blank">14. BA. Pentapan Pemenang</a>
                                                        <a class="dropdown-item" href="cetak/pengumuman.php?id=<?php echo $d['id']; ?>" target="_blank">15. Pengumuman Penyedia</a>
                                                        <a class="dropdown-item" href="cetak/nota.php?id=<?php echo $d['id']; ?>" target="_blank">16. NOTA</a>
                                                        <a class="dropdown-item" href="cetak/sppbj.php?id=<?php echo $d['id']; ?>" target="_blank">17. SPPBJ</a>
                                                        <a class="dropdown-item" href="cetak/sp.php?id=<?php echo $d['id']; ?>" target="_blank">18. SP (Barang)</a>
                                                        <a class="dropdown-item" href="sortirspk.php?id=<?php echo $d['id']; ?>" target="_blank">19. SP/SPK (3 rangkap, Materai silang)</a>
                                                        <a class="dropdown-item" href="sortirsyaratumum.php?id=<?php echo $d['id']; ?>" target="_blank">20. Syarat Umum SP/SPKK</a>
                                                        <a class="dropdown-item" href="cetak/cover.php?id=<?php echo $d['id']; ?>" target="_blank">21. Cover</a>
                                                        <a class="dropdown-item" href="cetak/undanganpt.php?id=<?php echo $d['id']; ?>" target="_blank">22. Undangan PT</a>
                                                        <a class="dropdown-item" href="sortirundanganppk.php?id=<?php echo $d['id']; ?>" target="_blank">23. Undangan PPK</a>
                                                        <a class="dropdown-item" href="sortiropnamefisik.php?id=<?php echo $d['id']; ?>" target="_blank">24.  Opname Fisik</a>
                                                        <a class="dropdown-item" href="sortirbaphp.php?id=<?php echo $d['id']; ?>" target="_blank">25. BAPHP</a>
                                                        <a class="dropdown-item" href="cetak/bastb.php?id=<?php echo $d['id']; ?>" target="_blank">26. BASTB</a>
                                                        <a class="dropdown-item" href="cetak/ppembayaran.php?id=<?php echo $d['id']; ?>" target="_blank">27. Permohonan Pembayaran</a>
                                                        <a class="dropdown-item" href="cetak/bap.php?id=<?php echo $d['id']; ?>" target="_blank">28. BAP (3 rangkap, Materai silang)</a>
                                                        <a class="dropdown-item" href="cetak/sptjm.php?id=<?php echo $d['id']; ?>" target="_blank">29. SPTJM</a>
                                                        <a class="dropdown-item" href="cetak/ringkasan.php?id=<?php echo $d['id']; ?>" target="_blank">30. Ringkasan Kontrak</a>
                                                        <a class="dropdown-item" href="cetak/kwitansi.php?id=<?php echo $d['id']; ?>" target="_blank">31. Kwitansi (2 rangkap, Materai penyedia)</a>
                                                <!-- </ul> -->
                                                    
                                                    </div>

                                            <?php 
                                                }
                                            ?> 
                                                       
        </div>
    </div>
    </div>
</div>
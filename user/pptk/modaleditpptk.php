

<!-- Modal Edit Mahasiswa-->
<div class="modal fade" id="myModaleditpptk<?php echo $d['id']; ?>" role="dialog">
                                            <div class="modal-dialog modal-lg">

                                            <!-- Modal content -->
                                            <div class="modal-content" style="border-radius: 30px;">
                                            <div class="modal-header">
                                            <h4 class="modal-title">Edit PPTK</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">

                                    <form action="updatepptk.php" method="GET">
                                                    <?php
                                                        include '../../koneksi.php';
                                                        $id = $d['id']; 
                                                        $query_edit = mysqli_query($koneksi,"SELECT * FROM pptk WHERE id='$id'");
                                                        while ($row = mysqli_fetch_array($query_edit)) {
                                                    ?>
                                                    <div class="row g-2">
                                                        <div class="col-12">
                                                            <div class="form-floating">
                                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                                                                <div class="form-group">
                                                                    <label>Nama Pekerjaan</label>
                                                                    <input type="text" name="pekerjaan" class="form-control" value="<?php echo $row['pekerjaan']; ?>"  required>      
                                                                </div> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-2">
                                                        <div class="col-6">
                                                            <div class="form-floating">
                                                                <div class="form-group">
                                                                    <label>Nama</label>
                                                                    <input type="text" name="namapptk" class="form-control" value="<?php echo $row['namapptk']; ?>"  required>      
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-floating">
                                                                <div class="form-group">
                                                                    <div class="form-group">
                                                                        <label>NIP</label>
                                                                        <input type="text" name="nippptk" class="form-control" value="<?php echo $row['nippptk']; ?>"  required>      
                                                                    </div>      
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-2">
                                                        <div class="col-6">
                                                            <div class="form-floating">
                                                            <div class="form-group">
                                                                    <label>Kode Rekening</label>
                                                                    <input type="text" name="koderekeningkegiatan" class="form-control" value="<?php echo $row['koderekeningkegiatan']; ?>"  required>      
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-floating">
                                                                <div class="form-group">
                                                                    <label>No.Rekening Sub.Kegiatan</label>
                                                                    <input type="text" name="noreksubkegiatan" class="form-control" value="<?php echo $row['noreksubkegiatan']; ?>"  required>      
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-2">
                                                        <div class="col-6">
                                                            <div class="form-floating">
                                                                <div class="form-group">
                                                                    <label>Kegiatan</label>
                                                                    <input type="text" name="kegiatan" class="form-control" value="<?php echo $row['kegiatan']; ?>"  required>      
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-floating">
                                                                <div class="form-group">
                                                                    <label>Sub Kegiatan</label>
                                                                    <input type="text" name="subkegiatan" class="form-control" value="<?php echo $row['subkegiatan']; ?>"  required>      
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-2">
                                                        <div class="col-6">
                                                            <div class="form-floating">
                                                                <div class="form-group">
                                                                    <label>Nama Rekening</label>
                                                                    <input type="text" name="namarekening" class="form-control" value="<?php echo $row['namarekening']; ?>"  required>      
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-floating">
                                                                <div class="form-group">
                                                                    <label>Nomor SK</label>
                                                                    <input type="text" name="nomorskpptk" class="form-control" value="<?php echo $row['nomorskpptk']; ?>"  required>      
                                                                </div> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-2">
                                                        
                                                        <div class="col-8">
                                                            <div class="form-floating">
                                                                <div class="form-group">
                                                                    <label>Jabatan</label>
                                                                    <textarea type="text" name="jabatanpptk" class="form-control" required><?php echo $row['jabatanpptk']; ?></textarea>      
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-floating">
                                                                <div class="form-group">
                                                                    <label>Tanggal SK</label>
                                                                    <input type="date" name="tglskpptk" class="form-control" value="<?php echo $row['tglskpptk']; ?>"  required>      
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-2">
                                                        <div class="col-8">
                                                            <div class="form-floating">
                                                                <div class="form-group">
                                                                    <label>Nomor DPA</label>
                                                                    <textarea type="text" name="nomordpa" class="form-control" required><?php echo $row['nomordpa']; ?></textarea>     
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-floating">
                                                                <div class="form-group">
                                                                    <label>Tanggal DPA</label>
                                                                    <input type="date" name="tgldpa" value="<?php echo $row['tgldpa']; ?>" class="form-control" required>  
                                                                </div> 
                                                            </div>
                                                        </div>
                                                    </div>
                                            
                                            <div class="modal-footer">  
                                                <button type="submit" Onclick="alert('Data Berhasil Disimpan !')" class="btn btn-info">Simpan</button>
                                                <a href="hapus.php?id=<?php echo $d['id']; ?>" Onclick="alert('Data Berhasil Dihapus !')" class="btn btn-danger">Hapus</a>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                            </div>
                                            <?php 
                                                }
                                            ?> 
                                    </form>
                                                       
        </div>
    </div>

    </div>
</div>
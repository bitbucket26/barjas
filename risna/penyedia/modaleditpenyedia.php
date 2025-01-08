

<!-- Modal Edit Mahasiswa-->
<div class="modal fade" id="myModaledit<?php echo $d['id']; ?>" role="dialog">
                                            <div class="modal-dialog modal-lg">

                                            <!-- Modal content -->
                                            <div class="modal-content" style="border-radius: 30px;">
                                            <div class="modal-header">
                                            <h4 class="modal-title">Edit Penyedia</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">

                                    <form action="updatepenyedia.php" method="GET">
                                                    <?php
                                                        include '../../koneksi.php';
                                                        $id = $d['id']; 
                                                        $query_edit = mysqli_query($koneksi,"SELECT * FROM penyedia WHERE id='$id'");
                                                        while ($row = mysqli_fetch_array($query_edit)) {
                                                    ?>
                                            <div class="row g-2">
                                                <div class="col-md">
                                                    <div class="form-floating">
                                                    <div class="form-group">

                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                                                    <label>Nama Perusahaan</label>
                                                    <input type="text" name="namaperusahaan" class="form-control" value="<?php echo $row['namaperusahaan']; ?>" required>      
                                                    </div> 

                                                    <div class="form-group">
                                                    <label>Kota</label>
                                                    <input type="text" name="kota" class="form-control" value="<?php echo $row['kota']; ?>" required>      
                                                    </div> 

                                                    <div class="form-group">
                                                    <label>Nama Pimpinan</label>
                                                    <input type="text" name="namapimpinan" class="form-control" value="<?php echo $row['namapimpinan']; ?>" required>      
                                                    </div> 

                                                    <div class="form-group">
                                                    <label>Jabatan</label>
                                                    <input type="text" name="jabatan" class="form-control" value="<?php echo $row['jabatan']; ?>" required>      
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-floating">
                                                    <div class="form-group">
                                                    <label>NPWP</label>
                                                    <input type="text" name="npwp" class="form-control" value="<?php echo $row['npwp']; ?>" required>      
                                                    </div> 

                                                    <div class="form-group">
                                                    <label>Nomor Rekening</label>
                                                    <input type="text" name="norekening" class="form-control" value="<?php echo $row['norekening']; ?>" required>      
                                                    </div> 

                                                    <div class="form-group">
                                                    <label>Nama Bank</label>
                                                    <input type="text" name="namabank" class="form-control" value="<?php echo $row['namabank']; ?>" required>      
                                                    </div> 

                                                    <div class="form-group">
                                                    <label>Nama Rekening</label>
                                                    <input type="text" name="namarekbank" class="form-control" value="<?php echo $row['namarekbank']; ?>" required>      
                                                    </div> 
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="form-group">
                                                <label>Alamat Lengkap</label>
                                                <textarea type="text" name="alamat" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required><?php echo $row['alamat']; ?></textarea>  
                                            </div>

                                            <div class="modal-footer">  
                                                <button type="submit" class="btn btn-info">Simpan</button>
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


<!-- Modal Edit Mahasiswa-->
<div class="modal fade" id="myModaleditsp<?php echo $d['id']; ?>" role="dialog">
                                            <div class="modal-dialog">

                                            <!-- Modal content -->
                                            <div class="modal-content">
                                            <div class="modal-header">
                                            <h4 class="modal-title">Edit Penyedia</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">

                                    <form action="updatesp.php" method="GET">
                                                    <?php
                                                        include '../koneksi.php';
                                                        $id = $d['id']; 
                                                        $query_edit = mysqli_query($koneksi,"SELECT * FROM sp WHERE id='$id'");
                                                        while ($row = mysqli_fetch_array($query_edit)) {
                                                    ?>
                                            <div class="row g-2">
                                                <div class="col-md">
                                                    <div class="form-floating">

                                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                                                        <div class="form-group">
                                                        <label>Nama Pekerjaan</label>
                                                        <input type="text" name="pekerjaan" class="form-control" value="<?php echo $row['pekerjaan']; ?>"  required>      
                                                        </div> 

                                                        <div class="form-group">
                                                        <label>Kode Rekening</label>
                                                        <input type="text" name="koderekening" class="form-control" value="<?php echo $row['koderekening']; ?>"  required>      
                                                        </div> 

                                                        <div class="form-group">
                                                        <label>No.Rekening Sub.Kegiatan</label>
                                                        <input type="text" name="norekkegiatan" class="form-control" value="<?php echo $row['norekkegiatan']; ?>"  required>      
                                                        </div> 

                                                        <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>"  required>      
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-floating">
                                                        <div class="form-group">
                                                        <label>NIP</label>
                                                        <input type="text" name="nip" class="form-control" value="<?php echo $row['nip']; ?>"  required>      
                                                        </div> 

                                                        <div class="form-group">
                                                        <label>Kegiatan</label>
                                                        <input type="text" name="kegiatan" class="form-control" value="<?php echo $row['kegiatan']; ?>"  required>      
                                                        </div> 

                                                        <div class="form-group">
                                                        <label>Sub Kegiatan</label>
                                                        <input type="text" name="subkegiatan" class="form-control" value="<?php echo $row['subkegiatan']; ?>"  required>      
                                                        </div> 

                                                        <div class="form-group">
                                                        <label>Nama Rekening</label>
                                                        <input type="text" name="namarekening" class="form-control" value="<?php echo $row['namarekening']; ?>"  required>      
                                                        </div> 

                                                        <div class="form-group">
                                                        <label>Nomor SK</label>
                                                        <input type="text" name="nomorsk" class="form-control" value="<?php echo $row['nomorsk']; ?>"  required>      
                                                        </div> 

                                                    </div>
                                                </div>
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
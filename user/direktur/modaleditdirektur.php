

<!-- Modal Edit Mahasiswa-->
<div class="modal fade" id="myModaleditdirektur<?php echo $d['id']; ?>" role="dialog">
                                            <div class="modal-dialog">

                                            <!-- Modal content -->
                                            <div class="modal-content" style="border-radius: 30px;">
                                            <div class="modal-header">
                                            <h4 class="modal-title">Edit direktur</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body">
                                    <form action="updatedirektur.php" method="GET">
                                                    <?php
                                                        include '../../koneksi.php';
                                                        $id = $d['id']; 
                                                        $query_edit = mysqli_query($koneksi,"SELECT * FROM direktur WHERE id='$id'");
                                                        while ($row = mysqli_fetch_array($query_edit)) {
                                                    ?>
                                            
                                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                                                        <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" name="namadirektur" class="form-control" value="<?php echo $row['namadirektur']; ?>"  required>      
                                                        </div> 

                                                        <div class="form-group">
                                                        <label>NIP</label>
                                                        <input type="text" name="nipdirektur" class="form-control" value="<?php echo $row['nipdirektur']; ?>"  required>      
                                                        </div> 
  

                                                    <div class="row g-2">
                                                        <div class="col-7">
                                                            <div class="form-floating">
                                                                <div class="form-group">
                                                                    <label>Nomor SK</label>
                                                                    <input type="text" name="nomorskdirektur" class="form-control" value="<?php echo $row['nomorskdirektur']; ?>"  required>      
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-5">
                                                            <div class="form-floating">
                                                                <div class="form-group">
                                                                    <div class="form-group">
                                                                    <label>Tanggal SK</label>
                                                                    <input type="date" name="tglskdirektur" class="form-control" value="<?php echo $row['tglskdirektur']; ?>"  required>      
                                                                    </div>      
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                        <div class="form-group">
                                                        <label>Jabatan</label>
                                                        <textarea type="text" name="jabatandirektur" class="form-control"  required><?php echo $row['jabatandirektur']; ?></textarea>      
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
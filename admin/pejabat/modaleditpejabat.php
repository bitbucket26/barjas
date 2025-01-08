

<!-- Modal Edit Mahasiswa-->
<div class="modal fade" id="myModaleditpejabat<?php echo $d['id']; ?>" role="dialog">
                                            <div class="modal-dialog">

                                            <!-- Modal content -->
                                            <div class="modal-content" style="border-radius: 30px;">
                                            <div class="modal-header">
                                            <h4 class="modal-title">Edit Penyedia</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">

                                    <form action="updatepejabat.php" method="GET">
                                                    <?php
                                                        include '../../koneksi.php';
                                                        $id = $d['id']; 
                                                        $query_edit = mysqli_query($koneksi,"SELECT * FROM pejabat WHERE id='$id'");
                                                        while ($row = mysqli_fetch_array($query_edit)) {
                                                    ?>
                                            
                                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                                                        <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" name="namapejabatbarjas" class="form-control" value="<?php echo $row['namapejabatbarjas']; ?>"  required>      
                                                        </div> 

                                                        <div class="form-group">
                                                        <label>NIP</label>
                                                        <input type="text" name="nippejabatbarjas" class="form-control" value="<?php echo $row['nippejabatbarjas']; ?>"  required>      
                                                        </div> 
  
                                                        <div class="form-group">
                                                        <label>Nomor SK</label>
                                                        <input type="text" name="nomorskpejabatbarjas" class="form-control" value="<?php echo $row['nomorskpejabatbarjas']; ?>"  required>      
                                                        </div> 

                                                        <div class="form-group">
                                                        <label>Tanggal SK</label>
                                                        <input type="date" name="tglskpejabatbarjas" class="form-control" value="<?php echo $row['tglskpejabatbarjas']; ?>"  required>      
                                                        </div> 

                                                        <div class="form-group">
                                                        <label>Jabatan</label>
                                                        <textarea type="text" name="jabatanpejabatbarjas" class="form-control"  required><?php echo $row['jabatanpejabatbarjas']; ?></textarea>      
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
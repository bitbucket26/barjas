

<!-- Modal Edit Mahasiswa-->
<div class="modal fade" id="myModaleditpemeriksa2<?php echo $d['id']; ?>" role="dialog">
                                            <div class="modal-dialog">

                                            <!-- Modal content -->
                                            <div class="modal-content" style="border-radius: 30px;">
                                            <div class="modal-header">
                                            <h4 class="modal-title">Edit Pejabat Pemeriksa</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">

                                    <form action="updatepemeriksa2.php" method="GET">
                                                    <?php
                                                        include '../../koneksi.php';
                                                        $id = $d['id']; 
                                                        $query_edit = mysqli_query($koneksi,"SELECT * FROM pemeriksa2 WHERE id='$id'");
                                                        while ($row = mysqli_fetch_array($query_edit)) {
                                                    ?>
                                            
                                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                                                        <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" name="namapejabatpemeriksa" class="form-control" value="<?php echo $row['namapejabatpemeriksa']; ?>"  required>      
                                                        </div> 

                                                        <div class="form-group">
                                                        <label>NIP</label>
                                                        <input type="text" name="nippejabatpemeriksa" class="form-control" value="<?php echo $row['nippejabatpemeriksa']; ?>"  required>      
                                                        </div> 
  

                                                    <div class="row g-2">
                                                        <div class="col-7">
                                                            <div class="form-floating">
                                                                <div class="form-group">
                                                                <label>Nomor SK</label>
                                                                <input type="text" name="nomorskpejabatpemeriksa" class="form-control" value="<?php echo $row['nomorskpejabatpemeriksa']; ?>"  required>      
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-5">
                                                            <div class="form-floating">
                                                                <div class="form-group">
                                                                <label>Tanggal SK</label>
                                                                <input type="date" name="tglskpejabatpemeriksa" class="form-control" value="<?php echo $row['tglskpejabatpemeriksa']; ?>"  required>      
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                        <div class="form-group">
                                                              
                                                        </div> 

                                                        <div class="form-group">
                                                              
                                                        </div> 

                                                        <!-- <div class="form-group">
                                                        <label>Jabatan</label>
                                                        <textarea type="text" name="jabatanpejabatpemeriksa" class="form-control" required><?php echo $row['jabatanpejabatpemeriksa']; ?></textarea>      
                                                        </div>  -->


                                            
                                            <div class="modal-footer">  
                                                <button type="submit" class="btn btn-info">Simpan</button>
                                                <a href="hapus2.php?id=<?php echo $d['id']; ?>" class="btn btn-danger">Hapus</a>
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
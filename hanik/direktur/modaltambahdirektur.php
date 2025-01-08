
<!-- Modal Edit Mahasiswa-->
<div class="modal fade" id="myModaltambahdirektur" role="dialog">
                                            <div class="modal-dialog">

                                            <!-- Modal content -->
                                            <div class="modal-content">
                                            <div class="modal-header">
                                            <h4 class="modal-title">Tambah direktur</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">

                                    <form action="simpandirektur.php" method="POST">
                                    <?php
                                        include "../../koneksi.php";
                                        $sql = mysqli_query($koneksi, "select max(id) as maxID from direktur");
                                        $data = mysqli_fetch_array($sql) or die( mysqli_error($data));
                                        $kode = $data['maxID'];
                                        $kode++;
                                        $ket = "";
                                        $kodeauto = $ket . sprintf("%03s", $kode)
                                    ?>
                                            

                                                        <div class="form-group">
                                                        <label class="labeldata" >ID</label>
                                                        <input type="text" value="<?php echo $kodeauto;?>" name="id" class="form-control" id="id" readonly>
                                                        </div>

                                                        <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" name="namadirektur" class="form-control" required>      
                                                        </div> 

                                                        <div class="form-group">
                                                        <label>NIP</label>
                                                        <input type="text" name="nipdirektur" class="form-control" required>      
                                                        </div> 

                                                        <div class="form-group">
                                                        <label>Nomor SK</label>
                                                        <input type="text" name="nomorskdirektur" class="form-control" required>      
                                                        </div> 

                                                        <div class="form-group">
                                                        <label>Tanggal SK</label>
                                                        <input type="date" name="tglskdirektur" class="form-control" required>      
                                                        </div> 

                                                        <div class="form-group">
                                                        <label>Jabatan</label>
                                                        <textarea type="text" name="jabatandirektur" class="form-control" required></textarea>      
                                                        </div> 

                                            <div class="modal-footer">  
                                                <button type="submit" class="btn btn-info">Simpan</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                            </div>
                                    </form>
            </div>
        </div>
    </div>
</div>
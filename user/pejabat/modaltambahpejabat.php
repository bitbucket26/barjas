
<!-- Modal Edit Mahasiswa-->
<div class="modal fade" id="myModaltambahpejabat" role="dialog">
                                            <div class="modal-dialog">

                                            <!-- Modal content -->
                                            <div class="modal-content" style="border-radius: 30px;">
                                            <div class="modal-header">
                                            <h4 class="modal-title">Tambah Pejabat Pengadaan</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">

                                    <form action="simpanpejabat.php" method="POST">
                                    <?php
                                        include "../../koneksi.php";
                                        $sql = mysqli_query($koneksi, "select max(id) as maxID from pejabat");
                                        $data = mysqli_fetch_array($sql) or die( mysqli_error($data));
                                        $kode = $data['maxID'];
                                        $kode++;
                                        $ket = "";
                                        $kodeauto = $ket . sprintf("%03s", $kode)
                                    ?>
                                            

                                                        <!-- <div class="form-group">
                                                        <label class="labeldata" >ID</label> -->
                                                        <input type="text" value="<?php echo $kodeauto;?>" name="id" class="form-control" id="id" hidden>
                                                        <!-- </div> -->

                                                        <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" name="namapejabatbarjas" class="form-control" required>      
                                                        </div> 

                                                        <div class="form-group">
                                                        <label>NIP</label>
                                                        <input type="text" name="nippejabatbarjas" class="form-control" required>      
                                                        </div> 


                                                    <div class="row g-2">
                                                        <div class="col-6">
                                                            <div class="form-floating">
                                                                <div class="form-group">
                                                                    <label>Nomor SK</label>
                                                                    <input type="text" name="nomorskpejabatbarjas" class="form-control" required>      
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-floating">
                                                                <div class="form-group">
                                                                    <label>Tanggal SK</label>
                                                                    <input type="date" name="tglskpejabatbarjas" class="form-control" required>      
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                        <div class="form-group">
                                                        <label>Jabatan</label>
                                                        <textarea type="text" name="jabatanpejabatbarjas" class="form-control" required></textarea>      
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
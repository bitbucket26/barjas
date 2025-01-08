
<!-- Modal Edit Mahasiswa-->
<div class="modal fade" id="myModaltambahpemeriksa" role="dialog">
                                            <div class="modal-dialog">

                                            <!-- Modal content -->
                                            <div class="modal-content" style="border-radius: 30px;">
                                            <div class="modal-header">
                                            <h4 class="modal-title">Tambah Pejabat Pemeriksa</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">

                                    <form action="simpanpemeriksa.php" method="POST">
                                    <?php
                                        include "../../koneksi.php";
                                        $sql = mysqli_query($koneksi, "select max(id) as maxID from pemeriksa");
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
                                                        <input type="text" name="namapejabatpemeriksa" class="form-control" required>      
                                                        </div> 

                                                        <div class="form-group">
                                                        <label>NIP</label>
                                                        <input type="text" name="nippejabatpemeriksa" class="form-control" required>      
                                                        </div> 

                                                    <div class="row g-2">
                                                        <div class="col-7">
                                                            <div class="form-floating">
                                                                <div class="form-group">
                                                                <label>Nomor SK</label>
                                                                <input type="text" name="nomorskpejabatpemeriksa" class="form-control" required>      
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-5">
                                                            <div class="form-floating">
                                                                <div class="form-group">
                                                                <label>Tanggal SK</label>
                                                                <input type="date" name="tglskpejabatpemeriksa" class="form-control" required>      
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                        <!-- <div class="form-group">
                                                        <label>Jabatan</label>
                                                        <textarea type="text" name="jabatanpejabatpemeriksa" class="form-control" required></textarea>      
                                                        </div>  -->

                                            <div class="modal-footer">  
                                                <button type="submit" class="btn btn-info">Simpan</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                            </div>
                                    </form>
            </div>
        </div>
    </div>
</div>
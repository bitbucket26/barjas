<!-- Modal Edit Mahasiswa-->
<div class="modal fade" id="myModaltambahpptk" role="dialog">
                                            <div class="modal-dialog modal-lg">

                                            <!-- Modal content -->
                                            <div class="modal-content" style="border-radius: 30px;">
                                            <div class="modal-header">
                                            <h4 class="modal-title">Tambah PPTK</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">

                                    <form action="simpanpptk.php" method="POST">
                                    <?php
                                        include "../../koneksi.php";
                                        $sql = mysqli_query($koneksi, "select max(id) as maxID from pptk");
                                        $data = mysqli_fetch_array($sql) or die( mysqli_error($data));
                                        $kode = $data['maxID'];
                                        $kode++;
                                        $ket = "";
                                        $kodeauto = $ket . sprintf("%03s", $kode)
                                    ?>
                                                    <div class="row g-2">
                                                        <div class="col-2">
                                                            <div class="form-floating">
                                                                <div class="form-group">
                                                                    <label>ID</label>
                                                                    <input type="text" value="<?php echo $kodeauto;?>" name="id" class="form-control" id="id" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-10">
                                                            <div class="form-floating">
                                                                <div class="form-group">
                                                                    <label>Nama Pekerjaan</label>
                                                                    <input type="text" name="pekerjaan" class="form-control" required>      
                                                                </div> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-2">
                                                        <div class="col-6">
                                                            <div class="form-floating">
                                                                <div class="form-group">
                                                                    <label>Nama</label>
                                                                    <input type="text" name="namapptk" class="form-control" required>      
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-floating">
                                                                <div class="form-group">
                                                                    <div class="form-group">
                                                                        <label>NIP</label>
                                                                        <input type="text" name="nippptk" class="form-control" required>      
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
                                                                    <input type="text" name="koderekeningkegiatan" class="form-control" required>      
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-floating">
                                                                <div class="form-group">
                                                                    <label>No.Rekening Sub.Kegiatan</label>
                                                                    <input type="text" name="noreksubkegiatan" class="form-control" required>      
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-2">
                                                        <div class="col-6">
                                                            <div class="form-floating">
                                                                <div class="form-group">
                                                                    <label>Kegiatan</label>
                                                                    <input type="text" name="kegiatan" class="form-control" required>      
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-floating">
                                                                <div class="form-group">
                                                                    <label>Sub Kegiatan</label>
                                                                    <input type="text" name="subkegiatan" class="form-control" required>      
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-2">
                                                        <div class="col-6">
                                                            <div class="form-floating">
                                                                <div class="form-group">
                                                                    <label>Nama Rekening</label>
                                                                    <input type="text" name="namarekening" class="form-control" required>      
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-floating">
                                                                <div class="form-group">
                                                                    <label>Nomor SK</label>
                                                                    <input type="text" name="nomorskpptk" class="form-control" required>      
                                                                </div> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-2">
                                                        <div class="col-4">
                                                            <div class="form-floating">
                                                                <div class="form-group">
                                                                    <label>Tanggal SK</label>
                                                                    <input type="date" name="tglskpptk" class="form-control" required>      
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-8">
                                                            <div class="form-floating">
                                                                <div class="form-group">
                                                                    <label>Jabatan</label>
                                                                    <textarea type="text" name="jabatanpptk" class="form-control" required></textarea>      
                                                                </div> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-2">
                                                        <div class="col-8">
                                                            <div class="form-floating">
                                                                <div class="form-group">
                                                                    <label>Nomor DPA</label>
                                                                    <input type="text" name="nomordpa" class="form-control" required>      
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-floating">
                                                                <div class="form-group">
                                                                    <label>Tanggal DPA</label>
                                                                    <input type="date" name="tgldpa" class="form-control" required>      
                                                                </div> 
                                                            </div>
                                                        </div>
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
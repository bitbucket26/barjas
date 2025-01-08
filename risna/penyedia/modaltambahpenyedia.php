

<!-- Modal Edit Mahasiswa-->
<div class="modal fade" id="myModaltambah" role="dialog">
                                            <div class="modal-dialog modal-lg">

                                            <!-- Modal content -->
                                            <div class="modal-content">
                                            <div class="modal-header">
                                            <h4 class="modal-title">Tambah Penyedia</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">

                                    <form action="simpanpenyedia.php" method="POST">
                                    <?php
                                        include "../../koneksi.php";
                                        $sql = mysqli_query($koneksi, "select max(id) as maxID from penyedia");
                                        $data = mysqli_fetch_array($sql) or die( mysqli_error($data));
                                        $kode = $data['maxID'];
                                        $kode++;
                                        $ket = "";
                                        $kodeauto = $ket . sprintf("%03s", $kode)
                                    ?>
                                            <div class="row g-2">
                                                <div class="col-md">
                                                    <div class="form-floating">

                                                        <div class="form-group">
                                                        <label class="labeldata" >Nomor</label>
                                                        <input type="text" value="<?php echo $kodeauto;?>" name="id" class="form-control" id="id" readonly>
                                                        </div>

                                                        <div class="form-group">
                                                        <label>Nama Perusahaan</label>
                                                        <input type="text" name="namaperusahaan" class="form-control" required>      
                                                        </div> 

                                                        <div class="form-group">
                                                        <label>Kota</label>
                                                        <input type="text" name="kota" class="form-control" required>      
                                                        </div> 

                                                        <div class="form-group">
                                                        <label>Nama Pimpinan</label>
                                                        <input type="text" name="namapimpinan" class="form-control" required>      
                                                        </div> 

                                                        <div class="form-group">
                                                        <label>Jabatan</label>
                                                        <input type="text" name="jabatan" class="form-control" required>      
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md">
                                                    <div class="form-floating">
                                                    <div class="form-group">
                                                    <label>NPWP</label>
                                                    <input type="text" name="npwp" class="form-control" required>      
                                                    </div> 

                                                    <div class="form-group">
                                                    <label>Nomor Rekening</label>
                                                    <input type="text" name="norekening" class="form-control" required>      
                                                    </div> 

                                                    <div class="form-group">
                                                    <label>Nama Bank</label>
                                                    <input type="text" name="namabank" class="form-control" required>      
                                                    </div> 

                                                    <div class="form-group">
                                                    <label>Nama Rekening</label>
                                                    <input type="text" name="namarekbank" class="form-control" required>      
                                                    </div> 
                                                    </div>

                                                    
                                                </div>
                                            </div>
                                            <!-- Input File KOP -->
                                            <!-- <div class="input-group mb-3">
                                                <input type="file" name="kop" class="form-control" id="inputGroupFile02">
                                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                            </div> -->
                                            <div class="form-group">
                                                <label>Alamat Lengkap</label>
                                                <textarea type="text" name="alamat" class="form-control" required></textarea>    
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
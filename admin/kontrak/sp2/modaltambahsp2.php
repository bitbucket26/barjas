

<!-- Modal Edit Mahasiswa-->
<div class="modal fade" id="myModaltambahsp" role="dialog">
                                            <div class="modal-dialog">

                                            <!-- Modal content -->
                                            <div class="modal-content">
                                            <div class="modal-header">
                                            <h4 class="modal-title">Tambah Kontrak</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">

                                    <form action="simpansp.php" method="POST">
                                    <?php
                                        include "../../koneksi.php";
                                        $sql = mysqli_query($koneksi, "select max(id) as maxID from sp");
                                        $data = mysqli_fetch_array($sql) or die( mysqli_error($data));
                                        $kode = $data['maxID'];
                                        $kode++;
                                        $ket = "";
                                        $kodeauto = $ket . sprintf("%03s", $kode)
                                    ?>
                                            <div class="row">
                                                
                                                <div class="col-xl">
                                                    <!-- <div class="form-floating"> -->
                                                        <label class="labeldata" >ID</label>
                                                        <input type="text" value="<?php echo $kodeauto;?>" name="id" class="form-control" id="id" readonly>
                                                        <?php
                                                            $penyedia = mysqli_query($koneksi,"select * from penyedia");
                                                            while($row = mysqli_fetch_array($penyedia)){
                                                        ?>
                                                        <label>Nama Perusahaan</label>
                                                        <select class="form-control" name="penyedia" id="penyedia" required>
                                                            <option value="">--Perusahaan--</option>
                                                            <option value="<?php echo $row['namaperusahaan'] ?>"><?php echo $row['namaperusahaan']; ?></option>
                                                        </select>
                                                        
                                                        <label>Alamat</label>
                                                        <input type="text" name="alamat" class="form-control" value="<?php echo $row['alamat']; ?>" required>   
 
                                                        <label>Kota</label>
                                                        <input type="text" name="kota" class="form-control" value="<?php echo $row['kota']; ?>" required>      
 
                                                        <label>NPWP</label>
                                                        <input type="text" name="npwp" class="form-control" value="<?php echo $row['npwp']; ?>" required>      
                                                    <!-- </div> -->
                                                </div>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                            <div class="modal-footer">  
                                                <button type="submit" class="btn btn-info">Simpan</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                            </div>
                                    </form>
                                    <!-- <script type="text/javascript">
                                        $('#penyedia').change(function() { 
                                            var penyedia = $(this).val(); 
                                            $.ajax({
                                                type: 'POST', 
                                                url: 'ajax.php', 
                                                data: 'id=' + penyedia, 
                                                success: function(response) { 
                                                    $('#penyedia').html(response); 
                                                }
                                            });
                                        });
                                
                                    </script> -->
            </div>
        </div>
    </div>
</div>
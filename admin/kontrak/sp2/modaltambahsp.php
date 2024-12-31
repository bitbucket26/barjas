

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
                                    
                                   
                                    <!-- Menu Penyedia -->
                                    
                                        				
                                                <div class="col">
                                                    <div class="row g-2">
                                                            <div class="col-md">
                                                                <div class="form-floating">
                                                                <label class="labeldata">ID</label>
                                                                <input type="number" value="<?php echo $kodeauto;?>" name="id" class="form-control" id="id" readonly>	
                                                                </div>
                                                            </div>	
                                                            <div class="col-md">
                                                                <div class="form-floating">
                                                                <label class="labeldata">Tanggal</label>
                                                                <?php $dt = new DateTime();
                                                                    echo '<input type="date" name="tglproses" class="form-control" id="tglproses" value="' .$dt->format('Y-m-d'). '" readonly>'
                                                                ?>
                                                                </div>
                                                            </div>	
                                                    </div>
                                                </div>	

                                                <label>Jenis Kontrak</label>
                                                <input type="text" name="jeniskontrak" class="form-control" id="jeniskontrak" required>
                                                
                                                <div class="col">
                                                    <div class="row g-2">
                                                            <div class="col-md">
                                                                <div class="form-floating">
                                                                <label class="labeldata">Tanggal Mulai</label>
                                                                <input type="date" class="form-control" id="tglmulaikontrak" readonly>	
                                                                </div>
                                                            </div>	
                                                            <div class="col-md">
                                                                <div class="form-floating">
                                                                <label class="labeldata">Tanggal Selesai</label>
                                                                <input type="date" class="form-control" id="tglselesaikontrak" readonly>
                                                                </div>
                                                            </div>	
                                                    </div>
                                                </div>	   

                                                <label class="labeldata">Nama Perusahaan</label>
                                                <select name="namaperusahaan" class="form-control" id="namaperusahaan" onchange="detail()" required>
                                                        <?php
                                                        include "../../koneksi.php";


                                                            $query = mysqli_query($koneksi,"select * from penyedia");
                                                            while ($data = mysqli_fetch_array($query)){     
                                                        ?>
                                                        <option value="<?php echo $data['id']; ?>"><?php echo $data['namaperusahaan']; ?></option>
                                                        <?php 
                                                        }
                                                        ?>
                                                    </select>
                                                    <?php 
                                                    ?>
                                                
                                            	  
 
                                                <label>NPWP</label>
                                                <input type="text" name="npwp" class="form-control" id="npwp" required>
                                                <label>Alamat</label>
                                                <input type="text" name="alamat" class="form-control" id="alamat" required>   
 
                                                <label>Kota</label>
                                                <input type="text" name="kota" class="form-control" id="kota" required>      
 
                                                <label>NPWP</label>
                                                <input type="text" name="npwp" class="form-control" id="npwp" required>
                                                <label>Alamat</label>
                                                <input type="text" name="alamat" class="form-control" id="alamat" required>   
 
                                                <label>Kota</label>
                                                <input type="text" name="kota" class="form-control" id="kota" required>      
 
                                                <label>NPWP</label>
                                                <input type="text" name="npwp" class="form-control" id="npwp" required>
                                                <label>Alamat</label>
                                                <input type="text" name="alamat" class="form-control" id="alamat" required>   
 
                                                <label>Kota</label>
                                                <input type="text" name="kota" class="form-control" id="kota" required>      
 
                                                <label>NPWP</label>
                                                <input type="text" name="npwp" class="form-control" id="npwp" required>
                                                <label>Alamat</label>
                                                <input type="text" name="alamat" class="form-control" id="alamat" required>   
 
                                                <label>Kota</label>
                                                <input type="text" name="kota" class="form-control" id="kota" required>      
 
                                                <label>NPWP</label>
                                                <input type="text" name="npwp" class="form-control" id="npwp" required>
                                                <label>Alamat</label>
                                                <input type="text" name="alamat" class="form-control" id="alamat" required>   
 
                                                <label>Kota</label>
                                                <input type="text" name="kota" class="form-control" id="kota" required>      
 
                                                <label>NPWP</label>
                                                <input type="text" name="npwp" class="form-control" id="npwp" required>
                                                <label>Alamat</label>
                                                <input type="text" name="alamat" class="form-control" id="alamat" required>   
 
                                                <label>Kota</label>
                                                <input type="text" name="kota" class="form-control" id="kota" required>      
 
                                                <label>NPWP</label>
                                                <input type="text" name="npwp" class="form-control" id="npwp" required>
                                                  
                                                











                                            <div class="modal-footer">  
                                                <button type="submit" class="btn btn-info">Simpan</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                            </div>
                                    </form>
                                    <script>
                                        function detail(){
                                            // alert ("ok");
                                            var id = $("#namaperusahaan").val();
                                            $.ajax({
                                                url :"data.php",
                                                method : "POST",
                                                data : {id:id},
                                                dataType : "json",
                                                success : function(data){
                                                    $('#alamat').val(data.alamat);
                                                    $('#kota').val(data.kota);
                                                    $('#npwp').val(data.npwp);
                                                }

                                            })
                                        }
                                    </script>
            </div>
        </div>
    </div>
</div>
                                              
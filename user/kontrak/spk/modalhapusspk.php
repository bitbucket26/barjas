



<!-- Modal Edit Mahasiswa-->
<div class="modal fade" id="hapusModalspk<?php echo $d['id']; ?>" role="dialog">
                                            <div class="modal-dialog">
                                            <!-- Modal content -->
                                            <div class="modal-content">
                                            <div class="modal-header">
                                            <h4 class="modal-title">Peringatan !</h4>
                                            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                                            </div>
                                            <div class="modal-body">
                                              <h3>Hapus Kontrak ini ?</h3>
                                            </div>
                                            <div class="modal-footer">  
                                                <!-- <button type="submit" class="btn btn-info">Simpan</button> -->
                                                <a href="hapus.php?id=<?php echo $d['id']; ?>" class="btn btn-danger">Hapus</a>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                            </div>
                                                                                            
        </div>
    </div>
</div>
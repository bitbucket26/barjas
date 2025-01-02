<?php 
session_start();

// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['role']==""){
    header("location:login.php?pesan=gagal");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>INPUT BARANG</title>

    <!-- Custom fonts for this template -->
    <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

</head>
    <?php	
       include "../../../koneksi.php";
         
       // Check connection
       if (mysqli_connect_error()){
           echo "Koneksi database gagal : " . mysqli_connect_error();
       }
        
    ?>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
            include "sidebar.php";
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="border-radius: 25px;">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                    include "topbar.php";
                ?>
                
                <!-- End of Topbar -->
                

                <!-- Begin Page Content -->
                <div class="container-fluid" >
                    <div class="card-body">
                    <?php 
                            if(isset($_GET['id'])) {
                                    $row = mysqli_real_escape_string($koneksi, $_GET['id']);
                                    // echo $row;
                            }
                    ?>
                            <form method="post" class="form-user" style="font-size: 14px;">
                                <!-- <div class="row g-2">
                                    <div class="col-6">
                                    <label class="labeldata">Nama Perusahaan</label>
                                    <input style="height: 30px; font-size: 13px;" type="text" value="<?php echo $row['namaperusahaan']; ?>" name="namaperusahaan" class="form-control"  id="namaperusahaan" readonly>
                                    </div>
                                    <div class="col-6">
                                    <label class="labeldata">Nomor Kontrak</label>
                                    <input style="height: 30px; font-size: 13px;" type="text" value="<?php echo $row['nomorkontrak']; ?>" name="nomorkontrak" class="form-control"  id="nomorkontrak" readonly>
                                    </div>
                                </div> -->
                                        <div class="row">
                                                        
                                                        
                                                            
                                                            <input style="height: 30px; font-size: 13px;" type="number" value="<?php echo $row; ?>" name="id" class="form-control"  id="id" hidden>                                            
                                                        
                                                            <?php
                                                            include "maxno.php";
                                                            ?>
                                                        
                                                            <input style="height: 30px; font-size: 13px;" value="<?php echo $kodeautono; ?>" type="number" name="no" class="form-control"  id="no" hidden>                                               
                                                        <div class="col-5" style="padding-top: 10px;">
                                                            <label class="labeldata">Nama Barang</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="namaproduk" class="form-control"  id="namaproduk" required>                                               
                                                        </div>
                                                        <div class="col-2" style="padding-top: 10px;">
                                                            <label class="labeldata">Satuan</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="satuan" class="form-control"  id="satuan" required>                                               
                                                        </div>
                                        </div>
                                        <div class="row">
                                                        <div class="col-2" style="padding-top: 10px;">
                                                            <label class="labeldata">Volume HPS</label>
                                                            <input style="height: 30px; font-size: 13px;" type="number" name="volumehps" class="form-control"  id="volumehps" required>                                               
                                                        </div>
                                                        <div class="col-2" style="padding-top: 10px;">
                                                            <label class="labeldata">Harga Satuan HPS</label>
                                                            <input style="height: 30px; font-size: 13px;" type="number" name="hargasatuanhps" class="form-control"  id="hargasatuanhps" required>                                               
                                                        </div>
                                                        <div class="col-2" style="padding-top: 10px;">
                                                            <label class="labeldata">Jumlah HPS</label>
                                                            <input style="height: 30px; font-size: 13px;" type="number" name="jumlahhps" class="form-control"  id="jumlahhps" required>                                               
                                                        </div>
                                                        <div class="col-2" style="padding-top: 10px;">
                                                            <label class="labeldata">Volume Nego</label>
                                                            <input style="height: 30px; font-size: 13px;" type="number" name="volumenego" class="form-control"  id="volumenego" required>                                               
                                                        </div>
                                                        <div class="col-2" style="padding-top: 10px;">
                                                            <label class="labeldata">Harga Satuan Nego</label>
                                                            <input style="height: 30px; font-size: 13px;" type="number" name="hargasatuannego" class="form-control"  id="hargasatuannego" required>                                               
                                                        </div>
                                                        <div class="col-2" style="padding-top: 10px;">
                                                            <label class="labeldata">Jumlah Nego</label>
                                                            <input style="height: 30px; font-size: 13px;" type="number" name="jumlahnego" class="form-control"  id="jumlahnego" required>                                               
                                                        </div>
                                        </div>
                                        <br>
                                        <button id="tambah" class="btn btn-info">Tambah</button>
                            </form>
                    </div>
               
                    <br>
                    <div class="card shadow mb-4" >
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Data Barang (SPK)</h6>
                            </div>
                            <div class="card-body " style="font-size: 12px;">
                                <div class="table-responsive">
                               
                                <?php 
                                include "tampilbarang.php";
                                ?>

                                </div>
                            </div>
                    </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Karwek Group 2025</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

   <!-- Logout Modal-->
   <?php
    include "logoutmodal.php"; 
    ?>

    <!-- Bootstrap core JavaScript-->
    <script src="../../../vendor/jquery/jquery.min.js"></script>
    <script src="../../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../../js/demo/datatables-demo.js"></script>


<script>
	$(document).ready(function () {
		tampil_data();
	});            
 
	// tampilkan data        
	function tampil_data() {
		$.ajax({
			url: 'tampilbarang.php',
			type: 'get',
			success: function(data) {
				$('tampilbarang.php').html(data);
			}
		});
	}
 
	// tambah data
	$(document).ready(function(){
        $("#tambah").click(function(){
            var data = $('.form-user').serialize();
            $.ajax({
                type: 'POST',
                url: "simpanbarang.php",
                data: data,
                success: function(){
                    location.reload();
		                tampil_data();
                        
                }
            });
        });
    });
 
 
	// hapus data
	$(document).on('click', '.hapus_data', function(){		
		var id = $(this).attr('id');
		var no = $(this).attr('data-no');
		$.ajax({
			type: 'POST',
			url: "hapusbarang.php",
			data: {id:id,no:no},			
			success: function() {				
				location.reload();
			}
		});
	});
 
 
</script>
</body>

</html>
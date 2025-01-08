<?php 
session_start();
// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['role']==""){
    header("location:index.php?pesan=gagal");
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

    <title>SURAT PERJANJIAN</title>

    <!-- Custom fonts for this template -->
    <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../../css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <!-- Custom styles for this page -->
    <link href="../../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
    <?php	
       include "../../../koneksi.php";
         
       // Check connection
       if (mysqli_connect_error()){
           echo "Koneksi database gagal : " . mysqli_connect_error();
       }
        
    ?>
    <?php
        function tglindo($tanggal){
            $bulan = array (
                1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
            $pecahkan = explode('-', $tanggal);
            
            // variabel pecahkan 0 = tanggal
            // variabel pecahkan 1 = bulan
            // variabel pecahkan 2 = tahun
        
            return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
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
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                    include "topbar.php";
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- <button type="button" data-toggle="modal" class="btn btn-primary btn-md" data-target="#myModaltambahsp">
                        <i class="fa fa-plus">  Tambah Kontrak (SP)</i>
                    </button> -->
                    <div class="">
                    <a href="inputsp.php" type="button" class="btn btn-info btn-md" style="border-radius: 30px;"><i class="bi bi-plus-circle"></i> Tambah</a>
                    </div>
               
                <br>
                <?php 
                    include "maxid.php";
                ?>
                <div class="card shadow mb-4" style="border-radius: 30px;">
                        <div class="card-header py-3" style="border-radius: 30px;">
                            <h6 class="m-0 font-weight-bold text-primary">Data Kontrak (SP)</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0" style="border-radius: 15px; font-size: 12px;">
                                    <thead style="font-size: 15px;">
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Perusahaan</th>
                                            <th>No. Kontrak</th>
                                            <th>Tanggal</th>
                                            <th>Nilai Kontrak</th>
                                            <th>Pekerjaan</th>
                                            <th>Aksi</th>
                                           
                                        </tr>
                                    </thead>
                                    <?php
                                        $sp = mysqli_query($koneksi,"select * from kontrak where jeniskontrak='SP' user='rindiyanto'");
                                        while($d = mysqli_fetch_array($sp)){
                                    ?>
                                    <!-- <tbody style="font-size: 12px;"> -->
                                        <tr>
                                            <td class="text-center"><?php echo $d['id']; ?></td> 
                                            <td><?php echo $d['namaperusahaan']; ?></td> 
                                            <td><?php echo $d['nomorkontrak']; ?></td>
                                            <td><?php echo tglindo($d['tglmulaikontrak']); ?></td>
                                            <td>Rp. <?php echo number_format($d['nilaitotalnego']); ?>,-</td>
                                            <td><?php echo $d['pekerjaan']; ?></td>
                                            <td class="text-center">
                                                <a class="btn btn-success btn-sm dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 10px;">
                                                    <i class="fa fa-print fa-sm"></i>    
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <li><a class="dropdown-item" href="cetak/permindasung.php?id=<?php echo $d['id']; ?>" target="_blank">1. Permin Dasung</a></li>
                                                        <li><a class="dropdown-item" href="cetak/hps.php?id=<?php echo $d['id']; ?>" target="_blank">2. HPS</a></li>
                                                        <li><a class="dropdown-item" href="cetak/kuantitas.php?id=<?php echo $d['id']; ?>" target="_blank">3. Kuantitas</a></li>
                                                        <li><a class="dropdown-item" href="cetak/pakta.php?id=<?php echo $d['id']; ?>" target="_blank">4. Pakta Integritas</a></li>
                                                        <li><a class="dropdown-item" href="cetak/formkualifikasi.php?id=<?php echo $d['id']; ?>" target="_blank">5. Form Kualifikasi</a></li>
                                                        <li><a class="dropdown-item" href="cetak/penawaran.php?id=<?php echo $d['id']; ?>" target="_blank">5. Penawaran</a></li>
                                                        <li><a class="dropdown-item" href="cetak/undangan.php?id=<?php echo $d['id']; ?>" target="_blank">7. Undangan</a></li>
                                                        <li><a class="dropdown-item" href="cetak/pembukaan.php?id=<?php echo $d['id']; ?>" target="_blank">8. Pembukaan</a></li>
                                                        <li><a class="dropdown-item" href="cetak/lampevalpenawaran.php?id=<?php echo $d['id']; ?>" target="_blank">9. Lamp. Eval. Penawaran</a></li>
                                                        <li><a class="dropdown-item" href="cetak/lampbaklarnego.php?id=<?php echo $d['id']; ?>" target="_blank">10. Lampiran BA.Klar Nego</a></li>
                                                        <li><a class="dropdown-item" href="cetak/baevalpenawaran.php?id=<?php echo $d['id']; ?>" target="_blank">11. BA.Eval.Penawaran</a></li>
                                                        <li><a class="dropdown-item" href="cetak/baklarnego.php?id=<?php echo $d['id']; ?>" target="_blank">12. BA.Klar.Nego</a></li>
                                                        <li><a class="dropdown-item" href="cetak/bahpl.php?id=<?php echo $d['id']; ?>" target="_blank">13. BAHPL</a></li>
                                                        <li><a class="dropdown-item" href="cetak/bapenpemenang.php?id=<?php echo $d['id']; ?>" target="_blank">14. BA.Pen.Pemenang</a></li>
                                                        <li><a class="dropdown-item" href="cetak/pengumuman.php?id=<?php echo $d['id']; ?>" target="_blank">15. Pengumuman</a></li>
                                                        <li><a class="dropdown-item" href="cetak/nota.php?id=<?php echo $d['id']; ?>" target="_blank">16. NOTA</a></li>
                                                        <li><a class="dropdown-item" href="cetak/sppbj.php?id=<?php echo $d['id']; ?>" target="_blank">17. SPPBJ</a></li>
                                                        <li><a class="dropdown-item" href="cetak/sp.php?id=<?php echo $d['id']; ?>" target="_blank">18. SP (Barang)</a></li>
                                                        <li><a class="dropdown-item" href="cetak/suspk.php?id=<?php echo $d['id']; ?>" target="_blank">19. SU-SPK</a></li>
                                                        <!-- <li><a class="dropdown-item" href="cetak/spk.php?id=<?php echo $d['id']; ?>" target="_blank">20. SPK (3 rangkap, Materai silang)</a></li> -->
                                                        <li><a class="dropdown-item" href="cetak/cover.php?id=<?php echo $d['id']; ?>" target="_blank">21. Cover</a></li>
                                                        <li><a class="dropdown-item" href="cetak/undanganpt.php?id=<?php echo $d['id']; ?>" target="_blank">22. Undangan PT</a></li>
                                                        <li><a class="dropdown-item" href="sortirundanganppk.php?id=<?php echo $d['id']; ?>" target="_blank">23. Undangan PPK</a></li>
                                                        <!-- <li><a class="dropdown-item" href="cetak/undanganppk+.php?id=<?php echo $d['id']; ?>" target="_blank">23. Undangan PPK</a></li> -->
                                                        <!-- <li><a class="dropdown-item" href="cetak/baphp+.php?id=<?php echo $d['id']; ?>" target="_blank">24.BAPHP</a></li> -->
                                                        <li><a class="dropdown-item" href="sortirbaphp.php?id=<?php echo $d['id']; ?>" target="_blank">24. BAPHP</a></li>
                                                        <li><a class="dropdown-item" href="cetak/bastb.php?id=<?php echo $d['id']; ?>" target="_blank">25. BASTB</a></li>
                                                        <li><a class="dropdown-item" href="cetak/ppembayaran.php?id=<?php echo $d['id']; ?>" target="_blank">26. Pembayaran</a></li>
                                                        <li><a class="dropdown-item" href="cetak/bap.php?id=<?php echo $d['id']; ?>" target="_blank">27. BAP (3 rangkap, Materai silang)</a></li>
                                                        <li><a class="dropdown-item" href="cetak/sptjm.php?id=<?php echo $d['id']; ?>" target="_blank">28. SPTJM</a></li>
                                                        <li><a class="dropdown-item" href="cetak/ringkasan.php?id=<?php echo $d['id']; ?>" target="_blank">29.Ringkasan</a></li>
                                                        <li><a class="dropdown-item" href="cetak/kwitansi.php?id=<?php echo $d['id']; ?>" target="_blank">30. Kwitansi (2 rangkap, Materai penyedia)</a></li>
                                                    </ul>
                                                <a href="editsp.php?id=<?php echo $d['id']; ?>" type="button" class="btn btn-warning btn-sm text-start" style="border-radius: 10px;">
                                                <i class="fa fa-edit fa-sm"></i>
                                                </a>
                                                <!-- <a type="button" class="btn btn-danger btn-sm text-start" data-bs-toggle="modal" data-bs-target="#hapusModalsp<?php echo $d['id']; ?>">
                                                <i class="fa fa-trash fa-md"></i>
                                                </a> -->
                                                <!-- <a href="hapus.php?id=<?php echo $d['id']; ?>" type="button" class="btn btn-danger btn-sm text-start">
                                                <i class="fa fa-trash fa-md"></i>
                                                </a> -->
                                                <!-- <a href="inputbarang2.php?id=<?php echo $d['id']; ?>" type="button" class="btn btn-info btn-sm text-start">
                                                <i class="fa fa-cubes fa-md"></i>
                                                </a> -->
                                                <!-- <a href="inputbarang.php?id=<?php echo $d['id']; ?>" type="button" class="btn btn-primary btn-sm text-start">
                                                <i class="fa fa-cubes fa-md"></i>
                                                </a> -->
                                            </td>
                                        </tr>
                                    <!-- </tbody> -->
                                    <?php
                                        }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>
                <!-- /.container-fluid -->
                
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php 
            include "../../footer.php";
            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- <?php 
    include "sortirbaphp.php";
    ?> -->

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

</body>

</html>
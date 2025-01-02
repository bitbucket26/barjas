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

    <title>PEJABAT PELAKSANA TEKNIS KEGIATAN</title>

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
    <script type="text/javascript" src="my.js"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
</style>
</head>
    <?php	
       include "../../../koneksi.php";
         
       // Check connection
       if (mysqli_connect_error()){
           echo "Koneksi database gagal : " . mysqli_connect_error();
       }
        
    ?>
<body id="page-top" style="font-size: 13px;">

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
                
                <!-- Awal Manu -->
                <div class="container-fluid">
                    <!-- Input Data -->
                    

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Input Kontrak (SPK)</h6>
                            </div>



                            <form action="simpanspk.php" method="POST">
                            <?php 
                                include "maxid.php";
                            ?>
                                <!-- Kolom 1 -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                                <div class="row g-2">
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">ID Kontrak</label>
                                                            <input style="height: 30px; font-size: 13px;" type="number" value="<?php echo $kodeauto;?>" name="id" class="form-control" style="height: 30px; font-size: 13px;" id="id" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Tanggal Proses</label>
                                                            <?php $dt = new DateTime();
                                                            echo '<input style="height: 30px; font-size: 13px;" type="date" name="tglproses" class="form-control" id="tglproses" value="' .$dt->format('Y-m-d'). '" readonly>'
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Tanggal Mulai</label>
                                                            <input style="height: 30px; font-size: 13px;" type="date" name="tglmulaikontrak" class="form-control border-left-success shadow" id="tglmulaikontrak" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Tanggal Selesai</label>
                                                            <input style="height: 30px; font-size: 13px;" type="date" name="tglselesaikontrak" class="form-control border-left-danger shadow" onclick="waktupelaksanaan()" id="tglselesaikontrak" required>                                               
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col-4">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Kategori Kontrak</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="jeniskontrak" value="SPK" class="form-control" id="jeniskontrak" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-floating">
                                                            <label class="labeldata">*</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="bilangjeniskontrak" value="Surat Perintah Kerja" class="form-control" id="bilangjeniskontrak" readonly>                                               
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col-12">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Nomor Kontrak</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="nomorkontrak" class="form-control" id="nomorkontrak" required>                                               
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col-4">
                                                        <div class="form-floating">
                                                            <label>Waktu Pelaksanaan</label>
                                                            <input style="height: 30px; font-size: 13px;" type="number" name="waktupelaksanaan" class="form-control" id="waktupelaksanaan" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Terbilang</label>
                                                            <textarea style="font-size: 13px;" type="text" name="terbilangwaktupelaksanaan" id="terbilangwaktupelaksanaan" class="form-control" readonly></textarea>
                                                            <!-- <input style="height: 30px; font-size: 13px;" type="text" name="terbilangwaktupelaksanaan" class="form-control" id="terbilangwaktupelaksanaan" required>                                                -->
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-sm-4">
                                                <div class="row g-2">
                                                    <div class="col-7">
                                                        <div class="form-floating">
                                                            <label>HPS</label>
                                                            <select style="height: 30px; font-size: 13px;" type="text" name="hps" class="form-control" id="hps" required>
                                                             <option value="-">--Pilih--</option>
                                                             <option value="027/04/BAHP/HPS/I/2025">027/04/BAHP/HPS/I/2025</option>
                                                             <option value="027/04/BAHP/HPS/II/2025">027/04/BAHP/HPS/II/2025</option>
                                                             <option value="027/04/BAHP/HPS/III/2025">027/04/BAHP/HPS/III/2025</option>
                                                             <option value="027/04/BAHP/HPS/IV/2025">027/04/BAHP/HPS/IV/2025</option>
                                                             <option value="027/04/BAHP/HPS/V/2025">027/04/BAHP/HPS/V/2025</option>
                                                             <option value="027/04/BAHP/HPS/VI/2025">027/04/BAHP/HPS/VI/2025</option>
                                                             <option value="027/04/BAHP/HPS/VII/2025">027/04/BAHP/HPS/VII/2025</option>
                                                             <option value="027/04/BAHP/HPS/VIII/2025">027/04/BAHP/HPS/VIII/2025</option>
                                                             <option value="027/04/BAHP/HPS/IX/2025">027/04/BAHP/HPS/IX/2025</option>
                                                             <option value="027/04/BAHP/HPS/X/2025">027/04/BAHP/HPS/X/2025</option>
                                                             <option value="027/04/BAHP/HPS/XI/2025">027/04/BAHP/HPS/XI/2025</option>
                                                             <option value="027/04/BAHP/HPS/XII/2025">027/04/BAHP/HPS/XII/2025</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="form-floating">
                                                            <label class="labeldata">*</label>
                                                            <input style="height: 30px; font-size: 13px;" type="date" name="tglhps" class="form-control border-left-info shadow" id="tglhps" required>                                                 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col-7">
                                                        <div class="form-floating">
                                                            <label>Undangan Pejabat Barjas</label>
                                                            <select style="height: 30px; font-size: 13px;" type="text" name="undanganpejabatbarjas" class="form-control" id="undanganpejabatbarjas" required>
                                                             <option value="-">--Pilih--</option>
                                                             <option value="005/01/BAHP/UND/I/2025">005/01/BAHP/UND/I/2025</option>
                                                             <option value="005/01/BAHP/UND/II/2025">005/01/BAHP/UND/II/2025</option>
                                                             <option value="005/01/BAHP/UND/III/2025">005/01/BAHP/UND/III/2025</option>
                                                             <option value="005/01/BAHP/UND/IV/2025">005/01/BAHP/UND/IV/2025</option>
                                                             <option value="005/01/BAHP/UND/V/2025">005/01/BAHP/UND/V/2025</option>
                                                             <option value="005/01/BAHP/UND/VI/2025">005/01/BAHP/UND/VI/2025</option>
                                                             <option value="005/01/BAHP/UND/VII/2025">005/01/BAHP/UND/VII/2025</option>
                                                             <option value="005/01/BAHP/UND/VIII/2025">005/01/BAHP/UND/VIII/2025</option>
                                                             <option value="005/01/BAHP/UND/IX/2025">005/01/BAHP/UND/IX/2025</option>
                                                             <option value="005/01/BAHP/UND/X/2025">005/01/BAHP/UND/X/2025</option>
                                                             <option value="005/01/BAHP/UND/XI/2025">005/01/BAHP/UND/XI/2025</option>
                                                             <option value="005/01/BAHP/UND/XII/2025">005/01/BAHP/UND/XII/2025</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="form-floating">
                                                            <label class="labeldata">*</label>
                                                            <input style="height: 30px; font-size: 13px;" type="date" name="tglundanganpejabatbarjas" class="form-control border-left-info shadow" id="tglundanganpejabatbarjas" required>                                                 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col-7">
                                                        <div class="form-floating">
                                                            <label>Pembukaan</label>
                                                            <select style="height: 30px; font-size: 13px;" type="text" name="pembukaan" class="form-control" id="pembukaan" required>
                                                             <option value="-">--Pilih--</option>
                                                             <option value="027/02/BAHP/BAPP/I/2025">027/02/BAHP/BAPP/I/2025</option>
                                                             <option value="027/02/BAHP/BAPP/II/2025">027/02/BAHP/BAPP/II/2025</option>
                                                             <option value="027/02/BAHP/BAPP/III/2025">027/02/BAHP/BAPP/III/2025</option>
                                                             <option value="027/02/BAHP/BAPP/IV/2025">027/02/BAHP/BAPP/IV/2025</option>
                                                             <option value="027/02/BAHP/BAPP/V/2025">027/02/BAHP/BAPP/V/2025</option>
                                                             <option value="027/02/BAHP/BAPP/VI/2025">027/02/BAHP/BAPP/VI/2025</option>
                                                             <option value="027/02/BAHP/BAPP/VII/2025">027/02/BAHP/BAPP/VII/2025</option>
                                                             <option value="027/02/BAHP/BAPP/VIII/2025">027/02/BAHP/BAPP/VIII/2025</option>
                                                             <option value="027/02/BAHP/BAPP/IX/2025">027/02/BAHP/BAPP/IX/2025</option>
                                                             <option value="027/02/BAHP/BAPP/X/2025">027/02/BAHP/BAPP/X/2025</option>
                                                             <option value="027/02/BAHP/BAPP/XI/2025">027/02/BAHP/BAPP/XI/2025</option>
                                                             <option value="027/02/BAHP/BAPP/XII/2025">027/02/BAHP/BAPP/XII/2025</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="form-floating">
                                                            <label class="labeldata">*</label>
                                                            <input style="height: 30px; font-size: 13px;" type="date" name="tglpembukaan" class="form-control border-left-primary shadow" id="tglpembukaan" required>                                               
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col-7">
                                                        <div class="form-floating">
                                                            <label>BA. Evaluasi Penawaran</label>
                                                            <select style="height: 30px; font-size: 13px;" type="text" name="baevaluasi" class="form-control" id="baevaluasi" required>
                                                             <option value="-">--Pilih--</option>
                                                             <option value="027/03/BAHP/BAEP/I/2025">027/03/BAHP/BAEP/I/2025</option>
                                                             <option value="027/03/BAHP/BAEP/II/2025">027/03/BAHP/BAEP/II/2025</option>
                                                             <option value="027/03/BAHP/BAEP/III/2025">027/03/BAHP/BAEP/III/2025</option>
                                                             <option value="027/03/BAHP/BAEP/IV/2025">027/03/BAHP/BAEP/IV/2025</option>
                                                             <option value="027/03/BAHP/BAEP/V/2025">027/03/BAHP/BAEP/V/2025</option>
                                                             <option value="027/03/BAHP/BAEP/VI/2025">027/03/BAHP/BAEP/VI/2025</option>
                                                             <option value="027/03/BAHP/BAEP/VII/2025">027/03/BAHP/BAEP/VII/2025</option>
                                                             <option value="027/03/BAHP/BAEP/VIII/2025">027/03/BAHP/BAEP/VIII/2025</option>
                                                             <option value="027/03/BAHP/BAEP/IX/2025">027/03/BAHP/BAEP/IX/2025</option>
                                                             <option value="027/03/BAHP/BAEP/X/2025">027/03/BAHP/BAEP/X/2025</option>
                                                             <option value="027/03/BAHP/BAEP/XI/2025">027/03/BAHP/BAEP/XI/2025</option>
                                                             <option value="027/03/BAHP/BAEP/XII/2025">027/03/BAHP/BAEP/XII/2025</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="form-floating">
                                                            <label class="labeldata">*</label>
                                                            <input style="height: 30px; font-size: 13px;" type="date" name="tglbaevaluasi" class="form-control border-left-primary shadow" id="tglbaevaluasi" required>                                                 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col-7">
                                                        <div class="form-floating">
                                                            <label>Lam.BA.Evaluasi Penawaran</label>
                                                            <select style="height: 30px; font-size: 13px;" type="text" name="lambaevaluasi" class="form-control" id="lambaevaluasi" required>
                                                             <option value="-">--Pilih--</option>
                                                             <option value="027/03/BAHP/LBAEP/I/2025">027/03/BAHP/LBAEP/I/2025</option>
                                                             <option value="027/03/BAHP/LBAEP/II/2025">027/03/BAHP/LBAEP/II/2025</option>
                                                             <option value="027/03/BAHP/LBAEP/III/2025">027/03/BAHP/LBAEP/III/2025</option>
                                                             <option value="027/03/BAHP/LBAEP/IV/2025">027/03/BAHP/LBAEP/IV/2025</option>
                                                             <option value="027/03/BAHP/LBAEP/V/2025">027/03/BAHP/LBAEP/V/2025</option>
                                                             <option value="027/03/BAHP/LBAEP/VI/2025">027/03/BAHP/LBAEP/VI/2025</option>
                                                             <option value="027/03/BAHP/LBAEP/VII/2025">027/03/BAHP/LBAEP/VII/2025</option>
                                                             <option value="027/03/BAHP/LBAEP/VIII/2025">027/03/BAHP/LBAEP/VIII/2025</option>
                                                             <option value="027/03/BAHP/LBAEP/IX/2025">027/03/BAHP/LBAEP/IX/2025</option>
                                                             <option value="027/03/BAHP/LBAEP/X/2025">027/03/BAHP/LBAEP/X/2025</option>
                                                             <option value="027/03/BAHP/LBAEP/XI/2025">027/03/BAHP/LBAEP/XI/2025</option>
                                                             <option value="027/03/BAHP/LBAEP/XII/2025">027/03/BAHP/LBAEP/XII/2025</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="form-floating">
                                                            <label class="labeldata">*</label>
                                                            <input style="height: 30px; font-size: 13px;" type="date" name="tgllambaevaluasi" class="form-control border-left-primary shadow" id="tgllambaevaluasi" required>                                                 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col-7">
                                                        <div class="form-floating">
                                                            <label>BA.Klar. Teknis Dan Negosiasi</label>
                                                            <select style="height: 30px; font-size: 13px;" type="text" name="baklarifikasi" class="form-control" id="baklarifikasi" required>
                                                             <option value="-">--Pilih--</option>
                                                             <option value="027/04/BAHP/NEGO/I/2025">027/04/BAHP/NEGO/I/2025</option>
                                                             <option value="027/04/BAHP/NEGO/II/2025">027/04/BAHP/NEGO/II/2025</option>
                                                             <option value="027/04/BAHP/NEGO/III/2025">027/04/BAHP/NEGO/III/2025</option>
                                                             <option value="027/04/BAHP/NEGO/IV/2025">027/04/BAHP/NEGO/IV/2025</option>
                                                             <option value="027/04/BAHP/NEGO/V/2025">027/04/BAHP/NEGO/V/2025</option>
                                                             <option value="027/04/BAHP/NEGO/VI/2025">027/04/BAHP/NEGO/VI/2025</option>
                                                             <option value="027/04/BAHP/NEGO/VII/2025">027/04/BAHP/NEGO/VII/2025</option>
                                                             <option value="027/04/BAHP/NEGO/VIII/2025">027/04/BAHP/NEGO/VIII/2025</option>
                                                             <option value="027/04/BAHP/NEGO/IX/2025">027/04/BAHP/NEGO/IX/2025</option>
                                                             <option value="027/04/BAHP/NEGO/X/2025">027/04/BAHP/NEGO/X/2025</option>
                                                             <option value="027/04/BAHP/NEGO/XI/2025">027/04/BAHP/NEGO/XI/2025</option>
                                                             <option value="027/04/BAHP/NEGO/XII/2025">027/04/BAHP/NEGO/XII/2025</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="form-floating">
                                                        <label class="labeldata">*</label>
                                                            <input style="height: 30px; font-size: 13px;" type="date" name="tglbaklarifikasi" class="form-control border-left-primary shadow" id="tglbaklarifikasi" required>                                                 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col-7">
                                                        <div class="form-floating">
                                                        <label>Lam.BA.Klar.Teknis Dan Negosiasi</label>
                                                        <select style="height: 30px; font-size: 13px;" type="text" name="lambaklarifikasi" class="form-control" id="lambaklarifikasi" required>
                                                             <option value="-">--Pilih--</option>
                                                             <option value="027/04/BAHP/LNEGO/I/2025">027/04/BAHP/LNEGO/I/2025</option>
                                                             <option value="027/04/BAHP/LNEGO/II/2025">027/04/BAHP/LNEGO/II/2025</option>
                                                             <option value="027/04/BAHP/LNEGO/III/2025">027/04/BAHP/LNEGO/III/2025</option>
                                                             <option value="027/04/BAHP/LNEGO/IV/2025">027/04/BAHP/LNEGO/IV/2025</option>
                                                             <option value="027/04/BAHP/LNEGO/V/2025">027/04/BAHP/LNEGO/V/2025</option>
                                                             <option value="027/04/BAHP/LNEGO/VI/2025">027/04/BAHP/LNEGO/VI/2025</option>
                                                             <option value="027/04/BAHP/LNEGO/VII/2025">027/04/BAHP/LNEGO/VII/2025</option>
                                                             <option value="027/04/BAHP/LNEGO/VIII/2025">027/04/BAHP/LNEGO/VIII/2025</option>
                                                             <option value="027/04/BAHP/LNEGO/IX/2025">027/04/BAHP/LNEGO/IX/2025</option>
                                                             <option value="027/04/BAHP/LNEGO/X/2025">027/04/BAHP/LNEGO/X/2025</option>
                                                             <option value="027/04/BAHP/LNEGO/XI/2025">027/04/BAHP/LNEGO/XI/2025</option>
                                                             <option value="027/04/BAHP/LNEGO/XII/2025">027/04/BAHP/LNEGO/XII/2025</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="form-floating">
                                                            <label class="labeldata">*</label>
                                                            <input style="height: 30px; font-size: 13px;" type="date" name="tgllambaklarifikasi" class="form-control border-left-primary shadow" id="tgllambaklarifikasi" required>                                               
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-sm-4">
                                                <!-- Baris 1 -->
                                                
                                                <!-- Baris 3 -->
                                                <div class="row g-2">
                                                    <div class="col-7">
                                                        <div class="form-floating">
                                                            <label class="labeldata">BA.Hasil Pengadaan Langsung</label>
                                                            <select style="height: 30px; font-size: 13px;" type="text" name="bahasildasung" class="form-control" id="bahasildasung" required>
                                                             <option value="-">--Pilih--</option>
                                                             <option value="027/05/BAHP/PCTL/I/2025">027/05/BAHP/PCTL/I/2025</option>
                                                             <option value="027/05/BAHP/PCTL/II/2025">027/05/BAHP/PCTL/II/2025</option>
                                                             <option value="027/05/BAHP/PCTL/III/2025">027/05/BAHP/PCTL/III/2025</option>
                                                             <option value="027/05/BAHP/PCTL/IV/2025">027/05/BAHP/PCTL/IV/2025</option>
                                                             <option value="027/05/BAHP/PCTL/V/2025">027/05/BAHP/PCTL/V/2025</option>
                                                             <option value="027/05/BAHP/PCTL/VI/2025">027/05/BAHP/PCTL/VI/2025</option>
                                                             <option value="027/05/BAHP/PCTL/VII/2025">027/05/BAHP/PCTL/VII/2025</option>
                                                             <option value="027/05/BAHP/PCTL/VIII/2025">027/05/BAHP/PCTL/VIII/2025</option>
                                                             <option value="027/05/BAHP/PCTL/IX/2025">027/05/BAHP/PCTL/IX/2025</option>
                                                             <option value="027/05/BAHP/PCTL/X/2025">027/05/BAHP/PCTL/X/2025</option>
                                                             <option value="027/05/BAHP/PCTL/XI/2025">027/05/BAHP/PCTL/XI/2025</option>
                                                             <option value="027/05/BAHP/PCTL/XII/2025">027/05/BAHP/PCTL/XII/2025</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="form-floating">
                                                            <label class="labeldata">*</label>
                                                            <input style="height: 30px; font-size: 13px;" type="date" name="tglbahasildasung" 
                                                            class="form-control border-left-warning shadow" id="tglbahasildasung" required>                                               
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Baris 4 -->
                                                <div class="row g-2">
                                                    <div class="col-7">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Penetapan Penyedia</label>
                                                            <select style="height: 30px; font-size: 13px;" type="text" name="penetapanpenyedia" class="form-control" id="penetapanpenyedia" required>
                                                             <option value="-">--Pilih--</option>
                                                             <option value="027/06/BAHP/BJRS/I/2025">027/06/BAHP/BJRS/I/2025</option>
                                                             <option value="027/06/BAHP/BJRS/II/2025">027/06/BAHP/BJRS/II/2025</option>
                                                             <option value="027/06/BAHP/BJRS/III/2025">027/06/BAHP/BJRS/III/2025</option>
                                                             <option value="027/06/BAHP/BJRS/IV/2025">027/06/BAHP/BJRS/IV/2025</option>
                                                             <option value="027/06/BAHP/BJRS/V/2025">027/06/BAHP/BJRS/V/2025</option>
                                                             <option value="027/06/BAHP/BJRS/VI/2025">027/06/BAHP/BJRS/VI/2025</option>
                                                             <option value="027/06/BAHP/BJRS/VII/2025">027/06/BAHP/BJRS/VII/2025</option>
                                                             <option value="027/06/BAHP/BJRS/VIII/2025">027/06/BAHP/BJRS/VIII/2025</option>
                                                             <option value="027/06/BAHP/BJRS/IX/2025">027/06/BAHP/BJRS/IX/2025</option>
                                                             <option value="027/06/BAHP/BJRS/X/2025">027/06/BAHP/BJRS/X/2025</option>
                                                             <option value="027/06/BAHP/BJRS/XI/2025">027/06/BAHP/BJRS/XI/2025</option>
                                                             <option value="027/06/BAHP/BJRS/XII/2025">027/06/BAHP/BJRS/XII/2025</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="form-floating">
                                                            <label class="labeldata">*</label>
                                                            <input style="height: 30px; font-size: 13px;" type="date" name="tglpenetapanpenyedia" class="form-control border-left-warning shadow" id="tglpenetapanpenyedia" required>                                               
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Baris 5 -->
                                                <div class="row g-2">
                                                    <div class="col-7">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Pengumuman Penyedia</label>
                                                            <select style="height: 30px; font-size: 13px;" type="text" name="pengumumanpenyedia" class="form-control" id="pengumumanpenyedia" required>
                                                             <option value="-">--Pilih--</option>
                                                             <option value="027/07/BAHP/BJRS/I/2025">027/07/BAHP/BJRS/I/2025</option>
                                                             <option value="027/07/BAHP/BJRS/II/2025">027/07/BAHP/BJRS/II/2025</option>
                                                             <option value="027/07/BAHP/BJRS/III/2025">027/07/BAHP/BJRS/III/2025</option>
                                                             <option value="027/07/BAHP/BJRS/IV/2025">027/07/BAHP/BJRS/IV/2025</option>
                                                             <option value="027/07/BAHP/BJRS/V/2025">027/07/BAHP/BJRS/V/2025</option>
                                                             <option value="027/07/BAHP/BJRS/VI/2025">027/07/BAHP/BJRS/VI/2025</option>
                                                             <option value="027/07/BAHP/BJRS/VII/2025">027/07/BAHP/BJRS/VII/2025</option>
                                                             <option value="027/07/BAHP/BJRS/VIII/2025">027/07/BAHP/BJRS/VIII/2025</option>
                                                             <option value="027/07/BAHP/BJRS/IX/2025">027/07/BAHP/BJRS/IX/2025</option>
                                                             <option value="027/07/BAHP/BJRS/X/2025">027/07/BAHP/BJRS/X/2025</option>
                                                             <option value="027/07/BAHP/BJRS/XI/2025">027/07/BAHP/BJRS/XI/2025</option>
                                                             <option value="027/07/BAHP/BJRS/XII/2025">027/07/BAHP/BJRS/XII/2025</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="form-floating">
                                                            <label class="labeldata">*</label>
                                                            <input style="height: 30px; font-size: 13px;" type="date" name="tglpengumumanpenyedia" class="form-control border-left-warning shadow" id="tglpengumumanpenyedia" required>                                               
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Baris 6 -->
                                                <div class="row g-2">
                                                    <div class="col-7">
                                                        <div class="form-floating">
                                                            <label>Lap. Proses & Hasil Pengadaan</label>
                                                            <select style="height: 30px; font-size: 13px;" type="text" name="lapproseshasilpengadaan" class="form-control" id="lapproseshasilpengadaan" required>
                                                             <option value="-">--Pilih--</option>
                                                             <option value="027/09/BAHP/BJRS/I/2025">027/09/BAHP/BJRS/I/2025</option>
                                                             <option value="027/09/BAHP/BJRS/II/2025">027/09/BAHP/BJRS/II/2025</option>
                                                             <option value="027/09/BAHP/BJRS/III/2025">027/09/BAHP/BJRS/III/2025</option>
                                                             <option value="027/09/BAHP/BJRS/IV/2025">027/09/BAHP/BJRS/IV/2025</option>
                                                             <option value="027/09/BAHP/BJRS/V/2025">027/09/BAHP/BJRS/V/2025</option>
                                                             <option value="027/09/BAHP/BJRS/VI/2025">027/09/BAHP/BJRS/VI/2025</option>
                                                             <option value="027/09/BAHP/BJRS/VII/2025">027/09/BAHP/BJRS/VII/2025</option>
                                                             <option value="027/09/BAHP/BJRS/VIII/2025">027/09/BAHP/BJRS/VIII/2025</option>
                                                             <option value="027/09/BAHP/BJRS/IX/2025">027/09/BAHP/BJRS/IX/2025</option>
                                                             <option value="027/09/BAHP/BJRS/X/2025">027/09/BAHP/BJRS/X/2025</option>
                                                             <option value="027/09/BAHP/BJRS/XI/2025">027/09/BAHP/BJRS/XI/2025</option>
                                                             <option value="027/09/BAHP/BJRS/XII/2025">027/09/BAHP/BJRS/XII/2025</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="form-floating">
                                                            <label class="labeldata">*</label>
                                                            <input style="height: 30px; font-size: 13px;" type="date" name="tgllapproseshasilpengadaan" class="form-control border-left-warning shadow" id="tgllapproseshasilpengadaan" required>                                                 
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col-7">
                                                        <div class="form-floating">
                                                            <label>Nota Dinas</label>
                                                            <select style="height: 30px; font-size: 13px;" type="text" name="notadinas" class="form-control" id="notadinas" required>
                                                             <option value="-">--Pilih--</option>
                                                             <option value="027/08/BAHP/ND/I/2025">027/08/BAHP/ND/I/2025</option>
                                                             <option value="027/08/BAHP/ND/II/2025">027/08/BAHP/ND/II/2025</option>
                                                             <option value="027/08/BAHP/ND/III/2025">027/08/BAHP/ND/III/2025</option>
                                                             <option value="027/08/BAHP/ND/IV/2025">027/08/BAHP/ND/IV/2025</option>
                                                             <option value="027/08/BAHP/ND/V/2025">027/08/BAHP/ND/V/2025</option>
                                                             <option value="027/08/BAHP/ND/VI/2025">027/08/BAHP/ND/VI/2025</option>
                                                             <option value="027/08/BAHP/ND/VII/2025">027/08/BAHP/ND/VII/2025</option>
                                                             <option value="027/08/BAHP/ND/VIII/2025">027/08/BAHP/ND/VIII/2025</option>
                                                             <option value="027/08/BAHP/ND/IX/2025">027/08/BAHP/ND/IX/2025</option>
                                                             <option value="027/08/BAHP/ND/X/2025">027/08/BAHP/ND/X/2025</option>
                                                             <option value="027/08/BAHP/ND/XI/2025">027/08/BAHP/ND/XI/2025</option>
                                                             <option value="027/08/BAHP/ND/XII/2025">027/08/BAHP/ND/XII/2025</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="form-floating">
                                                        <label class="labeldata" >*</label>
                                                            <input style="height: 30px; font-size: 13px;" type="date" name="tglnotadinas" class="form-control border-left-warning shadow" id="tglnotadinas" required>                                                 
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Baris 7 -->
                                                <div class="row g-2">
                                                    <div class="col-7">
                                                        <div class="form-floating">
                                                            <label>SPPBJ</label>
                                                            <select style="height: 30px; font-size: 13px;" type="text" name="sppbj" class="form-control" id="sppbj" required>
                                                             <option value="-">--Pilih--</option>
                                                             <option value="027/05/BAHP/SPPBJ/I/2025">027/05/BAHP/SPPBJ/I/2025</option>
                                                             <option value="027/05/BAHP/SPPBJ/II/2025">027/05/BAHP/SPPBJ/II/2025</option>
                                                             <option value="027/05/BAHP/SPPBJ/III/2025">027/05/BAHP/SPPBJ/III/2025</option>
                                                             <option value="027/05/BAHP/SPPBJ/IV/2025">027/05/BAHP/SPPBJ/IV/2025</option>
                                                             <option value="027/05/BAHP/SPPBJ/V/2025">027/05/BAHP/SPPBJ/V/2025</option>
                                                             <option value="027/05/BAHP/SPPBJ/VI/2025">027/05/BAHP/SPPBJ/VI/2025</option>
                                                             <option value="027/05/BAHP/SPPBJ/VII/2025">027/05/BAHP/SPPBJ/VII/2025</option>
                                                             <option value="027/05/BAHP/SPPBJ/VIII/2025">027/05/BAHP/SPPBJ/VIII/2025</option>
                                                             <option value="027/05/BAHP/SPPBJ/IX/2025">027/05/BAHP/SPPBJ/IX/2025</option>
                                                             <option value="027/05/BAHP/SPPBJ/X/2025">027/05/BAHP/SPPBJ/X/2025</option>
                                                             <option value="027/05/BAHP/SPPBJ/XI/2025">027/05/BAHP/SPPBJ/XI/2025</option>
                                                             <option value="027/05/BAHP/SPPBJ/XII/2025">027/05/BAHP/SPPBJ/XII/2025</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="form-floating">
                                                            <label class="labeldata">*</label>
                                                            <input style="height: 30px; font-size: 13px;" type="date" name="tglsppbj" class="form-control border-left-success shadow" id="tglsppbj" required>                                                 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col-7">
                                                        <div class="form-floating">
                                                            <label>Surat Pesanan</label>
                                                            <select style="height: 30px; font-size: 13px;" type="text" name="suratpesanan" class="form-control" id="suratpesanan" required>
                                                             <option value="-">--Pilih--</option>
                                                             <option value="027/07/BAHP/SPB/I/2025">027/07/BAHP/SPB/I/2025</option>
                                                             <option value="027/07/BAHP/SPB/II/2025">027/07/BAHP/SPB/II/2025</option>
                                                             <option value="027/07/BAHP/SPB/III/2025">027/07/BAHP/SPB/III/2025</option>
                                                             <option value="027/07/BAHP/SPB/IV/2025">027/07/BAHP/SPB/IV/2025</option>
                                                             <option value="027/07/BAHP/SPB/V/2025">027/07/BAHP/SPB/V/2025</option>
                                                             <option value="027/07/BAHP/SPB/VI/2025">027/07/BAHP/SPB/VI/2025</option>
                                                             <option value="027/07/BAHP/SPB/VII/2025">027/07/BAHP/SPB/VII/2025</option>
                                                             <option value="027/07/BAHP/SPB/VIII/2025">027/07/BAHP/SPB/VIII/2025</option>
                                                             <option value="027/07/BAHP/SPB/IX/2025">027/07/BAHP/SPB/IX/2025</option>
                                                             <option value="027/07/BAHP/SPB/X/2025">027/07/BAHP/SPB/X/2025</option>
                                                             <option value="027/07/BAHP/SPB/XI/2025">027/07/BAHP/SPB/XI/2025</option>
                                                             <option value="027/07/BAHP/SPB/XII/2025">027/07/BAHP/SPB/XII/2025</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="form-floating">
                                                        <label class="labeldata" >*</label>
                                                            <input style="height: 30px; font-size: 13px;" type="date" name="tglsuratpesanan" class="form-control border-left-success shadow" id="tglsuratpesanan" required>                                                 
                                                        </div>
                                                    </div>
                                                </div>
                                    </div>
                                </div>
                                <!-- Akhir kolom 1 -->

                                <!-- Kolom 2 -->
                                <hr class="sidebar-divider">
                                <hr class="sidebar-divider">
                                <!-- <hr class="sidebar-divider border-success"> -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                                <!-- Baris 1 -->
                                                <div class="row g-2">
                                                    <?php	
                                                    include "../../../koneksi.php";
                                                        
                                                    // Check connection
                                                    if (mysqli_connect_error()){
                                                        echo "Koneksi database gagal : " . mysqli_connect_error();
                                                    }
                                                    ?>
                                                    <div class="col-12">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Pekerjaan</label>
                                                            <select style="height: 30px; font-size: 13px;" type="text" class="form-control" name="pekerjaan" id="pekerjaan" onchange="detailpptk()" required>
                                                                <option value="">--Pilih--</option>
                                                                <?php
                                                                $pptk = mysqli_query($koneksi,"select * from pptk");
                                                                while($f = mysqli_fetch_array($pptk)){
                                                                ?>
                                                                    <option value="<?php echo $f['pekerjaan'] ?>"><?php echo $f['pekerjaan']; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Baris 2 -->
                                                <div class="row g-2">
                                                    <div class="col-12">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Sub Kegiatan</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="subkegiatan"  class="form-control" id="subkegiatan" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col-12">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Kegiatan</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="kegiatan" class="form-control" id="kegiatan" readonly>                                               
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="row g-2">
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Nomor Rekening Sub Kegiatan</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="noreksubkegiatan" class="form-control" id="noreksubkegiatan" readonly>                                               
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Nama Rekening Sub Kegiatan</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="namarekening" class="form-control" id="namarekening" readonly>                                               
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="row g-2">
                                                <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Kode Rekening</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="koderekeningkegiatan" class="form-control" id="koderekeningkegiatan" readonly>                                               
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                
                                        </div>
                                        <div class="col-sm-6">
                                                <div class="row g-2">
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Nama PPTK</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="namapptk" class="form-control" id="namapptk" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">NIP</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="nippptk" class="form-control" id="nippptk" readonly>                                               
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Baris 6 -->
                                                <div class="row g-2">
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Nomor SK</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="nomorskpptk"  class="form-control" id="nomorskpptk" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Tanggal SK</label>
                                                            <input style="height: 30px; font-size: 13px;" type="date" name="tglskpptk" class="form-control" id="tglskpptk" readonly>                                               
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Baris 1 -->
                                                <div class="row g-2">
                                                    <div class="col-12">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Jabatan</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="jabatanpptk"  class="form-control" id="jabatanpptk" readonly>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row g-2">
                                                    <div class="col-8">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Nomor DPA / DPPA</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="nomordpa"  class="form-control" id="nomordpa" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Tanggal DPA / DPPA</label>
                                                            <input style="height: 30px; font-size: 13px;" type="date" name="tgldpa"  class="form-control" id="tgldpa" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                        </div>
                                    </div>
                                </div>
                                        
                                <!-- Akhir Kolom 2 -->

                                <!-- Kolom 3 -->
                                <hr class="sidebar-divider">
                                <hr class="sidebar-divider">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                                <div class="row g-2">
                                                    <div class="col-4">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Nilai HPS</label>
                                                            <!-- <input style="height: 30px; font-size: 13px;" type="float" name="nilaihps"  class="form-control" id="input style="height: 30px; font-size: 13px;"kua" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required> -->
                                                            <input style="height: 30px; font-size: 13px;" type="number"  name="nilaihps" class="form-control" id="nilaihps" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Terbilang</label>
                                                            <textarea style="font-size: 13px;" type="text" name="terbilanghps" class="form-control" id="terbilanghps" readonly></textarea>                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col-4">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Nilai PPN HPS</label>
                                                            <!-- <input style="height: 30px; font-size: 13px;" type="text" name="nilainego"  class="form-control" id="input style="height: 30px; font-size: 13px;"kub" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required> -->
                                                            <input style="font-size: 13px;" type="number" name="nilaippnhps" class="form-control" id="nilaippnhps" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Terbilang</label>
                                                            <textarea style="font-size: 13px;" type="text" name="terbilangppnhps" class="form-control" id="terbilangppnhps" readonly></textarea>                                            
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                                <div class="row g-2">
                                                        <div class="col-4">
                                                            <div class="form-floating">
                                                                <label class="labeldata">Total HPS</label>
                                                                <input style="font-size: 13px;" type="number" name="nilaitotalhps" class="form-control" id="nilaitotalhps" required>                                       
                                                            </div>
                                                        </div>
                                                        <div class="col-8">
                                                            <div class="form-floating">
                                                                <label class="labeldata">Terbilang</label>
                                                                <textarea style="font-size: 13px;" type="text" name="terbilangtotalhps"  class="form-control" id="terbilangtotalhps" readonly></textarea>                                            
                                                            </div>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="col-sm-6">
                                        <div class="row g-2">
                                                    <div class="col-4">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Nilai Nego</label>
                                                            <!-- <input style="height: 30px; font-size: 13px;" type="float" name="nilaihps"  class="form-control" id="input style="height: 30px; font-size: 13px;"kua" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required> -->
                                                            <input style="height: 30px; font-size: 13px;" type="number"  name="nilainego" class="form-control" id="nilainego" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Terbilang</label>
                                                            <textarea style="font-size: 13px;" type="text" name="terbilangnego" class="form-control" id="terbilangnego" readonly></textarea>                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col-4">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Nilai PPN Nego</label>
                                                            <!-- <input style="height: 30px; font-size: 13px;" type="text" name="nilainego"  class="form-control" id="input style="height: 30px; font-size: 13px;"kub" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required> -->
                                                            <input style="font-size: 13px;" type="number" name="nilaippnnego" class="form-control" id="nilaippnnego" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Terbilang</label>
                                                            <textarea style="font-size: 13px;" type="text" name="terbilangppnnego" class="form-control" id="terbilangppnnego" readonly></textarea>                                            
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row g-2">
                                                        <div class="col-4">
                                                            <div class="form-floating">
                                                                <label class="labeldata">Total Nego</label>
                                                                <input style="font-size: 13px;" type="number" name="nilaitotalnego" class="form-control" id="nilaitotalnego" required>                                       
                                                            </div>
                                                        </div>
                                                        <div class="col-8">
                                                            <div class="form-floating">
                                                                <label class="labeldata">Terbilang</label>
                                                                <textarea style="font-size: 13px;" type="text" name="terbilangtotalnego"  class="form-control" id="terbilangtotalnego" readonly></textarea>                                            
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Nilai PPH</label>
                                                            <input style="font-size: 13px;" type="number" name="nilaipph" class="form-control" id="nilaipph" required>                                       
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Terbilang</label>
                                                            <textarea style="font-size: 13px;" type="text" name="terbilangpph" class="form-control" id="terbilangpph" readonly></textarea>                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Total BAP</label>
                                                            <input style="font-size: 13px;" type="number" name="totalbap" class="form-control" id="totalbap" required>                                       
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Terbilang</label>
                                                            <textarea style="font-size: 13px;" type="text" name="terbilangbap" class="form-control" id="terbilangbap" readonly></textarea>                                            
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Akhir Kolom 3 -->
                                <br>
                                <hr class="sidebar-divider">
                                <hr class="sidebar-divider">
                                <!-- <hr class="sidebar-divider border-success"> -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- <div class="form-floating">
                                                            <label>Nilai Kontrak</label>
                                                            <select style="height: 30px; font-size: 13px;" type="text" name="nilai" class="form-control" id="nilai" required>
                                                             <option>--Pilih--</option>
                                                             <option value="<300">< 300 jt</option>
                                                             <option value=">=300">>= 300 jt</option>
                                                            </select>
                                            </div> -->
                                            <h4>NILAI KONTRAK <= 300 JUTA</h4>

                                            <hr class="sidebar-divider">
                                            <div class="row g-2">
                                                        <?php	
                                                        include "../../../koneksi.php";
                                                            
                                                        // Check connection
                                                        if (mysqli_connect_error()){
                                                            echo "Koneksi database gagal : " . mysqli_connect_error();
                                                        }
                                                        ?>
                                                        <div class="col-6">
                                                            <div class="form-floating">
                                                                <label class="labeldata" id="aa" >Ketua Pejabat pemeriksa</label>
                                                                <select style="height: 30px; font-size: 13px;" type="text" class="form-control" onchange="detailpemeriksa()" name="namapejabatpemeriksa" id="namapejabatpemeriksa" required >
                                                                    <option value="">--Pilih--</option>
                                                                    <?php
                                                                    $pemeriksa = mysqli_query($koneksi,"select * from pemeriksa");
                                                                    while($r = mysqli_fetch_array($pemeriksa)){
                                                                    ?>
                                                                        <option value="<?php echo $r['namapejabatpemeriksa'] ?>"><?php echo $r['namapejabatpemeriksa']; ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                                    <div class="form-floating">
                                                                        <label class="labeldata" id="bb" >NIP</label>
                                                                        <input style="height: 30px; font-size: 13px;" type="text" name="nippejabatpemeriksa" class="form-control" id="nippejabatpemeriksa" readonly >                                               
                                                                    </div>
                                                        </div>
                                            </div>
                                            <div class="row g-2">
                                                        <div class="col-6">
                                                                    <div class="form-floating" id="cc" >
                                                                        <label class="labeldata">Nomor SK</label>
                                                                        <input style="height: 30px; font-size: 13px;" type="text" name="nomorskpejabatpemeriksa" class="form-control" id="nomorskpejabatpemeriksa" readonly >                                               
                                                                    </div>
                                                        </div>
                                                        <div class="col-6">
                                                                    <div class="form-floating" id="dd" >
                                                                        <label class="labeldata">Tanggal SK</label>
                                                                        <input style="height: 30px; font-size: 13px;" type="date" name="tglskpejabatpemeriksa" class="form-control" id="tglskpejabatpemeriksa" readonly >                                               
                                                                    </div>
                                                        </div>
                                            </div>
                                            <hr class="sidebar-divider">
                                            <!-- <hr class="sidebar-divider"> -->

                                                     
                                        </div>
                                        <div class="col-sm-6">
                                            <h4>NILAI KONTRAK > 300 JUTA</h4>
                                        <hr class="sidebar-divider">
                                        <!-- <hr class="sidebar-divider"> -->

                                        <div class="row g-2">
                                                            <?php	
                                                            include "../../../koneksi.php";
                                                                
                                                            // Check connection
                                                            if (mysqli_connect_error()){
                                                                echo "Koneksi database gagal : " . mysqli_connect_error();
                                                            }
                                                            ?>
                                                            <div class="col-6">
                                                                <div class="form-floating">
                                                                    <label class="labeldata" id="a1">Ketua Pejabat pemeriksa</label>
                                                                    <select style="height: 30px; font-size: 13px;" type="text" class="form-control" onchange="detailpemeriksa1()" name="namapejabatpemeriksa1" id="namapejabatpemeriksa1" required>
                                                                        <option value="">--Pilih--</option>
                                                                        <?php
                                                                        $pemeriksa2 = mysqli_query($koneksi,"select * from pemeriksa2");
                                                                        while($m = mysqli_fetch_array($pemeriksa2)){
                                                                        ?>
                                                                            <option value="<?php echo $m['namapejabatpemeriksa'] ?>"><?php echo $m['namapejabatpemeriksa']; ?></option>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                        <div class="form-floating">
                                                                            <label class="labeldata" id="b1">NIP</label>
                                                                            <input style="height: 30px; font-size: 13px;" type="text" name="nippejabatpemeriksa1" class="form-control" id="nippejabatpemeriksa1" readonly>                                               
                                                                        </div>
                                                            </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col-6">
                                                                <div class="form-floating">
                                                                    <label class="labeldata" id="c1">Nomor SK</label>
                                                                    <input style="height: 30px; font-size: 13px;" type="text" name="nomorskpejabatpemeriksa1" class="form-control" id="nomorskpejabatpemeriksa1" readonly>                                               
                                                                </div>
                                                    </div>
                                                    <div class="col-6">
                                                                <div class="form-floating">
                                                                    <label class="labeldata" id="d1">Tanggal SK</label>
                                                                    <input style="height: 30px; font-size: 13px;" type="date" name="tglskpejabatpemeriksa1" class="form-control" id="tglskpejabatpemeriksa1" readonly>                                               
                                                                </div>
                                                    </div>
                                                </div>
                                                <hr class="sidebar-divider">
                                                <hr class="sidebar-divider">
                                                <div class="row g-2">
                                                    <?php	
                                                    include "../../../koneksi.php";
                                                        
                                                    // Check connection
                                                    if (mysqli_connect_error()){
                                                        echo "Koneksi database gagal : " . mysqli_connect_error();
                                                    }
                                                    ?>
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata" id="a2">Anggota Pejabat pemeriksa</label>
                                                            <select style="height: 30px; font-size: 13px;" type="text" class="form-control" onchange="detailpemeriksa2()" name="namapejabatpemeriksa2" id="namapejabatpemeriksa2" required>
                                                                <option value="">--Pilih--</option>
                                                                <?php
                                                                $pemeriksa2 = mysqli_query($koneksi,"select * from pemeriksa2");
                                                                while($n = mysqli_fetch_array($pemeriksa2)){
                                                                ?>
                                                                    <option value="<?php echo $n['namapejabatpemeriksa'] ?>"><?php echo $n['namapejabatpemeriksa']; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                                <div class="form-floating" >
                                                                    <label class="labeldata" id="b2">NIP</label>
                                                                    <input style="height: 30px; font-size: 13px;" type="text" name="nippejabatpemeriksa2" class="form-control" id="nippejabatpemeriksa2" readonly>                                               
                                                                </div>
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col-6">
                                                                <div class="form-floating">
                                                                    <label class="labeldata" id="c2">Nomor SK</label>
                                                                    <input style="height: 30px; font-size: 13px;" type="text" name="nomorskpejabatpemeriksa2" class="form-control" id="nomorskpejabatpemeriksa2" readonly>                                               
                                                                </div>
                                                    </div>
                                                    <div class="col-6">
                                                                <div class="form-floating">
                                                                    <label class="labeldata" id="d2">Tanggal SK</label>
                                                                    <input style="height: 30px; font-size: 13px;" type="date" name="tglskpejabatpemeriksa2" class="form-control" id="tglskpejabatpemeriksa2" readonly>                                               
                                                                </div>
                                                    </div>
                                                </div>
                                                <hr class="sidebar-divider">
                                                <hr class="sidebar-divider">
                                                <div class="row g-2">
                                                    <?php	
                                                    include "../../../koneksi.php";
                                                        
                                                    // Check connection
                                                    if (mysqli_connect_error()){
                                                        echo "Koneksi database gagal : " . mysqli_connect_error();
                                                    }
                                                    ?>
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata" id="a3">Anggota Pejabat pemeriksa</label>
                                                            <select style="height: 30px; font-size: 13px;" type="text" class="form-control" onchange="detailpemeriksa3()" name="namapejabatpemeriksa3" id="namapejabatpemeriksa3" required>
                                                                <option value="">--Pilih--</option>
                                                                <?php
                                                                $pemeriksa3 = mysqli_query($koneksi,"select * from pemeriksa2");
                                                                while($o = mysqli_fetch_array($pemeriksa3)){
                                                                ?>
                                                                    <option value="<?php echo $o['namapejabatpemeriksa'] ?>"><?php echo $o['namapejabatpemeriksa']; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                                <div class="form-floating" >
                                                                    <label class="labeldata" id="b3">NIP</label>
                                                                    <input style="height: 30px; font-size: 13px;" type="text" name="nippejabatpemeriksa3" class="form-control" id="nippejabatpemeriksa3" readonly>                                               
                                                                </div>
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col-6">
                                                                <div class="form-floating">
                                                                    <label class="labeldata" id="c3">Nomor SK</label>
                                                                    <input style="height: 30px; font-size: 13px;" type="text" name="nomorskpejabatpemeriksa3" class="form-control" id="nomorskpejabatpemeriksa3" readonly>                                               
                                                                </div>
                                                    </div>
                                                    <div class="col-6">
                                                                <div class="form-floating">
                                                                    <label class="labeldata" id="d3">Tanggal SK</label>
                                                                    <input style="height: 30px; font-size: 13px;" type="date" name="tglskpejabatpemeriksa3" class="form-control" id="tglskpejabatpemeriksa3" readonly>                                               
                                                                </div>
                                                    </div>
                                                </div>
                                                
                                        
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!-- Kolom 3 -->
                                <hr class="sidebar-divider">
                                <hr class="sidebar-divider">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                                <!-- Baris 1 -->
                                                <div class="row g-2">
                                                    <?php	
                                                    include "../../../koneksi.php";
                                                        
                                                    // Check connection
                                                    if (mysqli_connect_error()){
                                                        echo "Koneksi database gagal : " . mysqli_connect_error();
                                                    }
                                                    ?>
                                                    <div class="col-12">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Nama Pejabat Barjas</label>
                                                            <select style="height: 30px; font-size: 13px;" type="text" class="form-control" name="namapejabatbarjas" onchange="detailpejabatbarjas()" id="namapejabatbarjas" required>
                                                                <option value="">--Pilih--</option>
                                                                <?php
                                                                $pejabat = mysqli_query($koneksi,"select * from pejabat");
                                                                while($h = mysqli_fetch_array($pejabat)){
                                                                ?>
                                                                    <option value="<?php echo $h['namapejabatbarjas'] ?>"><?php echo $h['namapejabatbarjas']; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Baris 2 -->
                                                <div class="row g-2">
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">NIP</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="nippejabatbarjas"  class="form-control" id="nippejabatbarjas" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Nomor SK</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="nomorskpejabatbarjas" class="form-control" id="nomorskpejabatbarjas" readonly>                                               
                                                        </div>
                                                    </div>
                                                </div> 
                                                <!-- Baris 3 -->
                                                <div class="row g-2">
                                                    <!-- <div class="col-8">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Jabatan</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="namajabatanbarjas" class="form-control" id="namajabatanbarjas" readonly>
                                                        </div>
                                                    </div> -->
                                                    <div class="col-4">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Tanggal SK</label>
                                                            <input style="height: 30px; font-size: 13px;" type="date" name="tglskpejabatbarjas" class="form-control" id="tglskpejabatbarjas" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Jabatan</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="jabatanpejabatbarjas" class="form-control" id="jabatanpejabatbarjas" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-sm-6">
                                                <!-- Baris 1 -->
                                                <div class="row g-2">
                                                    <?php	
                                                    include "../../../koneksi.php";
                                                        
                                                    // Check connection
                                                    if (mysqli_connect_error()){
                                                        echo "Koneksi database gagal : " . mysqli_connect_error();
                                                    }
                                                    ?>
                                                    <div class="col-12">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Nama PPK</label>
                                                            <select style="height: 30px; font-size: 13px;" type="text" class="form-control" name="namappk" onchange="detailppk()" id="namappk" required>
                                                                <option value="">--Pilih--</option>
                                                                <?php
                                                                $ppk = mysqli_query($koneksi,"select * from ppk");
                                                                while($g = mysqli_fetch_array($ppk)){
                                                                ?>
                                                                    <option value="<?php echo $g['namappk'] ?>"><?php echo $g['namappk']; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Baris 2 -->
                                                <div class="row g-2">
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">NIP</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="nipppk"  class="form-control" id="nipppk" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Nomor SK</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="nomorskppk" class="form-control" id="nomorskppk" readonly>                                               
                                                        </div>
                                                    </div>
                                                </div> 
                                                <!-- Baris 3 -->
                                                <div class="row g-2">
                                                    <div class="col-4">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Tanggal SK</label>
                                                            <input style="height: 30px; font-size: 13px;" type="date" name="tglskppk" class="form-control" id="tglskppk" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Jabatan</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="jabatanppk" class="form-control" id="jabatanppk" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Akhir Kolom 3 -->
                                <br>
                                <!-- Kolom 4 -->
                                <hr class="sidebar-divider">
                                <hr class="sidebar-divider">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                                <!-- Baris 1 -->
                                                <div class="row g-2">
                                                    <?php	
                                                    include "../../../koneksi.php";
                                                        
                                                    // Check connection
                                                    if (mysqli_connect_error()){
                                                        echo "Koneksi database gagal : " . mysqli_connect_error();
                                                    }
                                                    ?>
                                                    <div class="col-12">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Nama Perusahaan</label>
                                                            <select style="height: 30px; font-size: 13px;" type="text" class="form-control" name="namaperusahaan" onchange="detailpenyedia()" id="namaperusahaan" required>
                                                                <option value="">--Pilih--</option>
                                                                <?php
                                                                $penyedia = mysqli_query($koneksi,"select * from penyedia");
                                                                while($i = mysqli_fetch_array($penyedia)){
                                                                ?>
                                                                    <option value="<?php echo $i['namaperusahaan'] ?>"><?php echo $i['namaperusahaan']; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Baris 2 -->
                                                <div class="row g-2">
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Nama Pimpinan</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="namapimpinan"  class="form-control" id="namapimpinan" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Jabatan</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="jabatan" class="form-control" id="jabatan" readonly>                                               
                                                        </div>
                                                    </div>
                                                </div> 
                                                <!-- Baris 2 -->
                                                <div class="row g-2">
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Nomor Rekening</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="norekening"  class="form-control" id="norekening" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Bank</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="namabank" class="form-control" id="namabank" readonly>                                               
                                                        </div>
                                                    </div>
                                                </div> 
                                                <!-- Baris 3 -->
                                                <div class="row g-2">
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Rekening Atas Nama</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="namarekbank" class="form-control" id="namarekbank" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">NPWP</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="npwp" class="form-control" id="npwp" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Baris 3 -->
                                                <div class="row g-2">
                                                    <div class="col-12">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Alamat</label>
                                                            <textarea style="font-size: 13px;"a type="text" name="alamat" class="form-control" id="alamat" readonly></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col-12">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Kota</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="kota" class="form-control" id="kota" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-sm-4">
                                                <!-- Baris 1 -->
                                                <div class="row g-2">
                                                    
                                                    <div class="col-12">
                                                        <div class="form-floating">
                                                            <label class="labeldata">No. Penawaran</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="nopenawaran" class="form-control" id="nopenawaran" required>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Baris 2 -->
                                                <div class="row g-2">
                                                    <div class="col-8">
                                                        <div class="form-floating">
                                                            <label class="labeldata">No. Permohonan Pemeriksaan</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="nopemeriksaan"  class="form-control" id="nopemeriksaan" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-floating">
                                                            <label class="labeldata">*</label>
                                                            <input style="height: 30px; font-size: 13px;" type="date" name="tglpemeriksaan" class="form-control" id="tglpemeriksaan" required>                                               
                                                        </div>
                                                    </div>
                                                </div> 
                                                <!-- Baris 2 -->
                                                <div class="row g-2">
                                                    <div class="col-8">
                                                        <div class="form-floating">
                                                            <label class="labeldata">No. Permohonan Pembayaran</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="nopembayaran"  class="form-control" id="nopembayaran" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-floating">
                                                            <label class="labeldata">*</label>
                                                            <input style="height: 30px; font-size: 13px;" type="date" name="tglpembayaran" class="form-control" id="tglpembayaran" required>                                               
                                                        </div>
                                                    </div>
                                                </div> 
                                                <!-- Baris 3 -->
                                                <div class="row g-2">
                                                    <div class="col-8">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Nomor Undangan Pemeriksaan PPK</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="noundanganppk" class="form-control" id="noundanganppk" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-floating">
                                                            <label class="labeldata">*</label>
                                                            <input style="height: 30px; font-size: 13px;" type="date" name="tglundanganppk" class="form-control" id="tglundanganppk" required>                                               
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Baris 1 -->
                                                <div class="row g-2">
                                                    <div class="col-8">
                                                        <div class="form-floating">
                                                            <label class="labeldata">No. BAPHP</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="nobaphp" class="form-control" id="nobaphp" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-floating">
                                                            <label class="labeldata">*</label>
                                                            <input style="height: 30px; font-size: 13px;" type="date" name="tglbaphp" class="form-control" id="tglbaphp" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Baris 2 -->
                                                <div class="row g-2">
                                                    <div class="col-8">
                                                        <div class="form-floating">
                                                            <label class="labeldata">No. BASTB</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="nobastb" class="form-control" id="nobastb" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-floating">
                                                            <label class="labeldata">*</label>
                                                            <input style="height: 30px; font-size: 13px;" type="date" name="tglbastb" class="form-control" id="tglbastb" required>
                                                        </div>
                                                    </div>
                                                </div> 
                                                
                                            
                                        </div>
                                        <div class="COL-4">
<!-- Baris 1 -->
<div class="row g-2">
                                                    <div class="col-12">
                                                        <div class="form-floating">
                                                            <label class="labeldata">K/L/D/I</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="kldi" value="Pemerintah Kabupaten Indramayu"  class="form-control" id="kldi" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Baris 2 -->
                                                <div class="row g-2">
                                                <div class="col-8">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Satuan Kerja</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="satuankerja" value="RSUD Indramayu"  class="form-control" id="satuankerja" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Tahun Anggaran</label>
                                                            <select style="height: 30px; font-size: 13px;" type="text" class="form-control" name="tahunanggaran" id="tahunanggaran" required>
                                                                <option value="">--Pilih--</option>
                                                                <option value="2024">2024</option>
                                                                <option value="2025">2025</option>
                                                                <option value="2026">2026</option>
                                                                <option value="2027">2027</option>
                                                                <option value="2028">2028</option>
                                                            </select>
                                                            <!-- <input style="height: 30px; font-size: 13px;" type="text" name="tahunanggaran"  class="form-control" id="satuankerja" readonly> -->
                                                        </div>
                                                    </div>
                                                </div> 
                                                <!-- Baris 3 -->
                                                <div class="row g-2">
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Sumber Dana</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="sumberdana" value="BLUD RSUD Indramayu Tahun 2025" class="form-control" id="sumberdana" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Nomor Telpon</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="nomortlp" value="(0234) 275 330"  class="form-control" id="nomortlp" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col-12">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Alamat</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="alamatsatker" value="Jl. Murah Nara No.7 Sindang - Indramayu"  class="form-control" id="alamatsatker" readonly>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="row g-2">
                                                    <div class="col-12">
                                                        <div class="form-floating">
                                                            <label class="labeldata" hidden>User</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="user" value="<?php echo $_SESSION['username']; ?>"  class="form-control" id="user" hidden  >
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Akhir Kolom 4 -->
                                <br>
                                <!-- Footer -->
                                            <div class="modal-footer">  
                                                <button type="submit" class="btn btn-info">Simpan</button>
                                                <a href="spk.php" type="button" class="btn btn-default">Batal</a>
                                                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button> -->
                                            </div>
                                </form>
                            </div>
                    
                </div>
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
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../js/demo/datatables-demo.js"></script>

<!-- Waktu Pelaksanaan -->
<script type="text/javascript">
 
    // www.malasngoding.com
    function terbilang(nilai) {
      // deklarasi variabel nilai sebagai angka matemarika
      // Objek Math bertujuan agar kita bisa melakukan tugas matemarika dengan javascript
      nilai = Math.floor(Math.abs(nilai));
 
      // deklarasi nama angka dalam bahasa indonesia
      var huruf = [
        '',
        'Satu',
        'Dua',
        'Tiga',
        'Empat',
        'Lima',
        'Enam',
        'Tujuh',
        'Delapan',
        'Sembilan',
        'Sepuluh',
        'Sebelas',
        ];
 
      // menyimpan nilai default untuk pembagian
      var bagi = 0;
      // deklarasi variabel penyimpanan untuk menyimpan proses rumus terbilang
      var penyimpanan = '';
 
      // rumus terbilang
      if (nilai < 12) {
        penyimpanan = ' ' + huruf[nilai];
      } else if (nilai < 20) {
        penyimpanan = terbilang(Math.floor(nilai - 10)) + ' Belas';
      } else if (nilai < 100) {
        bagi = Math.floor(nilai / 10);
        penyimpanan = terbilang(bagi) + ' Puluh' + terbilang(nilai % 10);
      } else if (nilai < 200) {
        penyimpanan = ' Seratus' + terbilang(nilai - 100);
      } else if (nilai < 1000) {
        bagi = Math.floor(nilai / 100);
        penyimpanan = terbilang(bagi) + ' Ratus' + terbilang(nilai % 100);
      } else if (nilai < 2000) {
        penyimpanan = ' Seribu' + terbilang(nilai - 1000);
      } else if (nilai < 1000000) {
        bagi = Math.floor(nilai / 1000);
        penyimpanan = terbilang(bagi) + ' Ribu' + terbilang(nilai % 1000);
      } else if (nilai < 1000000000) {
        bagi = Math.floor(nilai / 1000000);
        penyimpanan = terbilang(bagi) + ' Juta' + terbilang(nilai % 1000000);
      } else if (nilai < 1000000000000) {
        bagi = Math.floor(nilai / 1000000000);
        penyimpanan = terbilang(bagi) + ' Miliar' + terbilang(nilai % 1000000000);
      } else if (nilai < 1000000000000000) {
        bagi = Math.floor(nilai / 1000000000000);
        penyimpanan = terbilang(nilai / 1000000000000) + ' Triliun' + terbilang(nilai % 1000000000000);
      }
 
      // mengambalikan nilai yang ada dalam variabel penyimpanan
      return penyimpanan;
    }
 
    // membuat event pada saat form angka di ketik
    document.getElementById("tglselesaikontrak").addEventListener("change", function(){
 
    // deklarasi id angka ke variabel input
    var input = document.getElementById("waktupelaksanaan").value;

    // menyimpan hasil terbilang ke variabel huruf;
    let huruf = terbilang(input);

    // menampilkan hasil terbilang ke id huruf
    document.getElementById("terbilangwaktupelaksanaan").innerHTML  = huruf;
    });

    // membuat event pada saat form angka di ketik
    document.getElementById("nilaihps").addEventListener("keyup", function(){
 
        // deklarasi id angka ke variabel input
        var input = document.getElementById("nilaihps").value;
 
        // menyimpan hasil terbilang ke variabel huruf;
        let huruf = terbilang(input) + " Rupiah";
 
        // menampilkan hasil terbilang ke id huruf
        document.getElementById("terbilanghps").innerHTML  = huruf;
    });


    // membuat event pada saat form angka di ketik
    document.getElementById("nilaippnhps").addEventListener("keyup", function(){
 
        // deklarasi id angka ke variabel input
        var input = document.getElementById("nilaippnhps").value;
 
        // menyimpan hasil terbilang ke variabel huruf;
        let huruf = terbilang(input) + " Rupiah";
 
        // menampilkan hasil terbilang ke id huruf
        document.getElementById("terbilangppnhps").innerHTML  = huruf;
    });


    // membuat event pada saat form angka di ketik
    document.getElementById("nilaitotalhps").addEventListener("keyup", function(){
 
        // deklarasi id angka ke variabel input
        var input = document.getElementById("nilaitotalhps").value;
 
        // menyimpan hasil terbilang ke variabel huruf;
        let huruf = terbilang(input) + " Rupiah";
 
        // menampilkan hasil terbilang ke id huruf
        document.getElementById("terbilangtotalhps").innerHTML  = huruf;
    });


    // membuat event pada saat form angka di ketik
    document.getElementById("nilainego").addEventListener("keyup", function(){
 
        // deklarasi id angka ke variabel input
        var input = document.getElementById("nilainego").value;
 
        // menyimpan hasil terbilang ke variabel huruf;
        let huruf = terbilang(input) + " Rupiah";
 
        // menampilkan hasil terbilang ke id huruf
        document.getElementById("terbilangnego").innerHTML  = huruf;
    });


    // membuat event pada saat form angka di ketik
    document.getElementById("nilaippnnego").addEventListener("keyup", function(){
 
        // deklarasi id angka ke variabel input
        var input = document.getElementById("nilaippnnego").value;
 
        // menyimpan hasil terbilang ke variabel huruf;
        let huruf = terbilang(input) + " Rupiah";
 
        // menampilkan hasil terbilang ke id huruf
        document.getElementById("terbilangppnnego").innerHTML  = huruf;
    });


    // membuat event pada saat form angka di ketik
    document.getElementById("nilaipph").addEventListener("keyup", function(){
 
        // deklarasi id angka ke variabel input
        var input = document.getElementById("nilaipph").value;
 
        // menyimpan hasil terbilang ke variabel huruf;
        let huruf = terbilang(input) + " Rupiah";
 
        // menampilkan hasil terbilang ke id huruf
        document.getElementById("terbilangpph").innerHTML  = huruf;
    });


    // membuat event pada saat form angka di ketik
    document.getElementById("nilaitotalnego").addEventListener("keyup", function(){
 
        // deklarasi id angka ke variabel input
        var input = document.getElementById("nilaitotalnego").value;
 
        // menyimpan hasil terbilang ke variabel huruf;
        let huruf = terbilang(input) + " Rupiah";
 
        // menampilkan hasil terbilang ke id huruf
        document.getElementById("terbilangtotalnego").innerHTML  = huruf;
    });

    // membuat event pada saat form angka di ketik
    document.getElementById("totalbap").addEventListener("keyup", function(){
 
        // deklarasi id angka ke variabel input
        var input = document.getElementById("totalbap").value;
 
        // menyimpan hasil terbilang ke variabel huruf;
        let huruf = terbilang(input) + " Rupiah";
 
        // menampilkan hasil terbilang ke id huruf
        document.getElementById("terbilangbap").innerHTML  = huruf;
    });
 
</script>

<!-- Total Otomatis -->
<!-- <script>
$(document).ready(function() {
 $("#nilainego, #nilaippn, #nilaipph").keyup(function() {
     var nego  = $("#nilainego").val();
     var ppn = $("#nilaippn").val();
     var pph = $("#nilaipph").val();
     // var jumlah = parseIfloat(ppn) + parsefloat(pph);
     var total = parseFloat(nego) - (parseFloat(ppn) + parseFloat(pph));
     $("#nilaitotal").val(total);
 });
});
</script> -->


<!--PPTK -->
<script>
    function detailpptk(){
    // alert ("ok");
    var pekerjaan = $("#pekerjaan").val();
    $.ajax({
        url :"datapptk.php",
        method : "POST",
        data : {pekerjaan:pekerjaan},
        dataType : "json",
        success : function(f){
            $('#subkegiatan').val(f.subkegiatan);
            $('#koderekeningkegiatan').val(f.koderekeningkegiatan);
            $('#noreksubkegiatan').val(f.noreksubkegiatan);
            $('#namapptk').val(f.namapptk);
            $('#nippptk').val(f.nippptk);
            $('#kegiatan').val(f.kegiatan);
            $('#subkegiatan').val(f.subkegiatan);
            $('#namarekening').val(f.namarekening);
            $('#nomorskpptk').val(f.nomorskpptk);
            $('#tglskpptk').val(f.tglskpptk);
            $('#jabatanpptk').val(f.jabatanpptk);
            $('#nomordpa').val(f.nomordpa);
            $('#tgldpa').val(f.tgldpa);
        }

    })
}
</script>

<!--Pejabat Barjas -->
<script>
    function detailpejabatbarjas(){
    // alert ("ok");
    var namapejabatbarjas = $("#namapejabatbarjas").val();
    $.ajax({
        url :"datapejabatbarjas.php",
        method : "POST",
        data : {namapejabatbarjas:namapejabatbarjas},
        dataType : "json",
        success : function(h){
            // $('#namapejabatbarjas').val(h.namapejabatbarjas);
            $('#nippejabatbarjas').val(h.nippejabatbarjas);
            $('#nomorskpejabatbarjas').val(h.nomorskpejabatbarjas);
            $('#tglskpejabatbarjas').val(h.tglskpejabatbarjas);
            $('#jabatanpejabatbarjas').val(h.jabatanpejabatbarjas);
        }

    })
}
</script>

<!--PPK -->
<script>
    function detailppk(){
    // alert ("ok");
    var namappk = $("#namappk").val();
    $.ajax({
        url :"datappk.php",
        method : "POST",
        data : {namappk:namappk},
        dataType : "json",
        success : function(g){
            // $('#namappk').val(g.namappk);
            $('#nipppk').val(g.nipppk);
            $('#nomorskppk').val(g.nomorskppk);
            $('#tglskppk').val(g.tglskppk);
            $('#jabatanppk').val(g.jabatanppk);
        }

    })
}
</script>

<!--Penyedia -->
<script>
    function detailpenyedia(){
    // alert ("ok");
    var namaperusahaan = $("#namaperusahaan").val();
    $.ajax({
        url :"datapenyedia.php",
        method : "POST",
        data : {namaperusahaan:namaperusahaan},
        dataType : "json",
        success : function(i){
            // $('#namappk').val(i.namappk);
            $('#alamat').val(i.alamat);
            $('#kota').val(i.kota);
            $('#namapimpinan').val(i.namapimpinan);
            $('#jabatan').val(i.jabatan);
            $('#npwp').val(i.npwp);
            $('#norekening').val(i.norekening);
            $('#namabank').val(i.namabank);
            $('#namarekbank').val(i.namarekbank);

        }

    })
}
</script>

<!-- Pejabat Pemeriksa -->
<script>
    function detailpemeriksa(){
    // alert ("ok");
    var namapejabatpemeriksa = $("#namapejabatpemeriksa").val();
    $.ajax({
        url :"datapejabatpemeriksa.php",
        method : "POST",
        data : {namapejabatpemeriksa:namapejabatpemeriksa},
        dataType : "json",
        success : function(m){
            $('#nippejabatpemeriksa').val(m.nippejabatpemeriksa);
            $('#nomorskpejabatpemeriksa').val(m.nomorskpejabatpemeriksa);
            $('#tglskpejabatpemeriksa').val(m.tglskpejabatpemeriksa);
        }

    })
}
    function detailpemeriksa1(){
    // alert ("ok");
    var namapejabatpemeriksa = $("#namapejabatpemeriksa1").val();
    $.ajax({
        url :"datapejabatpemeriksa2.php",
        method : "POST",
        data : {namapejabatpemeriksa:namapejabatpemeriksa},
        dataType : "json",
        success : function(m){
            $('#nippejabatpemeriksa1').val(m.nippejabatpemeriksa);
            $('#nomorskpejabatpemeriksa1').val(m.nomorskpejabatpemeriksa);
            $('#tglskpejabatpemeriksa1').val(m.tglskpejabatpemeriksa);
        }

    })
}

    function detailpemeriksa2(){
    // alert ("ok");
    var namapejabatpemeriksa = $("#namapejabatpemeriksa2").val();
    $.ajax({
        url :"datapejabatpemeriksa2.php",
        method : "POST",
        data : {namapejabatpemeriksa:namapejabatpemeriksa},
        dataType : "json",
        success : function(n){
            $('#nippejabatpemeriksa2').val(n.nippejabatpemeriksa);
            $('#nomorskpejabatpemeriksa2').val(n.nomorskpejabatpemeriksa);
            $('#tglskpejabatpemeriksa2').val(n.tglskpejabatpemeriksa);
        }

    })
}

    function detailpemeriksa3(){
    // alert ("ok");
    var namapejabatpemeriksa = $("#namapejabatpemeriksa3").val();
    $.ajax({
        url :"datapejabatpemeriksa2.php",
        method : "POST",
        data : {namapejabatpemeriksa:namapejabatpemeriksa},
        dataType : "json",
        success : function(o){
            $('#nippejabatpemeriksa3').val(o.nippejabatpemeriksa);
            $('#nomorskpejabatpemeriksa3').val(o.nomorskpejabatpemeriksa);
            $('#tglskpejabatpemeriksa3').val(o.tglskpejabatpemeriksa);
        }

    })
}
</script>

<!-- Waktu Pelaksanaan Otomatis -->
<script>
    $(document).ready(function() {
    $('#tglmulaikontrak, #tglselesaikontrak').on('change textInput input', function () {
        if ( ($("#tglmulaikontrak").val() != "") && ($("#tglselesaikontrak").val() != "")) {
            var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
            var firstDate = new Date($("#tglmulaikontrak").val());
            var secondDate = new Date($("#tglselesaikontrak").val());
            var diffDays = Math.round(Math.round((secondDate.getTime() - firstDate.getTime() + (oneDay)) / (oneDay))); 
            $("#waktupelaksanaan").val(diffDays);
             
        }
    });
});
</script>
<!-- <script>
    $(document).ready(function(){
            $("#namapejabatpemeriksa").hide();
            $("#nippejabatpemeriksa").hide();
            $("#nomorskpejabatpemeriksa").hide();
            $("#tglskpejabatpemeriksa").hide();
            $("#aa").hide();
            $("#bb").hide();
            $("#cc").hide();
            $("#dd").hide();
            $("#namapejabatpemeriksa1").hide();
            $("#nippejabatpemeriksa1").hide();
            $("#nomorskpejabatpemeriksa1").hide();
            $("#tglskpejabatpemeriksa1").hide();
            $("#a1").hide();
            $("#b1").hide();
            $("#c1").hide();
            $("#d1").hide();
            $("#namapejabatpemeriksa2").hide();
            $("#nippejabatpemeriksa2").hide();
            $("#nomorskpejabatpemeriksa2").hide();
            $("#tglskpejabatpemeriksa2").hide();
            $("#a2").hide();
            $("#b2").hide();
            $("#c2").hide();
            $("#d2").hide();
            $("#namapejabatpemeriksa3").hide();
            $("#nippejabatpemeriksa3").hide();
            $("#nomorskpejabatpemeriksa3").hide();
            $("#tglskpejabatpemeriksa3").hide();
            $("#a3").hide();
            $("#b3").hide();
            $("#c3").hide();
            $("#d3").hide();
});
</script>
<script>
    $("#nilai").click(function(){
        var ab = document.getElementById("nilai").value;
        if ( ab == "<300"){
            $("#namapejabatpemeriksa").show();
            $("#nippejabatpemeriksa").show();
            $("#nomorskpejabatpemeriksa").show();
            $("#tglskpejabatpemeriksa").show();
            $("#aa").show();
            $("#bb").show();
            $("#cc").show();
            $("#dd").show();
            $("#namapejabatpemeriksa1").val("-").hide();
            $("#nippejabatpemeriksa1").val("-").hide();
            $("#nomorskpejabatpemeriksa1").val("-").hide();
            $("#tglskpejabatpemeriksa1").val("2000-02-02").hide();
            $("#a1").hide();
            $("#b1").hide();
            $("#c1").hide();
            $("#d1").hide();
            $("#namapejabatpemeriksa2").val("-").hide();
            $("#nippejabatpemeriksa2").val("-").hide();
            $("#nomorskpejabatpemeriksa2").val("-").hide();
            $("#tglskpejabatpemeriksa2").val("2000-02-02").hide();
            $("#a2").hide();
            $("#b2").hide();
            $("#c2").hide();
            $("#d2").hide();
            $("#namapejabatpemeriksa3").val("-").hide();
            $("#nippejabatpemeriksa3").val("-").hide();
            $("#nomorskpejabatpemeriksa3").val("-").hide();
            $("#tglskpejabatpemeriksa3").val("2000-02-02").hide();
            $("#a3").hide();
            $("#b3").hide();
            $("#c3").hide();
            $("#d3").hide();
        } else {
            $("#namapejabatpemeriksa1").show();
            $("#nippejabatpemeriksa1").show();
            $("#nomorskpejabatpemeriksa1").show();
            $("#tglskpejabatpemeriksa1").show();
            $("#a1").show();
            $("#b1").show();
            $("#c1").show();
            $("#d1").show();
            $("#namapejabatpemeriksa2").show();
            $("#nippejabatpemeriksa2").show();
            $("#nomorskpejabatpemeriksa2").show();
            $("#tglskpejabatpemeriksa2").show();
            $("#a2").show();
            $("#b2").show();
            $("#c2").show();
            $("#d2").show();
            $("#namapejabatpemeriksa3").show();
            $("#nippejabatpemeriksa3").show();
            $("#nomorskpejabatpemeriksa3").show();
            $("#tglskpejabatpemeriksa3").show();
            $("#a3").show();
            $("#b3").show();
            $("#c3").show();
            $("#d3").show();
            $("#namapejabatpemeriksa").val("-").hide();
            $("#nippejabatpemeriksa").val("-").hide();
            $("#nomorskpejabatpemeriksa").val("-").hide();
            $("#tglskpejabatpemeriksa").val("2000-02-02").hide();
            $("#aa").hide();
            $("#bb").hide();
            $("#cc").hide();
            $("#dd").hide();
        }
});
</script> -->
</body>
</html>
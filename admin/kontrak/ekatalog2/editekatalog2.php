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

    <title>PEJABAT PELAKSANA TEKNIS KEGIATAN</title>

    <!-- Custom fonts for this template -->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="../../https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="my.js"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
</style>
</head>
    <?php	
       include "../../koneksi.php";
         
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
                    include "../../topbar.php";
                ?>
                <!-- End of Topbar -->
                
                <!-- Awal Manu -->
                <div class="container-fluid">
                    <!-- Input Data -->
                    

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Input Kontrak (SP E-Katalog)</h6>
                            </div>
                            <form action="updateekatalog2.php" method="GET">
                                                    <?php
                                                        include '../../koneksi.php';
                                                        $id = $_GET['id']; 
                                                        $query_edit = mysqli_query($koneksi,"SELECT * FROM ekatalog2 WHERE id='$id'");
                                                        while ($row = mysqli_fetch_array($query_edit)) {
                                                    ?>
                                <!-- Kolom 1 -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                                <div class="row g-2">
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">ID Kontrak</label>
                                                            <input style="height: 30px; font-size: 13px;" type="number" value="<?php echo $row['id']; ?>" name="id" class="form-control" style="height: 30px; font-size: 13px;" id="id" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Tanggal Proses</label>
                                                            <input type="date"  value="<?php echo $row['tglproses']; ?>" name="tglproses" class="form-control" id="tglproses" hidden>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Tanggal Mulai</label>
                                                            <input style="height: 30px; font-size: 13px;" value="<?php echo $row['tglmulaikontrak']; ?>" type="date" name="tglmulaikontrak" class="form-control border-left-success shadow" id="tglmulaikontrak" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Tanggal Selesai</label>
                                                            <input style="height: 30px; font-size: 13px;" value="<?php echo $row['tglselesaikontrak']; ?>" type="date" name="tglselesaikontrak" class="form-control border-left-danger shadow" onclick="waktupelaksanaan()" id="tglselesaikontrak" required>                                               
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col-4">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Kategori Kontrak</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="jeniskontrak" value="SP E-Catalogue" class="form-control" id="jeniskontrak" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-floating">
                                                            <label class="labeldata">*</label>
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="bilangjeniskontrak" value="Surat Pesanan E-Catalogue (SP)" class="form-control" id="bilangjeniskontrak" readonly>                                               
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col-12">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Nomor Kontrak</label>
                                                            <input style="height: 30px; font-size: 13px;" value="<?php echo $row['nomorkontrak']; ?>" type="text" name="nomorkontrak" class="form-control" id="nomorkontrak" required>                                               
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col-4">
                                                        <div class="form-floating">
                                                            <label>Waktu Pelaksanaan</label>
                                                            <input style="height: 30px; font-size: 13px;" value="<?php echo $row['waktupelaksanaan']; ?>" type="number" name="waktupelaksanaan" class="form-control" id="waktupelaksanaan" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Terbilang</label>
                                                            <textarea style="font-size: 13px;" type="text" name="terbilangwaktupelaksanaan" id="terbilangwaktupelaksanaan" class="form-control form-control-lg" readonly><?php echo $row['terbilangwaktupelaksanaan']; ?></textarea>
                                                            <!-- <input style="height: 30px; font-size: 13px;" type="text" name="terbilangwaktupelaksanaan" class="form-control" id="terbilangwaktupelaksanaan" required>                                                -->
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-sm-4">
                                                <!-- Baris 1 -->
                                                <div class="row g-2">
                                                    <?php	
                                                    include "../../koneksi.php";
                                                        
                                                    // Check connection
                                                    if (mysqli_connect_error()){
                                                        echo "Koneksi database gagal : " . mysqli_connect_error();
                                                    }
                                                    ?>
                                                    <div class="col-12">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Nama Perusahaan</label>
                                                            <select style="height: 30px; font-size: 13px;"value="<?php echo $row['namaperusahaan']; ?>" type="text" class="form-control" name="namaperusahaan" onchange="detailpenyedia()" id="namaperusahaan" required>
                                                                <option value="<?php echo $row['namaperusahaan'] ?>"><?php echo $row['namaperusahaan']; ?></option>
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
                                                            <input style="height: 30px; font-size: 13px;"value="<?php echo $row['namapimpinan']; ?>" type="text" name="namapimpinan"  class="form-control" id="namapimpinan" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Jabatan</label>
                                                            <input style="height: 30px; font-size: 13px;"value="<?php echo $row['jabatan']; ?>" type="text" name="jabatan" class="form-control" id="jabatan" readonly>                                               
                                                        </div>
                                                    </div>
                                                </div> 
                                                <!-- Baris 2 -->
                                                <div class="row g-2">
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Nomor Rekening</label>
                                                            <input style="height: 30px; font-size: 13px;"value="<?php echo $row['norekening']; ?>" type="text" name="norekening"  class="form-control" id="norekening" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Bank</label>
                                                            <input style="height: 30px; font-size: 13px;"value="<?php echo $row['namabank']; ?>" type="text" name="namabank" class="form-control" id="namabank" readonly>                                               
                                                        </div>
                                                    </div>
                                                </div> 
                                                <!-- Baris 3 -->
                                                <div class="row g-2">
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Rekening Atas Nama</label>
                                                            <input style="height: 30px; font-size: 13px;" value="<?php echo $row['namarekbank']; ?>" type="text" name="namarekbank" class="form-control" id="namarekbank" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">NPWP</label>
                                                            <input style="height: 30px; font-size: 13px;" value="<?php echo $row['npwp']; ?>" type="text" name="npwp" class="form-control" id="npwp" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Baris 3 -->
                                                <div class="row g-2">
                                                    <div class="col-12">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Alamat</label>
                                                            <input style="font-size: 13px;" type="text" value="<?php echo $row['alamat']; ?>" name="alamat" class="form-control" id="alamat" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col-5">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Kota</label>
                                                            <input style="height: 30px; font-size: 13px;"value="<?php echo $row['kota']; ?>" type="text" name="kota" class="form-control" id="kota" readonly>
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
                                                            <input style="height: 30px; font-size: 13px;"value="<?php echo $row['nopenawaran']; ?>" type="text" name="nopenawaran" class="form-control" id="nopenawaran" required>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Baris 2 -->
                                                <div class="row g-2">
                                                    <div class="col-7">
                                                        <div class="form-floating">
                                                            <label class="labeldata">No. Permohonan Pemeriksaan</label>
                                                            <input style="height: 30px; font-size: 13px;"value="<?php echo $row['nopemeriksaan']; ?>" type="text" name="nopemeriksaan"  class="form-control" id="nopemeriksaan" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="form-floating">
                                                            <label class="labeldata">*</label>
                                                            <input style="height: 30px; font-size: 13px;"value="<?php echo $row['tglpemeriksaan']; ?>" type="date" name="tglpemeriksaan" class="form-control" id="tglpemeriksaan" required>                                               
                                                        </div>
                                                    </div>
                                                </div> 
                                                <!-- Baris 2 -->
                                                <div class="row g-2">
                                                    <div class="col-7">
                                                        <div class="form-floating">
                                                            <label class="labeldata">No. Permohonan Pembayaran</label>
                                                            <input style="height: 30px; font-size: 13px;"value="<?php echo $row['nopembayaran']; ?>" type="text" name="nopembayaran"  class="form-control" id="nopembayaran" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="form-floating">
                                                            <label class="labeldata">*</label>
                                                            <input style="height: 30px; font-size: 13px;"value="<?php echo $row['tglpembayaran']; ?>" type="date" name="tglpembayaran" class="form-control" id="tglpembayaran" required>                                               
                                                        </div>
                                                    </div>
                                                </div> 
                                                <!-- Baris 3 -->
                                                <div class="row g-2">
                                                    <div class="col-7">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Nomor Undangan Pemeriksaan PPK</label>
                                                            <input style="height: 30px; font-size: 13px;"value="<?php echo $row['noundanganppk']; ?>" type="text" name="noundanganppk" class="form-control" id="noundanganppk" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="form-floating">
                                                            <label class="labeldata">*</label>
                                                            <input style="height: 30px; font-size: 13px;"value="<?php echo $row['tglundanganppk']; ?>" type="date" name="tglundanganppk" class="form-control" id="tglundanganppk" required>                                               
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Baris 1 -->
                                                <div class="row g-2">
                                                    <div class="col-7">
                                                        <div class="form-floating">
                                                            <label class="labeldata">No. BAPHP</label>
                                                            <input style="height: 30px; font-size: 13px;"value="<?php echo $row['nobaphp']; ?>" type="text" name="nobaphp" class="form-control" id="nobaphp" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="form-floating">
                                                            <label class="labeldata">*</label>
                                                            <input style="height: 30px; font-size: 13px;" value="<?php echo $row['tglbaphp']; ?>" type="date" name="tglbaphp" class="form-control" id="tglbaphp" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Baris 2 -->
                                                <div class="row g-2">
                                                    <div class="col-7">
                                                        <div class="form-floating">
                                                            <label class="labeldata">No. BASTB</label>
                                                            <input style="height: 30px; font-size: 13px;" value="<?php echo $row['nobastb']; ?>" type="text" name="nobastb" class="form-control" id="nobastb" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="form-floating">
                                                            <label class="labeldata">*</label>
                                                            <input style="height: 30px; font-size: 13px;" value="<?php echo $row['tglbastb']; ?>" type="date" name="tglbastb" class="form-control" id="tglbastb" required>
                                                        </div>
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
                                                    include "../../koneksi.php";
                                                        
                                                    // Check connection
                                                    if (mysqli_connect_error()){
                                                        echo "Koneksi database gagal : " . mysqli_connect_error();
                                                    }
                                                    ?>
                                                    <div class="col-12">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Pekerjaan</label>
                                                            <select style="height: 30px; font-size: 13px;" type="text" class="form-control" name="pekerjaan" id="pekerjaan" onchange="detailpptk()" required>
                                                                <option value="<?php echo $row['pekerjaan'] ?>"><?php echo $row['pekerjaan']; ?></option>
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
                                                            <input style="height: 30px; font-size: 13px;"value="<?php echo $row['subkegiatan']; ?>" type="text" name="subkegiatan"  class="form-control" id="subkegiatan" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col-12">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Kegiatan</label>
                                                            <input style="height: 30px; font-size: 13px;"value="<?php echo $row['kegiatan']; ?>" type="text" name="kegiatan" class="form-control" id="kegiatan" readonly>                                               
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="row g-2">
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Nomor Rekening Sub Kegiatan</label>
                                                            <input style="height: 30px; font-size: 13px;"value="<?php echo $row['noreksubkegiatan']; ?>" type="text" name="noreksubkegiatan" class="form-control" id="noreksubkegiatan" readonly>                                               
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Nama Rekening Sub Kegiatan</label>
                                                            <input style="height: 30px; font-size: 13px;"value="<?php echo $row['namarekening']; ?>" type="text" name="namarekening" class="form-control" id="namarekening" readonly>                                               
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="row g-2">
                                                <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Kode Rekening</label>
                                                            <input style="height: 30px; font-size: 13px;"value="<?php echo $row['koderekeningkegiatan']; ?>" type="text" name="koderekeningkegiatan" class="form-control" id="koderekeningkegiatan" readonly>                                               
                                                        </div>
                                                    </div>
                                                </div> 
                                                <!-- Baris 5 -->
                                        </div>
                                        <div class="col-sm-6">
                                                <div class="row g-2">
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Nama PPTK</label>
                                                            <input style="height: 30px; font-size: 13px;"value="<?php echo $row['namapptk']; ?>" type="text" name="namapptk" class="form-control" id="namapptk" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">NIP</label>
                                                            <input style="height: 30px; font-size: 13px;"value="<?php echo $row['nippptk']; ?>" type="text" name="nippptk" class="form-control" id="nippptk" readonly>                                               
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Baris 6 -->
                                                <div class="row g-2">
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Nomor SK</label>
                                                            <input style="height: 30px; font-size: 13px;"value="<?php echo $row['nomorskpptk']; ?>" type="text" name="nomorskpptk"  class="form-control" id="nomorskpptk" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Tanggal SK</label>
                                                            <input style="height: 30px; font-size: 13px;"value="<?php echo $row['tglskpptk']; ?>" type="date" name="tglskpptk" class="form-control" id="tglskpptk" readonly>                                               
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Baris 1 -->
                                                <div class="row g-2">
                                                    <div class="col-12">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Jabatan</label>
                                                            <input style="height: 30px; font-size: 13px;"value="<?php echo $row['jabatanpptk']; ?>" type="text" name="jabatanpptk"  class="form-control" id="jabatanpptk" readonly>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row g-2">
                                                    <div class="col-4">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Nilai HPS</label>
                                                            <!-- <input style="height: 30px; font-size: 13px;"value="<?php echo $row['subkegiatan']; ?>" type="float" name="nilaihps"  class="form-control" id="input style="height: 30px; font-size: 13px;"value="<?php echo $row['subkegiatan']; ?>"kua" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required> -->
                                                            <input style="height: 30px; font-size: 13px;"value="<?php echo $row['nilaihps']; ?>" type="number"  name="nilaihps" class="form-control" id="nilaihps" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Terbilang</label>
                                                            <textarea style="font-size: 13px;" type="text" name="terbilanghps" class="form-control" id="terbilanghps" readonly><?php echo $row['terbilanghps']; ?></textarea>                                          
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Baris 4 -->
                                                <div class="row g-2">
                                                    <div class="col-4">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Nilai Nego</label>
                                                            <!-- <input style="height: 30px; font-size: 13px;"value="<?php echo $row['subkegiatan']; ?>" type="text" name="nilainego"  class="form-control" id="input style="height: 30px; font-size: 13px;"value="<?php echo $row['subkegiatan']; ?>"kub" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required> -->
                                                            <input style="height: 30px; font-size: 13px;" value="<?php echo $row['nilainego']; ?>" type="number" name="nilainego" class="form-control" id="nilainego" required>

                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Terbilang</label>
                                                            <textarea style="font-size: 13px;" type="text" name="terbilangnego"  class="form-control" id="terbilangnego" readonly><?php echo $row['terbilangnego']; ?></textarea>                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col-4">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Nilai PPN</label>
                                                            <!-- <input style="height: 30px; font-size: 13px;" type="text" name="nilainego"  class="form-control" id="input style="height: 30px; font-size: 13px;"kub" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required> -->
                                                            <input style="font-size: 13px;" type="number" value="<?php echo $row['nilaippn']; ?>" name="nilaippn" class="form-control" id="nilaippn" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Nilai PPH</label>
                                                            <input style="font-size: 13px;" type="number" value="<?php echo $row['nilaipph']; ?>" name="nilaipph" class="form-control" id="nilaipph" required>                                       
                                                        </div>
                                                    </div>
                                                </div>
                                                    <div class="row g-2">
                                                        <div class="col-4">
                                                            <div class="form-floating">
                                                                <label class="labeldata">Total</label>
                                                                <input style="font-size: 13px;" type="number" value="<?php echo $row['nilaitotal']; ?>" name="nilaitotal" class="form-control" id="nilaitotal" required>                                       
                                                            </div>
                                                        </div>
                                                        <div class="col-8">
                                                            <div class="form-floating">
                                                                <label class="labeldata">Terbilang</label>
                                                                <textarea style="font-size: 13px;" type="text" name="terbilangtotal"  class="form-control" id="terbilangtotal" readonly><?php echo $row['terbilangtotal']; ?></textarea>                                   
                                                            </div>
                                                        </div>
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Akhir Kolom 2 -->
                                <br>
                                <hr class="sidebar-divider">
                                <hr class="sidebar-divider">
                                <!-- <hr class="sidebar-divider border-success"> -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                        <div class="row g-2">
                                                    <?php	
                                                    include "../../koneksi.php";
                                                        
                                                    // Check connection
                                                    if (mysqli_connect_error()){
                                                        echo "Koneksi database gagal : " . mysqli_connect_error();
                                                    }
                                                    ?>
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Ketua Pejabat pemeriksa</label>
                                                            <select style="height: 30px; font-size: 13px;" type="text" class="form-control" onchange="detailpemeriksa()" name="pemeriksa1" id="namapejabatpemeriksa" required>
                                                                <option value="<?php echo $row['pemeriksa1'] ?>"><?php echo $row['pemeriksa1']; ?></option>
                                                                <?php
                                                                $pemeriksa1 = mysqli_query($koneksi,"select * from pemeriksa2");
                                                                while($m = mysqli_fetch_array($pemeriksa1)){
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
                                                                    <label class="labeldata">NIP</label>
                                                                    <input style="height: 30px; font-size: 13px;" type="text" value="<?php echo $row['nippemeriksa1'] ?>" name="nippemeriksa1" class="form-control" id="nippejabatpemeriksa" readonly>                                               
                                                                </div>
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col-6">
                                                                <div class="form-floating">
                                                                    <label class="labeldata">Nomor SK</label>
                                                                    <input style="height: 30px; font-size: 13px;" type="text" value="<?php echo $row['nomorskpemeriksa1'] ?>" name="nomorskpemeriksa1" class="form-control" id="nomorskpejabatpemeriksa" readonly>                                               
                                                                </div>
                                                    </div>
                                                    <div class="col-6">
                                                                <div class="form-floating">
                                                                    <label class="labeldata">Tanggal SK</label>
                                                                    <input style="height: 30px; font-size: 13px;" type="date" value="<?php echo $row['tglskpemeriksa1'] ?>" name="tglskpemeriksa1" class="form-control" id="tglskpejabatpemeriksa" readonly>                                               
                                                                </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-sm-4">
                                        <div class="row g-2">
                                                    <?php	
                                                    include "../../koneksi.php";
                                                        
                                                    // Check connection
                                                    if (mysqli_connect_error()){
                                                        echo "Koneksi database gagal : " . mysqli_connect_error();
                                                    }
                                                    ?>
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Anggota Pejabat pemeriksa</label>
                                                            <select style="height: 30px; font-size: 13px;" type="text" class="form-control" onchange="detailpemeriksa2()" name="pemeriksa2" id="namapejabatpemeriksa2" required>
                                                                <option value="<?php echo $row['pemeriksa2'] ?>"><?php echo $row['pemeriksa2']; ?></option>
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
                                                                <div class="form-floating">
                                                                    <label class="labeldata">NIP</label>
                                                                    <input style="height: 30px; font-size: 13px;" type="text" value="<?php echo $row['nippemeriksa2'] ?>" name="nippemeriksa2" class="form-control" id="nippejabatpemeriksa2" readonly>                                               
                                                                </div>
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col-6">
                                                                <div class="form-floating">
                                                                    <label class="labeldata">Nomor SK</label>
                                                                    <input style="height: 30px; font-size: 13px;" type="text" value="<?php echo $row['nomorskpemeriksa2'] ?>" name="nomorskpemeriksa2" class="form-control" id="nomorskpejabatpemeriksa2" readonly>                                               
                                                                </div>
                                                    </div>
                                                    <div class="col-6">
                                                                <div class="form-floating">
                                                                    <label class="labeldata">Tanggal SK</label>
                                                                    <input style="height: 30px; font-size: 13px;" type="date" value="<?php echo $row['tglskpemeriksa2'] ?>" name="tglskpemeriksa2" class="form-control" id="tglskpejabatpemeriksa2" readonly>                                               
                                                                </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-sm-4">
                                        <div class="row g-2">
                                                    <?php	
                                                    include "../../koneksi.php";
                                                        
                                                    // Check connection
                                                    if (mysqli_connect_error()){
                                                        echo "Koneksi database gagal : " . mysqli_connect_error();
                                                    }
                                                    ?>
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Anggota Pejabat pemeriksa</label>
                                                            <select style="height: 30px; font-size: 13px;" type="text" class="form-control" onchange="detailpemeriksa3()" name="pemeriksa3" id="namapejabatpemeriksa3" required>
                                                                <option value="<?php echo $row['pemeriksa3'] ?>"><?php echo $row['pemeriksa3']; ?></option>
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
                                                                <div class="form-floating">
                                                                    <label class="labeldata">NIP</label>
                                                                    <input style="height: 30px; font-size: 13px;" type="text" value="<?php echo $row['nippemeriksa3']; ?>" name="nippemeriksa3" class="form-control" id="nippejabatpemeriksa3" readonly>                                               
                                                                </div>
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col-6">
                                                                <div class="form-floating">
                                                                    <label class="labeldata">Nomor SK</label>
                                                                    <input style="height: 30px; font-size: 13px;" type="text" value="<?php echo $row['nomorskpemeriksa3']; ?>" name="nomorskpemeriksa3" class="form-control" id="nomorskpejabatpemeriksa3" readonly>                                               
                                                                </div>
                                                    </div>
                                                    <div class="col-6">
                                                                <div class="form-floating">
                                                                    <label class="labeldata">Tanggal SK</label>
                                                                    <input style="height: 30px; font-size: 13px;" type="date" value="<?php echo $row['tglskpemeriksa3']; ?>" name="tglskpemeriksa3" class="form-control" id="tglskpejabatpemeriksa3" readonly>                                               
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
                                        <div class="col-sm-4">
                                                <!-- Baris 1 -->
                                                <div class="row g-2">
                                                    <?php	
                                                    include "../../koneksi.php";
                                                        
                                                    // Check connection
                                                    if (mysqli_connect_error()){
                                                        echo "Koneksi database gagal : " . mysqli_connect_error();
                                                    }
                                                    ?>
                                                    <div class="col-12">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Nama Pejabat Barjas</label>
                                                            <select style="height: 30px; font-size: 13px;" value="<?php echo $row['namapejabatbarjas']; ?>" type="text" class="form-control" name="namapejabatbarjas" onchange="detailpejabatbarjas()" id="namapejabatbarjas" required>
                                                                <option value="<?php echo $row['namapejabatbarjas'] ?>"><?php echo $row['namapejabatbarjas']; ?></option>
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
                                                            <input style="height: 30px; font-size: 13px;"value="<?php echo $row['nippejabatbarjas']; ?>" type="text" name="nippejabatbarjas"  class="form-control" id="nippejabatbarjas" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Nomor SK</label>
                                                            <input style="height: 30px; font-size: 13px;"value="<?php echo $row['nomorskpejabatbarjas']; ?>" type="text" name="nomorskpejabatbarjas" class="form-control" id="nomorskpejabatbarjas" readonly>                                               
                                                        </div>
                                                    </div>
                                                </div> 
                                                <!-- Baris 3 -->
                                                <div class="row g-2">
                                                    <!-- <div class="col-8">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Jabatan</label>
                                                            <input style="height: 30px; font-size: 13px;"value="<?php echo $row['subkegiatan']; ?>" type="text" name="namajabatanbarjas" class="form-control" id="namajabatanbarjas" readonly>
                                                        </div>
                                                    </div> -->
                                                    <div class="col-4">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Tanggal SK</label>
                                                            <input style="height: 30px; font-size: 13px;"value="<?php echo $row['tglskpejabatbarjas']; ?>" type="date" name="tglskpejabatbarjas" class="form-control" id="tglskpejabatbarjas" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Jabatan</label>
                                                            <input style="height: 30px; font-size: 13px;"value="<?php echo $row['jabatanpejabatbarjas']; ?>" type="text" name="jabatanpejabatbarjas" class="form-control" id="jabatanpejabatbarjas" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-sm-4">
                                                <!-- Baris 1 -->
                                                <div class="row g-2">
                                                    <?php	
                                                    include "../../koneksi.php";
                                                        
                                                    // Check connection
                                                    if (mysqli_connect_error()){
                                                        echo "Koneksi database gagal : " . mysqli_connect_error();
                                                    }
                                                    ?>
                                                    <div class="col-12">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Nama PPK</label>
                                                            <select style="height: 30px; font-size: 13px;"value="<?php echo $row['namappk']; ?>" type="text" class="form-control" name="namappk" onchange="detailppk()" id="namappk" required>
                                                                <option value="<?php echo $row['namappk'] ?>"><?php echo $row['namappk']; ?></option>
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
                                                            <input style="height: 30px; font-size: 13px;"value="<?php echo $row['nipppk']; ?>" type="text" name="nipppk"  class="form-control" id="nipppk" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Nomor SK</label>
                                                            <input style="height: 30px; font-size: 13px;"value="<?php echo $row['nomorskppk']; ?>" type="text" name="nomorskppk" class="form-control" id="nomorskppk" readonly>                                               
                                                        </div>
                                                    </div>
                                                </div> 
                                                <!-- Baris 3 -->
                                                <div class="row g-2">
                                                    <div class="col-4">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Tanggal SK</label>
                                                            <input style="height: 30px; font-size: 13px;"value="<?php echo $row['tglskppk']; ?>" type="date" name="tglskppk" class="form-control" id="tglskppk" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-floating">
                                                            <label class="labeldata">Jabatan</label>
                                                            <input style="height: 30px; font-size: 13px;"value="<?php echo $row['jabatanppk']; ?>" type="text" name="jabatanppk" class="form-control" id="jabatanppk" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-sm-4">
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
                                                                <option value="<?php echo $row['tahunanggaran'] ?>"><?php echo $row['tahunanggaran']; ?></option>
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
                                                            <input style="height: 30px; font-size: 13px;" type="text" name="sumberdana" value="BLUD RSUD Indramayu" class="form-control" id="sumberdana" readonly>
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
                                        </div>
                                    </div>
                                </div>
                                <!-- Akhir Kolom 3 -->
                                <!-- Footer -->
                                            <div class="modal-footer">  
                                                <button type="submit" class="btn btn-info">Simpan</button>
                                                <a href="ekatalog2.php" type="button" class="btn btn-default">Batal</a>
                                                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button> -->
                                            </div>
                                            <?php 
                                                        }
                                            ?>
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
 
</script>

<!-- nilai HPS -->
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
    document.getElementById("nilaihps").addEventListener("keyup", function(){
 
        // deklarasi id angka ke variabel input
        var input = document.getElementById("nilaihps").value;
 
        // menyimpan hasil terbilang ke variabel huruf;
        let huruf = terbilang(input) + " Rupiah" ;
 
        // menampilkan hasil terbilang ke id huruf
        document.getElementById("terbilanghps").innerHTML  = huruf;
    });
 
</script>

<!-- nilai Nego -->
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
    document.getElementById("nilainego").addEventListener("keyup", function(){
 
        // deklarasi id angka ke variabel input
        var input = document.getElementById("nilainego").value;
 
        // menyimpan hasil terbilang ke variabel huruf;
        let huruf = terbilang(input) + " Rupiah" ;
 
        // menampilkan hasil terbilang ke id huruf
        document.getElementById("terbilangnego").innerHTML  = huruf;
    });
 
</script>
<!-- nilai Nego -->
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
    document.getElementById("nilaitotal").addEventListener("keyup", function(){
 
 // deklarasi id angka ke variabel input
 var input = document.getElementById("nilaitotal").value;

 // menyimpan hasil terbilang ke variabel huruf;
 let huruf = terbilang(input) + " Rupiah" ;

 // menampilkan hasil terbilang ke id huruf
 document.getElementById("terbilangtotal").innerHTML  = huruf;
 });
 
</script>

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

<!--Pejabat Pemeriksa-->
<!-- <script>
    function detailpejabatpemeriksa(){
    // alert ("ok");
    var id = $("#namapejabatpemeriksa").val();
    $.ajax({
        url :"datapejabatpemeriksa.php",
        method : "POST",
        data : {id:id},
        dataType : "json",
        success : function(j){
            $('#nippejabatpemeriksa').val(j.nippejabatpemeriksa);
            $('#jabatanpejabatpemeriksa').val(j.jabatanpejabatpemeriksa);
        }

    })
}
</script> -->

<!-- Pejabat Pemeriksa -->
<script>
    function detailpemeriksa(){
    // alert ("ok");
    var namapejabatpemeriksa = $("#namapejabatpemeriksa").val();
    $.ajax({
        url :"datapejabatpemeriksa2.php",
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

</body>

</html>
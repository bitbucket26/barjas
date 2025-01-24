<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Pakta Integritas</title>
</head>
<style>
@media print {
  @page {
    size: F4;
    size: portrait;
  }
}
</style>
<body style="background-color: white; font-family: tahoma;">
    <?php
        
        include "../../../../koneksi.php";
         
        // Check connection
        if (mysqli_connect_error()){
            echo "Koneksi database gagal : " . mysqli_connect_error();
        }
         
         $sql=mysqli_query($koneksi, "SELECT * FROM kontrak WHERE id='$_GET[id]'");
         $row=mysqli_fetch_array($sql);

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
<section class="sheet padding-10mm" style="font-size:15px;">
    <div class="container-xxl">
        <!-- KOP -->
        <!-- <div class="d-flex justify-content-center">
            <img src="../../../img/kop3.png">
        </div>
            <br> -->
        <!-- Judul Nota -->
        <div class="d-flex justify-content-end">
            <label class="text-capitalize"></label>
        </div>
        <div class="row">
                <div class="col-12 text-center">
                <h4><b>PAKTA INTEGRITAS</b></h4>
                </div>
        </div>
        <br><br><br>
        <div class="row">
                <div class="col-12">
                Saya yang bertanda tangan di bawah ini:
                </div>
        </div>
        <div class="row">
                <div class="col-4">
                Nama
                </div>
                <div class="col-8">
                : <?php echo $row['namapimpinan']; ?>
                </div>
        </div>
        <div class="row">
                <div class="col-4">
                No. Identitas
                </div>
                <div class="col-8">
                : -
                </div>
        </div>
        <div class="row">
                <div class="col-4">
                Jabatan
                </div>
                <div class="col-8">
                : <?php echo $row['jabatan']; ?>
                </div>
        </div>
        <div class="row">
                <div class="col-4">
                Bertindak untuk dan atas nama
                </div>
                <div class="col-8">
                : <?php echo $row['namaperusahaan']; ?>
                </div>
        </div>
        
        <br>
        <div class="row">
                <div class="col-12" style="text-align: justify;">
                dalam rangka  <?php echo $row['pekerjaan']; ?> pada RSUD Indramayu dengan ini menyatakan bahwa :							
                </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                1.
            </div>
            <div class="col-11">
            tidak akan melakukan praktek Korupsi, Kolusi dan Nepotisme (KKN);
            </div>
            <div class="col-1 text-end">
                2.
            </div>
            <div class="col-11">
            akan melaporkan kepada APIP RSUD Kabupaten Indramayu atau LKPP apabila mengetahui ada indikasi KKN di dalam proses pengadaan ini;
            </div>
            <div class="col-1 text-end">
                3.
            </div>
            <div class="col-11">
            akan mengikuti proses pengadaan secara bersih, transparan, dan profesional untuk memberikan hasil kerja terbaik sesuai ketentuan peraturan perundang-undangan;
            </div>
            <div class="col-1 text-end">
                4.
            </div>
            <div class="col-11">
            apabila melanggar hal-hal yang dinyatakan dalam PAKTA INTEGRITAS ini, bersedia menerima  sanksi administratif, menerima sanksi pencantuman dalam Daftar Hitam, digugat secara perdata dan/atau dilaporkan secara pidana. 
            </div>
        </div>
<br>
                <br>
                <div class="row text-center">
                    <div class="col-6">
                    Indramayu, <?php echo tglindo($row['tglpembukaan']); ?>
                    </div>
                    <div class="col-6">
                    Pejabat Pengadaan Barang / Jasa
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-6">
                    <?php echo $row['namaperusahaan']; ?>
                    </div>
                    <div class="col-6">
                        RSUD Indramayu
                    </div>
                </div>
                <br><br><br><br>
                <div class="row text-center">
                    <div class="col-6">
                    <u><b><?php echo $row['namapimpinan']; ?></b></u>
                    </div>
                    <div class="col-6">
                    <u><b><?php echo $row['namapejabatbarjas']; ?></b></u>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-6">
                    <?php echo $row['jabatan']; ?>
                    </div>
                    <div class="col-6">
                    NIP. <?php echo $row['nippejabatbarjas']; ?>
                    </div>
                </div>
                <br><br>
                <div class="row text-center">
                    <div class="col-12">
                    PPK RSUD Indramayu
                    </div>
                    <br><br><br><br><br>
                    <div class="col-12">
                    <u><b><?php echo $row['namappk']; ?></b></u>
                    </div>
                    <div class="col-12">
                    NIP. <?php echo $row['nipppk']; ?>
                    </div>
                </div>
        </div>
    </div>
        <script>
            window.print()
            header("location:spk.php");
        </script>
</section>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>RINGKASAN KONTRAK</title>
</head>
<style>
@media print {
  @page {
    size: A4 portrait;
  }
}
</style>
<body style="background-color: white; font-size: 20px;">
    <?php
        
        include "../../../koneksi.php";
         
        // Check connection
        if (mysqli_connect_error()){
            echo "Koneksi database gagal : " . mysqli_connect_error();
        }
         
         $sql=mysqli_query($koneksi, "SELECT * FROM ekatalog WHERE id='$_GET[id]'");
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
<section class="sheet padding-10mm" style="font-size:17px;">
    <div class="container-xxl">
        <!-- KOP -->
        <div class="d-flex justify-content-center">
            <img src="../../../img/kop3.png">
        </div>
            <br>
        <!-- Judul Nota -->
        <div class="d-flex justify-content-end">
            <label class="text-capitalize"></label>
        </div>
        <div class="row">
                <div class="col-12 text-center"><b>
                <h4>RINGKASAN DOKUMEN KONTRAK</h4></b>
                </div>
        </div>
        <br>
        <div class="row">
                <div class="col-1 text-end">
                1.
                </div>
                <div class="col-4">
                SKPD
                </div>
                <div class="col-7">
                : Dinas Kesehatan UPTD RSUD Indramayu
                </div>
        </div>
        <div class="row">
                <div class="col-1 text-end">
                2.
                </div>
                <div class="col-4">
                Nomor dan Tanggal DPA
                </div>
                <div class="col-7">
                : DPPA/A.1/1.02.0.00.0.00.02.0000/001/2024 tanggal 11 Oktober 2024
                </div>
        </div>
        <div class="row">
                <div class="col-1 text-end">
                3.
                </div>
                <div class="col-4">
                Sub Kegiatan
                </div>
                <div class="col-7">
                : <?php echo $row['subkegiatan']; ?>
                </div>
        </div>
        <div class="row">
                <div class="col-1 text-end">
                4.
                </div>
                <div class="col-4">
                No. RBA Sub Kegiatan
                </div>
                <div class="col-7">
                : <?php echo $row['noreksubkegiatan']; ?>
                </div>
        </div>
        <div class="row">
                <div class="col-1 text-end">
                5.
                </div>
                <div class="col-4">
                Nama Paket Pekerjaan
                </div>
                <div class="col-7">
                : <?php echo $row['pekerjaan']; ?>
                </div>
        </div>
        <div class="row">
                <div class="col-1 text-end">
                6.
                </div>
                <div class="col-4">
                Nomor dan Tanggal SPK
                </div>
                <div class="col-7">
                : <?php echo $row['nomorkontrak']; ?> <?php echo $row['tglmulaikontrak']; ?>
                </div>
        </div>
        <div class="row">
                <div class="col-1 text-end">
                7.
                </div>
                <div class="col-4">
                Nama Kontraktor
                </div>
                <div class="col-7">
                : <?php echo $row['namaperusahaan']; ?>
                </div>
        </div>
        <div class="row">
                <div class="col-1 text-end">
                8.
                </div>
                <div class="col-4">
                Alamat Perusahaan
                </div>
                <div class="col-7">
                : <?php echo $row['alamat']; ?>
                </div>
        </div>
        <div class="row">
                <div class="col-1 text-end">
                9.
                </div>
                <div class="col-4">
                No. Rekening Bank
                </div>
                <div class="col-7">
                : <?php echo $row['namabank']; ?> <?php echo $row['norekening']; ?>
                </div>
        </div>
        <div class="row">
                <div class="col-1 text-end">
                10.
                </div>
                <div class="col-4">
                NPWP
                </div>
                <div class="col-7">
                : <?php echo $row['npwp']; ?>
                </div>
        </div>
        <div class="row">
                <div class="col-1 text-end">
                11.
                </div>
                <div class="col-4">
                Jenis Klarifikasi Usaha
                </div>
                <div class="col-7">
                : Pengadaan E-Purchasing
                </div>
        </div>
        <div class="row">
                <div class="col-1 text-end">
                12.
                </div>
                <div class="col-4">
                Nilai SP / Kontrak
                </div>
                <div class="col-7">
                : Rp. <?php echo number_format($row['nilainego']); ?>
                </div>
        </div>
        <div class="row">
                <div class="col-1 text-end">
                13.
                </div>
                <div class="col-4">
                Jenis SPK / Kontrak
                </div>
                <div class="col-7">
                : <?php echo $row['jeniskontrak']; ?>
                </div>
        </div>
        <div class="row">
                <div class="col-1 text-end">
                14.
                </div>
                <div class="col-4">
                Uraian dan Volume Pekerjaan
                </div>
                <div class="col-7">
                : Sesuai dengan Surat Pesanan
                </div>
        </div>
        <div class="row">
                <div class="col-1 text-end">
                15.
                </div>
                <div class="col-4">
                Cara Pembayaran
                </div>
                <div class="col-7">
                : Sekaligus Rp. <?php echo number_format($row['nilainego']); ?>
                </div>
        </div>
        <div class="row">
                <div class="col-1 text-end">
                16.
                </div>
                <div class="col-4">
                Jangka Waktu Pelaksanaan
                </div>
                <div class="col-7">
                : <?php echo $row['waktupelaksanaan']; ?> (<?php echo $row['terbilangwaktupelaksanaan']; ?>) hari kalender
                </div>
        </div>
        <div class="row">
                <div class="col-1 text-end">
                17.
                </div>
                <div class="col-4">
                Tanggal Penyelesaian Pekerjaan
                </div>
                <div class="col-7">
                : <?php echo tglindo($row['tglselesaikontrak']); ?>
                </div>
        </div>
        <div class="row">
                <div class="col-1 text-end">
                18.
                </div>
                <div class="col-4">
                Volume Penyelesaian Pekerjaan
                </div>
                <div class="col-7">
                : 100%
                </div>
        </div>
        <div class="row">
                <div class="col-1 text-end">
                19.
                </div>
                <div class="col-4">
                Jangka Waktu Pemeliharaan
                </div>
                <div class="col-7">
                : -
                </div>
        </div>
        <div class="row">
                <div class="col-1 text-end">
                20.
                </div>
                <div class="col-4">
                Ketentuan Sanksi / Denda
                </div>
                <div class="col-7">
                : perhari % Rp. …………………….
                </div>
        </div>
        <div class="row">
                <div class="col-1">

                </div>
                <div class="col-4">

                </div>
                <div class="col-7">
                : Ditetapkan ………………. Hari sebesar ………………
                </div>
        </div>
       
                <br>
                <div class="row text-center">
                    <div class="col-7">
                    </div>
                    <div class="col-5 text-start">
                    Indramayu,                
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-7">
                    </div>
                    <div class="col-5">
                    Pejabat Pembuat Komitmen
                    </div>
                </div>
                <br><br><br><br><br>
                <div class="row text-center">
                    <div class="col-7">
                    </div>
                    <div class="col-5">
                    <u><b><?php echo $row['namappk']; ?></b></u>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-7">
                    </div>
                    <div class="col-5">
                    NIP. <?php echo $row['nipppk']; ?>
                    </div>
                </div>
        </div>
    </div>
        <script>
            window.print()
            header("location:ekatalog.php");
        </script>
</section>

</body>
</html>
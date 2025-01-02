<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Permohonan Pemeriksaan</title>
</head>
<style>
@media print {
  @page {
    size: F4 portrait;
  }
}
</style>
<body style="background-color: white; font-family: BatangChe; line-height: 20px;">
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
<section class="sheet padding-10mm" style="font-size:17px;">
    <div class="container-xxl">
        <!-- KOP -->
        <div class="d-flex justify-content-center">
            <!-- <img src="../../../img/kop3.png"> -->
        </div>
            <br><br><br><br><br><br><br><br>
        <!-- Judul Nota -->
        <div class="d-flex justify-content-end">
            <label class="text-capitalize"><?php echo $row['kota']; ?>, <?php echo tglindo($row['tglpemeriksaan']);?></label>
        </div>
        <div class="row">
                <div class="col-2">
                Nomor
                </div>
                <div class="col-10">
                : <?php echo $row['nopemeriksaan']; ?>
                </div>
        </div>
        <div class="row">
                <div class="col-2">
                Lampiran
                </div>
                <div class="col-10">
                : 1 (Satu) Berkas
                </div>
        </div>
        <div class="row">
                <div class="col-2">
                Hal
                </div>
                <div class="col-10">
                : Permohonan Pemeriksaan Barang/Pekerjaan
                </div>
        </div>
        <br>
        <div class="row">
                <div class="col-12">
                Kepada Yth.
                </div>
        </div>
        <div class="row">
                <div class="col-12">
                Pejabat Pembuat Komitmen  BLUD RSUD  Indramayu
                </div>
        </div>
        <div class="row">
                <div class="col-12">
                Di -
                </div>
        </div>
        <div class="row">
                <div class="col-12" style="text-indent: 0.5in;">
                Indramayu
                </div>
        </div>
       <br><br><br>

       <div class="row">
                <div class="col-12" style="text-align: justify; text-indent: 0.5in;">
                       Menunjuk <?php echo $row['bilangjeniskontrak']; ?> (<?php echo $row['jeniskontrak']; ?>)
                       Nomor : <?php echo $row['nomorkontrak']; ?> 
                       Tanggal <?php echo tglindo($row['tglmulaikontrak']); ?> 
                       tentang <?php echo $row['pekerjaan']; ?> pada RSUD Indramayu
                       dengan nilai kontrak Rp. <?php echo number_format($row['nilaitotalnego']); ?> 
                       (<?php echo $row['terbilangtotalnego']; ?>).
                </div>
                <p>
                <div class="col-12" style="text-align: justify; text-indent: 0.5in;">
                        Sehubungan dengan prestasi pekerjaan telah mencapai prestasi 100%, 
                        kami selaku penyedia barang/jasa mengajukan permohonan pemeriksaaan 
                        <?php echo $row['pekerjaan']; ?>.								
                </div>
                </p>

                <div class="col-12" style="text-align: justify; text-indent: 0.5in;">
                        Demikian permohonan ini kami sampaikan, atas perhatian dan kerjasamanya saya ucapkan banyak terima kasih.
                </div>
                <br><br><br><br><br>
                <div class="col-12">
                <?php echo $row['namaperusahaan']; ?>
                </div>
                <br><br><br><br><br>
                <div class="col-12"><u><b>
                <?php echo $row['namapimpinan']; ?></b></u>
                </div>
                <div class="col-12">
                <?php echo $row['jabatan']; ?>
                </div>

        </div>
    </div>
        <script>
            window.print()
            header("location:ecatalogue2.php");
        </script>
</section>

</body>
</html>
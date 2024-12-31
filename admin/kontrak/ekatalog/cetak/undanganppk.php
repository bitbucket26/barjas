<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Undangan PPK</title>
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
                <div class="col-8">
                
                </div>
                <div class="col-4 text-start">
                Indramayu, <?php echo tglindo($row['tglundanganppk']);?>
                </div>
        </div>
        <div class="row">
                <div class="col-8">
                </div>
                <div class="col-4 text-start">
                Kepada
                </div>
        </div>

        <div class="row">
                <div class="col-2">
                Nomor
                </div>
                <div class="col-5">
                : <?php echo $row['nopemeriksaan']; ?>
                </div>
                <div class="col-1">
                Yth.
                </div>
                <div class="col-4">
                Pejabat Pemeriksa Hasil Pekerjaan <?php echo $row['pekerjaan']; ?>
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
                Perihal
                </div>
                <div class="col-5">
                : Permohonan Pemeriksaan Barang/Pekerjaan
                </div>
                <div class="col-1">
                </div>
                <div class="col-4">
                Kegiatan <?php echo $row['kegiatan']; ?>
                </div>
        </div>
        <br>
        <div class="row">
                <div class="col-12">
                </div>
        </div>
        <div class="row">
                <div class="col-12">
                </div>
        </div>
        <div class="row">
                <div class="col-12">
                </div>
        </div>
        <div class="row">
                <div class="col-12">
                </div>
        </div>
       <br><br>

       <div class="row">
                <div class="col-2">
                </div>
                <div class="col-10" style="text-align: justify; text-indent: 0.5in;">
                Berdasarkan surat dari <?php echo $row['jabatan']; ?> <?php echo $row['namaperusahaan']; ?> 
                Nomor : <?php echo $row['nopemeriksaan']; ?> 
                tanggal <?php echo $row['tglpemeriksaan']; ?> dalam rangka pelaksanaan 
                kegiatan <?php echo $row['kegiatan']; ?> 
                Tahun Anggaran 2024, 
                Pekerjaan <?php echo $row['pekerjaan']; ?> 
                Lokasi di RSUD Indramayu.
                </div>
        </div>
        <br>
        <div class="row">
                <div class="col-2">
                </div>
                
                <div class="col-10" style="text-align: justify; text-indent: 0.5in;">
                Dengan ini kami mengundang Pejabat Pemeriksa Hasil Pekerjaan, 
                untuk melaksanakan pemeriksaan atas permohonan perusahaan tersebut diatas, 
                dengan ketentuan waktu pada :.								
                </div>
                
        </div>
        <div class="row">
                <div class="col-2">
                </div>
                <div class="col-2">
                Hari / Tanggal					
                </div>
                <div class="col-8">:
                 <?php echo tglindo($row['tglundanganppk']); ?>					
                </div>
        </div>
        <div class="row">
                <div class="col-2">
                </div>
                <div class="col-2">
                Waktu				
                </div>
                <div class="col-8">:
                 Pukul 11.00 WIB					
                </div>
        </div>
        <div class="row">
                <div class="col-2">
                </div>
                <div class="col-2">
                Tempat				
                </div>
                <div class="col-8">:
                 RSUD Indramayu				
                </div>
        </div>
        <br>
        <div class="row">
                <div class="col-2">
                </div>
                
                <div class="col-10" style="text-align: justify; text-indent: 0.5in;">
                Demikian undangan ini dibuat untuk dilaksanakan sebagaimana mestinya.								
                </div>
                
        </div>

                <div class="col-12" style="text-align: justify; text-indent: 0.5in;">
                        
                </div>
                <br><br>
                <div class="row text-center">
                    <div class="col-7">
                    </div>
                    <div class="col-5">
                    Pejabat Pembuat Komitmen
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-7">
                    </div>
                    <div class="col-5">
                    RUmah Sakit Umum Daerah Indramayu
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
            header("location:homekasir1.php");
        </script>
</section>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SPPBJ</title>
</head>
<style>
@media print {
  @page {
    size: F4 portrait;
  }
}
</style>
<body style="background-color: white; font-size: 20px; line-height: 23px">
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
            <img src="../../../../img/kop3.png">
        </div>
            <br>
        <!-- Judul Nota -->
        <div class="d-flex justify-content-end">
            <label class="text-capitalize">Indramayu, <?php echo tglindo($row['tglsppbj']);?></label>
        </div>
        <br>
        <div class="row">
                <div class="col-2">
                Nomor
                </div>
                <div class="col-10">
                : <?php echo $row['sppbj']; ?>
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
        
        <br>
        <div class="row">
                <div class="col-12">
                Kepada Yth.
                </div>
        </div>
        <div class="row">
                <div class="col-12">
                Pemimpin Perusahaan
                </div>
        </div>
        <div class="row">
                <div class="col-12">
                <?php echo $row['namaperusahaan']; ?>
                </div>
        </div>
        <div class="row">
                <div class="col-12">
                Di -
                </div>
        </div>
        <div class="row">
                <div class="col-12" style="text-indent: 0.5in;">
                <?php echo $row['kota']; ?>
                </div>
        </div>
       <br>
       
        <div class="row">
            <div class="col-1">
            Perihal
            </div>
            <div class="col-6" style="text-align: justify;">
            : Penunjukan Penyedia Barang untuk Pelaksanaan Paket Pekerjaan <?php echo $row['pekerjaan']; ?>				
            </div>
            <div class="col-4">
            			
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12" style="text-align: justify;">
            Dengan ini kami beritahukan bahwa berdasarkan Nota Dinas dari Pejabat Pengadaan Barang/ Jasa 
            Nomor :  <?php echo $row['notadinas']; ?> Tanggal <?php echo tglindo($row['tglnotadinas']); ?> tentang 
            Pekerjaan <?php echo $row['pekerjaan']; ?> dengan hasil negosiasi harga (terlampir) 
            kami nyatakan diterima/disetujui.									
            </div>
        </div>
        <br>
        <div class="row" style="text-align: justify;">
            <div class="col-12">
            Sebagai tindak lanjut dari Surat Penunjukan Penyediaan Barang/ Jasa (SPPBJ) ini saudara diharuskan untuk menandatangani 
            Surat Perjanjian Kerja (Kontrak) paling lambat 14 (empat belas) hari kerja setelah diterbitkannya SPPBJ. Kegagalan Saudara 
            untuk menerima penunjukan ini yang disusun berdasarkan evaluasi terhadap penawaran Saudara, akan dikenakan sanksi sesuai 
            ketentuan dalam Peraturan Bupati Indramayu No. 4 Tahun 2020 berikut dengan perubahan-perubahannya tentang Pengadaan Barang/ Jasa.									
            </div>    
        </div>
       
        <br>
        <div class="row text-center">
            <div class="col-6">
			
            </div>
            <div class="col-6">
            Indramayu, <?php echo tglindo($row['tglsppbj']); ?>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-6">
			
            </div>
            <div class="col-6">
            Pejabat Pembuat Komitmen
            </div>
        </div>
        <br><br><br><br>
        <div class="row text-center">
            <div class="col-6">
			
            </div>
            <div class="col-6">
            <b><u><?php echo $row['namappk']; ?></u></b>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-6">
			
            </div>
            <div class="col-6">
            NIP. <?php echo $row['nipppk']; ?>	
            </div>
        </div><br>
        <div class="row">
            Tembusan : Yth. :
        </div>
        <div class="row">
            1. Pejabat Barjas RSUD Indramayu.
        </div>
    </div>
        <script>
            window.print()
            header("location:spk.php");
        </script>
</section>

</body>
</html>
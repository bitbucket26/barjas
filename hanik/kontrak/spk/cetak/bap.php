<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>BAP</title>
</head>
<style>
@media print {
  @page {
    size: F4 portrait;
  }
}
@media print {
    .pagebreak { page-break-before: always; } /* page-break-after works, as well */
}
</style>
<body style="background-color: white; font-family: Bookman Old Style; line-height: 1.4;">
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
        <div class="d-flex justify-content-center" >
            <img src="../../../../img/kop3.png" >
        </div>
        <br>
        <!-- Judul Nota -->
        <div class="d-flex justify-content-end">
            <label class="text-capitalize"></label>
        </div>

        <div class="row">
                <div class="col-12 text-center">
                <u><b><h4>BERITA ACARA PEMBAYARAN</h4></b></u>
                </div>
                <div class="col-12 text-center">
                Nomor : .....................................
                </div>
        </div>
<br>
        <div class="row" style="text-align: justify;">
                <div class="col-12">
                Pada hari ini................,tanggal ..................................... Bulan .......................... Tahun Dua Ribu Dua Puluh .................. (.......-.........-.<?php echo $row['tahunanggaran']; ?>), yang bertanda tangan di bawah ini :
                </div>
        </div>
        <br>
        <div class="row">
                <div class="col-3">
                <b>dr. DEDEN BONNI KOSWARA, MM</b>
                </div>
                <div class="col-9" style="text-align: justify;">
                :Pemimpin Badan Layanan Umum Daerah (BLUD) RSUD Indramayu yang diangkat berdasarkan Keputusan Bupati Kabupaten Indramayu 
                Nomor : 440/Kep.24-Dinkes/2024 
                Tanggal 02 Januari 2024 
                bertindak untuk dan atas nama jabatannya, selanjutnya disebut sebagai PIHAK KESATU.
                </div>
        </div>
        <div class="row">
                <div class="col-3">
                <b><?php echo $row['namapimpinan']; ?></b>
                </div>
                <div class="col-9" style="text-align: justify;">
                :<?php echo $row['jabatan']; ?> <?php echo $row['namaperusahaan']; ?> beralamat 
                di <?php echo $row['alamat']; ?> 
                selaku pelaksana sub kegiatan <?php echo $row['subkegiatan']; ?> 
                Pekerjaan <?php echo $row['pekerjaan']; ?> 
                berdasarkan <?php echo $row['bilangjeniskontrak']; ?> (<?php echo $row['jeniskontrak'];?>) Nomor : <?php echo $row['nomorkontrak']; ?> 
                Tanggal <?php echo tglindo($row['tglmulaikontrak']); ?> bertindak untuk dan atas nama perusahaan tersebut diatas, selanjutnya disebut PIHAK KEDUA.
                </div>
        </div>
        <div class="row">
                <div class="col-12" style="text-align: justify;">
                Berdasarkan :
                </div>        
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-1">
                1.
                </div>        
                <div class="col-11">
                Dokumen Pelaksanaan Anggaran (DPA) No. <?php echo $row['nomordpa']; ?> 
                tanggal <?php echo tglindo($row['tgldpa']); ?> pada 
                Sub Kegiatan <?php echo $row['subkegiatan']; ?> dan RBA
                No. Rekening Belanja <?php echo $row['koderekeningkegiatan']; ?> <?php echo $row['namarekening']; ?>
                Pekerjaan <?php echo $row['pekerjaan']; ?>.
                </div>        
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-1">
                2.
                </div>        
                <div class="col-11">
                Sesuai <?php echo $row['bilangjeniskontrak']; ?> (<?php echo $row['jeniskontrak']; ?>) Nomor : <?php echo $row['nomorkontrak']; ?> 
                tanggal <?php echo tglindo($row['tglmulaikontrak']); ?>
                </div>        
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-1">
                3.
                </div>        
                <div class="col-11">
                Berita Acara Pemeriksaan Pekerjaan dan Administrasi Pekerjaan 
                Nomor : <?php echo $row['nobaphp']; ?> 
                Tanggal <?php echo tglindo($row['tglbaphp']); ?>
                </div>        
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-1">
                4.
                </div>        
                <div class="col-11">
                Berita Acara Serah Terima Barang 
                Nomor : <?php echo $row['nobastb']; ?> 
                Tanggal <?php echo tglindo($row['tglbastb']); ?>
                </div>        
        </div>
        <br>
        <div class="row" style="text-align: justify;">
                <div class="col-1">
                1.
                </div>        
                <div class="col-11">
                PIHAK KESATU dan PIHAK KEDUA telah sepakat menandatatangi Berita Acara Pembayaran dengan ketentuan sebagai berikut :
                </div>        
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-1">
                </div>        
                <div class="col-7">
                Nilai Kontrak
                </div>        
                <div class="col-1 text-end">
                =
                </div>        
                <div class="col-3">
                Rp. <?php echo number_format($row['nilaitotalnego']); ?>,-
                </div>        
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-1">
                </div>        
                <div class="col-7">
                Pajak
                </div>        
                <div class="col-1">
                </div>        
                <div class="col-3">
                </div>        
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-1">
                
                </div>        
                <div class="col-1 text-end">
                a.
                </div>        
                <div class="col-3">
                PPN
                </div>        
                <div class="col-3" id="nilaippn">
                Rp. <?php echo number_format($row['nilaippnnego']); ?>,-
                </div>        
                <div class="col-4">
                </div>        
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-1">
                </div>  
                <div class="col-1 text-end">
                b.
                </div>       
                <div class="col-3">
                PPH
                </div>        
                <div class="col-3" id="nilaipph">
                Rp. <?php echo number_format($row['nilaipph']); ?>,-
                </div>        
                <div class="col-4">
                </div>        
        </div>
        <div class="row">
                <div class="col-1">
                </div>  
                <div class="col-1 text-end">
                </div>       
                <div class="col-6">
                Jumlah
                </div>        
                <div class="col-1 text-end">
                =
                </div>        
                <div class="col-3" id="nilaijumlah">
                <u>Rp. <?php echo number_format($row['nilaippnnego'] + $row['nilaipph']); ?></u>,-
                </div>        
        </div>
        <div class="row">
                <div class="col-1">
                </div>  
                <div class="col-1 text-end">
                </div>       
                <div class="col-6">
                Jumlah yang dibayarkan
                </div>        
                <div class="col-1 text-end">
                =
                </div>        
                <div class="col-3" id="terbilangbap">
               <b> Rp. <?php echo number_format($row['totalbap']); ?>,- </b>
                </div>        
        </div>
        <div class="row">
                <div class="col-1">
                </div>  
                <div class="col-1 text-end">
                </div>       
                <div class="col-2">
                Terbilang
                </div>        
                <div class="col-8">
                : (<?php echo $row['terbilangbap']; ?>)
                </div>           
        </div>

<div class="pagebreak"></div>
        <div class="row" style="text-align: justify;">
                <div class="col-12">
                Pelaksanaan pembayaran pekerjaan tersebut dilaksanakan melalui kas BLUD RSUD Indramayu, yang akan dilaksanakan oleh PIHAK KESATU dengan cara transfer bank kepada PIHAK KEDUA atas :
                </div>        
        </div>
        <br>
        <div class="row" style="text-align: justify;">
                  
                <div class="col-3">
                Nama Perusahaan
                </div>         
                <div class="col-9">
                : <?php echo $row['namaperusahaan']; ?>
                </div>         
        </div>
        <div class="row" style="text-align: justify;">
                  
                <div class="col-3">
                Alamat
                </div>         
                <div class="col-9">
                : <?php echo $row['alamat']; ?>
                </div>         
        </div>
        <div class="row" style="text-align: justify;">
                  
                <div class="col-3">
                Nama Rekening
                </div>         
                <div class="col-9">
                : <?php echo $row['namarekbank']; ?>
                </div>         
        </div>
        <div class="row" style="text-align: justify;">
                  
                <div class="col-3">
                No Rekening
                </div>         
                <div class="col-9">
                : <?php echo $row['norekening']; ?>
                </div>         
        </div>
        <div class="row" style="text-align: justify;">
                  
                <div class="col-3">
                Nama Bank
                </div>         
                <div class="col-9">
                : <?php echo $row['namabank']; ?>
                </div>         
        </div>
        <br>
        <div class="row" style="text-align: justify;">
                <div class="col-1">
                2.
                </div>        
                <div class="col-11">
                Pada jumlah yang dibayarkan tersebut sudah termasuk pajak-pajak berlaku.
                </div>        
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-1">
                
                </div>        
                <div class="col-11">
                Demikian Berita Acara Pembayaran ini dibuat dalam rangkap 3 (tiga), 2 (dua) diantaranya bermaterai untuk dipergunakan seperlunya.								
                </div>        
        </div>
        <br><br>
                <div class="row text-center">
                    <div class="col-6">
                    PIHAK KEDUA
                    </div>
                    <div class="col-6">
                    PIHAK PERTAMA
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-6">
                    <?php echo $row['namaperusahaan']; ?>
                    </div>
                    <div class="col-6">
                    PIMPINAN BLUD RSUD INDRAMAYU
                    </div>
                </div>
                <br><br><br><br><br><br>
                <div class="row text-center">
                    <div class="col-6"><b><u>              
                    <?php echo $row['namapimpinan']; ?></u></b>
                    </div>
                    <?php 
                    include "../../../koneksi.php";
                    $sql=mysqli_query($koneksi, "SELECT * FROM direktur WHERE id='$_GET[id]'");
                    $d =mysqli_fetch_array($sql);
                    ?>
                    <div class="col-6"><b><u>
                    <?php echo $d['namadirektur']; ?></u></b>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-6">
                    <?php echo $row['jabatan']; ?>
                    </div>
                    <div class="col-6">
                    NIP. <?php echo $d['nipdirektur']; ?>
                    </div>
                </div>
        </div>
        <!-- </div> -->
        <script>
            window.print()
            header("location:spk.php");
        </script>
</section>
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
    document.getElementById("terbilangbap").addEventListener("change", function(){
 
    // deklarasi id angka ke variabel input
    var input = document.getElementById("terbilangbap").value;

    // menyimpan hasil terbilang ke variabel huruf;
    let huruf = terbilang(input);

    // menampilkan hasil terbilang ke id huruf
    document.getElementById("terbilangbap2").innerHTML  = huruf;
    });

</script>
</body>
</html>
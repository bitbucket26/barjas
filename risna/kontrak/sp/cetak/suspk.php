<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Syarat Umum SPK</title>
</head>
<style>
@media print {
  @page {
    size: F4 portrait;
  }
}
</style>
<body style="background-color: white; font-size: 20px; line-height: 23px; font-family: Footlight MT Light;">
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


 
	// FUNGSI TERBILANG OLEH : MALASNGODING.COM
	// WEBSITE : WWW.MALASNGODING.COM
	// AUTHOR : https://www.malasngoding.com/author/admin
 
 
	function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " Belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." Puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " Ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " Ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " Juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " Milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " Trilyun" . penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
 
	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}     		
		return $hasil;
	}
 
        $tglbastb= $row['tglpembukaan'];
        $hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
        $tanggal = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", 
                            "Sebelas", "Dua Belas", "tiga Belas", "Empat Belas", "Lima Belas", "Enam Belas", "Tujuh Belas", "Delapan Belas", "Sembilan Belas", 
                            "Dua Puluh", "Dua Puluh Satu", "Dua Puluh Dua", "Dua Puluh Tiga", "Dua Puluh Empat", "Dua Puluh Lima", "Dua Puluh Enam", "Dua Puluh Tujuh", "Dua Puluh Delapan", "Dua Puluh Sembilan", "Tiga Puluh", "Tiga Puluh Satu");
        
        $bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
	    $angka = date("Y", strtotime($tglbastb));

        // echo $hari[date("w", strtotime($tglbaphp))].", Tanggal ".$tanggal[date("j", strtotime($tglbaphp))]." Bulan ".$bulan[date("n", strtotime($tglbaphp))];
        // echo terbilang($angka);
        ?>
<section class="sheet padding-10mm" style="font-size:17px;">
    <div class="container-xxl">
        <!-- KOP -->
        <div class="d-flex justify-content-center" >
            <img src="../../../../img/kop3.png" >
        </div>
        <br>
        <!-- Judul Nota -->
         <div class="row  fw-bold" style="line-height: 20px; font-size: 17px;">
            <div class="text-center">SYARAT-SYARAT KHUSUS KONTRAK (SSKK)</div>
            <!-- <u><div class="text-center">SURAT PERINTAH KERJA (SPK)</div></u> -->
         </div>
        
        <br>

        <div class="row">
            <div class="col-4 fw-bold">
            A. Korespondensi
            </div>
            <div class="col-8">
            Alamat Para Pihak sebagai berikut :
            </div>
        </div>
        <div class="row">
            <div class="col-4">
            
            </div>
            <div class="col-2 fw-bold">
            PA / PPK
            </div>
            <div class="col-6">
            </div>
        </div>
        <div class="row">
            <div class="col-4">
            
            </div>
            <div class="col-2">
            Satuan Kerja
            </div>
            <div class="col-6">
            
            </div>
        </div>
        <div class="row">
            <div class="col-4">
            
            </div>
            <div class="col-2">
            Nama
            </div>
            <div class="col-6 fw-bold">
            : <?php echo $row['satuankerja']?>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
            
            </div>
            <div class="col-2">
            Alamat
            </div>
            <div class="col-6">
            : <?php echo $row['alamatsatker']?>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
            
            </div>
            <div class="col-2">
            Telepon
            </div>
            <div class="col-6">
            : <?php echo $row['nomortlp']?>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
            
            </div>
            <div class="col-2">
            Faksimili
            </div>
            <div class="col-6">
            : <?php echo $row['nomortlp']?>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
            
            </div>
            <div class="col-2">
            E-mail
            </div>
            <div class="col-6">
            : rsudindramayukab@gmail.com
            </div>
        </div>
        <br>
        
        <div class="row">
            <div class="col-4">
            
            </div>
            <div class="col-2 fw-bold">
            Penyedia
            </div>
            <div class="col-6">
            
            </div>
        </div>
        <div class="row">
            <div class="col-4">
            
            </div>
            <div class="col-2">
            Nama
            </div>
            <div class="col-6 fw-bold">
            : <?php echo $row['namaperusahaan']?>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
            
            </div>
            <div class="col-2">
            Alamat
            </div>
            <div class="col-6">
            : <?php echo $row['alamat']?>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
            
            </div>
            <div class="col-2">
            Telepon
            </div>
            <div class="col-6">
            :
            </div>
        </div>
        <div class="row">
            <div class="col-4">
            
            </div>
            <div class="col-2">
            Faksimili
            </div>
            <div class="col-6">
            :
            </div>
        </div>
        <div class="row">
            <div class="col-4">
            
            </div>
            <div class="col-2">
            E-mail
            </div>
            <div class="col-6 fw-bold">
            :
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4 fw-bold">
            B. Wakil sah Para Pihak
            </div>
            <div class="col-8">
            Wakil sah Para Pihak sebagai berikut :
            </div>
        </div>
        <div class="row">
            <div class="col-4">
            
            </div>
            <div class="col-3">
            Untuk PA/PPK
            </div>
            <div class="col-5 fw-bold">
            : <?php echo $row['namappk']?>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
            
            </div>
            <div class="col-3">
            Untuk Penyedia
            </div>
            <div class="col-5 fw-bold">
            : <?php echo $row['namapimpinan']?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4 fw-bold">
           C. Tanggal Berlaku Kontrak
            </div>
            <div class="col-8">
            Kontrak mulai berlaku sejak : <?php echo tglindo($row['tglmulaikontrak']);?> s/d <?php echo tglindo($row['tglselesaikontrak']);?> 
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4 fw-bold" >
           D. Jenis Kontrak
            </div>
            <div class="col-8" style="text-align: justify;">
            1.Kontrak berdasarkan cara pembayaran : Kontrak Lumsum 
            </div>
        </div>
        <div class="row">
            <div class="col-4 fw-bold">
          
            </div>
            <div class="col-8" style="text-align: justify;">
            2.Kontrak berdasarkan pembebanan Tahun Anggaran : Kontrak tahun tunggal</div>
        </div>
        <div class="row">
            <div class="col-4 fw-bold">
          
            </div>
            <div class="col-8" style="text-align: justify;">
            3.Kontrak berdasarkan sumber pendanaan : Kontrak Pengadaan Tunggal
            </div>
        </div>
        <div class="row">
            <div class="col-4 fw-bold">
          
            </div>
            <div class="col-8" style="text-align: justify;">
            4.Kontrak berdasarkan jenis pekerjaanl : Kontrak Pengadaan Pekerjaan Tunggal
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4 fw-bold" >
           E. Jadwal Pelaksanaan Pekerjaan
            </div>
            <div class="col-8" style="text-align: justify;">
            Penyedia harus menyelesaikan pekerjaan <?php echo $row['waktupelaksanaan']?> (<?php echo $row['terbilangwaktupelaksanaan']?>) hari kalender
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4 fw-bold" >
           F. Pengiriman
            </div>
            <div class="col-8" style="text-align: justify;">
            Rincian pengiriman dan dokumen terkait lainnya yang harus diserahkan oleh Penyedia adalah : Nota,Kwitansi,e-faktur, kartu garansi. Dokumen tersebut diatas harus sudah diterima oleh PPK sebelum serah terima Barang. Jika dokumen tidak diterima maka Penyedia bertanggung jawab atas setiap biaya yang diakibatkannya.
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4 fw-bold" >
            G. Transportasi
            </div>
            <div class="col-8" style="text-align: justify;">
            1. Barang harus diangkut sampai dengan Tempat Tujuan Akhir
            </div>
        </div>
        <div class="row">
            <div class="col-4 fw-bold" >
            
            </div>
            <div class="col-8" style="text-align: justify;">
            2. Penyedia menggunakan transportasi Kendaraan roda empat untuk pengiriman barang melalui darat
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4 fw-bold" >
            H. Serah Terima
            </div>
            <div class="col-8" style="text-align: justify;">
            Serah terima dilakukan pada : RSUD Indramayu
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4 fw-bold" >
            I.  Pemeriksaan dan Pengujian
            </div>
            <div class="col-8" style="text-align: justify;">
            Pemeriksaan dan pengujian yang dilaksanakan meliputi: Kesesuaian spesifikasi barang dengan pesana
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4 fw-bold" >
            J. Garansi
            </div>
            <div class="col-8" style="text-align: justify;">
            Masa Tanggung Jawab Cacat Mutu/Garansi berlaku selama: 1 tahun setelah serah terima barang
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4 fw-bold" >
            K. Pembayaran Tagihan
            </div>
            <div class="col-8" style="text-align: justify;">
            Batas akhir waktu yang disepakati untuk penerbitan SPP oleh PPK untuk pembayaran tagihan angsuran adalah 10 (sepuluh) hari kalender terhitung sejak tagihan dan kelengkapan dokumen penunjang yang tidak diperselisihkan diterima oleh PPK.
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4 fw-bold" >
            L. Sumber Pembiayaan
            </div>
            <div class="col-8" style="text-align: justify;">
            Kontrak Pengadaan Barang ini dibiayai dari BLUD RSUD INDRAMAYU.
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4 fw-bold" >
            M. Pembayaran Uang Muka
            </div>
            <div class="col-8" style="text-align: justify;">
            Pekerjaan Pengadaan Barang ini tidak dapat diberikan uang muka :
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4 fw-bold" >
            N. Pembayaran denda
            </div>
            <div class="col-8" style="text-align: justify;">
            Besarnya denda sebesar 1/1000 (satu perseribu) dari harga kontrak, apabila bagian pekerjaan yang sudah dilaksanakan belum berfungsi.
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4 fw-bold" >
            O. Harga kontrak 
            </div>
            <div class="col-8" style="text-align: justify;">
            Kontrak Pengadaan barang ini dibiayai dari sumber pendanaan BLUD RSUD Kabupaten Indramayu Rp <?php echo number_format($row['nilaitotalnego'])?>,-					
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4 fw-bold" >
            P. Penyelesaian Perselisihan
            </div>
            <div class="col-8" style="text-align: justify;">
            Jika perselisihan Para Pihak mengenai pelaksanaan Kontrak tidak dapat diselesaikan secara damai maka Para Pihak menetapkan lembaga penyelesaian perselisihan tersebut di bawah sebagai Pemutus Sengketa:Pengadilan Republik Indonesia yang berkompeten/Badan Arbitrase Nasional Indonesia (BANI).					
            </div>
        </div>
        <div class="row">
            <div class="col-4 fw-bold" >
            
            </div>
            <div class="col-8" style="text-align: justify;">
            Semua sengketa yang timbul dari Kontrak ini, akan diselesaikan dan diputus oleh Badan Arbitrase Nasional Indonesia (BANI) menurut peraturan-peraturan administrasi dan peraturan-peraturan prosedur arbitrase BANI, yang keputusannya mengikat kedua belah pihak yang bersengketa sebagai keputusan tingkat pertama dan terakhir. Para Pihak setuju bahwa jumlah arbitrator adalah 3 (tiga) orang. Masing-masing Pihak harus menunjuk seorang arbitrator dan kedua arbitrator yang ditunjuk oleh Para Pihak akan memilih arbitrator ketiga yang akan bertindak sebagai pimpinan arbitrator.</div>
        </div>




        <script>
            window.print()
            header("location:sp.php");
        </script>
</section>

</body>
</html>
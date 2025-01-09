<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>BAPHP</title>
</head>
<style>
@media print {
  @page {
    size: A4 portrait;
  }
}
</style>
<body style="background-color: white;">
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
 
        $tglbaphp= $row['tglbaphp'];
        $hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
        $tanggal = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", 
                            "Sebelas", "Dua Belas", "tiga Belas", "Empat Belas", "Lima Belas", "Enam Belas", "Tujuh Belas", "Delapan Belas", "Sembilan Belas", 
                            "Dua Puluh", "Dua Puluh Satu", "Dua Puluh Dua", "Dua Puluh Tiga", "Dua Puluh Empat", "Dua Puluh Lima", "Dua Puluh Enam", "Dua Puluh Tujuh", "Dua Puluh Delapan", "Dua Puluh Sembilan", "Tiga Puluh", "Tiga Puluh Satu");
        
        $bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
	    $angka = date("Y", strtotime($tglbaphp));

        // echo $hari[date("w", strtotime($tglbaphp))].", Tanggal ".$tanggal[date("j", strtotime($tglbaphp))]." Bulan ".$bulan[date("n", strtotime($tglbaphp))];
        // echo terbilang($angka);
        ?>

<section class="sheet padding-10mm" style="font-size:15px; line-height: 20px;">
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
                <div class="col-12 text-center" style="font-size:19px;">
                <u><b>BERITA ACARA PEMERIKSAAN HASIL PEKERJAAN DAN ADMINISTRASI PEKERJAAN</b></u>
                </div>
                <div class="col-12 text-center">
                Nomor : <?php echo $row['nobaphp']; ?>
                </div>
        </div>
<br>
        <div class="row" style="text-align: justify;">
                <div class="col-12">
                Pada hari ini <?php echo $hari[date("w", strtotime($tglbaphp))].", 
                Tanggal ".$tanggal[date("j", strtotime($tglbaphp))]." 
                Bulan ".$bulan[date("n", strtotime($tglbaphp))]; ?> 
                Tahun <?php echo terbilang($angka) ?> (<?php echo date("d-m-Y", strtotime($tglbaphp)); ?>), yang bertanda tangan di bawah ini :
                </div>
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-2" style="text-align: justify;">
                Nama
                </div>
                <div class="col-10" style="text-align: justify;">
                : <b><?php echo $row['namapejabatpemeriksa']; ?></b>
                </div>
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-2" style="text-align: justify;">
                NIP
                </div>
                <div class="col-10" style="text-align: justify;">
                : <?php echo $row['nippejabatpemeriksa']; ?>
                </div>
        </div>
        <br>
        <div class="row">
                <div class="col-12" style="text-align: justify;">
                Selaku Pejabat Pemeriksa Hasil Pekerjaan berdasarkan Surat Keputusan Pemimpin BLUD RSUD Indramayu 
                Nomor : 800.Kep.09-PHH/2024 
                Tanggal 02 Januari 2024 
                Telah Bersama-sama melakukan pemeriksaan/ penilaian pekerjaan terhadap :
                </div>        
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-4" style="text-align: justify;">
               Nama Sub Kegiatan
                </div>
                <div class="col-8" style="text-align: justify;">
                : <?php echo $row['subkegiatan']; ?>
                </div>
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-4" style="text-align: justify;">
                Pekerjaan
                </div>
                <div class="col-8" style="text-align: justify;">
                : <?php echo $row['pekerjaan']; ?>
                </div>
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-4" style="text-align: justify;">
                Lokasi Kegiatan
                </div>
                <div class="col-8" style="text-align: justify;">
                : <?php echo $row['satuankerja']; ?>
                </div>
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-4" style="text-align: justify;">
                Sumber dana / biaya
                </div>
                <div class="col-8" style="text-align: justify;">
                : <?php echo $row['sumberdana']; ?>
                </div>
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-4" style="text-align: justify;">
                Nilai Kontrak
                </div>
                <div class="col-8" style="text-align: justify;">
                : Rp. <?php echo number_format($row['nilaitotalnego']); ?>,-
                </div>
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-4" style="text-align: justify;">
                Pelaksana Pekerjaan
                </div>
                <div class="col-8" style="text-align: justify;">
                : <?php echo $row['namaperusahaan']; ?>
                </div>
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-4" style="text-align: justify;">
                Surat Pesanan E-Catalogue (Sp)
                </div>
                <div class="col-8" style="text-align: justify;">
                : <?php echo $row['nomorkontrak']; ?> Tanggal <?php echo tglindo($row['tglmulaikontrak']); ?>
                </div>
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-4" style="text-align: justify;">
                Surat Permohonan dari Pelaksana Pekerjaan
                </div>
                <div class="col-8" style="text-align: justify;">
                : <?php echo $row['nopemeriksaan']; ?> Tanggal <?php echo tglindo($row['tglpemeriksaan']); ?>
                </div>
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-12">
                Dengan ini menyatakan Hasil pemeriksaan/penilaian/pengujicobaan adalah sebagai berikut:
                </div>        
        </div>

        <div class="row" style="text-align: justify;">
                <div class="col-1 text-end">
                1.
                </div>        
                <div class="col-11">
                Bahwa berdasarkan pemeriksaan di lapangan, pekerjaan tersebut diatas hingga saat ini telah mencapai 
                prosentase fisik = 100 % dari pekerjaan seluruhnya, sesuai dengan data pendukung : Hasil Opname Fisik, 
                Faktur dan Photo Kegiatan sebagaimana terlampir.
                </div>        
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-1 text-end">
                2.
                </div>        
                <div class="col-11">
                Evaluasi hasil pemeriksaan terhadap pekerjaan tersebut dinyatakan telah sesuai dengan fisik.
                </div>        
        </div>



        <div class="row" style="text-align: justify;">
                <div class="col-12">
                Demikian Berita Acara Pemeriksaan Pekerjaan ini dibuat dalam rangkap 3 (tiga) 
                untuk dipergunakan sebagaimana mestinya.
                </div>        
        </div>
        <br>
                <div class="row text-center">
                    <div class="col-6">
                    </div>
                    <div class="col-6">
                    Indramayu, <?php echo tglindo($row['tglbaphp']); ?>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-6">
                    Pelaksana Pekerjaan
                    </div>
                    <div class="col-6">
                    Pejabat Pemeriksa Hasil Pekerjaan
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-6">
                    <?php echo $row['namaperusahaan']; ?>
                    </div>
                    <div class="col-6">
                    
                    </div>
                </div>
                <br><br><br><br>
                <div class="row text-center">
                    <div class="col-6"><b><u>              
                    <?php echo $row['namapimpinan']; ?></u></b>
                    </div>
                    <div class="col-6"><b><u>
                    <?php echo $row['namapejabatpemeriksa']; ?></u></b>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-6">
                    <?php echo $row['jabatan']; ?>
                    </div>
                    <div class="col-6">
                    NIP. <?php echo $row['nippejabatpemeriksa']; ?>
                    </div>
                </div>


<br>
                <div class="row text-center">
                    <div class="col-6">
                    Mengetahui :
                    </div>
                    <div class="col-6">
                    Menyetujui :
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-6">
                    Pejabat Pembuat Komitmen
                    </div>
                    <div class="col-6">
                    Pejabat Pelaksana Teknis Kegiatan
                    </div>
                </div>
                <br><br><br><br>
                <div class="row text-center">
                    <div class="col-6"><b><u>              
                    <?php echo $row['namappk']; ?></u></b>
                    </div>
                    <div class="col-6"><b><u>
                    <?php echo $row['namapptk']; ?></u></b>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-6">
                    NIP. <?php echo $row['nipppk']; ?>
                    </div>
                    <div class="col-6">
                    NIP. <?php echo $row['nippptk']; ?>
                    </div>
                </div>
        </div>
    </div>
        <script>
            window.print()
            header("location:sp.php");
        </script>
</section>

</body>
</html>
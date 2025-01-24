<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>BASTB</title>
</head>
<style>
@media print {
  @page {
    size: F4;
    size: portrait;
  }
}
</style>
<body style="background-color: white; font-family: tahoma; line-height: 20px;">
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
 
        $tglbastb= $row['tglbastb'];
        $hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
        $tanggal = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", 
                            "Sebelas", "Dua Belas", "tiga Belas", "Empat Belas", "Lima Belas", "Enam Belas", "Tujuh Belas", "Delapan Belas", "Sembilan Belas", 
                            "Dua Puluh", "Dua Puluh Satu", "Dua Puluh Dua", "Dua Puluh Tiga", "Dua Puluh Empat", "Dua Puluh Lima", "Dua Puluh Enam", "Dua Puluh Tujuh", "Dua Puluh Delapan", "Dua Puluh Sembilan", "Tiga Puluh", "Tiga Puluh Satu");
        
        $bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
	    $angka = date("Y", strtotime($tglbastb));

        // echo $hari[date("w", strtotime($tglbaphp))].", Tanggal ".$tanggal[date("j", strtotime($tglbaphp))]." Bulan ".$bulan[date("n", strtotime($tglbaphp))];
        // echo terbilang($angka);
        ?>

<section class="sheet padding-10mm" style="font-size:14px;">
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
                <h5><u><b>BERITA ACARA SERAH TERIMA BARANG</b></u></h5>
                </div>
                <div class="col-12 text-center">
                Nomor : <?php echo $row['nobastb']; ?>
                </div>
        </div>
<br>
        <div class="row" style="text-align: justify;">
                <div class="col-12">
                Pada hari ini <?php echo $hari[date("w", strtotime($tglbastb))].", 
                Tanggal ".$tanggal[date("j", strtotime($tglbastb))]." 
                Bulan ".$bulan[date("n", strtotime($tglbastb))]; ?> 
                Tahun <?php echo terbilang($angka) ?> (<?php echo date("d-m-Y", strtotime($tglbastb)); ?>),
                yang bertanda tangan di bawah ini :

                </div>
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-4" style="text-align: justify;">
                1. <?php echo $row['namappk']; ?>
                </div>
                <div class="col-8">
                <?php echo $row['jabatanppk']; ?> yang diangkat berdasarkan Keputusan Direktur RSUD Indramayu 
                Nomor : <?php echo $row['nomorskppk']; ?> 
                Tanggal <?php echo tglindo($row['tglskppk']); ?> 
                bertindak untuk dan atas nama jabatannya, selanjutnya disebut PIHAK KESATU.
                </div>
        </div>
        <br>
        <div class="row" style="text-align: justify;">
                <div class="col-4" style="text-align: justify;">
                2. <?php echo $row['namapimpinan']; ?>
                </div>
                <div class="col-8">
                <?php echo $row['jabatan']; ?> <?php echo $row['namaperusahaan']; ?> beralamat 
                di <?php echo $row['alamat']; ?> 
                selaku pelaksana kegiatan <?php echo $row['subkegiatan']; ?> pekerjaan <?php echo $row['pekerjaan']; ?> 
                berdasarkan <?php echo $row['bilangjeniskontrak']; ?> (<?php echo $row['jeniskontrak']; ?>) Nomo
                : <?php echo $row['nomorkontrak']; ?> 
                tanggal <?php echo tglindo($row['tglmulaikontrak']); ?>, 
                bertindak untuk dan atas nama jabatannya, selanjutnya disebut PIHAK KEDUA.
                </div>
        </div>
        <br>
        <div class="row">
                <div class="col-12" style="text-align: justify;">
                PIHAK KESATU dan PIHAK KEDUA telah sepakat melaksanakan serah terima kegiatan, dengan ketentuan sebagai berikut :
                </div>        
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-1">
                a.
                </div>        
                <div class="col-11">
                Berdasarkan Berita Acara Pemeriksaan Hasil Pekerjaan 
                Nomor : <?php echo$row['nobaphp']; ?> 
                Tanggal <?php echo tglindo($row['tglbaphp']); ?> PIHAK KEDUA menyerahkan hasil pekerjaan yakni 
                Sub Kegiatan Pelayanan Medik Umum 
                Pekerjaan <?php echo$row['pekerjaan']; ?> 
                Nilai kontrak Rp. <?php echo number_format( $row['nilaitotalnego']); ?>,- (<?php echo$row['terbilangtotalnego']; ?> ) 
                yang telah selesai dikerjakan, kepada PIHAK KESATU.
                </div>        
        </div>
        <br>
        <div class="row" style="text-align: justify;">
                <div class="col-1">
                b.
                </div>        
                <div class="col-11">
                PIHAK KESATU menerima penyerahan dari PIHAK KEDUA kegiatan tersebut dalam keadaan baik, 
                dan sesuai dengan yang dituangkan dalam Surat Perjanjian Kerja.
                </div>        
        </div>
        <br>
        <div class="row" style="text-align: justify;">
                <div class="col-12">
                Demikian Berita Acara Serah Terima 
                Kegiatan <?php echo $row['kegiatan']; ?> dibuat rangkap 4 (empat), 
                2 (dua) lembar diantaranya diberi materai secukupnya.
                </div>        
        </div>
        <br>
                <div class="row text-center">
                    <div class="col-6">
                    </div>
                    <div class="col-6">
                    Indramayu, <?php echo tglindo($row['tglbastb']); ?>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-6">
                    Yang Menerima Penyerahan
                    </div>
                    <div class="col-6">
                    Yang Menyerahkan
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-6">
                    PIHAK KESATU
                    </div>
                    <div class="col-6">
                    PIHAK KEDUA
                    </div>
                </div>
                <br><br><br><br>
                <div class="row text-center">
                    <div class="col-6"><b><u>              
                    <?php echo $row['namappk']; ?></u></b>
                    </div>
                    <div class="col-6"><b><u>
                    <?php echo $row['namapimpinan']; ?></u></b>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-6">
                    NIP. <?php echo $row['nipppk']; ?>
                    </div>
                    <div class="col-6">
                    <?php echo $row['jabatan']; ?>
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
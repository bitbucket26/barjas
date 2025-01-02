<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>BA. Klarifikasi & Negosiasi</title>
</head>
<style>
@media print {
  @page {
    size: F4 portrait;
  }
}
</style>
<body style="background-color: white; line-height: 22px; font-size: tahoma;">
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
 
        $tglbastb= $row['tglbaklarifikasi'];
        $hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
        $tanggal = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", 
                            "Sebelas", "Dua Belas", "tiga Belas", "Empat Belas", "Lima Belas", "Enam Belas", "Tujuh Belas", "Delapan Belas", "Sembilan Belas", 
                            "Dua Puluh", "Dua Puluh Satu", "Dua Puluh Dua", "Dua Puluh Tiga", "Dua Puluh Empat", "Dua Puluh Lima", "Dua Puluh Enam", "Dua Puluh Tujuh", "Dua Puluh Delapan", "Dua Puluh Sembilan", "Tiga Puluh", "Tiga Puluh Satu");
        
        $bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
	    $angka = date("Y", strtotime($tglbastb));

        // echo $hari[date("w", strtotime($tglbaphp))].", Tanggal ".$tanggal[date("j", strtotime($tglbaphp))]." Bulan ".$bulan[date("n", strtotime($tglbaphp))];
        // echo terbilang($angka);
        ?>
<section class="sheet padding-10mm" style="font-size: 15px;">
    <div class="container-xxl">
        <!-- KOP -->
        <div class="d-flex justify-content-center">
            <img src="../../../../img/barjas.png">
        </div>
            <br>
        <!-- Judul Nota -->
         <h5 class="text-center"><u><b>BERITA ACARA KLARIFIKASI DAN NEGOSIASI TEKNIS DAN BIAYA</b></u></h5>
        <div class="row text-center">
            <div class="col-12">
            Nomor : <?php echo $row['baklarifikasi'];?>
            </div>
        </div>
        
        <br>
        <div class="row" style="text-align: justify;">
        Pada hari ini <?php echo $hari[date("w", strtotime($tglbastb))].", 
                Tanggal ".$tanggal[date("j", strtotime($tglbastb))]." 
                Bulan ".$bulan[date("n", strtotime($tglbastb))]; ?> 
                Tahun <?php echo terbilang($angka) ?> (<?php echo date("d-m-Y", strtotime($tglbastb)); ?>) 
                yang bertanda tangan di bawah ini adalah Pejabat Pengadaan yang ditetapkan dengan Surat Keputusan 
                Pemimpin BLUD RSUD Indramayu tanggal <?php echo tglindo($row['tglskpejabatbarjas']);?> Nomor : <?php echo $row['nomorskpejabatbarjas'];?> 
                melaksanakan klarifikasi dan negosiasi terhadap penawaran yg diajukan oleh 
                <?php echo $row['namaperusahaan'];?> untuk pelaksanaan pekerjaan <?php echo $row['pekerjaan'];?> 
                dibiayai dari Dana <?php echo $row['sumberdana'];?> dengan Harga Perkiraan Sendiri (HPS) 
                sebesar Rp. <?php echo number_format($row['nilaitotalhps']);?>,- (<?php echo $row['terbilangtotalhps'];?>).
        </div>
        <br>

        <div class="row">
        Dari hasil klarifikasi dan negosiasi harga, ditetapkan sebagai penyedia yaitu :
        </div>
        <div class="row">
            <div class="col-4">
                Nama Perusahaan
            </div>
            <div class="col-8">
            : <?php echo $row['namaperusahaan'];?>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                Nama Penanggungjawab
            </div>
            <div class="col-8">
            : <?php echo $row['namapimpinan'];?>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                Alamat Perusahaan
            </div>
            <div class="col-8">
            : <?php echo $row['alamat'];?>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                Nomor Pokok Wajib Pajak
            </div>
            <div class="col-8">
            : <?php echo $row['npwp'];?>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                Pekerjaan
            </div>
            <div class="col-8">
            : <?php echo $row['pekerjaan'];?>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
Dengan Nilai hasil Negosiasi
            </div>
            <div class="col-8">
            : Rp. <?php echo number_format($row['nilaitotalnego']);?>,-
            </div>
        </div>
        <br>
        <div class="row">
        Dengan pertimbangan bahwa spesifikasi teknis sesuai dengan ketentuan dan harga dapat dipertanggungjawabkan dan menguntungkan.
        </div>
        <div class="row">
        Demikian Berita Acara ini dibuat untuk dipergunakan sebagai bahan pertimbangan dalam pelaksanaan pengadaan langsung.
        </div>
        
       
        <br><br>
        <div class="row text-center">
            <div class="col-6">
			Calon Penyedia
            </div>
            <div class="col-6">
            Pejabat Pengadaan Barang/Jasa	
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
            <div class="col-6">
			<b><u><?php echo $row['namapimpinan']; ?></u></b>
            </div>
            <div class="col-6">
            <b><u><?php echo $row['namapejabatbarjas']; ?></u></b>
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
    </div>
        <script>
            window.print()
            header("location:ecatalogue.php");
        </script>
</section>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>BA. Evaluasi Penawaran</title>
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
        
        include "../../../koneksi.php";
         
        // Check connection
        if (mysqli_connect_error()){
            echo "Koneksi database gagal : " . mysqli_connect_error();
        }
         
         $sql=mysqli_query($koneksi, "SELECT * FROM sp WHERE id='$_GET[id]'");
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
 
        $tglbastb= $row['tglbaevaluasi'];
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
        <div class="d-flex justify-content-center">
            <img src="../../../img/kop3.png">
        </div>
            <br>
        <!-- Judul Nota -->
         <h4 class="text-center">BERITA CARA EALUASI PENAWARAN</h4>
        <div class="row">
            <div class="col-4">
            </div>
            <div class="col-1">
            Nomor
            </div>
            <div class="col-7">
            : <?php echo $row['baevaluasi'];?>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
            </div>
            <div class="col-1">
            Tanggal
            </div>
            <div class="col-7">
            : <?php echo tglindo($row['tglbaevaluasi']);?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-3">
                Nama Paket
            </div>
            <div class="col-9">
: <?php echo $row['pekerjaan'];?>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                Nilai HPS
            </div>
            <div class="col-9">
: Rp. <?php echo number_format($row['nilaihps']);?>,-
            </div>
        </div>
        <div class="row">
            <div class="col-3">
               Tahun Anggaran
            </div>
            <div class="col-9">
: <?php echo $row['tahunanggaran'];?>
            </div>
        </div>

        <br>
        <div class="row" style="text-align: justify;">
        Pada hari ini <?php echo $hari[date("w", strtotime($tglbastb))].", 
                Tanggal ".$tanggal[date("j", strtotime($tglbastb))]." 
                Bulan ".$bulan[date("n", strtotime($tglbastb))]; ?> 
                Tahun <?php echo terbilang($angka) ?> (<?php echo date("d-m-Y", strtotime($tglbastb)); ?>) 
        bertempat di RSUD Indramayu, saya selaku Pejabat Pengadaan Barang/Jasa RSUD Indramayu Tahun Anggaran <?php echo $row['tahunanggaran'];?> yang diangkat 
        berdasarkan Surat Keputusan Pemimpin BLUD RSUD Indramayu Nomor : <?php echo $row['nomorskpejabatbarjas'];?> telah melakukan Evaluasi Penawaran 
        pada paket tersebut di atas dengan hasil sebagai berikut :
        </div>
        <br>

        <table class="table table-bordered text-center" style="font-size: 15px;">
            <thead>
                <tr>
                    <th rowspan="2">No.</th>
                    <th rowspan="2">CALON PENYEDIA</th>
                    <th rowspan="2">HARGA PENAWARAN</th>
                    <th colspan="2">HASIL EVALUASI</th>
                    <th rowspan="2">KETERANGAN</th> 
                </tr>
                <tr>
                    <!-- <th class="col-1">No.</th>
                    <th class="col-3">CALON PENYEDIA</th> -->
                    <!-- <th class="col-2">HARGA PENAWARAN</th> -->
                    <th class="col-1">Teknis</th>
                    <th class="col-1">Harga</th>
                    <!-- <th class="col-2">KETERANGAN</th> -->
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="col-1">1</td>
                    <td class="col-3"><?php echo $row['namaperusahaan'];?></td>
                    <td class="col-2"><?php echo number_format($row['nilaihps']);?></td>
                    <td class="col-2">Memenuhi Syarat</td>
                    <td class="col-2">Memenuhi Syarat</td> 
                    <td class="col-2">Memenuhi Syarat</td> 
                </tr>
            </tbody>
        </table>
        
        <div class="row">
            <div class="col-12" style="text-align: justify;">
            Demikian Berita Acara ini dibuat untuk dipergunakan sebagaimana mestinya.
            </div>
        </div>
        <br>
        <div class="row text-center">
            <div class="col-6">
			
            </div>
            <div class="col-6">
            Pejabat Pengadaan Barang/Jasa	
            </div>
        </div>
        <div class="row text-center">
            <div class="col-6">
			
            </div>
            <div class="col-6">
           RSUD Indramayu	
            </div>
        </div>
        <br><br><br><br>
        <div class="row text-center">
            <div class="col-6">
			
            </div>
            <div class="col-6">
            <b><u><?php echo $row['namapejabatbarjas']; ?></u></b>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-6">
			
            </div>
            <div class="col-6">
            NIP. <?php echo $row['nippejabatbarjas']; ?>	
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
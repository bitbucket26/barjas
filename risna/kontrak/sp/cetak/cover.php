<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Cover</title>
</head>
<style>
@media print {
  @page {
    size: F4 portrait;
  }
}
</style>
<body style="background-color: white; font-family: Arial, Helvetica, sans-serif; ">
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
 
        $tglbastb= $row['tglnotadinas'];
        $hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
        $tanggal = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", 
                            "Sebelas", "Dua Belas", "tiga Belas", "Empat Belas", "Lima Belas", "Enam Belas", "Tujuh Belas", "Delapan Belas", "Sembilan Belas", 
                            "Dua Puluh", "Dua Puluh Satu", "Dua Puluh Dua", "Dua Puluh Tiga", "Dua Puluh Empat", "Dua Puluh Lima", "Dua Puluh Enam", "Dua Puluh Tujuh", "Dua Puluh Delapan", "Dua Puluh Sembilan", "Tiga Puluh", "Tiga Puluh Satu");
        
        $bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
	    $angka = date("Y", strtotime($tglbastb));

        // echo $hari[date("w", strtotime($tglbaphp))].", Tanggal ".$tanggal[date("j", strtotime($tglbaphp))]." Bulan ".$bulan[date("n", strtotime($tglbaphp))];
        // echo terbilang($angka);
        ?>
<section class="sheet padding-10mm" style="font-size: 17px;">
    <div class="container-xxl">
        <!-- KOP -->
        <div class="d-flex justify-content-center">
            <img src="../../../../img/kopno.png">
        </div>
            <br><br><br><br><br>
        <!-- Judul Nota -->
        <div class="d-flex justify-content-center">
            <img src="../../../../img/cover.png">
        </div>
<br>
         <h1 class="text-center text-uppercase"><b><?php echo $row['bilangjeniskontrak'];?></b></h1>
         <h1 class="text-center"><b>( <?php echo $row['jeniskontrak'];?> )</b></h1>

         <br>

         <h5 class="text-center">Nomor : <?php echo $row['nomorkontrak'];?></h5>
         <h5 class="text-center">Tanggal : <?php echo tglindo($row['tglmulaikontrak']);?></h5>

        <br><br>
        <div class="row">
            <div class="col-4">SUB KEGIATAN</div>
            <div class="col-8">: <?php echo $row['subkegiatan'];?></div>
        </div>
        <div class="row">
            <div class="col-4">PEKERJAAN</div>
            <div class="col-8">: <?php echo $row['pekerjaan'];?></div>
        </div>
        <div class="row">
            <div class="col-4">LOKASI</div>
            <div class="col-8">: <?php echo $row['satuankerja'];?></div>
        </div>
        <div class="row">
            <div class="col-4">NILAI KONTRAK</div>
            <div class="col-8">: Rp. <?php echo number_format($row['nilaitotalnego']);?>,-</div>
        </div>
        <div class="row">
            <div class="col-4">WAKTU PELAKSANAAN</div>
            <div class="col-8">: <?php echo $row['waktupelaksanaan'];?> (<?php echo $row['terbilangwaktupelaksanaan'];?>) hari kalender</div>
        </div>
        <div class="row">
            <div class="col-4">TANGGAL MULAI</div>
            <div class="col-8">: <?php echo tglindo($row['tglmulaikontrak']);?></div>
        </div>
        <div class="row">
            <div class="col-4">TANGGAL SELESAI</div>
            <div class="col-8">: <?php echo tglindo($row['tglselesaikontrak']);?></div>
        </div>
        <br><br>
        <div class="row" style="border-style: double; border-radius: 50px;">
            <p></p>
            <div class="row " >
                <div class="col-12 text-center">
                PENYEDIA BARANG / JASA :
                </div>
            </div>
            <br>
            <p></p>
            <div class="row">
                <div class="col-12 text-center" style="font-size: 25px;">
                <b><?php echo $row['namaperusahaan'];?></b>
                </div>
            </div>
            <br>
            <p></p>
            <div class="row">
                <div class="col-12 text-center" style="text-align: justify;">
                <?php echo $row['alamat'];?>
                </div>
            </div>
            <p></p>
        </div>
        
        <br>
    </div>

        
        <script>
            window.print()
            header("location:sp.php");
        </script>
</section>

</body>
</html>
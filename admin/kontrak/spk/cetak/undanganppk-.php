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
    size: F4 portrait;
  }
}
</style>
<body style="background-color: white; font-family: bookmand old style; line-height: 22px;">
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
<section class="sheet padding-10mm" style="font-size:20px;">
    <div class="container-xxl">
        <!-- KOP -->
        <div class="d-flex justify-content-center">
            <img src="../../../../img/kop3.png">
        </div>
            <br>
        <!-- Judul Nota -->
        <div class="d-flex justify-content-end">
            <label class="text-capitalize"></label>
        </div>
        <table style="width:100%;">
		<thead>
		</thead>
		<tbody>
            <tr>
				<td class="col-1"></td>
				<td class="col-5"></td>
				<td class="col-1"></td>
				<td class="col-5" >Indramayu, <?php echo tglindo($row['tglundanganppk']);?></label></td>
			</tr>
            <tr>
				<td class="col-1"></td>
				<td class="col-5"></td>
				<td class="col-1"></td>
				<td class="col-5">Kepada :</td>
			</tr>
            <tr>
				<td class="col-1">Nomor</td>
				<td class="col-5">: <?php echo $row['noundanganppk']; ?></td>
				<td class="col-1">Yth.</td>
				<td rowspan="3" style="vertical-align: text-top; text-align: justify;">
                    Pejabat Pemeriksa Hasil Pekerjaan <?php echo $row['pekerjaan']; ?> Sub Kegiatan <?php echo $row['subkegiatan']; ?>
                </td>
			</tr>
			<tr>
				<td class="col-1">Lampiran</td>
				<td class="col-5">: -</td>
			</tr>
			<tr>
				<td class="col-1">Perihal</td>
				<td class="col-5">: Undangan Pemeriksaan Pekerjaan</td>
			</tr>
            <tr>
				<td class="col-1"></td>
				<td class="col-5"></td>
				<td class="col-1"></td>
				<td class="col-5">di -</td>
			</tr>
			<tr>
				<td class="col-1"></td>
				<td class="col-5"></td>
				<td class="col-1"></td>
				<td class="col-5" style="text-indent: 0.5in;">Indramayu</td>
			</tr>
		</tbody>
</table>
        
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
                <div class="col-1">
                </div>
                <div class="col-11" style="text-align: justify; text-indent: 0.5in;">
                Berdasarkan surat dari <?php echo $row['jabatan']; ?> <?php echo $row['namaperusahaan']; ?> 
                Nomor : <?php echo $row['nopemeriksaan']; ?> 
                tanggal <?php echo tglindo($row['tglpemeriksaan']); ?> dalam rangka pelaksanaan 
                Sub Kegiatan <?php echo $row['subkegiatan']; ?> 
                Tahun Anggaran 2025, 
                Pekerjaan <?php echo $row['pekerjaan']; ?> 
                Lokasi di RSUD Indramayu.
                </div>
        </div>
        <br>
        <div class="row">
                <div class="col-1">
                </div>
                
                <div class="col-11" style="text-align: justify; text-indent: 0.5in;">
                Dengan ini kami mengundang Pejabat Pemeriksa Hasil Pekerjaan, 
                untuk melaksanakan pemeriksaan atas permohonan perusahaan tersebut diatas, 
                dengan ketentuan waktu pada :							
                </div>
                
        </div>
        <div class="row">
                <div class="col-1">
                </div>
                <div class="col-3">
                Hari / Tanggal					
                </div>
                <div class="col-8">:
                <?php echo $hari[date("w", strtotime($tglbaphp))]?>, <?php echo tglindo($row['tglbaphp']); ?>					
                </div>
        </div>
        <div class="row">
                <div class="col-1">
                </div>
                <div class="col-3">
                Waktu				
                </div>
                <div class="col-8">:
                 Pukul 11.00 WIB					
                </div>
        </div>
        <div class="row">
                <div class="col-1">
                </div>
                <div class="col-3">
                Tempat				
                </div>
                <div class="col-8">:
                 RSUD Indramayu				
                </div>
        </div>
        <br>
        <div class="row">
                <div class="col-1">
                </div>
                
                <div class="col-11" style="text-align: justify; text-indent: 0.5in;">
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
                    Rumah Sakit Umum Daerah Indramayu
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
                </div><br><br>
                <div class="row">
                    <div class="col-12">
                        TEMBUSAN :
                    </div>
                </div>
        
                <div class="row">
                    <div class="col-12">
                        1. Yth. Direktur RSUD Indramayu
                    </div>
                </div>
        
                <div class="row">
                    <div class="col-12">
                        2. Yth. Pejabat Penatausahaan Keuangan RSUD Indramayu
                    </div>
                </div>
        
                <div class="row">
                    <div class="col-12">
                        3. Yth. Pejabat Pelaksana Teknis kegiatan
                    </div>
                </div>
        
                <div class="row">
                    <div class="col-12">
                        4. Yth. Pejabat Pemeriksa Hasil Pekerjaan
                    </div>
                </div>
      
                <div class="row">
                    <div class="col-12">
                        5. Yth. <?php echo $row['jabatan']; ?> <?php echo $row['namaperusahaan']; ?>
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
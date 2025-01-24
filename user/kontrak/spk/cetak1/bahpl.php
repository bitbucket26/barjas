<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>BAHPL</title>
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
<body style="background-color: white; line-height: 20px; font-family: tahoma;">
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
 
        $tglbahasildasung= $row['tglbahasildasung'];
        $hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
        $tanggal = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", 
                            "Sebelas", "Dua Belas", "tiga Belas", "Empat Belas", "Lima Belas", "Enam Belas", "Tujuh Belas", "Delapan Belas", "Sembilan Belas", 
                            "Dua Puluh", "Dua Puluh Satu", "Dua Puluh Dua", "Dua Puluh Tiga", "Dua Puluh Empat", "Dua Puluh Lima", "Dua Puluh Enam", "Dua Puluh Tujuh", "Dua Puluh Delapan", "Dua Puluh Sembilan", "Tiga Puluh", "Tiga Puluh Satu");
        
        $bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
	    $angka = date("Y", strtotime($tglbahasildasung));

        // echo $hari[date("w", strtotime($tglbaphp))].", Tanggal ".$tanggal[date("j", strtotime($tglbaphp))]." Bulan ".$bulan[date("n", strtotime($tglbaphp))];
        // echo terbilang($angka);
        ?>
<section class="sheet padding-10mm" style="font-size:16px;">
    <div class="container-xxl">
        <!-- KOP -->
        <div class="d-flex justify-content-center">
            <img src="../../../../img/barjas.png">
        </div>
            <br>
        <!-- Judul Nota -->
         <h5 class="text-center"><u><b>BERITA ACARA HASIL PENGADAAN LANGSUNG (BAHPL)</b></u></h5>
        <div class="row">
            <div class="col-4">
            </div>
            <div class="col-1">
            Nomor
            </div>
            <div class="col-7">
            : <?php echo $row['bahasildasung'];?>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
            </div>
            <div class="col-1">
            Tanggal
            </div>
            <div class="col-7">
            : <?php echo tglindo($row['tglbahasildasung']);?>
            </div>
        </div>
        <br>
        <div class="row" style="text-align: justify;">
        Pada hari ini <?php echo $hari[date("w", strtotime($tglbahasildasung))].", 
                Tanggal ".$tanggal[date("j", strtotime($tglbahasildasung))]." 
                Bulan ".$bulan[date("n", strtotime($tglbahasildasung))]; ?> 
                Tahun <?php echo terbilang($angka) ?> (<?php echo date("d-m-Y", strtotime($tglbahasildasung)); ?>) 
                bertempat di RSUD Indramayu, saya selaku Pejabat Pengadaan Barang/Jasa RSUD Indramayu Tahun Anggaran <?php echo $row['tahunanggaran'];?> 
                yang diangkat berdasarkan Surat Keputusan Pemimpin BLUD RSUD Indramayu Nomor : <?php echo $row['nomorskpejabatbarjas'];?>  
                telah mengadakan Klarifikasi Teknis dan Negosiasi Harga kepada Calon Penyedia Paket Pekerjaan tersebut di atas 
                dengan hasil sebagai berikut :
        </div>
<br>
        <div class="row">
            <div class="col-1 text-end">
            I.
            </div>
            <div class="col-11" style="text-align: justify;">
            Bahwa dalam proses Pengadaan Langsung pekerjaan <?php echo $row['pekerjaan'];?>, telah diundang calon penyedia yaitu :														
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-3">
            Nama Perusahaan
            </div>
            <div class="col-8">
            : <?php echo $row['namaperusahaan'];?>														
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-3">
            Alamat
            </div>
            <div class="col-8">
            : <?php echo $row['alamat'];?>														
            </div>
        </div>

        <div class="row" style="text-align: justify;">
            <div class="col-1">
            
            </div>
            <div class="col-11">
            Setelah dilakukan penilaian kualifikasi/kompetensi badan usaha maka penyedia tersebut dianggap mampu untuk melaksanakan pekerjaan pengadaan langsung tersebut.														
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-1 text-end">
            II.
            </div>
            <div class="col-11" style="text-align: justify;">
            Setelah Penyedia menyampaikan penawaran (administrasi, teknis dan harga ) maka dilakukan pembukaan penawaran. Dalam pembukaan penawaran  diperoleh hasil sebagai berikut : 																																									
            </div>
        </div>
        
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1">
            1.
            </div>
            <div class="col-10">
            <table class="table table-bordered border-dark text-center table-sm" style="font-size: 15px;">
            <thead>
                <tr class="align-middle">
                    <th colspan="3">PENAWARAN</th>
                    <th rowspan="2">KETERANGAN</th>

                </tr>
                <tr>
                    <th class="col-3">ADMINISTRASI</th>
                    <th class="col-3">TEKNIS</th>
                    <th class="col-3">BIAYA</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="col-3">ADA</td>
                    <td class="col-3">ADA</td>
                    <td class="col-3">ADA</td>
                    <td class="col-3">LENGKAP</td> 
                </tr>
            </tbody>
        </table>
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1">
            2.
            </div>
            <div class="col-3">
            Harga Penawaran
            </div>
            <div class="col-7" style="text-align: justify;">
            : Rp. <?php echo number_format($row['nilaitotalhps']); ?> (<?php echo $row['terbilangtotalhps']; ?>)						
            </div>
        </div>

        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1">
            </div>
            <div class="col-3">
            Harga Penawaran setelah Koreksi Aritmatik
            </div>
            <div class="col-7" style="text-align: justify;">
            : Rp. <?php echo number_format($row['nilaitotalhps']); ?> (<?php echo $row['terbilangtotalhps']; ?>)						
            </div>
        </div>
<br>
        <div class="row">
            <div class="col-1 text-end">
            III.
            </div>
            <div class="col-11" style="text-align: justify;">
            Selanjutnya dilakukan evaluasi dengan unsur – unsur evaluasi sebagai berikut :
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1">
            1.
            </div>
            <div class="col-10">
            Evaluasi Administrasi
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1">
            2.
            </div>
            <div class="col-10">
            Evaluasi Teknis
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1">
            3.
            </div>
            <div class="col-10">
            Evaluasi Kewajaran Harga
            </div>
        </div>

        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-11">
            Unsur – unsur selengkapnya sebagai berikut :
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1">
            1.
            </div>
            <div class="col-10">
            EVALUASI ADMINISTRASI
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1">
            </div>
            <div class="col-10">
            Evaluasi Administrasi meliputi :
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1">
            </div>
            <div class="col-10">
            a. Surat Penawaran
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1">
            
            </div>
            <div class="col-10">
            <table class="table table-bordered border-dark table-sm" style="font-size: 15px;">
            <thead class="text-center">
                <tr class="align-middle">
                    <th class="col-1">NO</th>
                    <th class="col-8">UNSUR YANG DIEVALUASI</th>
                    <th class="col-3">KETERANGAN</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <!-- <td class="col-3">ADA</td> -->
                    <td class="col-1 text-center">1</td>
                    <td class="col-8 text-start">syarat-syarat substansial yang diminta berdasarkan Dokumen Pemilihan dipenuhi/dilengkapi</td>
                    <td class="col-3 text-start ">Memenuhi Syarat</td> 
                </tr>
                <tr>
                    <!-- <td class="col-3">ADA</td> -->
                    <td class="col-1 text-center">2</td>
                    <td class="col-8 text-start">Surat Penawaran</td>
                    <td class="col-3 text-start "></td> 
                </tr>
                <tr>
                    <!-- <td class="col-3">ADA</td> -->
                    <td class="col-1 text-center"></td>
                    <td class="col-8 text-start">- Ditandatangani oleh yang berhak</td>
                    <td class="col-3 text-start ">Memenuhi Syarat</td> 
                </tr>
                <tr>
                    <!-- <td class="col-3">ADA</td> -->
                    <td class="col-1 text-center"></td>
                    <td class="col-8 text-start">- Jangka waktu berlakunya surat penawaran</td>
                    <td class="col-3 text-start ">Memenuhi Syarat</td> 
                </tr>
                <tr>
                    <!-- <td class="col-3">ADA</td> -->
                    <td class="col-1 text-center"></td>
                    <td class="col-8 text-start">- Jangka waktu pelaksanaan</td>
                    <td class="col-3 text-start ">Memenuhi Syarat</td> 
                </tr>
                <tr>
                    <!-- <td class="col-3">ADA</td> -->
                    <td class="col-1 text-center"></td>
                    <td class="col-8 text-start">- Bertanggal</td>
                    <td class="col-3 text-start ">Memenuhi Syarat</td> 
                </tr>
            </tbody>
            </table>
            </div>
        </div>
        <div class="pagebreak"></div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1">
            2.
            </div>
            <div class="col-10">
            EVALUASI TEKNIS
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1">

            </div>
            <div class="col-10">
            Apabila penawaran memenuhi syarat administrasi tersebut diatas dilakukan evaluasi teknis, unsur evaluasi teknis meliputi :</div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1">
            
            </div>
            <div class="col-10">
            <table class="table table-bordered border-dark table-sm" style="font-size: 15px;">
            <thead class="text-center">
                <tr class="align-middle">
                    <th class="col-1">NO</th>
                    <th class="col-6">UNSUR YANG DIEVALUASI</th>
                    <th class="col-5">KETERANGAN</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <!-- <td class="col-3">ADA</td> -->
                    <td class="col-1 text-center">1</td>
                    <td class="col-8 text-start">Metode Pelaksanaan Pekerjaan</td>
                    <td class="col-3 text-start ">Memenuhi Syarat</td> 
                </tr>
                <tr>
                    <!-- <td class="col-3">ADA</td> -->
                    <td class="col-1 text-center">2</td>
                    <td class="col-8 text-start">Jadwal waktu pelaksanaan pekerjaan</td>
                    <td class="col-3 text-start "></td> 
                </tr>
                <tr>
                    <!-- <td class="col-3">ADA</td> -->
                    <td class="col-1 text-center">3</td>
                    <td class="col-8 text-start">Jenis, kapasitas, komposisi dan jumlah peralatan</td>
                    <td class="col-3 text-start ">Memenuhi Syarat</td> 
                </tr>
                <tr>
                    <!-- <td class="col-3">ADA</td> -->
                    <td class="col-1 text-center">4</td>
                    <td class="col-8 text-start">Spesifikasi teknis</td>
                    <td class="col-3 text-start ">Memenuhi Syarat</td> 
                </tr>
                <tr>
                    <!-- <td class="col-3">ADA</td> -->
                    <td class="col-1 text-center">5</td>
                    <td class="col-8 text-start">Personil inti</td>
                    <td class="col-3 text-start ">Memenuhi Syarat</td> 
                </tr>
                
            </tbody>
        </table>
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1">
            3.
            </div>
            <div class="col-10">
            EVALUASI KEWAJARAN HARGA
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1">

            </div>
            <div class="col-10">
            Penawaran yang telah lulus evaluasi teknis dilakukan Evaluasi Kewajaran Harga, yang meliputi :</div>
        </div>
        <div class="row text-end">
            <div class="col-1">
            
            </div>
            <div class="col-1">
            
            </div>
            <div class="col-10">
            <table class="table table-bordered border-dark table-sm" style="font-size: 15px;">
            <thead class="text-center">
                <tr class="align-middle">
                    <th class="col-1">NO</th>
                    <th class="col-6">UNSUR YANG DIEVALUASI</th>
                    <th class="col-5">KETERANGAN</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <!-- <td class="col-3">ADA</td> -->
                    <td class="col-1 text-center">1</td>
                    <td class="col-8 text-start">Total harga penawaran tidak melebihi HPS</td>
                    <td class="col-3 text-start ">Memenuhi Syarat</td> 
                </tr>
                <tr>
                    <!-- <td class="col-3">ADA</td> -->
                    <td class="col-1 text-center">2</td>
                    <td class="col-8 text-start">Harga satuan timpang</td>
                    <td class="col-3 text-start ">Memenuhi Syarat</td> 
                </tr>
                <tr>
                    <!-- <td class="col-3">ADA</td> -->
                    <td class="col-1 text-center">3</td>
                    <td class="col-8 text-start">Kewajaran harga</td>
                    <td class="col-3 text-start ">Memenuhi Syarat</td>
                </tr>
            </tbody>
        </table>
        </div>
        </div>
        <br>
        <div class="row">
            <div class="col-1">
            IV.
            </div>
            <div class="col-11">
            Setelah evaluasi dinyatakan memenuhi syarat maka dilakukan proses Klarifikasi Teknis dan Negosiasi Harga. Dari Hasil Negosiasi harga diperoleh hasil sebagai berikut :														
            </div>
        </div>
        <div class="row">

            <div class="col-1">
            
            </div>
            <div class="col-3">
            Harga Penawaran
            </div>
            <div class="col-8" style="text-align: justify;">
            : Rp. <?php echo number_format($row['nilaitotalhps']); ?>,- (<?php echo $row['terbilangtotalhps']; ?>)						
            </div>
        </div>

        <div class="row">

            <div class="col-1">
            </div>
            <div class="col-3">
            Negosiasi
            </div>
            <div class="col-8" style="text-align: justify;">
            : Rp. <?php echo number_format($row['nilaitotalnego']); ?>,- (<?php echo $row['terbilangtotalnego']; ?>)						
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-1">
            V.
            </div>
            <div class="col-11">
            Untuk selanjutnya Berita Acara Hasil Pengadaan Langsung ini akan disampaikan kepada Pejabat Pembuat Komitmen untuk proses pengadaan langsung selanjutnya.</div>
        </div>
        <br>
        <div class="row">
        Demikian Berita Acara Hasil Pengadaan dibuat dengan sebenarnya oleh Pejabat Pengadaan  untuk dipergunakan sebagaimana mestinya.</div>
        


        

        
        
       
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
            header("location:spk.php");
        </script>
</section>

</body>
</html>
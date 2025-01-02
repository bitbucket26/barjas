<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Lampiran Evaluasi Penawaran</title>
</head>
<style>
@media print {
  @page {
    size: F4 portrait;
  }
}
</style>
<body style="background-color: white; line-height: 18px; font-size: arial;">
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
<section class="sheet padding-10mm" style="font-size: 15px;">
    <div class="container-xxl">
        <!-- KOP -->
        <div class="d-flex justify-content-center">
            <!-- <img src="../../../img/kop3.png"> -->
        </div>
        <!-- Judul Nota -->
         <h5 class="text-center"><u><b>LAMPIRAN HASIL EVALUASI PENAWARAN</b></u></h5>
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
            Harga Penawaran
            </div>
            <div class="col-9">
            : Rp. <?php echo number_format($row['nilaihps']);?>,-
            </div>
        </div>
        <div class="row">
            <div class="col-3">
            Nama Penyedia
            </div>
            <div class="col-9">
            : <?php echo $row['namaperusahaan'];?>
            </div>
        </div>
        <br>
        <div class="row fw-bold">
        I. EVALUASI TEKNIS
        </div>
        <table class="table table-bordered border-dark text-center table-sm" style="font-size: 15px; line-height: 15px;">
            <thead class="fw-bold">
                <tr class="align-middle">
                    <th class="col-1">No.</th>
                    <th class="col-7">URAIAN</th>
                    <th class="col-2">PEMENUHAN PERSYARATAN OLEH PENYEDIA (YA/TIDAK)</th>
                    <th class="col-2">HASIL (LULUS/GUGUR)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="col-1">1</td>
                    <td class="col-7" style="text-align: justify;">identitas barang (jenis, tipe dan merek) yang ditawarkan tercantum dengan lengkap dan jelas;</td>
                    <td class="col-2">YA</td>
                    <td class="col-2">LULUS</td>
                </tr>
                <tr>
                    <td class="col-1">2</td>
                    <td class="col-7" style="text-align: justify;">spesifikasi teknis barang yang ditawarkan berdasarkan contoh, brosur dan gambar-gambar memenuhi persyaratan yang ditetapkan dalam Dokumen Pengadaan;																	                    </td>
                    <td class="col-2">YA</td>
                    <td class="col-2">LULUS</td>
                </tr>
                <tr>
                    <td class="col-1">3</td>
                    <td class="col-7" style="text-align: justify;">gambar/brosur barang [jika dipersyaratkan];																	                    </td>
                    <td class="col-2">YA</td>
                    <td class="col-2">LULUS</td>
                </tr>
                <tr>
                    <td class="col-1">4</td>
                    <td class="col-7" style="text-align: justify;">jadwal waktu penyerahan/pengiriman barang tidak melampaui batas waktu sebagaimana tercantum dalam LDP; 																	                    </td>
                    <td class="col-2">YA</td>
                    <td class="col-2">LULUS</td>
                </tr>
                <tr>
                    <td class="col-1">5</td>
                    <td class="col-7" style="text-align: justify;">surat dukungan pabrikan/distributor [jika dipersyaratkan]; 																	                    </td>
                    <td class="col-2">YA</td>
                    <td class="col-2">LULUS</td>
                </tr>
            </tbody>
        </table>
        <div class="row fw-bold">
            <div class="col-3">KESIMPULAN</div>
            <div class="col-9">: LULUS</div>
        </div>
        <div class="row fw-bold">
            <div class="col-3">REKOMENDASI</div>
            <div class="col-9">: LANJUTKAN EVALUASI KE TAHAP BERIKUTNYA</div>
        </div>
        <br>
        <div class="row fw-bold">
        II. EVALUASI HARGA
        </div>
        <table class="table table-bordered border-dark text-center table-sm" style="font-size: 15px; line-height: 15px;">
            <thead class="fw-bold">
                <tr class="align-middle">
                    <th class="col-1">No.</th>
                    <th class="col-3">URAIAN</th>
                    <th class="col-2">HASIL</th>
                    <th class="col-2">KETERANGAN</th>
                    <th class="col-4">PETUNJUK PENILAIAN</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                    <td class="col-1">1.</td>
                    <td class="col-3" style="text-align: justify;">Evaluasi Harga Penawaran                    </td>
                    <td class="col-2"><= HPS					                    </td>
                    <td class="col-2">LULUS</td>
                    <td class="col-4" style="text-align: justify;">Lulus jika harga penawaran sesudah koreksi aritmatik tidak melebihi HPS		                    </td>
                </tr>
            
                <tr>
                    <td class="col-1">2.</td>
                    <td class="col-3" style="text-align: justify;">Harga Satuan Timpang                    </td>
                    <td class="col-2">Tidak Ada Harga Satuan yang Timpang					                    </td>
                    <td class="col-2">Tidak Dilakukan Klarifikasi			                    </td>
                    <td class="col-4" style="text-align: justify;">Evaluasi terhadap adanya harga satuan timpang dilakukan dengan meneliti harga satuan penawaran yang > 110% HPS 		                    </td>
                </tr>
                <tr>
                    <td class="col-1">3.</td>
                    <td class="col-3" style="text-align: justify;">Kewajaran Harga (%)                    </td>
                    <td class="col-2">100,00					                    </td>
                    <td class="col-2">Wajar			                    </td>
                    <td class="col-4" style="text-align: justify;">Jika harga penawaran terkoreksi < 80% HPS, lakukan klarifikasi                    </td>
                </tr>
                
            </tbody>
        </table>

        <div class="row fw-bold">
            <div class="col-3">KESIMPULAN</div>
            <div class="col-9">: LULUS</div>
        </div>
        <div class="row fw-bold" >
            <div class="col-3">REKOMENDASI</div>
            <div class="col-9">: LANJUTKAN EVALUASI KE TAHAP BERIKUTNYA													            </div>
        </div>
        <br>
        <div class="fw-bold text-center" >
        RESUME HASIL PENILAIAN DOKUMEN PENAWARAN
        </div>
        <br>
        <div class="row fw-bold">
        III. HASIL EVALUASI DOKUMEN PENAWARAN
        </div>
        <table class="table table-bordered border-dark text-center" style="font-size: 15px; line-height: 15px;">
            <thead class="fw-bold">
                <tr class="align-middle">
                    <th class="col-1">No.</th>
                    <th class="col-7">URAIAN</th>
                    <th class="col-5">HASIL EVALUASI</th>
                    <th class="col-5">KETERANGAN</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="col-1">1</td>
                    <td class="col-7 text-start">Evaluasi Teknis</td>
                    <td class="col-5">LULUS</td>
                    <td class="col-5"></td>
                </tr>
                <tr>
                    <td class="col-1">2</td>
                    <td class="col-7 text-start" >Evaluasi Harga</td>
                    <td class="col-5">LULUS</td>
                    <td class="col-5"></td>
                </tr>
            </tbody>
        </table>
        
        <div class="row fw-bold" >
            <div class="col-3">REKOMENDASI</div>
            <div class="col-9">: LANJUTKAN EVALUASI KE TAHAP BERIKUTNYA													            </div>
        </div>
       




        <br>
        <div class="row text-center">
            <div class="col-6">
			
            </div>
            <div class="col-6">
            Indramayu, <?php echo tglindo($row['tglbaevaluasi']); ?>
            </div>
        </div>
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
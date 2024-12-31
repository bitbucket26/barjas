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
    size: F4 portrait;
  }
}
</style>
<body style="background-color: white; font-size: 20px;">
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
<section class="sheet padding-10mm" style="font-size:14px;">
    <div class="container-xxl">
        <!-- KOP -->
        <div class="d-flex justify-content-center" >
            <img src="../../../img/kop3.png" >
        </div>
        <br>
        <!-- Judul Nota -->
        <div class="d-flex justify-content-end">
            <label class="text-capitalize"></label>
        </div>

        <div class="row">
                <div class="col-12 text-center">
                <u><b><h5>BERITA ACARA PEMERIKSAAN HASIL PEKERJAAN DAN ADMINISTRASI PEKERJAAN</h5></b></u>
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
                <div class="col-3" style="text-align: justify;">
                1. <?php echo $row['pemeriksa1']; ?>
                </div>
                <div class="col-9">
                : Ketua Panitia Pemeriksa Hasil Pekerjaan Non Kontruksi di RSUD Indramayu
                </div>
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-3" style="text-align: justify;">
                2. <?php echo $row['pemeriksa2']; ?>
                </div>
                <div class="col-9">
                : Anggota Panitia Pemeriksa Hasil Pekerjaan Non Kontruksi di RSUD Indramayu
                </div>
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-3" style="text-align: justify;">
                3. <?php echo $row['pemeriksa3']; ?>
                </div>
                <div class="col-9">
                : Anggota Panitia Pemeriksa Hasil Pekerjaan Non Kontruksi di RSUD Indramayu
                </div>
        </div>
        <br>
        <div class="row">
                <div class="col-12" style="text-align: justify;">
                Selaku Panitia Pemeriksa Hasil Pekerjaan berdasarkan Surat Keputusan Pemimpin BLUD RSUD Indramayu 
                Nomor : <?php echo $row['nomorskpemeriksa1']; ?> 
                Tanggal <?php echo tglindo($row['tglskpemeriksa1']); ?> Telah Bersama-sama melakukan pemeriksaan/ penilaian pekerjaan terhadap :
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
                : Rp. <?php echo number_format($row['nilainego']); ?>,-
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
                Dengan mengingat memperhatikan serta mempertimbangkan tugas, Kewenangan dan rentang kendali para pihak (oranisasi) pengadaan barang/jasa sebagaimana ketentuan peraturan perundangan yang berlaku, maka pemeriksaan yang dilaksanakan oleh Panitia Pemeriksa Hasil Pekerjaan adalah sebagai berikut :
                </div>        
        </div>

        <div class="row" style="text-align: justify;">
                <div class="col-1 text-end" style="text-align: justify;">
                A.
                </div>
                <div class="col-11" style="text-align: justify;">
                Tidak memeriksa/meneliti proses yang terkait dengan perencanaan (beserta perubahan/riviewnya) dan/atau pengadaan barang/jasa maupun substansi proses kontrak, segala sesuatu terkait proses tersebut menjadi tanggungjawab para pihak yang melakukan proses dimaksud;
                </div>
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-1 text-end" style="text-align: justify;">
                B.
                </div>
                <div class="col-11" style="text-align: justify;">
                Memeriksa kesesuaian waktu penyelesaian pelaksanaan pekerjaan yang telah dilaksanakan oleh penyedia terhadap batas waktu penyelesaian pelaksanaan pekerjaan sebagaimana diatur dalam dokumen kontrak dan atau Addendum (bila ada);								
                </div>
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-1 text-end" style="text-align: justify;">
                C.
                </div>
                <div class="col-11" style="text-align: justify;">
                Memeriksa kuantitas pekerjaan yang telah dilaksanakan  oleh penyedia disesuaikan dengan kuantitas yang tercantum dalam kontrak dan atau Addendum (bila ada);								
            </div>
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-1 text-end" style="text-align: justify;">
                D.
                </div>
                <div class="col-11" style="text-align: justify;">
                Kuantitas yang diperiksa sebagaimana disebutkan dalam huruf C diatas, adalah kuantitas yang dapat diukur/dihitung secara nyata pada saat pemeriksaan;								
                </div>
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-1 text-end" style="text-align: justify;">
                E.
                </div>
                <div class="col-11" style="text-align: justify;">
                Memeriksa spesifikasi dan syarat teknis yang telah dilaksanakan oleh penyedia disesuaikan dengan spesifikasi yang tercantum dalam kontrak dan atau Addendum (bila ada);								
                </div>
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-1 text-end" style="text-align: justify;">
                F.
                </div>
                <div class="col-11" style="text-align: justify;">
                Spesifikasi dan syarat teknis yang diperiksa  sebagaimana disebutkan dalam huruf D diatas, adalah spesifikasi dan syarat teknis yang dapat diamati secara nyata pada saat  pemeriksaan, hal-hal yang menyangkut kebenaran spesifikasi teknis dan syarat teknis yang tidak dapat diamati pada saat pemeriksaan dan/atau memerlukan pengendalian/ pengawasan dan/atau pemeriksaan/pengujian pada saat pelaksanaan pekerjaan (dilakukan sebelum pemeriksaan oleh Panitia Pemeriksa Hasil Pekerjaan sepenuhnya menjadi tanggungjawab personil/tim/panitia/institusi yang memiliki wewenang untuk melakukan pengendalian /pengawasan/pemeriksaan/ pengujian;								
                </div>
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-1 text-end" style="text-align: justify;">
                G.
                </div>
                <div class="col-11" style="text-align: justify;">
                Meminta dan memeriksa kelengkapan dokumen pendukung yang memperlihatkan dilaksanakannya pekerjaan (tahapan, syarat/spesifikasi teknis serta kuantitas) sebagaiana dijelaskan dalam huruf D diatas maupun dokumen yang telah dilaksanakan atau dokumen lainnya yang disyaratkan dalam kontrak;								
                </div>
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-1 text-end" style="text-align: justify;">
                H.
                </div>
                <div class="col-11" style="text-align: justify;">
                Semua hal yang menyangkut kebenaran atas isi dokumen sebagaimana disebutkan dalam huruf G diatas, menjadi tanggungjawab personil/tim/panitia/institusi yang memiliki kewenangan untuk membuat/mengesahkan dokumen dimaksud.								
                </div>
        </div>
<br>
        <div class="row" style="text-align: justify;">
                <div class="col-12">
                Atas pertimbangan semua ketentuan pemeriksaan yang dilakukan sebagaimana dijelaskan dalam huruf A sampai dengan huruf G diatas, maka Panitia Pemeriksa Hasil Pekerjaan bersama Penyedia dengan diketahui oleh Pejabat Pelaksana Teknis Kegiatan (PPTK) dan Pejabat  Pembuat Komitmen (PPK) dengan ini sepakat dan menyetujui bahwa :									
                </div>        
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-1 text-end" style="text-align: justify;">
                1.
                </div>
                <div class="col-11" style="text-align: justify;">
                Penyedia telah melaksanakan pekerjaan sebagaimana diatur dalam dokumen kontrak;								
                </div>
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-1 text-end" style="text-align: justify;">
                2.
                </div>
                <div class="col-11" style="text-align: justify;">
                Hasil pemeliharaan pekerjaan yang telah dilaksanakan oleh Penyedia dinyatakan telah mencapai kemajuan fisik (bobot fisik) sebesar 100 % dari nilai kontrak;								
                </div>
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-1 text-end" style="text-align: justify;">
                3.
                </div>
                <div class="col-11" style="text-align: justify;">
                Bahwa atas hasil pemeriksaan pemeliharaan pekerjaan ini, maka Penyedia berhak memperoleh pembayaran/ 
                hak sebagaimana ketentuan yang diatur dalam dokumen kontrak dan atau Addendum (bila ada); 								
                </div>
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-1 text-end" style="text-align: justify;">
                4.
                </div>
                <div class="col-11" style="text-align: justify;">
                Setelah dilakukan pemeriksaan hasil pemeliharaan pekerjaan ini, Panitia Pemeriksa Hasil 
                Pekerjaan tidak dapat dituntut untuk bertanggung jawab atas semua cacat mutu;								
                </div>
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-1 text-end" style="text-align: justify;">
                5.
                </div>
                <div class="col-11" style="text-align: justify;">
                Apabila atas hasil pemeriksaan yang dilakukan oleh Aparat pemeriksa Intern Pemerintah (APIP) maupun 
                Institusi lainnya setelah dilakukannya pemeriksaan hasil pekerjaan oleh Panitia Pemeriksa Hasil Pekerjaan 
                ditemukan adanya kelebihan pembayaran akibat cacat mutu sebagaimana angka 4) diatas, maka pengembalian atas semua 
                kelebihan pembayaran menjadi tanggungjawab penyedia.								
                </div>
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-12">
                Demikian Berita Acara ini dibuat dengan sebenarnya, dalam rangkap 7 (tujuh) dan untuk dipergunakan 
                sebagaimana mestinya.									

                </div>        
        </div>
        <div class="row" style="text-align: justify;">
                <div class="col-12">
                Demikian Berita Acara ini dibuat dengan sebenarnya, dalam rangkap 7 (tujuh) dan untuk dipergunakan sebagaimana 
                mestinya.									

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
                    </div>
                    <div class="col-6">
                    Panitia Pemeriksa Hasil Pekerjaan
                    </div>
                </div>
                <p></p>
                <p></p>
                <div class="row text-center">
                    <div class="col-5">
                    Pelaksana Pekerjaan
                    </div>
                    <div class="col-1 text-end">1.</div>
                    <div class="col-4 text-start">
                    <b>              
                    <?php echo $row['pemeriksa1']; ?></b>
                    </div>
                    <div class="col-2"></div>
                </div>
                <div class="row text-center">
                    <div class="col-5">
                    <?php echo $row['namaperusahaan']; ?>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-4 text-start">             
                    NIP. <?php echo $row['nippemeriksa1']; ?>
                    </div>
                    <div class="col-2">..................................</div>

                </div>
                <p></p>
                <div class="row text-center">
                    <div class="col-5">
                    
                    </div>
                    <div class="col-1 text-end">2.</div>
                    <div class="col-4 text-start">             
                    <b><?php echo $row['pemeriksa2']; ?></b>
                    </div>
                    <div class="col-2"></div>
                </div>
                <div class="row text-center">
                    <div class="col-5">
                    
                    </div>
                    <div class="col-1"></div>
                    <div class="col-4 text-start">             
                    NIP. <?php echo $row['nippemeriksa2']; ?></u></b>
                    </div>
                    <div class="col-2">..................................</div>

                </div>
                <p></p>
                <div class="row text-center">
                    <div class="col-5">
                    <b><u><?php echo $row['namapimpinan']; ?></u></b>
                    
                    </div>
                    <div class="col-1 text-end">3.</div>
                    <div class="col-4 text-start">             
                    <b><?php echo $row['pemeriksa3']; ?></b>
                    </div>
                    <div class="col-2"></div>
                </div>
                <div class="row text-center">
                    <div class="col-5">
                    <?php echo $row['jabatan']; ?>
                    
                    </div>
                    <div class="col-1"></div>
                    <div class="col-4 text-start">             
                    NIP. <?php echo $row['nippemeriksa3']; ?></u></b>
                    </div>
                    <div class="col-2">..................................</div>

                </div>
                <div class="row text-center">
                    <div class="col-5">
                    </div>
                    <div class="col-6">             
                    
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-6">
                    
                    </div>
                    <div class="col-6">                  
                    </div>
                </div>
                <br><br><br>
                <div class="row text-center">
                    <div class="col-5">              
                    Mengetahui
                    </div>
                    <div class="col-1"></div>
                    <div class="col-6">
                    Menyetujui
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-5">               
                    Pejabat Pembuat Komitmen
                    </div>
                    <div class="col-1"></div>
                    <div class="col-6">
                    Pejabat Pelaksana Teknis Kegiatan			
                    </div>
                </div>
                <br><br><br><br><br>
                <div class="row text-center">
                    <div class="col-5">
                    <b><u><?php echo $row['namappk']; ?></u></b>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-6">
                    <b><u><?php echo $row['namapptk']; ?></u></b>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-5">
                    NIP. <?php echo $row['nipppk']; ?>
                    </div>
                    <div class="col-1"></div>
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
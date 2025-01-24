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
    size: F4;
    size: portrait;
  }
}
@media print {
    .pagebreak { page-break-before: always; } /* page-break-after works, as well */
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
        <!-- Judul Nota -->
         <div class="row  fw-bold" style="line-height: 23px; font-size: 21px;">
            <div class="text-center">SYARAT UMUM</div>
            <u><div class="text-center">SURAT PERINTAH KERJA (SPK)</div></u>
         </div>
        
        <br><br>

        <div class="row">
            <div class="col-12 fw-bold">
            1. LINGKUP PEKERJAAN
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1">

            </div>
            <div class="col-11">
            Penyedia yang ditunjuk berkewajiban untuk menyelesaikan pekerjaan dalam jangka waktu yang ditentukan, dengan mutu sesuai spesifikasi teknis dan harga sesuai SPK.			
            </div>
        </div>
        <br>
        <div class="row" style="text-align: justify;">
            <div class="col-12 fw-bold">
            2. HUKUM YANG BERLAKU
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1">
            </div>
            <div class="col-11">
            Keabsahan, interpretasi, dan pelaksanaan SPK ini didasarkan kepada hukum Republik Indonesia.			
            </div>
        </div>
        <br>
        <div class="row" style="text-align: justify;">
            <div class="col-12 fw-bold">
            3. HARGA SPK
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                a.
            </div>
            <div class="col-11">
            PK membayar kepada penyedia atas pelaksanaan pekerjaan dalam SPK sebesar harga SPK. 					
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                b.
            </div>
            <div class="col-11">
            Harga SPK telah memperhitungkan keuntungan, beban pajak dan biaya overhead serta biaya   asuransi (apabila dipersyaratkan).		 					
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                c.
            </div>
            <div class="col-11">
            Rincian harga SPK sesuai dengan rincian yang tercantum dalam daftar kuantitas dan harga.		 					
            </div>
        </div>
        <br>
        <div class="row" style="text-align: justify;">
            <div class="col-12 fw-bold">
             4.HAK KEPEMILIKAN
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                a.
            </div>
            <div class="col-11">
            PPK berhak atas kepemilikan semuabarang/bahan yang terkait langsung atau disediakan sehubungan dengan jasa yang diberikan oleh penyedia kepada PPK. Jika diminta oleh PPK maka penyedia berkewajiban untuk membantu secara optimal pengalihan hak kepemilikan tersebut kepada PPK sesuai dengan hukum yang berlaku.		 					
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                b.
            </div>
            <div class="col-11">
            Hak kepemilikan atas peralatan dan barang/bahan yang disediakanoleh PPK tetap pada PPK, dan semua peralatan tersebut harus dikembalikan kepada PPK pada saat SPK berakhir atau jika tidak diperlukan lagi oleh penyedia. Semua peralatan tersebut harus dikembalikan dalam kondisi yang sama pada saat diberikan kepada penyedia dengan pengecualian keausan akibat pemakaian yang wajar.				 					
            </div>
        </div>
        <br>
        <div class="row" style="text-align: justify;">
            <div class="col-12 fw-bold">
             5. CACAT MUTU
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
            
            </div>
            <div class="col-11">
            PPK akan memeriksa setiap hasil pekerjaan penyedia dan memberitahukan secara tertulis penyedia atas setiap cacat mutu yang ditemukan. PPK dapat memerintahkan penyedia untuk menemukan dan mengungkapkan cacat mutu, serta menguji pekerjaan yang dianggap oleh PPK mengandung cacat  mutu. Penyedia bertanggung jawab atas cacat mutu selama15 (lima belas) Hari setelah serah terima hasil pekerjaan.			
            </div>
        </div>
        <br>
        <div class="row" style="text-align: justify;">
            <div class="col-12 fw-bold">
             6. PERPAJAKAN
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
            
            </div>
            <div class="col-11">
            Penyedia berkewajiban untuk membayar semua pajak, bea, retribusi, dan pungutan lain yang dibebankan oleh hukum yang berlaku atas pelaksanaan SPK. Semua pengeluaran perpajakan ini dianggap telah termasuk dalam harga SPK.						
            </div>
        </div>
        <br>
        <div class="row" style="text-align: justify;">
            <div class="col-12 fw-bold">
            7. PENGALIHAN DAN/ATAU SUBKONTRAK
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
            
            </div>
            <div class="col-11">
            Penyedia dilarang untuk mengalihkan dan/atau mensub kontrakkan sebagian atau seluruh pekerjaan, kecuali kepada penyedia spesialis untuk bagian pekerjaan tertentu. Pengalihan seluruh pekerjaan hanya diperbolehkan dalam hal pergantian nama penyedia, baik sebagai akibat peleburan (merger) atau akibat lainnya.			
            </div>
        </div>

        <div class="pagebreak"></div>
        <div class="row" style="text-align: justify;">
            <div class="col-12 fw-bold">
            8. JADWAL
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                a.
            </div>
            <div class="col-11">
            SPK ini berlaku efektif pada tanggal penandatanganan oleh para pihak atau pada tanggal yang ditetapkan dalam SP.		
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                b.
            </div>
            <div class="col-11">
            Waktu pelaksanaan SPK adalah sejak tanggal mulai kerja yang tercantum dalam SP.    		
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                c.
            </div>
            <div class="col-11">
            Penyedia harus menyelesaikan pekerjaan sesuai jadwal yang ditentukan.		   		
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                d.
            </div>
            <div class="col-11">
            Apabila penyedia berpendapat tidak dapat menyelesaikan pekerjaan sesuai jadwal karena keadaan diluar pengendaliannya dan penyedia telah melaporkan kejadian tersebut kepada PPK, maka PPKdapat melakukan penjadwalan kembali pelaksanaan tugas penyedia dengan adendum SPK.		    		
            </div>
        </div>
        <br>
        <div class="row" style="text-align: justify;">
            <div class="col-12 fw-bold">
            9. ASURANSI
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                a.
            </div>
            <div class="col-11">
            Apabila dipersyaratkan, penyediawajib menyediakan asuransi sejak SP sampai dengan tanggal selesainya pemeliharaan untuk:				
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                
            </div>
            <div class="col-1 text-end">
                1.
            </div>
            <div class="col-10">
            semua barang dan peralatan yang mempunyai risiko tinggi terjadinya kecelakaan, pelaksanaan pekerjaan, serta pekerja untuk pelaksanaan pekerjaan, atas segala risiko terhadap kecelakaan, kerusakan, kehilangan, serta risiko lain yang tidak dapat diduga;	
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                
            </div>
            <div class="col-1 text-end">
                2.
            </div>
            <div class="col-10">
            pihak ketiga sebagai akibat kecelakaan di tempat kerjanya; dan	

            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                b.
            </div>
            <div class="col-11">
            Besarnya asuransi sudah diperhitungkan dalam penawaran dan termasuk dalam harga SPK.		
            </div>
        </div>
        <br>
        <div class="row" style="text-align: justify;">
            <div class="col-12 fw-bold">
            10. PENANGGUNGAN DAN RESIKO
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                a.
            </div>
            <div class="col-11">
            Penyedia berkewajiban untuk melindungi, membebaskan, dan menanggung tanpa batas PPK beserta instansinya terhadap semua bentuk tuntutan, tanggung jawab, kewajiban, kehilangan, kerugian, denda, gugatan atau tuntutan hukum, proses pemeriksaan hukum, dan biaya yang dikenakan terhadap PPK beserta instansinya (kecuali kerugian yang mendasari tuntutan tersebut disebabkan kesalahan atau kelalaian berat PPK) sehubungan dengan klaim yang timbul dari hal-hal berikut terhitung sejak Tanggal Mulai Kerja sampai dengan tanggal penandatanganan berita acara penyerahan akhir:		
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                
            </div>
            <div class="col-1 text-end">
                1.
            </div>
            <div class="col-10">
            kehilangan atau kerusakan peralatan dan harta benda penyedia, dan Personil;	
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                
            </div>
            <div class="col-1 text-end">
                2.
            </div>
            <div class="col-10">
            cidera tubuh, sakit atau kematian Personil;	
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                
            </div>
            <div class="col-1 text-end">
                3.
            </div>
            <div class="col-10">
            kehilangan atau kerusakan harta benda, dan cidera tubuh, sakit atau kematian pihak ketiga.    	
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                b.
            </div>
            <div class="col-11">
            Terhitung sejak Tanggal Mulai Kerja sampai dengan tanggal penandatanganan berita acara penyerahan awal, semua risiko kehilangan atau kerusakan Hasil Pekerjaan ini, Bahan dan Perlengkapan merupakan risiko penyedia, kecuali kerugian atau kerusakan tersebut diakibatkan oleh kesalahan atau kelalaian PPK.		
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                c.
            </div>
            <div class="col-11">
            Pertanggungan asuransi yang dimiliki oleh penyedia tidak membatasi kewajiban penanggungan dalam syarat ini.		
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                d.
            </div>
            <div class="col-11">
            Kehilangan atau kerusakan terhadap Hasil Pekerjaan atau Bahan yang menyatu dengan Hasil Pekerjaan selama Tanggal Mulai Kerja dan batas akhir Masa Pemeliharaan harus diganti atau diperbaiki oleh penyedia atas tanggungannya sendiri jika kehilangan atau kerusakan tersebut terjadi akibat tindakan atau kelalaian penyedia.		
            </div>
        </div>
        <br>
        <div class="row" style="text-align: justify;">
            <div class="col-12 fw-bold">
            11. PENGAWASAN DAN PEMERIKSAAN
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
            
            </div>
            <div class="col-11">
            PPK berwenang melakukan pengawasan dan pemeriksaan terhadap pelaksanaan pekerjaan yang dilaksanakan oleh penyedia.Apabila diperlukan, PPK dapat memerintahkan kepada pihak ketiga untuk melakukan pengawasan dan pemeriksaan atas semua pelaksanaan pekerjaan yang dilaksanakan oleh penyedia.			
            </div>
        </div>
        <div class="pagebreak"></div>
        <div class="row" style="text-align: justify;">
            <div class="col-12 fw-bold">
            12. PENGUJIAN				
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
            
            </div>
            <div class="col-11">
            Jika PPK atauP engawas Pekerjaan memerintahkan penyedia untuk melakukan pengujian Cacat Mutu yang tidak tercantum dalam Spesifikasi Teknis dan Gambar, dan hasil uji coba menunjukkan adanya Cacat Mutu maka penyedia berkewajiban untuk menanggung biaya pengujian tersebut. Jika tidak ditemukan adanya Cacat Mutu maka uji coba tersebut dianggap sebagai Peristiwa Kompensasi.			
            </div>
        </div>
        <br>
        <div class="row" style="text-align: justify;">
            <div class="col-12 fw-bold">
            13. LAPORAN HASIL PEKERJAAN				
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                a.
            </div>
            <div class="col-11">
            Pemeriksaan pekerjaan dilakukan selama pelaksanaan SPK untuk menetapkan volume pekerjaan atau kegiatan yang telah dilaksanakan guna pembayaran hasil pekerjaan. Hasil pemeriksaan pekerjaan dituangkan dalam laporan kemajuan hasil pekerjaan.		
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                b.
            </div>
            <div class="col-11">
            Untuk merekam kegiatan pelaksanaan kegiatan, PPK dapat menugaskan Pejabat Penerima Hasil Pekerjaan membuat foto-foto dokumentasi pelaksanaan pekerjaan di lokasi pekerjaan.		
            </div>
        </div>
        <br>
        <div class="row" style="text-align: justify;">
            <div class="col-12 fw-bold">
            14. WAKTU PENYELESAIAN PEKERJAAN				
			
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                a.
            </div>
            <div class="col-11">
            Kecuali SPK diputuskan lebih awal, penyedia berkewajiban untuk memulai pelaksanaan pekerjaan pada Tanggal Mulai Kerja, dan melaksanakan pekerjaan sesuai dengan program mutu, serta menyelesaikan pekerjaan selambat-lambatnya pada Tanggal Penyelesaian yang ditetapkan dalam SP.		
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                b.
            </div>
            <div class="col-11">
            Jika pekerjaan tidak selesai pada Tanggal Penyelesaian bukan akibat Keadaan Kahar atau Peristiwa Kompensasi atau karena kesalahan atau kelalaian penyedia maka penyedia dikenakan denda.		
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                c.
            </div>
            <div class="col-11">
            Jika keterlambatan tersebut semata-mata disebabkan oleh Peristiwa Kompensasi maka PPK dikenakan kewajiban pembayaran ganti rugi. Denda atau ganti rugi tidak dikenakan jika Tanggal Penyelesaian disepakati oleh Para Pihak untuk diperpanjang.		
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                d.
            </div>
            <div class="col-11">
            Tanggal Penyelesaian yang dimaksud dalam ketentuan ini adalah tanggal penyelesaian semua pekerjaan.		
            </div>
        </div>
        <br>
        <div class="row" style="text-align: justify;">
            <div class="col-12 fw-bold">
            15. SERAH TERIMA PEKERJAAN 		
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                a.
            </div>
            <div class="col-11">
            Setelah pekerjaan selesai 100% (seratus perseratus), penyedia mengajukan permintaan secara tertulis kepada PPK untuk penyerahan pekerjaan.		
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                b.
            </div>
            <div class="col-11">
            Dalam rangka penilaian hasil pekerjaan, PPK menugaskan Pejabat Penerima Hasil Pekerjaan.		
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                c.
            </div>
            <div class="col-11">
            Pejabat Penerima Hasil Pekerjaan melakukan penilaian terhadap hasil pekerjaan yang telah diselesaikan oleh penyedia. Apabila terdapat kekurangan-kekurangan dan/atau cacat hasil pekerjaan, penyedia wajib memperbaiki/menyelesaikannya, atas perintah PPK.		
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                d.
            </div>
            <div class="col-11">
            PPK menerima penyerahan akhir pekerjaan setelah penyedia melaksanakan semua kewajibannya selama masa pemeliharaan dengan baik. PPK wajib melakukan pembayaran sisa harga SPK yang belum dibayar atau mengembalikan Jaminan Pemeliharaan.		
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                e.
            </div>
            <div class="col-11">
            Pembayaran dilakukansebesar 100% (seratusperseratus) dariharga SPK danpenyedia harus menyerahkan Sertifikat Garansi sebesar 5% (limapersen) dariharga SPK. 		
            </div>
        </div>
        <br>
        <div class="row" style="text-align: justify;">
            <div class="col-12 fw-bold">
            16. JAMINAN BEBAS CACAT MUTU/GARANSI 				
	
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                a.
            </div>
            <div class="col-11">
            Penyedia dengan jaminan pabrikan dari produsen pabrikan (jika ada) berkewajiban untuk menjamin bahwa selama penggunaan secara wajar oleh PPK, barang tidak mengandung cacat mutu yang disebabkan oleh tindakan atau kelalaian Penyedia, atau cacat mutu akibat desaian, bahan, dan cara kerja.		
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                b.
            </div>
            <div class="col-11">
            Jaminan bebas cacat mutu ini berlaku sampai dengan 15 (lima belas) hari setelah serah terima barang		
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                c.
            </div>
            <div class="col-11">
            PPK akan menyampaikan pemberitahuan cacat mutu kepada Penyedia segera setelah ditemukan cacat mutu tersebut selama Masa Layanan Purnajual.		
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                d.
            </div>
            <div class="col-11">
            Terhadap pemebritahuan cacat mutu oleh PPK, Penyedia berkewajiban untuk memperbaiki atau mengganti barang dalam jangka waktu yang ditetapkan dalam pemberitahuan tersebut.		
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                e.
            </div>
            <div class="col-11">
            Jika penyedia tidak memperbaiki atau mengganti barang akibat cacat mutu dalam jangka waktu yang ditetapkan maka PPK akan menghitung biaya perbaikan yang diperlukan, dan PPK akan melakukan perbaikan tersebut. Penyedia berkewajiban untuk membayar biaya perbaikan atau penggantian tersebut ssesuai dengan klaim yang diajukan secara tertulis oleh PPK. Biaya tersebut dapat dipotong oleh PPK dari nilai tagihan Penyedia.		
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                f.
            </div>
            <div class="col-11">
            Terlepas dari kewajiban penggantian biaya, PPK dapat memasukan Penyedia yang lalai memperbaiki cacat mutu ke dalam daftar hitam. 		
            </div>
        </div>
        <br>
        <div class="row" style="text-align: justify;">
            <div class="col-12 fw-bold">
            17. PERUBAHAN SPK 				
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                a.
            </div>
            <div class="col-11">
            SPK hanya dapat diubah melalui adendum SPK.		
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                b.
            </div>
            <div class="col-11">
            PerubahanSPK bisa dilaksanakan apabila disetujui oleh para pihak, meliputi:		
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                
            </div>
            <div class="col-1 text-end">
                1.
            </div>
            <div class="col-10">
            perubahan pekerjaan disebabkan oleh sesuatu hal yang dilakukan oleh para pihak dalam SPK sehingga mengubah lingkup pekerjaan dalam SPK;	
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                
            </div>
            <div class="col-1 text-end">
                2.
            </div>
            <div class="col-10">
            perubahan jadwal pelaksanaan pekerjaan akibat adanya perubahan pekerjaan; 	
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                
            </div>
            <div class="col-1 text-end">
                3.
            </div>
            <div class="col-10">
            perubahan harga SPK akibat adanya perubahan pekerjaan dan/atau perubahan pelaksanaan pekerjaan.	
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                c.
            </div>
            <div class="col-11">
            Untuk kepentingan perubahan SPK, PA/KPA dapat membentuk Pejabat Peneliti Pelaksanaan SPK atas usul PPK.		
            </div>
        </div>
        <br>
        <div class="row" style="text-align: justify;">
            <div class="col-12 fw-bold">
            18. PERISTIWA KOMPENSASI				
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                a.
            </div>
            <div class="col-11">
            Peristiwa Kompensasi dapat diberikan kepada penyedia dalam hal sebagai berikut:		
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                
            </div>
            <div class="col-1 text-end">
                1.
            </div>
            <div class="col-10">
            PPK mengubah jadwal yang dapat mempengaruhi pelaksanaan pekerjaan;	
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                
            </div>
            <div class="col-1 text-end">
                2.
            </div>
            <div class="col-10">
            keterlambatan pembayaran kepada penyedia;  	
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                
            </div>
            <div class="col-1 text-end">
                3.
            </div>
            <div class="col-10">
            PPK tidak memberikan gambar-gambar, spesifikasi dan/atau instruksi sesuai jadwal yang dibutuhkan;	
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                
            </div>
            <div class="col-1 text-end">
                4.
            </div>
            <div class="col-10">
            penyedia belum bisa masuk ke lokasi sesuai jadwal;	
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                
            </div>
            <div class="col-1 text-end">
                5.
            </div>
            <div class="col-10">
            PPK menginstruksikan kepada pihak penyedia untuk melakukan pengujian tambahan yang setelahdilaksanakan pengujian ternyata tidak ditemukan kerusakan/kegagalan/penyimpangan;	
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                
            </div>
            <div class="col-1 text-end">
                6.
            </div>
            <div class="col-10">
            PPK memerintahkan penundaan pelaksanaan pekerjaan;	
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                
            </div>
            <div class="col-1 text-end">
                7.
            </div>
            <div class="col-10">
            PPK memerintahkan untuk mengatasi kondisi tertentu yang tidak dapat diduga sebelumnya dan disebabkan oleh PPK;	
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                
            </div>
            <div class="col-1 text-end">
                8.
            </div>
            <div class="col-10">
            ketentuan lain dalam SPK.	
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                b.
            </div>
            <div class="col-11">
            Jika Peristiwa Kompensasi mengakibatkan pengeluaran tambahan dan/atau keterlambatan penyelesaian pekerjaan maka PPK berkewajiban untuk membayar ganti rugi dan/atau memberikan perpanjangan waktu penyelesaian pekerjaan.		
            </div>
        </div><div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                c.
            </div>
            <div class="col-11">
            Ganti rugi hanya dapat dibayarkan jika berdasarkan data penunjang dan perhitungan kompensasi yang diajukan oleh penyedia kepada PPK, dapat dibuktikan kerugian nyata akibat Peristiwa Kompensasi.		
            </div>
        </div><div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                d.
            </div>
            <div class="col-11">
            Perpanjangan waktu penyelesaian pekerjaan hanya dapat diberikan jika berdasarkan data penunjang dan perhitungan kompensasi yang diajukan oleh penyedia kepada PPK, dapat dibuktikan perlunya tambahan waktu akibat Peristiwa Kompensasi.		
            </div>
        </div><div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                e.
            </div>
            <div class="col-11">
            Penyedia tidak berhak atas ganti rugi dan/atau perpanjangan waktu penyelesaian pekerjaan jika penyedia gagal atau lalai untuk memberikan peringatan dini dalam mengantisipasi atau mengatasi dampak Peristiwa Kompensasi.		
            </div>
        </div>
        <br>
        <div class="row" style="text-align: justify;">
            <div class="col-12 fw-bold">
            19. PERPANJANGAN WAKTU				
				
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                a.
            </div>
            <div class="col-11">
            Jika terjadi Peristiwa Kompensasi sehingga penyelesaian pekerjaan akan melampaui Tanggal Penyelesaian maka penyedia berhak untuk meminta perpanjangan Tanggal Penyelesaian berdasarkan data penunjang. PPK berdasarkan pertimbangan Pengawas Pekerjaan memperpanjang Tanggal Penyelesaian Pekerjaan secara tertulis. Perpanjangan Tanggal Penyelesaian harus dilakukan melalui adendum SPK jika perpanjangan tersebut mengubah Masa SPK.		
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                b.
            </div>
            <div class="col-11">
            PPK dapat menyetujui perpanjangan waktu pelaksanaan setelah melakukan penelitian terhadap usulan tertulis yang diajukan oleh penyedia.		
            </div>
        </div>
        <br>
        <div class="row" style="text-align: justify;">
            <div class="col-12 fw-bold">
            20. PENGHENTIAN DAN PEMUTUSAN SPK				
				
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                a.
            </div>
            <div class="col-11">
            Penghentian SPK dapat dilakukan karena pekerjaan sudah selesai atau terjadi Keadaan Kahar.		
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                b.
            </div>
            <div class="col-11">
            Dalam hal SPK dihentikan, maka PPK wajib membayar kepada penyedia sesuai dengan prestasi pekerjaan yang telah dicapai, termasuk:		
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                
            </div>
            <div class="col-1 text-end">
                1.
            </div>
            <div class="col-10">
            biaya langsung pengadaan bahan dan perlengkapan untuk pekerjaan ini. Bahan dan perlengkapan ini harus diserahkan oleh Penyedia kepada PPK, dan selanjutnya menjadi hak milik PPK;	
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                
            </div>
            <div class="col-1 text-end">
                2.
            </div>
            <div class="col-10">
            biaya langsung pembongkaran dan demobilisasi hasil pekerjaan sementara dan peralatan; 	
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                
            </div>
            <div class="col-1 text-end">
                3.
            </div>
            <div class="col-10">
            biaya langsung demobilisasi personil.	
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                c.
            </div>
            <div class="col-11">
            Pemutusan SPK dapat dilakukan oleh pihak penyedia atau pihak PPK.		
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                d.
            </div>
            <div class="col-11">
            Menyimpang dari Pasal 1266 dan 1267 Kitab Undang-Undang Hukum Perdata,pemutusan SPK melalui pemberitahuan tertulis dapat dilakukan apabila:		
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                
            </div>
            <div class="col-1 text-end">
                1.
            </div>
            <div class="col-10">
            penyedia lalai/cidera janji dalam melaksanakan kewajibannya dan tidak memperbaiki kelalaiannya dalam jangka waktu yang telah ditetapkan;	
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                
            </div>
            <div class="col-1 text-end">
                2.
            </div>
            <div class="col-10">
            penyedia tanpa persetujuan Pengawas Pekerjaan, tidak memulai pelaksanaan pekerjaan;	
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                
            </div>
            <div class="col-1 text-end">
                3.
            </div>
            <div class="col-10">
            penyedia menghentikan pekerjaan selama 28 (dua puluh delapan) hari dan penghentian ini tidak tercantum dalam program mutu serta tanpa persetujuan Pengawas Pekerjaan;	
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                
            </div>
            <div class="col-1 text-end">
                4.
            </div>
            <div class="col-10">
            penyedia berada dalam keadaan pailit;	
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                
            </div>
            <div class="col-1 text-end">
                5.
            </div>
            <div class="col-10">
            penyedia selama Masa SPK gagal memperbaiki Cacat Mutu dalam jangka waktu yang ditetapkan oleh PPK;	
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                
            </div>
            <div class="col-1 text-end">
                6.
            </div>
            <div class="col-10">
            denda keterlambatan pelaksanaan pekerjaan akibat kesalahan penyedia sudah melampaui 5% (lima perseratus) dari harga SPK dan PPK menilai bahwa Penyedia tidak akan sanggup menyelesaikan sisa pekerjaan;	
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                
            </div>
            <div class="col-1 text-end">
                7.
            </div>
            <div class="col-10">
            Pengawas Pekerjaan memerintahkan penyedia untuk menunda pelaksanaan atau kelanjutan pekerjaan, dan perintah tersebut tidak ditarik selama 28 (dua puluh delapan) hari;	
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                
            </div>
            <div class="col-1 text-end">
                8.
            </div>
            <div class="col-10">
            PPK tidak menerbitkan SPP untuk pembayaran tagihan angsuran sesuai dengan yang disepakati sebagaimana tercantum dalam SPK;	
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                
            </div>
            <div class="col-1 text-end">
                9.
            </div>
            <div class="col-10">
            penyedia terbukti melakukan KKN, kecurangan dan/atau pemalsuan dalam proses Pengadaan yang diputuskan oleh instansi yang berwenang; dan/atau	
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                
            </div>
            <div class="col-1 text-end">
                10.
            </div>
            <div class="col-10">
            pengaduan tentang penyimpangan prosedur, dugaan KKN dan/atau pelanggaran persaingan sehat dalam pelaksanaan pengadaan dinyatakan benar oleh instansi yang berwenang.	
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                e.
            </div>
            <div class="col-11">
            Dalam hal pemutusan SPK dilakukan karena kesalahan penyedia:		
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                
            </div>
            <div class="col-1 text-end">
                1.
            </div>
            <div class="col-10">
            penyedia membayar denda; dan/atau	
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                
            </div>
            <div class="col-1 text-end">
                2.
            </div>
            <div class="col-10">
            penyedia dimasukkan dalam Daftar Hitam.	
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                f.
            </div>
            <div class="col-11">
            Dalam hal pemutusan SPK dilakukan karena PPK terlibat penyimpangan prosedur, melakukan KKN dan/atau pelanggaran persaingan sehat dalam pelaksanaan pengadaan, maka PPK dikenakan sanksi berdasarkan peraturan perundang-undangan.		
            </div>
        </div>
        <br>
        <div class="row" style="text-align: justify;">
            <div class="col-12 fw-bold">
            21. PEMBAYARAN					
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                a.
            </div>
            <div class="col-11">
            Pembayaran prestasi hasil pekerjaan yang disepakati dilakukan oleh PPK, dengan ketentuan:		
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                
            </div>
            <div class="col-1 text-end">
                1.
            </div>
            <div class="col-10">
            penyedia telah mengajukan tagihan disertai laporan kemajuan hasil pekerjaan;	
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                
            </div>
            <div class="col-1 text-end">
                2.
            </div>
            <div class="col-10">
            pembayaran dilakukan dengan : pembayaran secara sekaligus;	
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                
            </div>
            <div class="col-1 text-end">
                3.
            </div>
            <div class="col-10">
            pembayaran harus dipotong denda (apabila ada), pajak, dan uang retensi.	
            </div>
        </div>
        <i><b><div class="row" style="text-align: justify;">
            <div class="col-1">
            </div>
            <div class="col-1">
            </div>
            <!-- <i><b> -->
                <div class="col-10">
                Pembayaran dengan Sumber Dana BLUD RSUD Indramayu, di Transfer melalui Bank <?php echo $row['namabank']; ?> dengan 
                Nomor Rekening <?php echo $row['norekening']; ?> a/n <?php echo $row['namaperusahaan']; ?>.	
                </div>
            <!-- </b></i> -->
        </div></b></i>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                b.
            </div>
            <div class="col-11">
            Pembayaran terakhir hanya dilakukan setelah pekerjaan selesai 100% (seratus perseratus) dan Berita Acara penyerahan pertama pekerjaan diterbitkan.		
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                c.
            </div>
            <div class="col-11">
            PPK dalam kurun waktu 7 (tujuh) hari kerja setelah pengajuan permintaan pembayaran dari penyedia harus sudah mengajukan surat permintaan pembayaran kepada Pejabat Penandatangan Surat Perintah Membayar (PPSPM).		
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
                d.
            </div>
            <div class="col-11">
            Bila terdapat ketidaksesuaian dalam perhitungan angsuran, tidak akan menjadi alasan untuk menunda pembayaran. PPK dapat meminta penyedia untuk menyampaikan perhitungan prestasi sementara dengan mengesampingkan hal-hal yang sedang menjadi perselisihan. 		
            </div>
        </div>
        <br>
        <div class="row" style="text-align: justify;">
            <div class="col-12 fw-bold">
            22. DENDA				
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
            </div>
            <div class="col-11">
            Penyedia berkewajiban untuk membayar sanksi finansial berupa Denda sebagai akibat wanprestasi atau cidera janji terhadap kewajiban-kewajiban penyedia dalam SPK ini. PPK mengenakan Denda dengan memotong angsuran pembayaran prestasi pekerjaan penyedia. Pembayaran Denda tidak mengurangi tanggung jawab kontraktual penyedia.			
            </div>
        </div>
        <br>
        <div class="row" style="text-align: justify;">
            <div class="col-12 fw-bold">
            23. PENYELESAIAN PERSELISIHAN				
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
            </div>
            <div class="col-11">
            PPK dan penyedia berkewajiban untuk berupaya sungguh-sungguh menyelesaikan secara damai semua perselisihan yang timbul dari atau berhubungan dengan SPK ini atau interpretasinya selama atau setelah pelaksanaan pekerjaan.  Jika perselisihan tidak dapat diselesaikan secara musyawarah maka perselisihan akan diselesaikan melalui pengadilan negeri dalam wilayah hukum Republik Indonesia.			
            </div>
        </div>
        <br>
        <div class="row" style="text-align: justify;">
            <div class="col-12 fw-bold">
            24. LARANGAN PEMBERIAN KOMISI				
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
            </div>
            <div class="col-11">
            Penyedia menjamin bahwa tidak satu pun personil satuan kerja PPK telah atau akan menerima komisi atau keuntungan tidak sah lainnya baik langsung maupun tidak langsung dari SPK ini. Penyedia menyetujui bahwa pelanggaran syarat ini merupakan pelanggaran yang mendasar terhadap SPK ini.			
            </div>
        </div>
        




        <script>
            window.print()
            header("location:spk.php");
        </script>
</section>

</body>
</html>
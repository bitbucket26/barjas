<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha484-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SP</title>
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
 
        $tglbaphp= $row['tglmulaikontrak'];
        $hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
        $tanggal = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", 
                            "Sebelas", "Dua Belas", "tiga Belas", "Empat Belas", "Lima Belas", "Enam Belas", "Tujuh Belas", "Delapan Belas", "Sembilan Belas", 
                            "Dua Puluh", "Dua Puluh Satu", "Dua Puluh Dua", "Dua Puluh Tiga", "Dua Puluh Empat", "Dua Puluh Lima", "Dua Puluh Enam", "Dua Puluh Tujuh", "Dua Puluh Delapan", "Dua Puluh Sembilan", "Tiga Puluh", "Tiga Puluh Satu");
        
        $bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
	    $angka = date("Y", strtotime($tglbaphp));

        // echo $hari[date("w", strtotime($tglbaphp))].", Tanggal ".$tanggal[date("j", strtotime($tglbaphp))]." Bulan ".$bulan[date("n", strtotime($tglbaphp))];
        // echo terbilang($angka);
        ?>
<section class="sheet padding-10mm" style="font-size:16px;">
    <div class="container-xxl">
        <!-- KOP -->
        <div class="d-flex justify-content-center">
            <img src="../../../../img/kop3.png">
        </div>
            <br>
        <!-- Judul Nota -->
         <div class="row text-uppercase text-center fw-bold" style="font-size:18px;" >
            <div class="">SURAT PEERJANJIAN</div>
            <div class="">PEKERJAAN <?php echo $row['pekerjaan'];?></div>
            <div class="">ANTARA</div>
            <div class="">RUMAH SAKIT UMUM DAERAH INDRAMAYU</div>
            <div class="">DENGAN</div>
            <div class=""><?php echo $row['namaperusahaan'];?></div>
         </div>
        <div class="row text-center">
            <div class="col-12">
            Nomor : <?php echo $row['nomorkontrak'];?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
            Surat Perjanjian ini berikut semua lampirannya (selanjutnya disebut” Kontrak”) dibuat dan ditandatangani
            Pada hari <?php echo $hari[date("w", strtotime($tglbaphp))].", 
            Tanggal ".$tanggal[date("j", strtotime($tglbaphp))]." 
            Bulan ".$bulan[date("n", strtotime($tglbaphp))]; ?> 
            Tahun <?php echo terbilang($angka) ?> (<?php echo date("d-m-Y", strtotime($tglbaphp)); ?>), 
            bertempat di Indramayu, kami yang bertanda tangan di bawah ini: 
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4 fw-bold">
                1. <?php echo $row['namappk'];?>
            </div>
            <div class="col-8" style="text-align: justify;">
            :<?php echo $row['jabatanppk'];?> pada RSUD Indramayu Tahun Anggaran <?php echo $row['tahunanggaran'];?>  
            yang berkedudukan di <?php echo $row['alamatsatker'];?>, selanjutnya disebut PIHAK KESATU
            </div>
        </div>
        <div class="row">
            <div class="col-4 fw-bold">
                2. <?php echo $row['namapimpinan'];?>
            </div>
            <div class="col-8" style="text-align: justify;">
            :<?php echo $row['jabatan'];?> <?php echo $row['namaperusahaan'];?> yang bertindak untuk dan atas nama <?php echo $row['namaperusahaan'];?>, yang berkedudukan di <?php echo $row['alamat'];?>,
             selanjutnya disebut PIHAK KEDUA
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12 text-center">
            MENGINGAT BAHWA
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            (a)
            </div>
            <div class="col-11" style="text-align: justify;">
            PIHAK KESATU telah meminta PIHAK KEDUA untuk menyediakan Pekerjaan <?php echo $row['pekerjaan'];?> 
            RSUD Kab.Indramayu sebagaimana diterangkan dalam Syarat-Syarat Umum Kontrak yang terlampir dalam Kontrak ini 
            (selanjutnya disebut Pekerjaan Pengadaan Barang);								
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            (b)
            </div>
            <div class="col-11" style="text-align: justify;">
            PIHAK KEDUA sebagaimana dinyatakan kepada PIHAK KESATU, memiliki keahlian profesional, personil, dan sumber daya teknis, 
            serta telah menyetujui untuk menyediakan Barang sesuai dengan persyaratan dan ketentuan dalam Kontrak ini;																
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            (c)
            </div>
            <div class="col-11" style="text-align: justify;">
            PIHAK KESATU dan PIHAK KEDUA menyatakan memiliki kewenangan untuk menandatangani Kontrak ini, dan mengikat pihak yang diwakili;								
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            (d)
            </div>
            <div class="col-11" style="text-align: justify;">
            PIHAK KESATU dan PIHAK KEDUA mengakui dan menyatakan bahwa sehubungan dengan penandatanganan Kontrak ini masing-masing pihak:								
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1">
            a.
            </div>
            <div class="col-10" style="text-align: justify;">
            telah dan senantiasa diberikan kesempatan untuk didampingi oleh advokat;
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1">
            b.
            </div>
            <div class="col-10" style="text-align: justify;">
            menandatangani Kontrak ini setelah meneliti secara patut;						
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1">
            c.
            </div>
            <div class="col-10" style="text-align: justify;">
            telah membaca dan memahami secara penuh ketentuan Kontrak ini;
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1">
            d.
            </div>
            <div class="col-10" style="text-align: justify;">
            telah mendapatkan kesempatan yang memadai untuk memeriksa dan mengkonfirmasikan semua ketentuan dalam Kontrak ini beserta semua fakta dan kondisi yang terkait.						
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            Maka oleh karena itu, PIHAK KESATU dan PIHAK KEDUA dengan ini bersepakat dan menyetujui hal-hal sebagai berikut:									
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            1.
            </div>
            <div class="col-11" style="text-align: justify;">
            total harga Kontrak atau Nilai Kontrak <b>sudah</b> termasuk Pajak Pertambahan Nilai (PPN) yang diperoleh berdasarkan kuantitas dan harga satuan pekerjaan sebagaimana tercantum dalam Daftar Kuantitas dan Harga Berita Acara Hasil Klarifikasi dan Negosiasi (terlampir) dalam surat perjanjian ini dan merupakan satu kesatuan yang tidak dapat dipisahkan.								
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <img src="../../../../img/paraf.png">
        </div>
        <div class="pagebreak"></div>
        <div class="row">
            <div class="col-1">
            2.
            </div>
            <div class="col-11" style="text-align: justify;">
            peristilahan dan ungkapan dalam Surat Perjanjian ini memiliki arti dan makna yang sama seperti yang tercantum dalam lampiran Surat Perjanjian ini;								
            </div>
        </div>
        
        <div class="row">
            <div class="col-1">
            3.
            </div>
            <div class="col-11" style="text-align: justify;">
            dokumen-dokumen berikut merupakan satu-kesatuan dan bagian yang tidak terpisahkan dari Kontrak ini: 								
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1">
            a.
            </div>
            <div class="col-10" style="text-align: justify;">
            Adendum Surat Perjanjian 								
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1">
            b.
            </div>
            <div class="col-10" style="text-align: justify;">
            Pokok perjanjian; 								
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1">
            c.
            </div>
            <div class="col-10" style="text-align: justify;">
            Surat penawaranberikut daftar kuantitas dan harga
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1">
            d.
            </div>
            <div class="col-10" style="text-align: justify;">
            Syarat-syarat khusus Kontrak;
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1">
            e.
            </div>
            <div class="col-10" style="text-align: justify;">
            Syarat-syarat umum Kontrak;
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1">
            f.
            </div>
            <div class="col-10" style="text-align: justify;">
            Spesifikasi khusus;
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1">
            g.
            </div>
            <div class="col-10" style="text-align: justify;">
            Spesifikasi umum;dan
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1">
            h.
            </div>
            <div class="col-10" style="text-align: justify;">
            Dokumen lainnya seperti: BA.Klarifiksi dan negosiasi, SPPBJ, BAHP.
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            4.
            </div>
            <div class="col-11" style="text-align: justify;">
            Dokumen Kontrak dibuat untuk saling menjelaskan satu sama lain, dan jika terjadi pertentangan antara ketentuan dalam suatu dokumen dengan ketentuan dalam dokumen yang lain maka yang berlaku adalah ketentuan dalam dokumen yang lebih tinggi berdasarkan urutan hirarki pada angka 3 di atas;								
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            5.
            </div>
            <div class="col-11" style="text-align: justify;">
            Hak dan kewajiban timbal-balik PIHAK KESATU dan PIHAK KEDUA dinyatakan dalam Kontrak yang meliputi khususnya:								
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1">
            a.
            </div>
            <div class="col-10" style="text-align: justify;">
            PIHAK KESATUmempunyai hak dan kewajiban untuk:
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1 text-end">
            (1).
            </div>
            <div class="col-10" style="text-align: justify;">
            mengawasi dan memeriksa pekerjaan yang dilaksanakan oleh PIHAK KEDUA;						
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1 text-end">
            (2).
            </div>
            <div class="col-10" style="text-align: justify;">
            membayar pekerjaan sesuai dengan harga yang tercantum dalam Kontrak yang telah ditetapkan kepada PIHAK KEDUA;						
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1 text-end">
            (3).
            </div>
            <div class="col-10" style="text-align: justify;">
            Pembayaran Pekerjaan diberikan setelah 100% dari nilai total pekerjaan yang dipesan telah diterima oleh pihak kesatu.						
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1 text-end">
            (4).
            </div>
            <div class="col-10" style="text-align: justify;">
            Pemesanan barang ditentukan oleh pihak KESATU dan PIHAK KEDUA hanya melaksanakan pekerjaan yang dipesan oleh PIHAK KESATU.						
            </div>
        </div>
        
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1">
            b.
            </div>
            <div class="col-10" style="text-align: justify;">
            PIHAK KEDUA mempunyai hak dan kewajiban untuk:
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1 text-end">
            (1).
            </div>
            <div class="col-10" style="text-align: justify;">
            menerima pembayaran untuk pelaksanaan pekerjaan sesuai dengan harga yang telah ditentukan dalam Kontrak;						
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1 text-end">
            (2).
            </div>
            <div class="col-10" style="text-align: justify;">
            melaksanakan dan menyelesaikan pekerjaan sesuai denga jadwal pelaksanaan pekerjaan yang telah ditetapkan dalam kontrak;						
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1 text-end">
            (3).
            </div>
            <div class="col-10" style="text-align: justify;">
            melaksanakan dan menyelesaikan pekerjaan sesuai dengan jadwal pelaksanaan pekerjaan yang telah ditetapkan dalam Kontrak;						
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1 text-end">
            (4).
            </div>
            <div class="col-10" style="text-align: justify;">
            memberikan keterangan-keterangan yang diperlukan untuk pemeriksaan pelaksanaan yang dilakukan PIHAK KESATU;						
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1 text-end">
            (5).
            </div>
            <div class="col-10" style="text-align: justify;">
            menyerahkan hasil pekerjaan sesuai dengan jadwal penyerahan pekerjaan yang telah ditetapkan dalam Kontrak;						
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-1 text-end">
            (6).
            </div>
            <div class="col-10" style="text-align: justify;">
            melaksanakan pekerjaan berdasarkan pesanan sampai dengan <?php echo tglindo($row['tglselesaikontrak']);?>.					
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-11" style="text-align: justify;">
            Kontrak ini mulai berlaku efektif terhitung sejak tanggal yang ditetapkan, dengan tanggal mulai dan penyelesaian keseluruhan pekerjaan sebagaimana diatur dalam Syarat-Syarat Umum/Khusus Kontrak.								
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12" style="text-align: justify;">
            Dengan demikian, PIHAK KESATU dan PIHAK KEDUA telah bersepakat untuk menandatangani Kontrak ini pada tanggal tersebut di atas dan melaksanakan Kontrak sesuai dengan ketentuan peraturan perundang-undangan di Republik Indonesia.									
            </div>
        </div>
        
        <br>
        <div class="row text-center">
            <div class="col-6">
			Untuk Dan Atas Nama Pihak Kesatu												
            </div>
            <div class="col-6">
            Untuk Dan Atas Nama Pihak Kedua 												
            </div>
        </div>
        <div class="row text-center">
            <div class="col-6">
			Pejabat Pembuat Komitmen											
            </div>
            <div class="col-6">
            <?php echo $row['namaperusahaan']; ?>	
            </div>
        </div>
        <br><br><br><br><br><br><br><br>
        <div class="row text-center">
            <div class="col-6">
			<b><u><?php echo $row['namappk']; ?></u></b>
            </div>
            <div class="col-6">
            <b><u><?php echo $row['namapimpinan']; ?></u></b>
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
        <script>
            window.print()
            header("location:sp.php");
        </script>
</section>

</body>
</html>
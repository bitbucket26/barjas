<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Form Kualifikasi</title>
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
<body style="background-color: white; line-height: 20px; font-family: courier new;">
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
<section class="sheet padding-10mm" style="font-size:15px;">
    <div class="container-xxl">
        <!-- Judul Nota -->
         <h4 class="text-center"><b>FORMULIR ISIAN KUALIFIKASI BADAN USAHA</b></h4>
         <br>
         <div class="row">
            <div class="col-12">
                Saya yang bertandatangan dibawah ini :
            </div>
         </div>
        <div class="row">
            <div class="col-5">
            Nama
            </div>
            <div class="col-7">
            : <?php echo $row['namapimpinan'];?>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
            Jabatan
            </div>
            <div class="col-7">
            : <?php echo $row['jabatan'];?> <?php echo $row['namaperusahaan'];?>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
            Bertindak untuk dan atas nama
            </div>
            <div class="col-7">
            : <?php echo $row['namaperusahaan'];?>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
            Alamat
            </div>
            <div class="col-7">
            : <?php echo $row['alamat'];?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                Menyatakan dengan sesungguhnya bahwa :
            </div>
         </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1">
            1.
            </div>
            <div class="col-11">
            Saya secara hukum mempunyai kapasitas menandatangani kontrak berdasarkan Surat Akte Pendirian Notaris - No. - tanggal -										
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1">
            2.
            </div>
            <div class="col-11">
            Saya bukan sebagai Pegawai Negeri/BI/BHMN/BUMN/BUMD. 
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1">
            3.
            </div>
            <div class="col-11">
            Saya tidak sedang menjalani sanksi pidana;</div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1">
            4.
            </div>
            <div class="col-11">
            Saya tidak sedang dan tidak akan terlibat pertentangan kepentingan dengan para pihak yang terkait, langsung maupun tidak langsung dalam proses pengadaan ini;
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1">
            5.
            </div>
            <div class="col-11">
            Badan usaha yang saya wakili tidak masuk dalam Daftar Hitam, tidak dalam pengawasan pengadilan, tidak pailit atau kegiatan usahanya tidak sedang dihentikan; 
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1">
            6.
            </div>
            <div class="col-11">
            Salah satu dan/atau semua pengurus badan usaha yang saya wakili tidak masuk dalam Daftar Hitam;
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1">
            7.
            </div>
            <div class="col-11">
            Data-data saya/ badan usaha yang saya wakili adalah sebagai berikut:
            </div>
        </div>
        <br>
        <div class="row" style="text-align: justify;">
            <div class="col-1 fw-bold">
            A.
            </div>
            <div class="col-11 fw-bold">
            Data Administrasi
            </div>
        </div>
        <div class="row">
            <div class="col-1 text-end">
            1.
            </div>
            <div class="col-4">
            Nama (PT/CV/Firma)
            </div>
            <div class="col-7">
            : <?php echo $row['namaperusahaan'];?>
            </div>
        </div>
        <div class="row">
            <div class="col-1 text-end">
            2.
            </div>
            <div class="col-4">
            Status
            </div>
            <div class="col-7">
            : Cabang / Pusat
            </div>
        </div>
        <div class="row">
            <div class="col-1 text-end">
            3.
            </div>
            <div class="col-4">
            Alamat Kantor Cabang
            </div>
            <div class="col-7">
            : <?php echo $row['alamat'];?>
            </div>
        </div>
        <div class="row">
            <div class="col-1 text-end">
            4.
            </div>
            <div class="col-4">
            No. Telpon
            </div>
            <div class="col-7">
            : -
            </div>
        </div>
        <div class="row">
            <div class="col-1 text-end">
            5.
            </div>
            <div class="col-4">
            No. Fax
            </div>
            <div class="col-7">
            : -
            </div>
        </div>
        <div class="row">
            <div class="col-1 text-end">
            6.
            </div>
            <div class="col-4">
            E-mail
            </div>
            <div class="col-7">
            : -
            </div>
        </div>
        <br>
        <div class="row" style="text-align: justify;">
            <div class="col-1 fw-bold">
            B.
            </div>
            <div class="col-11 fw-bold">
            Izin Usaha
            </div>
        </div>
        <div class="row">
            <div class="col-1 text-end">
            1.
            </div>
            <div class="col-4">
            No. Surat Izin Usaha Perdagangan  (SIUP)
            </div>
            <div class="col-7">
            : -
            </div>
        </div>
        <div class="row">
            <div class="col-1 text-end">
            2.
            </div>
            <div class="col-4">
            Masa berlaku izin usaha
            </div>
            <div class="col-7" style="text-align: justify;">
            : selama perusahaan masih menjalankan usahanya
            </div>
        </div>
        <div class="row">
            <div class="col-1 text-end">
            3.
            </div>
            <div class="col-4">
            Instansi pemberi izin usaha
            </div>
            <div class="col-7" style="text-align: justify;">
            : Pemerintah RI cq. Lembaga Pengelola dan Penyelenggara OSS
            </div>
        </div>
        <br>
        <div class="row" style="text-align: justify;">
            <div class="col-1 fw-bold">
            C.
            </div>
            <div class="col-11 fw-bold">
            Landasan Hukum Pendirian Perusahaan
            </div>
        </div>
        <div class="row" >
            <div class="col-1 text-end">
            1.
            </div>
            <div class="col-11">
            Akta Pendirian PT/CV/Firma/Koperasi
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1">
            
            </div>
            <div class="col-3">
            a. Nomor Akte
            </div>
            <div class="col-8">
            : -
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1">
            
            </div>
            <div class="col-3">
            b. Tanggal
            </div>
            <div class="col-8">
            : -
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1">
            
            </div>
            <div class="col-3">
            c. Nama Notaris
            </div>
            <div class="col-8">
            : -
            </div>
        </div>
        <div class="row" >
            <div class="col-1 text-end">
            2.
            </div>
            <div class="col-11">
            Akta Perubahan Terakhir
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1">
            
            </div>
            <div class="col-3">
            a. Nomor Akte
            </div>
            <div class="col-8">
            : -
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1">
            
            </div>
            <div class="col-3">
            b. Tanggal
            </div>
            <div class="col-8">
            : -
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1">
            
            </div>
            <div class="col-3">
            c. Nama Notaris
            </div>
            <div class="col-8">
            : -
            </div>
        </div>
        <br>
<div class="pagebreak"></div>

        <div class="row" style="text-align: justify;">
            <div class="col-1 fw-bold">
            D.
            </div>
            <div class="col-11 fw-bold">
            Pengurus
            </div>
        </div>
        <div class="row" >
            <div class="col-1 text-end">
            1.
            </div>
            <div class="col-11 fw-bold">
            Komisaris untuk Perseroan Terbatas (PT)
            </div>
        </div>
        <div class="row" >
            <div class="col-1">
            
            </div>
            <div class="col-11">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th class="col-1">No.</th>
                            <th class="col-5">Nama</th>
                            <th class="col-3">No.KTP</th>
                            <th class="col-3">Jabatan dalam Badan Usaha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                    </tbody>
                </table>
            
            </div>
        </div>
        <div class="row" >
            <div class="col-1 text-end">
            2.
            </div>
            <div class="col-11 fw-bold">
            Direksi/Pengurus Badan Usaha 
            </div>
        </div>
        <div class="row" >
            <div class="col-1">
            
            </div>
            <div class="col-11">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>No.KTP</th>
                            <th>Jabatan dalam Badan Usaha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td >1</td>
                            <td><?php echo $row['namapimpinan'];?></trow>
                            <td>-</td>
                            <td><?php echo $row['jabatan'];?></td>
                        </tr>
                    </tbody>
                </table>
            
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 fw-bold">
            E.
            </div>
            <div class="col-11 fw-bold">
            Data Keuangan
            </div>
        </div>
        <div class="row" >
            <div class="col-1 fw-bold text-end">
            1.
            </div>
            <div class="col-11 fw-bold">
            Susunan Kepemilikan Saham (untuk PT)/Susunan Pesero (untuk CV/Firma)
            </div>
        </div>
        <div class="row" >
            <div class="col-1">
            
            </div>
            <div class="col-11">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th class="col-1">No.</th>
                            <th class="col-5">Nama</th>
                            <th class="col-3">No.KTP</th>
                            <th class="col-3">persentase</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                    </tbody>
                </table>
            
            </div>
        </div>
        <div class="row" >
            <div class="col-1 fw-bold text-end">
            2.
            </div>
            <div class="col-11 fw-bold">
            Pajak
            </div>
        </div>
        <div class="row" >
            <div class="col-1">
            
            </div>
            <div class="col-11">
                <table class="table table-bordered">
                    <thead>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-1">1.</td>
                            <td class="col-7">Nomor Pokok Wajib Pajak</td>
                            <td class="col-4"><?php echo $row['npwp'];?></td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>Bukti laporan Pajak Tahun terakhir</td>
                            <td>Terlampir</td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>Bukti Laporan bulanan (tiga bulan terakhir):</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            
            </div>
        </div>
        <div class="row">
            <div class="col-12" style="text-align: justify;">
            Demikian pernyataan ini saya buat dengan sebenarnya dan penuh rasa tanggung jawab. 
            Jika dikemudian hari ditemui bahwa data/dokumen yang saya sampaikan tidak benar dan ada pemalsuan, 
            maka saya dan badan usaha yang saya wakili bersedia dikenakan sanksi berupa sanksi administratif, 
            sanksi pencantuman dalam Daftar Hitam, gugatan secara perdata, dan/atau pelaporan secara pidana kepada 
            pihak berwenang sesuai dengan ketentuan peraturan perundang-undangan.
            </div>
        </div>
        <br><br>
        <div class="row text-center">
            <div class="col-6"></div>
            <div class="col-6">Indramayu, <?php echo tglindo($row['tglhps']);?></div>
        </div>
        <div class="row text-center">
            <div class="col-6"></div>
            <div class="col-6"><?php echo $row['namaperusahaan'];?></div>
        </div>
        <br><br><br><br>
        <div class="row text-center">
            <div class="col-6"></div>
            <div class="col-6 fw-bold"><u><?php echo $row['namapimpinan'];?></u></div>
        </div>
        <div class="row text-center">
            <div class="col-6"></div>
            <div class="col-6"><?php echo $row['jabatan'];?></div>
        </div>
    </div>
<script>
            window.print()
            header("location:sp.php");
        </script>
</section>

</body>
</html>
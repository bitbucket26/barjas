<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SPK</title>
</head>
<style>
@media print {
  @page {
    size: F4 landscape;
  }
}
</style>
<body style="background-color: white; line-height: 15px; font-family: tahoma;">
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
<section class="sheet padding-10mm">
    <div class="container-xxl">
        <!-- KOP -->
        <div class="d-flex justify-content-center">
            <img src="../../../../img/kopno.png">
        </div>
            <br>
        <!-- Judul Nota -->
         <!-- <u><h4 class="text-center">LAMPIRAN BERITA ACARA KLARIFIKASI DAN NEGOSIASI TEKNIS DAN BIAYA</h4></u> -->
        <br>
        
        <table class="table table-bordered table-sm" style="font-size: 13px;">
            <thead>
            </thead>
            <?php
                                $no=1;
                                 $data = mysqli_query($koneksi,"select * from kontrak where id='$_GET[id]'");
                                 while($row = mysqli_fetch_array($data)){
                                ?>
            <tbody>
                <tr>
                    <td rowspan="5" class="col-6 text-center align-middle" style="font-size: 22px;"><b>SURAT PERINTAH KERJA (SPK)</b></td>
                    <td class="col-6 text-center"><b>SATUAN KERJA :</b></td>
                </tr>
                <tr>
                    <td class="col-6 text-center"><b>RSUD INDRAMAYU</b></td>
                </tr>
                <tr>
                    <td class="col-6 "><b>Nomor dan Tanggal SPK:</b></td>
                </tr>
                <tr>
                    <td class="col-6">Nomor : <?php echo $row['nomorkontrak'];?></td>
                </tr>
                <tr>
                    <td class="col-6">Tanggal : <?php echo tglindo($row['tglmulaikontrak']);?></td>
                </tr>
                <tr>
                    <td rowspan="3" class="col-6 text-center align-middle">Paket Pekerjaan :</td>
                    <td class="col-6"><b>Nomor Dan Tanggal Undangan Pengadaan Langsung:</b></td>
                </tr>
                <tr>
                    <td class="col-6">Nomor : <?php echo $row['undanganpejabatbarjas'];?></td>
                </tr>
                
                <tr>
                    <td class="col-6">Tanggal : <?php echo tglindo($row['tglundanganpejabatbarjas']);?></td>

                </tr>
                <tr>
                <td rowspan="3" class="col-6 text-center align-middle"><b><?php echo $row['pekerjaan'];?></b></td>
                <td class="col-6"><b>Nomor Dan Tanggal BAHPL:</b></td>

                </tr>
                <tr>
                    <td class="col-6">Nomor : <?php echo $row['bahasildasung'];?></td>
                </tr>
                <tr>
                    <td class="col-6">Tanggal : <?php echo tglindo($row['tglbahasildasung']);?></td>
                </tr>


                <tr>
                    <td colspan="2" class="text-center"><?php echo $row['sumberdana'];?></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center">Untuk  Mata Anggaran Kegiatan <?php echo $row['kegiatan'];?></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center">Waktu Pelaksanaan Pekerjaan <?php echo $row['waktupelaksanaan'];?> (<?php echo $row['terbilangwaktupelaksanaan'];?>) hari kalender</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center"><b>NILAI PEKERJAAN :</b></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center"><b>Rp. <?php echo number_format($row['nilaitotalnego']);?>,-</b></td>
                </tr>
            </tbody>
            <?php } ?>
        </table>
                                
        <table class="table table-bordered table-sm" style="font-size: 15px;">
            <thead>
                <tr class="align-middle text-center">
                   <th class="col-1" text-center>No.</th>
                   <th class="col-5" text-center>Uraian Pekerjaan</th>
                   <th class="col-1" text-center>Kuantitas</th>
                   <th class="col-1" text-center>Satuan Ukuran</th>
                   <th class="col-2" text-center>Harga Satuan (Rp)</th>
                   <th class="col-2" text-center>Total (Rp)</th>
                </tr>
            </thead>
            <?php
                                include "../../../../koneksi.php";
                                $no=1;
                                $data = mysqli_query($koneksi,"select * from barang where id='$_GET[id]'");
                                while($d = mysqli_fetch_array($data)){
                                ?>
            <tbody>
                <tr class="align-middle">
                   <td class="col-1  text-center" text-center><?php echo $no++;?></td>
                   <td class="col-5" text-center><?php echo $d['namaproduk'];?></td>
                   <td class="col-1  text-center" text-center><?php echo $d['volumenego'];?></td>
                   <td class="col-1  text-center" text-center><?php echo $d['satuan'];?></td>
                   <td class="col-2  text-end" text-center><?php echo number_format($d['hargasatuannego']);?></td>
                   <td class="col-2  text-end" text-center><?php echo number_format($d['jumlahnego']);?></td>
                </tr>
            </tbody>
            <?php
                                 } 
            ?>
            <?php
                                // $no=1;
                                 $data = mysqli_query($koneksi,"select * from kontrak where id='$_GET[id]'");
                                 while($row = mysqli_fetch_array($data)){
                                ?>
            <tfoot>
                <tr>
                    <!-- <td class="col-1  text-center"></td> -->
                    <td rowspan="3"></td>
                    <td rowspan="3"></td>
                    <td colspan="3" class="col-2  text-start fw-bold">Jumlah</td>
                    <td class="col-2  text-end fw-bold" text-center><?php echo number_format($row['nilainego']);?></td>
                </tr>
                <tr>
                    <!-- <td class="col-1  text-center"></td> -->
                    <!-- <td rowspan="3"></td> -->
                    <td colspan="3" class="col-2  text-start fw-bold">PPN 11%</td>
                    <td class="col-2  text-end fw-bold" text-center><?php echo number_format($row['nilaippnnego']);?></td>
                </tr>
                <tr>
                    <!-- <td class="col-1  text-center"></td> -->
                    <!-- <td rowspan="3"></td> -->
                    <td colspan="3" class="col-2  text-start fw-bold">Total</td>
                    <td class="col-2  text-end fw-bold" text-center><?php echo number_format($row['nilaitotalnego']);?></td>
                </tr>
                <tr>
                    <td colspan="6" class="text-center"><i><?php echo $row['terbilangtotalnego'];?></i></td>
                </tr>
                
                <tr>
                    <td colspan="6" style="text-align: justify; line-height: 20px;">
                    INSTRUKSI KEPADA PENYEDIA: Penagihan hanya dapat dilakukan setelah penyelesaian pekerjaan yang diperintahkan dalam SPK ini dan dibuktikan dengan Berita Acara Serah Terima. Jika pekerjaan tidak dapat diselesaikan dalam jangka waktu pelaksanaan pekerjaan karena kesalahan atau kelalaian Penyedia maka Penyedia berkewajiban untuk membayar denda kepada PPK sebesar 1/1000 (satu per seribu) dari bagian tertentu nilai SPK sebelum PPN setiap hari kalender keterlambatan.
                    </td>
                </tr>
            </tfoot>
            
        </table>
        <br>
        <div class="row text-center">
            <div class="col-6">
            Untuk dan atas nama
            </div>
            <div class="col-6">
            Untuk dan atas nama
            </div>
        </div>
        <div class="row text-center">
            <div class="col-6">
            RSUD INDRAMAYU
            </div>
            <div class="col-6">
            <?php echo $row['namaperusahaan'];?>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-6">
            Pejabat Pembuat Komitmen
            </div>
            <div class="col-6">
            
            </div>
        </div>
        <br><br><br><br><br><br>
        <div class="row text-center" style="line-height: 20px;">
            <div class="col-6">
            <b><u><?php echo $row['namappk'];?></u></b>
            </div>
            <div class="col-6">
            <b><u><?php echo $row['namapimpinan'];?></u></b>
            </div>
        </div>
        <div class="row text-center" style="line-height: 20px;">
            <div class="col-6">
            NIP. <?php echo $row['nipppk'];?>
            </div>
            <div class="col-6">
            <?php echo $row['jabatan'];?>
            </div>
        </div>
        <?php } ?>
       



        


    </div>
        <script>
            window.print()
            header("location:sp.php");
        </script>
</section>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Opname Fisik</title>
</head>
<style>
@media print {
  @page {
    size: F4 landscape;
  }
}
</style>
<body style="background-color: white; line-height: 15px">
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
 
        $tglbastb= $row['tglbaphp'];
        $hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
        $tanggal = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", 
                            "Sebelas", "Dua Belas", "tiga Belas", "Empat Belas", "Lima Belas", "Enam Belas", "Tujuh Belas", "Delapan Belas", "Sembilan Belas", 
                            "Dua Puluh", "Dua Puluh Satu", "Dua Puluh Dua", "Dua Puluh Tiga", "Dua Puluh Empat", "Dua Puluh Lima", "Dua Puluh Enam", "Dua Puluh Tujuh", "Dua Puluh Delapan", "Dua Puluh Sembilan", "Tiga Puluh", "Tiga Puluh Satu");
        
        $bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
	    $angka = date("Y", strtotime($tglbastb));

        // echo $hari[date("w", strtotime($tglbaphp))].", Tanggal ".$tanggal[date("j", strtotime($tglbaphp))]." Bulan ".$bulan[date("n", strtotime($tglbaphp))];
        // echo terbilang($angka);
        ?>
<section class="sheet padding-10mm" style="font-size: 13px;">
    <div class="container-xxl">
        <!-- KOP -->
        <!-- <div class="d-flex justify-content-center">
            <img src="../../../img/kop3.png">
        </div> -->
            <br>
        <!-- Judul Nota -->
         <h4 class="text-center">OPNAME FISIK</h4>
        
        <br>
        <div class="row">
            <div class="col-2">
            Nama Sub Kegiatan
            </div>
            <div class="col-10">
            : <?php echo $row['subkegiatan'];?>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
            Pekerjaan
            </div>
            <div class="col-10">
            : <?php echo $row['pekerjaan'];?>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
            No. & Tgl. SP
            </div>
            <div class="col-10">
            : <?php echo $row['nomorkontrak'];?> Tanggal <?php echo tglindo($row['tglmulaikontrak']);?>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
            Nilai Kontrak
            </div>
            <div class="col-10">
            : Rp. <?php echo number_format($row['nilaitotalnego']);?>,-
            </div>
        </div>
        <br>

        <table class="table table-bordered border-dark table-sm" style="font-size: 10px;">
            <thead class="align-middle">
                <tr>
                    <th rowspan="2" class=" text-center">No</th>
                    <th rowspan="2" class=" text-center">NAMA PRODUK</th>
                    <th colspan="4" class=" text-center">KONTRAK</th>
                    <th rowspan="2" class=" text-center">BOBOT</th>
                    <th colspan="4" class=" text-center">REALISASI</th>
                    <th rowspan="2" class=" text-center">BOBOT</th>

                    <!-- <th colspan="2" class=" text-center">HASIL NEGOSIASI HARGA/BIAYA</th> -->
                </tr>
                <tr>
                    <th class=" text-center">VOLUME</th>
                    <th class=" text-center">SATUAN</th>
                    <th class=" text-center">HARGA SATUAN (Rp)</th>
                    <th class=" text-center">JUMLAH HARGA (Rp)</th>
                    <!-- <th class=" text-center">BOBOT</th> -->
                    <th class=" text-center">VOLUME</th>
                    <th class=" text-center">SATUAN</th>
                    <th class=" text-center">HARGA SATUAN (Rp)</th>
                    <th class=" text-center">JUMLAH HARGA (Rp)</th>
                    <!-- <th class=" text-center">BOBOT</th> -->

                </tr>
            </thead>
            <?php
                                $no=1;
                                 $data = mysqli_query($koneksi,"select * from barang where id='$_GET[id]'");
                                 while($d = mysqli_fetch_array($data)){
                                ?>
            <tbody>
                <tr>
                    <td class="text-center"><?php echo $d['no'];?></td>
                    <td class="text-start text-uppercase"><?php echo $d['namaproduk'];?></td>
                    <td class="text-center text-uppercase"><?php echo $d['volumehps'];?></td>
                    <td class="text-center"><?php echo $d['satuan'];?></td>
                    <td class="text-end"><?php echo number_format($d['hargasatuanhps'], 2);?></td>
                    <td class="text-end"><?php echo number_format($d['jumlahhps']);?></td>
                    <td class="text-center">100 %</td>
                    <td class="text-center"><?php echo number_format($d['volumehps']);?></td>
                    <td class="text-center text-uppercase"><?php echo $d['satuan'];?></td>
                    <td class="text-end"><?php echo number_format($d['hargasatuannego'], 2);?></td>
                    <td class="text-end"><?php echo number_format($d['jumlahnego']);?></td>
                    <td class="text-center">100 %</td>

                </tr>
            </tbody>
            <?php 
                                 }
                                 ?>
                                 <?php
                                    include "../../../../koneksi.php";
                                    $sql=mysqli_query($koneksi, "SELECT * FROM kontrak WHERE id='$_GET[id]'");
                                    $d =mysqli_fetch_array($sql);                                
                                ?>
            <tfoot>
                <tr>
                    <td colspan="5" class="fw-bold text-center">TOTAL NILAI</td>
                    <td class="fw-bold text-end"><?php echo number_format($d['nilaitotalnego']);?></td>
                    <td class="fw-bold text-end"></td>
                    <td colspan="3" class="fw-bold text-end"></td>
                    <td class="fw-bold text-end"><?php echo number_format($d['nilaitotalnego']);?></td>
                    <td class="fw-bold text-end"></td>
                </tr>
            </tfoot>
        </table>

        <div class="col-12" style="font-size: xx-small;"><i>Harga sudah termasuk PPN 11%</i></div>
        <br>
        
        <div class="row">
            <div class="col-4 text-center">
            
            </div>
            <div class="col-4 text-center">
            
            </div>
            <div class="col-4 text-center">
            Indramayu, <?php echo tglindo($d['tglbaphp']);?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4 text-center">
            Pejabat Pembuat Komitmen
            </div>
            <div class="col-4 text-center">
            Panitia Pemeriksa Hasil Pekerjaan
            </div>
            <div class="col-4 text-center">
            <?php echo $d['namaperusahaan'];?>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-4 text-center">
            
            </div>
            <div class="col-2 text-start fw-bold">
            <?php echo $d['namapejabatpemeriksa1'];?>
            </div>
            <div class="col-2 text-start">
            1..................................................
            </div>
            <div class="col-4 text-center">
            
            </div>
        </div>
        <div class="row">
            <div class="col-4 text-center">
            
            </div>
            <div class="col-2 text-start">
            NIP. <?php echo $d['nippejabatpemeriksa1'];?>
            </div>
            <div class="col-2 text-start">
            
            </div>
            <div class="col-4 text-center">
            
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-4 text-center">
            
            </div>
            <div class="col-2 text-start fw-bold">
            <?php echo $d['namapejabatpemeriksa2'];?>
            </div>
            <div class="col-2 text-start">
            2..................................................
            </div>
            <div class="col-4 text-center">
            
            </div>
        </div>
        <div class="row">
            <div class="col-4 text-center">
            <b><u><?php echo $d['namappk'];?></u></b>
            </div>
            <div class="col-2 text-start">
            NIP. <?php echo $d['nippejabatpemeriksa2'];?>
            </div>
            <div class="col-2 text-start">
            
            </div>
            <div class="col-4 text-center">
            <b><u><?php echo $d['namapimpinan'];?></u></b>
            </div>
        </div>
       
        
        <div class="row">
            <div class="col-4 text-center">
            NIP. <?php echo $d['nipppk'];?>
            </div>
            <div class="col-2 text-start fw-bold">
            
            </div>
            <div class="col-2 text-start">
            
            </div>
            <div class="col-4 text-center">
            <?php echo $d['jabatan'];?>
            </div>
        </div>
        <div class="row">
            <div class="col-4 text-center">
            
            </div>
            <div class="col-2 text-start">
            <!-- NIP. <?php echo $d['nippejabatpemeriksa3'];?> -->
            </div>
            <div class="col-2 text-start">
            
            </div>
            <div class="col-4 text-center">
            
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-4 text-center">
            <!-- NIP. <?php echo $d['nipppk'];?> -->
            </div>
            <div class="col-2 text-start fw-bold">
            <?php echo $d['namapejabatpemeriksa3'];?>
            </div>
            <div class="col-2 text-start">
            3..................................................
            </div>
            <div class="col-4 text-center">
            <!-- <?php echo $d['jabatan'];?> -->
            </div>
        </div>
        <div class="row">
            <div class="col-4 text-center">
            
            </div>
            <div class="col-2 text-start">
            NIP. <?php echo $d['nippejabatpemeriksa3'];?>
            </div>
            <div class="col-2 text-start">
            
            </div>
            <div class="col-4 text-center">
            
            </div>
        </div>
        <br>





















<!-- 


        <div class="row">
            <div class="text-center"></div>
            <div class=""></div>
            <div class="text-center">RSUD Indramayu</div>
        </div>
        <br><br><br><br>
        <div class="row">
            <div class="text-center"><u><b><?php echo $row['namapimpinan'];?></b></u></div>
            <div class=""></div>
            <div class="text-center"><u><b><?php echo $row['namapejabatbarjas'];?></b></u></div>
        </div>
        <div class="row">
            <div class="text-center"><?php echo $row['jabatan'];?></div>
            <div class=""></div>
            <div class="text-center">NIP. <?php echo $row['nippejabatbarjas'];?></div>
        </div>

         -->


    </div>
        <script>
            window.print()
            header("location:../ekatalog.php");
        </script>
</section>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Lampiran BA Klarifikasi & Negosiasi</title>
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
        
        include "../../../koneksi.php";
         
        // Check connection
        if (mysqli_connect_error()){
            echo "Koneksi database gagal : " . mysqli_connect_error();
        }
         
         $sql=mysqli_query($koneksi, "SELECT * FROM spk WHERE id='$_GET[id]'");
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
<section class="sheet padding-10mm" style="font-size:10px;">
    <div class="container-xxl">
        <!-- KOP -->
        <!-- <div class="d-flex justify-content-center">
            <img src="../../../img/kop3.png">
        </div> -->
            <br>
        <!-- Judul Nota -->
         <u><h4 class="text-center">LAMPIRAN BERITA ACARA KLARIFIKASI DAN NEGOSIASI TEKNIS DAN BIAYA</h4></u>
        
        <br>
        <div class="row">
            <div class="col-2">
            Nomor
            </div>
            <div class="col-10">
            : <?php echo $row['baklarifikasi'];?>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
            Tanggal
            </div>
            <div class="col-10">
            : <?php echo tglindo($row['tglbaklarifikasi']);?>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
            Nama Pekerjaan
            </div>
            <div class="col-10">
            : <?php echo $row['pekerjaan'];?>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
            Nilai HPS
            </div>
            <div class="col-10">
            : Rp. <?php echo number_format($row['nilaihps']);?>,-
            </div>
        </div>
        <div class="row">
            <div class="col-2">
            Tahun Anggaran
            </div>
            <div class="col-10">
            : <?php echo tglindo($row['tglhps']);?>
            </div>
        </div>
        <br>
        <b><div class="row">
            <div class="col-12">
            A. KLARIFIKSAI TEKNIS
            </div>
        </div></b>
        <table class="table table-bordered table-sm" style="font-size: 10px;">
            <thead>
                <tr class="align-middle">
                    <th class="col-1 text-center">No</th>
                    <th class="col-7 text-center">ASPEK TEKNIS</th>
                    <th class="col-2 text-center">HASIL KLARIFIKASI</th>
                    <th class="col-2 text-center">KETERANGAN</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="col-1 text-center">1</td>
                    <td class="col-7">identitas barang (jenis, tipe dan merek)</td>
                    <td class="col-2 text-center">LULUS</td>
                    <td class="col-2"></td>
                </tr>
                <tr>
                    <td class="col-1 text-center">2</td>
                    <td class="col-7"> spesifikasi teknis barang</td>
                    <td class="col-2 text-center">LULUS</td>
                    <td class="col-2"></td>
                </tr>
                <tr>
                    <td class="col-1 text-center">3</td>
                    <td class="col-7">jadwal waktu penyerahan/pengiriman barang</td>
                    <td class="col-2 text-center">LULUS</td>
                    <td class="col-2"></td>
                </tr>
            </tbody>
        </table>
        <br>
        <b><div class="row">
            <div class="col-12">
            B. NEGOSIASI HARGA/BIAYA
            </div>
        </div></b>
        <table class="table table-bordered table-sm" style="font-size: 10px;">
            <thead class="align-middle">
                <tr>
                    <th rowspan="2" class="col-1 text-center">No</th>
                    <th rowspan="2" class="col-3 text-center">NAMA PRODUK</th>
                    <th colspan="4" class="col-1 text-center">HARGA PENAWARAN</th>
                    <th colspan="2" class="col-1 text-center">HARGA PERKIRAAN SENDIRI (HPS)</th>
                    <th colspan="2" class="col-1 text-center">HASIL NEGOSIASI HARGA/BIAYA</th>
                </tr>
                <tr>
                    <th class="col-1 text-center">VOLUME</th>
                    <th class="col-1 text-center">SATUAN</th>
                    <th class="col-1 text-center">HARGA SATUAN</th>
                    <th class="col-1 text-center">JUMLAH HARGA</th>
                    <th class="col-1 text-center">HARGA SATUAN</th>
                    <th class="col-1 text-center">JUMLAH HARGA</th>
                    <th class="col-1 text-center">HARGA SATUAN</th>
                    <th class="col-1 text-center">JUMLAH HARGA</th>
                </tr>
            </thead>
            <?php
                                $no=1;
                                 $data = mysqli_query($koneksi,"select * from barangspk where id='$_GET[id]'");
                                 while($d = mysqli_fetch_array($data)){
                                ?>
            <tbody>
                <tr>
                    <td class="col-1 text-center"><?php echo $d['no'];?></td>
                    <td class="col-3 text-start text-uppercase"><?php echo $d['namaproduk'];?></td>
                    <td class="col-1 text-center text-uppercase"><?php echo $d['volumehps'];?></td>
                    <td class="col-1 text-center"><?php echo $d['satuan'];?></td>
                    <td class="col-1 text-end"><?php echo number_format($d['hargasatuanhps']);?></td>
                    <td class="col-1 text-end"><?php echo number_format($d['jumlahhps']);?></td>
                    <td class="col-1 text-end"><?php echo number_format($d['hargasatuanhps']);?></td>
                    <td class="col-1 text-end"><?php echo number_format($d['jumlahhps']);?></td>
                    <td class="col-1 text-end"><?php echo number_format($d['hargasatuannego']);?></td>
                    <td class="col-1 text-end"><?php echo number_format($d['jumlahnego']);?></td>
                </tr>
            </tbody>
            <?php
                                 } 
            ?>
            <?php
                                    include "../../../koneksi.php";
                                    $sql=mysqli_query($koneksi, "SELECT * FROM spk WHERE id='$_GET[id]'");
                                    $d =mysqli_fetch_array($sql);                                
                                ?>
            <tfoot>
                <tr>
                    <td colspan="4" class="fw-bold">Jumlah</td>
                    <td colspan="2" class="fw-bold text-end"><?php echo number_format($d['nilaitotalhps']);?></td>
                    <td colspan="2" class="fw-bold text-end"><?php echo number_format($d['nilaitotalhps']);?></td>
                    <td colspan="2" class="fw-bold text-end"><?php echo number_format($d['nilaitotalnego']);?></td>
                </tr>
                <tr>
                    <td colspan="4" class="fw-bold">PPN 11%</td>
                    <td colspan="2" class="fw-bold text-end"><?php echo number_format($d['nilaippnhps']);?></td>
                    <td colspan="2" class="fw-bold text-end"><?php echo number_format($d['nilaippnhps']);?></td>
                    <td colspan="2" class="fw-bold text-end"><?php echo number_format($d['nilaippnnego']);?></td>
                </tr>
                <tr>
                    <td colspan="4" class="fw-bold">Total</td>
                    <td colspan="2" class="fw-bold text-end"><?php echo number_format($d['nilaihps']);?></td>
                    <td colspan="2" class="fw-bold text-end"><?php echo number_format($d['nilaihps']);?></td>
                    <td colspan="2" class="fw-bold text-end"><?php echo number_format($d['nilainego']);?></td>
                </tr>
                <tr>
                    <td colspan="4"></td>
                    <td colspan="2" class="" style="text-align: justify;"><i><?php echo $d['terbilanghps'];?></i></td>
                    <td colspan="2" class="" style="text-align: justify;"><i><?php echo $d['terbilanghps'];?></i></td>
                    <td colspan="2" class="" style="text-align: justify;"><i><?php echo $d['terbilangnego'];?></i></td>
                </tr>
            </tfoot>
        </table>
        <br>
        <div class="row">
            <div class="col-3 text-center">Calon Penyedia</div>
            <div class="col-6"></div>
            <div class="col-3 text-center">Pejabat Pengadaan Barang/Jasa</div>
        </div>
        <div class="row">
            <div class="col-3 text-center"></div>
            <div class="col-6"></div>
            <div class="col-3 text-center">RSUD Indramayu</div>
        </div>
        <br><br><br><br>
        <div class="row">
            <div class="col-3 text-center"><u><b><?php echo $row['namapimpinan'];?></b></u></div>
            <div class="col-6"></div>
            <div class="col-3 text-center"><u><b><?php echo $row['namapejabatbarjas'];?></b></u></div>
        </div>
        <div class="row">
            <div class="col-3 text-center"><?php echo $row['jabatan'];?></div>
            <div class="col-6"></div>
            <div class="col-3 text-center">NIP. <?php echo $row['nippejabatbarjas'];?></div>
        </div>

        


    </div>
        <script>
            window.print()
            header("location:spk.php");
        </script>
</section>

</body>
</html>
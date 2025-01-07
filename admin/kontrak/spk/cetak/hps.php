<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>HPS</title>
</head>
<style>
@media print {
  @page {
    size: F4 portrait;
  }
}
</style>
<body style="background-color: white; line-height: 20px">
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
 
        $tglbastb= $row['tglhps'];
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
        <!-- KOP -->
        <div class="d-flex justify-content-center">
            <img src="../../../../img/kop3.png">
        </div>
            <br>
        <!-- Judul Nota -->
         <h5 class="text-center"><u><b>HARGA PERKIRAAN SENDIRI (HPS)</b></u></h5>
        
        <br>

        <div class="row">
            <div class="col-2">
            Sub Kegiatan
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
            Lokasi
            </div>
            <div class="col-10">
            : <?php echo $row['satuankerja'];?>
            </div>
        </div>

        <br>

        <table class="table table-bordered text-center table-sm" style="font-size: 15px;">
            <thead>
                <tr class="align-middle">
                    <th class="col-1">No.</th>
                    <th class="col-5">NAMA PRODUK</th>
                    <th class="col-1">VOLUME</th>
                    <th class="col-1">SATUAN</th>
                    <th class="col-2">HARGA SATUAN (Rp)</th> 
                    <th class="col-2">JUMLAH</th> 
                </tr>
            </thead>
            <?php
                                $no=1;
                                 $data = mysqli_query($koneksi,"select * from barang where id='$_GET[id]'");
                                 while($d = mysqli_fetch_array($data)){
                                ?>
            <tbody>
                <tr>
                    <td class="col-1"><?php echo $no++;?></td>
                    <td class="col-5 text-start text-uppercase"><?php echo $d['namaproduk'];?></td>
                    <td class="col-1"><?php echo $d['volumehps'];?></td>
                    <td class="col-1"><?php echo $d['satuan'];?></td>
                    <td class="col-2 text-end"><?php echo number_format($d['hargasatuanhps'],2);?></td> 
                    <td class="col-2 text-end"><?php echo number_format($d['jumlahhps']);?></td>
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
                                    
                                        <tr class="text-start fw-bold">
                                        <td class="col-1"></td>
                                        <td class="col-5"></td>
                                        <td colspan="3">Jumlah</td>
                                        <td class="col-2 text-end"><?php echo number_format($d['nilaihps']);?></td>
                                    </tr>
                                    <tr class="text-start fw-bold">
                                        <td class="col-1"></td>
                                        <td class="col-5"></td>
                                        <td colspan="3">PPN 11%</td>
                                        <td class="col-2 text-end"><?php echo number_format($d['nilaippnhps']);?></td>
                                    </tr>
                                    <tr class="text-start fw-bold">
                                        <td class="col-1"></td>
                                        <td class="col-5"></td>
                                        <td colspan="3">Total</td>
                                        <td class="col-2 text-end"><?php echo number_format($d['nilaitotalhps']);?></td>
                                    </tr>
                                    <tr class="text-center text-uppercase">
                                        <!-- <td class="col-1"></td>
                                        <td class="col-5"></td> -->
                                        <td colspan="6"><i><?php echo $d['terbilangtotalhps'];?></i></td>
                                        <!-- <td class="col-2 text-end"></td> -->
                                    </tr>
                                </tfoot>
                                
        </table>
        <!-- <script>
$(document).ready(function() {
        $("#nilai").load(function() {
            var nilai  = $("#nilai").val();
            // var ppn = $("#nilaippn").val();
            // var total = $("#nilaipph").val();
            // var jumlah = parseIfloat(ppn) + parsefloat(pph);
            var ppn = parseFloat(nilai) * 11/100;
            var total = parseFloat(nilai) + parseFloat(ppn);
            $("#ppn").val(ppn);
            $("#total").val(total);
        });
    });
</script> -->




        
        <br>
        <div class="row text-center">
            <div class="col-6">
			
            </div>
            <div class="col-6">
            Indramayu, <?php echo tglindo($row['tglhps']); ?>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-6">

            </div>
            <div class="col-6">
            Pejabat Pembuat Komitmen
            </div>
        </div>
        <br><br><br><br>
        <div class="row text-center">
            <div class="col-6">
			
            </div>
            <div class="col-6">
            <b><u><?php echo $row['namappk']; ?></u></b>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-6">
			
            </div>
            <div class="col-6">
            NIP. <?php echo $row['nipppk']; ?>	
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
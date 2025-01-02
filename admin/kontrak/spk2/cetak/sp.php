<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SP</title>
</head>
<style>
@media print {
  @page {
    size: F4 portrait;
  }
}
</style>
<body style="background-color: white; font-size: 20px; line-height: 23px">
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
<section class="sheet padding-10mm" style="font-size:17px;">
    <div class="container-xxl">
        <!-- KOP -->
        <div class="d-flex justify-content-center">
            <img src="../../../img/kop3.png">
        </div>
            <br>
        <!-- Judul Nota -->
         <u><h4 class="text-center">SURAT PESANAN (SP)</h4></u>
        <div class="row text-center">
            <div class="col-12">
            Nomor : <?php echo $row['suratpesanan'];?>
            </div>
        </div>
        <div class="row text-center">
        <div class="col-12">
            Tanggal : <?php echo tglindo($row['tglsuratpesanan']);?>
            </div>
        </div>
        <br>
        <div class="row text-center">
        <div class="col-12">
        <b>Paket Pekerjaan</b>
        </div>
        </div>
        <div class="row text-center">
        <div class="col-12">
        <?php echo $row['pekerjaan'];?>
        </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
            Yang bertanda tangan di bawah ini:
            </div>
        </div>
        <div class="row">
            <div class="col-2">
            Nama
            </div>
            <div class="col-10">
            : <?php echo $row['namappk'];?>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
            Jabatan
            </div>
            <div class="col-10">
            : <?php echo $row['jabatanppk'];?>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
            Alamat
            </div>
            <div class="col-10">
            : <?php echo $row['alamatsatker'];?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            Selanjutnya disebut Pejabat Pembuat Komitmen (PPK);
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
            berdasarkan Surat Perjanjian (SP) Nomor <?php echo $row['nomorkontrak'];?> Tanggal <?php echo tglindo($row['tglmulaikontrak']);?> 
            bersama ini memerintahkan :												
            </div>
        </div>
        <div class="row">
            <div class="col-4">
            Nama Penyedia
            </div>
            <div class="col-8">
            : <?php echo $row['namaperusahaan'];?>
            </div>
        </div>
        <div class="row">
            <div class="col-4" style="text-align: justify;">
            Alamat
            </div>
            <div class="col-8">
            : <?php echo $row['alamat'];?>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
            yang dalam hal ini diwakili oleh
            </div>
            <div class="col-8">
            : <?php echo $row['namapimpinan'];?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            Selanjutnya disebut sebagai Penyedia;
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            untuk mengirimkan barang dengan memperhatikan ketentuan-ketentuan sebagai berikut :
            </div>
        </div>
        <div class="row">
            <div class="col-1 text-end">
            1.
            </div>
            <div class="col-11">
            Rincian Barang :
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-11">
            <table class="table table-bordered text-center" style="font-size: 15px;">
            <thead>
                <tr class="align-middle">
                    <th class="col-1">No.</th>
                    <th class="col-5">Nama Produk</th>
                    <th class="col-1">Volume</th>
                    <th class="col-1">Satuan</th>
                    <th class="col-2">Harga Satuan</th>
                    <th class="col-2">Total Harga</th> 
                </tr>
               
            </thead>
            <tbody>
                <tr>
                    <td class="col-1">No.</td>
                    <td class="col-5">Nama Produk</td>
                    <td class="col-1">Volume</td>
                    <td class="col-1">Satuan</td>
                    <td class="col-2">Harga Satuan</td>
                    <td class="col-2">Total Harga</td>
                </tr>
            </tbody>
        </table>
            </div>
        </div>
        <div class="row">
            <div class="col-1 text-end">
            2.
            </div>
            <div class="col-4">
            Syarat-Syarat Pekerjaan
            </div>
            <div class="col-7">
            : sesuai dengan persyaratan dan ketentuan Kontrak;
            </div>
        </div>
        <div class="row">
            <div class="col-1 text-end">
            3.
            </div>
            <div class="col-4" style="text-align: justify;">
            Waktu Penyelesaian
            </div>
            <div class="col-7">
            : <?php echo $row['waktupelaksanaan'];?> (<?php echo $row['terbilangwaktupelaksanaan'];?>) hari kalender
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            
            </div>
            <div class="col-4">
            
            </div>
            <div class="col-7" style="text-align: justify;">
            : dan Pekerjaan sudah harus selesai pada tanggal <?php echo tglindo($row['tglselesaikontrak']);?>
            </div>
        </div>
        <div class="row">
            <div class="col-1 text-end">
            4.
            </div>
            <div class="col-4">
            Alamat pengiriman Barang
            </div>
            <div class="col-7">
            : <?php echo $row['satuankerja'];?>
            </div>
        </div>
        <div class="row" style="text-align: justify;">
            <div class="col-1 text-end">
            5.
            </div>
            <div class="col-4">
            Denda
            </div>
            <div class="col-7" style="text-align: justify;">
            : Terhadap setiap hari keterlambatan penyelesaian pekerjaan Penyedia Jasa akan dikenakan Denda Keterlambatan sebesar 1/1000 (satu per seribu) dari Nilai Kontrak atau bagian tertentu dari Nilai Kontrak sebelum PPN sesuai dengan persyaratan dan ketentuan Kontrak.				
            </div>
        </div>

        <br>
        <div class="row text-center">
            <div class="col-6">
			Untuk Dan Atas Nama 												
            </div>
            <div class="col-6">
            Menerima Dan Menyetujui Untuk dan Atas Nama 												
            </div>
        </div>
        <div class="row text-center">
            <div class="col-6">
			RSUD INDRAMAYU												
            </div>
            <div class="col-6">
            <?php echo $row['namaperusahaan']; ?>	
            </div>
        </div>
        <div class="row text-center">
            <div class="col-6">
			Pejabat Pembuat Komitmen											
            </div>
            <div class="col-6">
            
            </div>
        </div>
        <br><br><br><br>
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
            header("location:spk.php");
        </script>
</section>

</body>
</html>
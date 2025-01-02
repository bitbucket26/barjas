<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Permohonan Pembayaran</title>
</head>
<style>
@media print {
  @page {
    size: F4 portrait;
  }
}
</style>
<body style="background-color: white; font-family: times new roman; line-height: 20px;">
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

    ?>
<section class="sheet padding-10mm" style="font-size:16px;">
    <div class="container-xxl">
        <!-- KOP -->
        <div class="d-flex justify-content-center">
            <!-- <img src="../../../img/kop3.png"> -->
        </div>
            <br><br><br><br><br><br><br><br>
        <!-- Judul Nota -->

<table style="width:100%;">
		<thead>
		</thead>
		<tbody>
            <tr>
				<td class="col-2"></td>
				<td class="col-4"></td>
				<td class="col-1"></td>
				<td class="col-5" ><?php echo $row['kota']; ?>, <?php echo tglindo($row['tglpembayaran']);?></label></td>
			</tr>
            <tr>
				<td class="col-2"></td>
				<td class="col-4"></td>
				<td class="col-1"></td>
				<td class="col-5">Kepada :</td>
			</tr>
            <tr>
				<td class="col-2">Nomor</td>
				<td class="col-4">: <?php echo $row['nopembayaran']; ?></td>
				<td class="col-1">Yth.</td>
				<td class="col-5" style="vertical-align: text-top; text-align: justify;">Pemimpin BLUD RSUD Indramayu</td>
			</tr>
			<tr>
				<td class="col-2">Lampiran</td>
				<td class="col-4">: -</td>
				<td class="col-1"></td>
				<td class="col-5">di</td>
			</tr>
			<tr>
				<td class="col-2">Perihal</td>
				<td class="col-4">: Permohonan Pembayaran</td>
				<td class="col-1"></td>
				<td class="col-5" style="text-indent: 0.5in;">Indramayu</td>

			</tr>
		</tbody>
</table>

<br><br>

        <div class="row">
                <div class="col-12" style="text-align: justify;">
                       Menunjuk <?php echo $row['bilangjeniskontrak']; ?> (<?php echo $row['jeniskontrak']; ?>)
                       Sub Kegiatan <?php echo $row['subkegiatan']; ?> :
                </div>
            </div>
        <div class="row">
                <div class="col-2">
                Pekerjaan
                </div>
                <div class="col-10">: 
                <?php echo $row['pekerjaan']; ?>	
                </div>
        </div>
        <div class="row">
                <div class="col-2">
                Nomor
                </div>
                <div class="col-10">: 
                <?php echo $row['nomorkontrak']; ?>	
                </div>
        </div>
        <div class="row">
                <div class="col-2">
                Tanggal
                </div>
                <div class="col-10">: 
                <?php echo tglindo($row['tglmulaikontrak']); ?>	
                </div>
        </div>
        <div class="row">
                <div class="col-2">
                Nilai
                </div>
                <div class="col-10">: 
                Rp. <?php echo number_format($row['nilaitotalnego']); ?>,-
                </div>
        </div>
        <div class="row">
                <div class="col-2">
                Terbilang
                </div>
                <div class="col-10">: 
                (<?php echo $row['terbilangtotalnego']; ?>)
                </div>
        </div>
        <br>
                <div class="col-12" style="text-align: justify;">
                Sehubungan dengan prestasi pekerjaan telah mencapai prestasi 100 %, 
                berdasarkan Berita Acara Pemeriksaan Hasil Pekerjaan : <?php echo $row['nobaphp']; ?> 
                tanggal <?php echo tglindo($row['tglbaphp']); ?> Berita Acara Serah Terima Barang 
                Nomor : <?php echo $row['nobastb']; ?> tanggal <?php echo tglindo($row['tglbastb']); ?>. 
                Kami selaku penyedia barang/jasa mengajukan permohonan pembayaran 100% yaitu sebesar 
                Rp. <?php echo number_format($row['nilaitotalnego']); ?>,- (<?php echo $row['terbilangtotalnego']; ?>)
                </div><br>
                <div class="col-12" style="text-align: justify;">
                Demikian permohonan kami sampaikan, atas perkenannya kami sampaikan terima kasih.
                </div>
                <br><br>
                <div class="col-12">
                <?php echo $row['namaperusahaan']; ?>
                </div>
                <br><br><br><br>
                <div class="col-12"><u><b>
                <?php echo $row['namapimpinan']; ?></b></u>
                </div>
                <div class="col-12">
                <?php echo $row['jabatan']; ?>
                </div>

        
    </div>
        <script>
            window.print()
            header("location:ecatalogue.php");
        </script>
</section>

</body>
</html>
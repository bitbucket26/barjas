<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Penawaran</title>
</head>
<style>
@media print {
  @page {
    size: F4;
    size: portrait;
  }
}
</style>
<body style="background-color: white; font-size: 15px; line-height: 20px; font-family: Times New Roman;">
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
<section class="sheet padding-10mm">
    <div class="container-xxl">
        <!-- KOP -->
        <div class="d-flex justify-content-center">
            <!-- <img src="../../../img/kop3.png"> -->
        </div>
            <br><br><br><br><br><br><br><br><br>
        <!-- Judul Nota -->
        <div class="d-flex justify-content-end">
            <label class="text-capitalize"></label>
        </div>
        <table style="width:100%;">
		<thead>
		</thead>
		<tbody>
            <tr>
				<td class="col-2"></td>
				<td class="col-4"></td>
				<td class="col-1"></td>
				<td class="col-5"><?php echo $row['kota'];?>, <?php echo tglindo($row['tglhps']);?></label></td>
			</tr>
            <tr>
				<td class="col-2"></td>
				<td class="col-4"></td>
				<td class="col-1"></td>
				<td class="col-5">Kepada :</td>
			</tr>
            <tr>
				<td class="col-2">Nomor</td>
				<td class="col-4">: <?php echo $row['nopenawaran']; ?></td>
				<td class="col-1">Yth.</td>
				<td class="col-5">Pejabat Pengadaan Barang / Jasa</td>
				<!-- <td rowspan="3" style="vertical-align: text-top; text-align: justify;">
                    <p></p>
                    RSUD Indramayu
                </td> -->
			</tr>
			<tr>
				<td class="col-2">Lampiran</td>
				<td class="col-4">: -</td>
                <td class="col-1"></td>
				<td class="col-5">RSUD Indramayu</td>
			</tr>
			<tr>
				<td class="col-2">Perihal</td>
				<td class="col-4">: Penawaran Harga</td>
                <td class="col-1"></td>
				<td class="col-5">di</td>
			</tr>
			<tr>
                <td class="col-2"></td>
				<td class="col-4"></td>
                <!-- <td class="col-1"></td> -->
				<td class="col-1"></td>
				<td class="col-5" style="text-indent: 0.5in;">Indramayu</td>
			</tr>
		</tbody>
        </table>
                <br>
       <div class="row">
                <div class="col-12" style="text-align: justify; text-indent: 0.5in;">
                Sehubungan dengan undangan pengadaan langsung Nomor  : <?php echo $row['undanganpejabatbarjas']; ?> tertanggal <?php echo tglindo($row['tglundanganpejabatbarjas']); ?>, 
                dan setelah kami mempelajari dengan seksama Dokumen Pengadaan Barang/Jasa, dengan ini saya mengajukan penawaran 
                harga untuk pekerjaan <?php echo $row['pekerjaan']; ?> sebesar Rp. <?php echo number_format($row['nilaitotalhps']); ?>,- 
                (<?php echo $row['terbilangtotalhps']; ?> ).
        </div>
        </div>
        <br>
        <div class="row">
                <div class="col-12" style="text-align: justify; text-indent: 0.5in;">
                Dalam Penawaran ini sudah memperhitungkan keuntungan (profit), biaya umum (overhead) termasuk pengadaan tenaga kerja, 
                biaya pengiriman serta semua kewajiban pajak yang harus dibayar untuk melaksanakan pekerjaan tersebut.		
                </div>
        </div><br>
        <div class="row">
                
                <div class="col-12" style="text-align: justify; text-indent: 0.5in;">
                Jangka waktu penyelesaian pekerjaan yaitu selama <?php echo $row['waktupelaksanaan']; ?> 
                (<?php echo $row['terbilangwaktupelaksanaan']; ?>) hari kalender, 
                dan penawaran ini berlaku selama 07 (tujuh) hari kalender sejak pembukaan penawaran.
                </div>
                
        </div>
        <div class="row">
            <div class="col-12" style="text-indent: 0.5in; text-align: justify;">
            Sesuai dengan persyaratan dokumen pengadaan barang/jasa, bersama surat penawaran ini kami lampirkan :
            </div>
        </div>
        <div class="row">
            <div class="col-1 text-end">
            1.
            </div>
            <div class="col-11">
            Daftar Kuantitas dan Harga;
            </div>
        </div>
        <div class="row">
            <div class="col-1 text-end">
            2.
            </div>
            <div class="col-11">
            Spesifikasi jenis barang;
            </div>
        </div>
        <div class="row">
            <div class="col-1 text-end">
            3.
            </div>
            <div class="col-11">
            Jadwal Pengiriman Barang;
            </div>
        </div>
        <div class="row">
            <div class="col-1 text-end">
            4.
            </div>
            <div class="col-11">
            Lampiran/copy dokumen - dokumen lainya sebagaimana ketentuan dalam dokumen Pengadaan Langsung.
            </div>
        </div><br>
        <div class="row">
            <div class="col-12" style="text-align: justify;">
            Dokumen Penawaran masing – masing  terdiri dari 1 (satu) berkas asli dan 1 (satu) berkas copy.
            </div>
        </div><br>    
        <div class="row">
            <div class="col-12" style="text-indent: 0.5in; text-align: justify;">
            Demikian surat penawaran ini kami sampaikan, dan kami menyatakan sanggup dan akan tunduk pada semua ketentuan yang tercantum dalam dokumen pengadaan barang/jasa.
            </div>
        </div>
        
                <br><br>
                <div class="row text-center">
                    <div class="col-6">
                    </div>
                    <div class="col-6">
                    <?php echo $row['namaperusahaan']; ?>
                    </div>
                </div>
                <br><br><br><br>
                <div class="row text-center">
                    <div class="col-6">
                    </div>
                    <div class="col-6">
                    <u><b><?php echo $row['namapimpinan']; ?></b></u>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-6">
                    </div>
                    <div class="col-6">
                    <?php echo $row['jabatan']; ?>
                    </div>
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
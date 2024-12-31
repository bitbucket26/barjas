<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Permin Dasung</title>
</head>
<style>
@media print {
  @page {
    size: F4 portrait;
  }
}
</style>
<body style="background-color: white; line-height: 20px; font-family: Times New Roman;">
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

    ?>
<section class="sheet padding-10mm" style="font-size:17px;">
    <div class="container-xxl">
        <!-- KOP -->
        <div class="d-flex justify-content-center">
            <img src="../../../img/kop3.png">
        </div>
            <br>
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
				<td class="col-5"></td>
				<td class="col-1"></td>
				<td class="col-4" >Indramayu, <?php echo tglindo($row['tglhps']);?></label></td>
			</tr>
            <tr>
				<td class="col-2"></td>
				<td class="col-5"></td>
				<td class="col-1"></td>
				<td class="col-4">Kepada :</td>
			</tr>
            <tr>
				<td class="col-2">Nomor</td>
				<td class="col-5">: <?php echo $row['noundanganppk']; ?></td>
				<td class="col-1">Yth.</td>
				<td class="col-4">Pejabat Pengadaan Barang / Jasa</td>
				<!-- <td rowspan="3" style="vertical-align: text-top; text-align: justify;">
                    <p></p>
                    RSUD Indramayu
                </td> -->
			</tr>
			<tr>
				<td class="col-2">Lampiran</td>
				<td class="col-5">: -</td>
                <td class="col-1"></td>
				<td class="col-4">RSUD Indramayu</td>
			</tr>
			<tr>
				<td class="col-2">Perihal</td>
				<td class="col-5">: Pelaksana Pengadaan Barang/Jasa</td>
                <td class="col-1"></td>
				<td class="col-4">di</td>
			</tr>
			<tr>
                <td class="col-2"></td>
				<td class="col-5"></td>
                <!-- <td class="col-1"></td> -->
				<td class="col-1"></td>
				<td class="col-4" style="text-indent: 0.5in;">Indramayu</td>
			</tr>
		</tbody>
</table>
        <br>
        <div class="row">
                <div class="col-12">
                </div>
        </div>
        <div class="row">
                <div class="col-12">
                </div>
        </div>
        <div class="row">
                <div class="col-12">
                </div>
        </div>
        <div class="row">
                <div class="col-12">
                </div>
        </div>
       <br>
                <div class="row">
                    <div class="col-12">
                    Sehubungan dengan rencana kegiatan/pekerjaan :
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                    Sub Kegiatan
                    </div>
                    <div class="col-9">
                    : <?php echo $row['subkegiatan']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                    Pekerjaan
                    </div>
                    <div class="col-9">
                    : <?php echo $row['pekerjaan']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                    Bidang
                    </div>
                    <div class="col-9">
                    : Pengadaan Barang
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                    HPS
                    </div>
                    <div class="col-9">
                    : Rp. <?php echo number_format($row['nilaihps']); ?>,-
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                    Waktu Pelaksanaan
                    </div>
                    <div class="col-9">
                    : <?php echo $row['waktupelaksanaan']; ?> (<?php echo $row['terbilangwaktupelaksanaan']; ?>) hari kalender
                    </div>
                </div>



                <br><br>
       <div class="row">
                <div class="col-12" style="text-align: justify; text-indent: 0.5in;">
                Dengan ini meminta saudara untuk segera melaksanakan proses pengadaan barang/jasa pekerjaan tersebut dengan 
                metode pemilihan Pengadaan Langsung sesuai dengan Peraturan Bupati Indramayu Nomor 4 Tahun 2020 tentang Pengadaan 
                Barang/Jasa Pada Badan Layanan Umum Daerah Rumah Sakit Umum Daerah di Kabupaten Indramayu. Uraian Pekerjaan Harga 
                Perkiraan Sendiri (HPS) dan Spesifikasi Teknis sebagaimana terlampir.
        </div>
        </div>
        <br>
        <div class="row">
                
                <div class="col-12" style="text-align: justify; text-indent: 0.5in;">
                Apabila memenuhi persyaratan dan kualifikasi sebagaimana yang diatur dalam dokumen pengadaan, 
                calon penyedia barang/jasa yang diundang untuk pekerjaan tersebut di atas adalah 
                <?php echo $row['jabatan']; ?> <?php echo $row['namaperusahaan']; ?> alamat <?php echo $row['alamat']; ?>			
                </div>
                
        </div>
        <br>
        <div class="row">
                
                <div class="col-12" style="text-align: justify; text-indent: 0.5in;">
                Demikian disampaikan, atas perhatiannya diucapkan terima kasih.	
                </div>
                
        </div>
        
                <br><br>
                <div class="row text-center">
                    <div class="col-7">
                    </div>
                    <div class="col-5">
                    Pejabat Pembuat Komitmen
                    </div>
                </div>
                <br><br><br><br><br>
                <div class="row text-center">
                    <div class="col-7">
                    </div>
                    <div class="col-5">
                    <u><b><?php echo $row['namappk']; ?></b></u>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-7">
                    </div>
                    <div class="col-5">
                    NIP. <?php echo $row['nipppk']; ?>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SPTJM</title>
</head>
<style>
@media print {
  @page {
    size: F4 portrait;
  }
}
</style>
<body style="background-color: white;">
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
<section class="sheet padding-10mm" style="font-size:17px;">
    <div class="container-xxl">
        <!-- KOP -->
        <div class="d-flex justify-content-center">
            <img src="../../../../img/kop3.png">
        </div>
            <br>
        <!-- Judul Nota -->
        <div class="d-flex justify-content-end">
            <label class="text-capitalize"></label>
        </div>
        <div class="row">
                <div class="col-12 text-center"><b><u>
                <h4>SURAT PERNYATAAN TANGGUNG JAWAB MUTLAK (SPTJM)</h4></u></b>
                </div>
        </div>
        <br>
        <div class="row">
                <div class="col-12">
                Yang bertanda tangan dibawah ini :
                </div>
        </div>
        <div class="row">
                <div class="col-2">
                Nama
                </div>
                <div class="col-10">
                : <b><?php echo $row['namapptk']; ?></b>
                </div>
        </div>
        <div class="row">
                <div class="col-2">
                NIP
                </div>
                <div class="col-10">
                : <?php echo $row['nippptk']; ?>
                </div>
        </div>
        <div class="row">
                <div class="col-2">
                Jabatan
                </div>
                <div class="col-10">
                : <?php echo $row['jabatanpptk']; ?>
                </div>
        </div>
        <div class="row">
                <div class="col-2">
                Sub Kegiatan
                </div>
                <div class="col-10">
                : <?php echo $row['subkegiatan']; ?>
                </div>
        </div>
        
        <br>
        <div class="row">
                <div class="col-12" style="text-align: justify;">
                Selaku Pejabat Pelaksana Teknis Kegiatan 
                Sub Kegiatan <?php echo $row['subkegiatan']; ?> Pada Rumah Sakit Umum Daerah Indramayu, 
                menyatakan bahwa saya bertanggungjawab penuh atas kebenaran formal dan material maupun 
                terhadap pelaksanaan kegiatan serta segala akibat yang ditimbulkan pengeluaran anggaran 
                yang diajukan kepada Bagian Keuangan Rumah Sakit Umum Daerah Indramayu. Selanjutnya jika 
                dikemudian hari pada saat post audit/pemeriksaan tidak benar saya siap bertanggung jawab, 
                adapun dokumen yang diajukan adalah sebagai berikut : 								
                </div>
                
        </div>
<br>
    <!-- <table style="width:100%; border: 1px;"> -->
    <table class="table table-bordered border-dark">
		<thead>
            <tr class="align-middle">
				<th class="col-1 text-center">No.</th>
				<th class="col-3 text-center">Kode Rekening</th>
				<th class="col-5 text-center">Uraian Belanja</th>
				<th class="col-3 text-center">Jumlah</th>
			</tr>
		</thead>
		<tbody>
            <tr>
				<td class="col-1 text-center">1</td>
				<td class="col-3 text-center"><?php echo $row['koderekeningkegiatan']; ?></td>
				<td class="col-5"><?php echo $row['pekerjaan']; ?></td>
				<td class="col-3 text-center">Rp. <?php echo number_format($row['nilaitotalnego']); ?></td>
			</tr>
		</tbody>
    </table>
    <div class="row">
        <div class="col-12">
        Demikian Surat Pernyataan Tanggung Jawab Mutlak ini saya buat dengan sungguh- sungguh dan sebenarnya.									
        </div>
    </div>
                <br>
                <div class="row text-center">
                    <div class="col-7">
                    </div>
                    <div class="col-5 text-start">
                    Indramayu,                
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-7">
                    </div>
                    <div class="col-5">
                    Pejabat Pelaksana Teknis Kegiatan
                    </div>
                </div>
                <br><br><br><br><br>
                <div class="row text-center">
                    <div class="col-7">
                    </div>
                    <div class="col-5">
                    <u><b><?php echo $row['namapptk']; ?></b></u>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-7">
                    </div>
                    <div class="col-5">
                    NIP. <?php echo $row['nippptk']; ?>
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
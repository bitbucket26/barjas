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
    size: F4 landscape;
  }
}
</style>
<body style="background-color: white; font-size: 20px;">
    <?php
        
        include "../../../koneksi.php";
         
        // Check connection
        if (mysqli_connect_error()){
            echo "Koneksi database gagal : " . mysqli_connect_error();
        }
         
         $sql=mysqli_query($koneksi, "SELECT * FROM sp WHERE id='$_GET[id]'");
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
<section class="sheet padding-10mm" style="font-size:15px;">
    <div class="container-xxl">
    <!-- <table style="width:100%; border: 1px;"> -->
    <table class="table table-borderless table-sm" style="width:90%; line-height: 1.2; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
		<thead>
            <tr>
			</tr>
		</thead>
		<tbody>
            <tr style="border-top: 1px solid">
                <td class="col-3 text-center" style="border-left: 1px solid; border-right: 1px solid"></td>
                <!-- <td class="col-3 text-center"></td> -->
                <!-- <td class="col-3 text-center"></td> -->
				<td rowspan="3" colspan="3" class="text-center" style="border-right: 1px solid"><b><h4>KWITANSI</h4></b></td>
            </tr>
            <tr>
				<td class="col-3 text-center" style="border-left: 1px solid; border-right: 1px solid"></td>
				<!-- <td class="col-3 text-center"></td> -->
				<!-- <td class="col-3 text-center"></td> -->
				<!-- <td class="col-3 text-center"></td> -->
			</tr>
            <tr>
				<td class="col-3 text-center align-bottom" style="border-left: 1px solid; border-right: 1px solid">Mengetahui,</td>
				<!-- <td class="col-3 text-center"></td> -->
				<!-- <td class="col-3 text-center"></td> -->
				<!-- <td class="col-3 text-center"></td> -->
			</tr>
            <tr>
				<td class="col-3 text-center" style="border-left: 1px solid; border-right: 1px solid">Pemimpin BLUD</td>
				<td class="col-2 text-center"></td>
				<td class="col-3 text-center"></td>
				<td class="col-3 text-center" style="border-right: 1px solid"></td>
				<!-- <td class="col-3 text-center"></td> -->
            </tr>
            <tr>
				<td class="col-3 text-center align-top" style="border-left: 1px solid; border-right: 1px solid">RSUD Indramayu</td>
				<td class="col-2 text-start">Sudah Terima Dari</td>
				<td colspan="2" style="border-right: 1px solid">: Bendahara Pengeluaran RSUD Indramayu</td>
				<!-- <td class="col-3 text-center"></td> -->
			</tr>
            <tr>
				<td class="col-3 text-center" style="border-left: 1px solid; border-right: 1px solid"></td>
				<td class="col-2 text-start">Uang Sejumlah</td>
                <td colspan="2" style="border-right: 1px solid">: <?php echo $row['terbilangnego']; ?></td>

			</tr>
            <tr>
				<td class="col-3 text-center align-bottom" style="border-left: 1px solid; border-right: 1px solid"></td>
				<td class="col-2 text-start">Untuk Pembayaran</td>
                <td colspan="2" style="text-align: justify; border-right: 1px solid">: <?php echo $row['pekerjaan']; ?> 
                Sub Kegiatan <?php echo $row['subkegiatan']; ?> Sesuai dengan 
                Surat Pesanan Nomor <?php echo $row['nomorkontrak']; ?> Tanggal <?php echo tglindo($row['tglmulaikontrak']); ?></td>
			</tr>
            <tr>
				<td class="col-3 text-center align-top" style="border-left: 1px solid; border-right: 1px solid"><b><u>dr. DEDEN BONNI KOSWARA, MM</u></b></td>
				<td class="col-2 text-start"></td>
				<td class="col-3 text-start"></td>
				<td class="col-3 text-start" style="border-right: 1px solid"></td>
				<!-- <td class="col-3 text-start"></td> -->
			</tr>
            <tr>
				<td class="col-3 text-center" style="border-left: 1px solid; border-right: 1px solid">NIP. 19740110 200212 1 008</td>
				<td class="col-2 text-start"></td>
				<!-- <td class="col-3 text-start"></td> -->
				<td colspan="2" class="text-end" style="border-right: 1px solid">Indramayu,...............................................2024</td>
			</tr>
            <tr>
				<td class="col-3 text-center" style="border-left: 1px solid; border-right: 1px solid">Meyetujui :</td>
				<td class="col-2 text-center"></td>
				<td class="col-3 text-center">Lunas dibayar,</td>
				<td class="col-3 text-center" style="border-right: 1px solid">Yang Menerima</td>
			</tr>
            <tr>
				<td class="col-3 text-center" style="border-left: 1px solid; border-right: 1px solid">PPTK</td>
				<td class="col-2 text-center"></td>
				<td class="col-3 text-center">Bendahara Pengeluaran</td>
				<td class="col-3 text-center" style="border-right: 1px solid"></td>
			</tr>
            <tr>
				<td class="col-3 text-center" style="border-left: 1px solid; border-right: 1px solid"></td>
				<td class="col-2 text-center"></td>
				<td class="col-3 text-center"></td>
				<td class="col-3 text-center" style="border-right: 1px solid"></td>
			</tr>
            <tr>
				<td class="col-3 text-center" style="border-left: 1px solid; border-right: 1px solid"></td>
				<td class="col-2 text-center"></td>
				<td class="col-3 text-center"></td>
				<td class="col-3 text-center" style="border-right: 1px solid"></td>
			</tr>
            <tr>
				<td class="col-3 text-center" style="border-left: 1px solid; border-right: 1px solid"></td>
				<td class="col-2 text-center"></td>
				<td class="col-3 text-center"></td>
				<td class="col-3 text-center" style="border-right: 1px solid"></td>
			</tr>
            <tr>
				<td class="col-3 text-center" style="border-left: 1px solid; border-right: 1px solid"></td>
				<td class="col-2 text-center border border-dark fs-5"><b>Rp. <?php echo number_format($row['nilainego']); ?></b></td>
				<td class="col-3 text-center"></td>
				<td class="col-3 text-center" style="border-right: 1px solid"></td>
			</tr>
            <tr>
				<td class="col-3 text-center" style="border-left: 1px solid; border-right: 1px solid"></td>
				<td class="col-2 text-center"></td>
				<td class="col-3 text-center"></td>
				<td class="col-3 text-center" style="border-right: 1px solid"></td>
			</tr>
            <tr>
				<td class="col-3 text-center" style="border-left: 1px solid; border-right: 1px solid"></td>
				<td class="col-2 text-center"></td>
				<td class="col-3 text-center"></td>
				<td class="col-3 text-center" style="border-right: 1px solid"></td>
			</tr>
            <tr>
				<td class="col-3 text-center" style="border-left: 1px solid; border-right: 1px solid"></td>
				<td class="col-2 text-center"></td>
				<td class="col-3 text-center"></td>
				<td class="col-3 text-center" style="border-right: 1px solid"></td>
			</tr>
            <tr>
				<td class="col-3 text-center align-bottom" style="border-left: 1px solid; border-right: 1px solid"><b><u><?php echo $row['namapptk']; ?></u></b></td>
				<td class="col-2 text-center"></td>
				<td class="col-3 text-center"><b><u>DIKI EFENDI, S.IP</u></b></td>
				<td class="col-3 text-center" style="border-right: 1px solid"><b><u><?php echo $row['namapimpinan']; ?></u></b></td>
			</tr>
            <tr style="border-bottom: 1px solid">
				<td class="col-3 text-center align-top" style="border-left: 1px solid; border-right: 1px solid">NIP. <?php echo $row['nippptk']; ?></td>
				<td class="col-2 text-center"></td>
				<td class="col-3 text-center">NIP. 19790525 201001 1 006</td>
				<td class="col-3 text-center" style="border-right: 1px solid"><?php echo $row['jabatan']; ?></td>
			</tr>
		</tbody>
    </table>
        <script>
            window.print()
            header("location:homekasir1.php");
        </script>
</section>

</body>
</html>
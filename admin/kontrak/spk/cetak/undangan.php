<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Undangan</title>
</head>
<style>
@media print {
  @page {
    size: F4 portrait;
  }
}
</style>
<body style="background-color: white; font-size: 20px; line-height: 23px; font-family: tahoma;">
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
            <img src="../../../img/barjas.png">
        </div>
            <br>
        <!-- Judul Nota -->
        <div class="d-flex justify-content-end">
            <label class="text-capitalize">Indramayu, <?php echo tglindo($row['tglundanganpejabatbarjas']);?></label>
        </div>
        <br>
        <div class="row">
                <div class="col-2">
                Nomor
                </div>
                <div class="col-10">
                : <?php echo $row['undanganpejabatbarjas']; ?>
                </div>
        </div>
        <div class="row">
                <div class="col-2">
                Lampiran
                </div>
                <div class="col-10">
                : 1 (Satu) Berkas
                </div>
        </div>
        <div class="row">
                <div class="col-2">
                Perihal
                </div>
                <div class="col-6">
                : Pengadaan Langsung Penyedia Pekerjaan <?php echo $row['pekerjaan']; ?>
                </div>
        </div>
        <br>
        <div class="row">
                <div class="col-12">
                Kepada Yth.
                </div>
        </div>
        <div class="row">
                <div class="col-12">
                <?php echo $row['jabatan']; ?> <?php echo $row['namaperusahaan']; ?>
                </div>
        </div>
        <div class="row">
                <div class="col-12">
                Di -
                </div>
        </div>
        <div class="row">
                <div class="col-12" style="text-indent: 0.5in;">
                <?php echo $row['kota']; ?>
                </div>
        </div>
       <br>
       <div class="row">
                <div class="col-12" style="text-align: justify; text-indent: 0.5in;">
                Dengan ini perusahaan Saudara kami undang untuk mengikuti proses Pengadaan Langsung paket 
                pekerjaan <?php echo $row['pekerjaan']; ?> Tahun Anggaran <?php echo $row['tahunanggaran']; ?> (Dokumen Pengadaan terlampir) 
                sebagai berikut :
                </div>
        </div>
        <br>
        <div class="row">
            <div class="col-1">
            1.
            </div>
            <div class="col-11">
            Paket Pekerjaan
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            </div>
            <div class="col-3">
            Nama Paket Pekerjaan
            </div>
            <div class="col-8">
            : <?php echo $row['pekerjaan']; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            </div>
            <div class="col-3">
            Lingkup Pekerjaan
            </div>
            <div class="col-8">
            : Jasa Lainnya
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            </div>
            <div class="col-3">
            Nilai Total HPS
            </div>
            <div class="col-8">
            : Rp. <?php echo number_format($row['nilaihps']); ?>,-
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            </div>
            <div class="col-3">
            </div>
            <div class="col-8">
            ( <?php echo $row['terbilanghps']; ?> )
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            </div>
            <div class="col-3">
                Sumber Pendanaan
            </div>
            <div class="col-8">
            : <?php echo $row['sumberdana']; ?>
            </div>
        </div>
<br>
        <div class="row">
            <div class="col-1">
            2.
            </div>
            <div class="col-11">
            Pelaksanaan Pengadaan
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            </div>
            <div class="col-3">
            Tempat/Alamat
            </div>
            <div class="col-8">
            : <?php echo $row['satuankerja']; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-1">
            </div>
            <div class="col-3">
            Telp/Fax
            </div>
            <div class="col-8">
            : <?php echo $row['nomortlp']; ?>
            </div>
        </div>
        <br>
        <table class="table table-bordered table-sm">
            <thead class="text-center">
                <tr class="align-middle">
                    <th class="col-1">No.</th>
                    <th class="col-5">Kegiatan</th>
                    <th class="col-4">Hari / Tanggal</th>
                    <th class="col-2">Waktu</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="col-1 text-center">a</td>
                    <td class="col-5">Pemasukan Dokumen Penawaran</td>
                    <td class="col-4"><?php echo tglindo($row['tglhps']); ?> s/d <?php echo tglindo($row['tglpembukaan']); ?></td>
                    <td class="col-2">09.00 s/d 13.00 WIB</td>
                </tr>
                <tr>
                    <td class="col-1 text-center">b</td>
                    <td class="col-5">Pembukaan Dokumen Penawaran, Klarifikasi Teknis dan Negosiasi Harga</td>
                    <td class="col-4"><?php echo tglindo($row['tglpembukaan']); ?></td>
                    <td class="col-2">09.10 s/d. 12.00 WIB</td>
                </tr>
                <tr>
                    <td class="col-1 text-center">c</td>
                    <td class="col-5">Penandatanganan SPK</td>
                    <td class="col-4"><?php echo tglindo($row['tglmulaikontrak']); ?></td>
                    <td class="col-2">10.00 WIB</td>
                </tr>
            </tbody>
        </table>
        
        <div class="row">
            <div class="col-12" style="text-align: justify;">
            Apabila Saudara butuh keterangan dan penjelasan lebih lanjut, dapat menghubungi Pejabat Pengadaan sesuai alamat 
            tersebut di atas sampai dengan batas akhir pemasukan Dokumen Penawaran.
            </div>
            <br>
            <div class="col-12" style="text-align: justify;">
            Demikian disampaikan untuk diketahui.
            </div>
        </div>
        <br>
        <div class="row text-center">
            <div class="col-6">
			
            </div>
            <div class="col-6">
            Pejabat Pengadaan Barang/Jasa	
            </div>
        </div>
        <div class="row text-center">
            <div class="col-6">
			
            </div>
            <div class="col-6">
           RSUD Indramayu	
            </div>
        </div>
        <br><br><br><br>
        <div class="row text-center">
            <div class="col-6">
			
            </div>
            <div class="col-6">
            <b><u><?php echo $row['namapejabatbarjas']; ?></u></b>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-6">
			
            </div>
            <div class="col-6">
            NIP. <?php echo $row['nippejabatbarjas']; ?>	
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
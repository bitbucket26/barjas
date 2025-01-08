<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Pengadaan Langsung</title>
</head>
<style>
@media print {
  @page {
    size: A4 portrait;
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
         
         $sql=mysqli_query($koneksi, "SELECT * FROM ekatalog WHERE id='$_GET[id]'");
         $e=mysqli_fetch_array($sql);

    ?>
<!-- <section class="sheet padding-10mm" style="font-size:17px;"> -->
        <!-- <div class="container-xxl"> -->

        <?php 
        include "sptjm.php";
        // include "bastb.php";
        ?>
 <!-- </div> -->

        <!-- <script>
            window.print();
            header("location:ekatalog.php");
        </script> -->
<!-- </section> -->

</body>
</html>
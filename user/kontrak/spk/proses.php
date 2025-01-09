<?php 
include "../../../koneksi.php";
include "excel_reader2.php";

$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);
$baris = $data->rowcount($sheet_index=0);

$sukses = 0;
$gagal = 0;

for ($i=2;$i<=$baris;$i++){
    $id = $data->val($i, 1);
    $no = $data->val($i, 2);
    $namaproduk = $data->val($i, 3);
    $satuan = $data->val($i, 4);
    $volumehps = $data->val($i, 5);
    $hargasatuanhps = $data->val($i, 6);
    $jumlahhps = $data->val($i, 7);
    $volumenego = $data->val($i, 8);
    $hargasatuannego = $data->val($i, 9);
    $jumlahnego = $data->val($i, 10);

    $query = mysqli_query($koneksi, "INSERT into barang VALUES(
                                                                'id',
                                                                'no',
                                                                'namaproduk',
                                                                'satuan',
                                                                'volumehps',
                                                                'hargasatuanhps',
                                                                'jumlahhps',
                                                                'volumenego',
                                                                'hargasatuannego',
                                                                'jumlahnego'
                                                                )");

    if ($query) $sukses++;
    else $gagal++;

}
echo "<h3>Proses Import Data Selesai !</h3>";
echo "Jumlah Data Sukses Import : ".$sukses."<br>";
echo "Jumlah Data Gagal Import :".$gagal;
?>
<?php
include "../../koneksi.php";
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}


$id = $_GET['id'];
$tglproses = $_GET['tglproses'];
$tglmulaikontrak = $_GET['tglmulaikontrak'];
$tglselesaikontrak = $_GET['tglselesaikontrak'];
$jeniskontrak = $_GET['jeniskontrak'];
$bilangjeniskontrak   = $_GET['bilangjeniskontrak'];
$nomorkontrak   = $_GET['nomorkontrak'];
$hps= $_GET['hps'];
$tglhps= $_GET['tglhps'];
$undanganpejabatbarjas= $_GET['undanganpejabatbarjas'];
$tglundanganpejabatbarjas= $_GET['tglundanganpejabatbarjas'];
$pembukaan= $_GET['pembukaan'];
$tglpembukaan= $_GET['tglpembukaan'];
$baevaluasi= $_GET['baevaluasi'];
$tglbaevaluasi= $_GET['tglbaevaluasi'];
$lambaevaluasi= $_GET['lambaevaluasi'];
$tgllambaevaluasi= $_GET['tgllambaevaluasi'];
$baklarifikasi= $_GET['baklarifikasi'];
$tglbaklarifikasi= $_GET['tglbaklarifikasi'];
$lambaklarifikasi= $_GET['lambaklarifikasi'];
$tgllambaklarifikasi= $_GET['tgllambaklarifikasi'];
$bahasildasung= $_GET['bahasildasung'];
$tglbahasildasung= $_GET['tglbahasildasung'];
$penetapanpenyedia= $_GET['penetapanpenyedia'];
$tglpenetapanpenyedia= $_GET['tglpenetapanpenyedia'];
$pengumumanpenyedia= $_GET['pengumumanpenyedia'];
$tglpengumumanpenyedia= $_GET['tglpengumumanpenyedia'];
$lapproseshasilpengadaan= $_GET['lapproseshasilpengadaan'];
$tgllapproseshasilpengadaan= $_GET['tgllapproseshasilpengadaan'];
$sppbj= $_GET['sppbj'];
$tglsppbj= $_GET['tglsppbj'];
$suratpesanan= $_GET['suratpesanan'];
$tglsuratpesanan= $_GET['tglsuratpesanan'];
$notadinas= $_GET['notadinas'];
$tglnotadinas= $_GET['tglnotadinas'];
$waktupelaksanaan= $_GET['waktupelaksanaan'];
$terbilangwaktupelaksanaan= $_GET['terbilangwaktupelaksanaan'];

$pekerjaan= $_GET['pekerjaan'];
$subkegiatan= $_GET['subkegiatan'];
$kegiatan= $_GET['kegiatan'];
$noreksubkegiatan= $_GET['noreksubkegiatan'];
$namarekening= $_GET['namarekening'];
$koderekeningkegiatan= $_GET['koderekeningkegiatan'];
$namapptk= $_GET['namapptk'];
$nippptk= $_GET['nippptk'];
$nomorskpptk= $_GET['nomorskpptk'];
$tglskpptk= $_GET['tglskpptk'];
$jabatanpptk= $_GET['jabatanpptk'];
$nilaihps= $_GET['nilaihps'];
$terbilanghps= $_GET['terbilanghps'];
$nilainego= $_GET['nilainego'];
$terbilangnego= $_GET['terbilangnego'];
$nilaippn= $_GET['nilaippn'];
$nilaipph= $_GET['nilaipph'];
$nilaitotal= $_GET['nilaitotal'];
$terbilangtotal= $_GET['terbilangtotal'];

$namapejabatbarjas= $_GET['namapejabatbarjas'];
$nippejabatbarjas= $_GET['nippejabatbarjas'];
$nomorskpejabatbarjas= $_GET['nomorskpejabatbarjas'];
$tglskpejabatbarjas= $_GET['tglskpejabatbarjas'];
$jabatanpejabatbarjas= $_GET['jabatanpejabatbarjas'];
$namappk= $_GET['namappk'];
$nipppk= $_GET['nipppk'];
$nomorskppk= $_GET['nomorskppk'];
$tglskppk= $_GET['tglskppk'];
$jabatanppk= $_GET['jabatanppk'];

$namaperusahaan= $_GET['namaperusahaan'];
$namapimpinan= $_GET['namapimpinan'];
$jabatan= $_GET['jabatan'];
$norekening= $_GET['norekening'];
$npwp= $_GET['npwp'];
$namabank= $_GET['namabank'];
$namarekbank= $_GET['namarekbank'];
$alamat= $_GET['alamat'];
$kota= $_GET['kota'];
$kldi= $_GET['kldi'];
$satuankerja= $_GET['satuankerja'];
$sumberdana= $_GET['sumberdana'];
$nomortlp= $_GET['nomortlp'];
$alamatsatker= $_GET['alamatsatker'];

$nopenawaran= $_GET['nopenawaran'];
$nopemeriksaan= $_GET['nopemeriksaan'];
$tglpemeriksaan= $_GET['tglpemeriksaan'];
$nopembayaran= $_GET['nopembayaran'];
$tglpembayaran= $_GET['tglpembayaran'];
$noundanganppk= $_GET['noundanganppk'];
$tglundanganppk= $_GET['tglundanganppk'];
$nobaphp= $_GET['nobaphp'];
$tglbaphp= $_GET['tglbaphp'];
$nobastb= $_GET['nobastb'];
$tglbastb= $_GET['tglbastb'];
$pemeriksa1= $_GET['pemeriksa1'];
$nippemeriksa1= $_GET['nippemeriksa1'];
$jabatanpemeriksa1= $_GET['jabatanpemeriksa1'];
$pemeriksa2= $_GET['pemeriksa2'];
$nippemeriksa2= $_GET['nippemeriksa2'];
$jabatanpemeriksa2= $_GET['jabatanpemeriksa2'];
$pemeriksa3= $_GET['pemeriksa3'];
$nippemeriksa3= $_GET['nippemeriksa3'];
$jabatanpemeriksa3= $_GET['jabatanpemeriksa3'];


//query update
mysqli_query($koneksi, "UPDATE sp 
                                SET   tglproses='$tglproses',
                                      tglmulaikontrak='$tglmulaikontrak',
                                      tglselesaikontrak='$tglselesaikontrak',
                                      jeniskontrak='$jeniskontrak ',
                                      bilangjeniskontrak='$bilangjeniskontrak',
                                      nomorkontrak='$nomorkontrak',
                                      hps='$hps',
                                      tglhps='$tglhps',
                                      undanganpejabatbarjas='$undanganpejabatbarjas',
                                      tglundanganpejabatbarjas='$tglundanganpejabatbarjas',
                                      pembukaan='$pembukaan',
                                      tglpembukaan='$tglpembukaan',
                                      baevaluasi='$baevaluasi',
                                      tglbaevaluasi='$tglbaevaluasi',
                                      lambaevaluasi='$lambaevaluasi',
                                      tgllambaevaluasi='$tgllambaevaluasi',
                                      baklarifikasi='$baklarifikasi',
                                      tglbaklarifikasi='$tglbaklarifikasi',
                                      lambaklarifikasi='$lambaklarifikasi',
                                      tgllambaklarifikasi='$tgllambaklarifikasi',
                                      bahasildasung='$bahasildasung',
                                      tglbahasildasung='$tglbahasildasung',
                                      penetapanpenyedia='$penetapanpenyedia',
                                      tglpenetapanpenyedia='$tglpenetapanpenyedia',
                                      pengumumanpenyedia='$pengumumanpenyedia',
                                      tglpengumumanpenyedia='$tglpengumumanpenyedia',
                                      lapproseshasilpengadaan='$lapproseshasilpengadaan',
                                      tgllapproseshasilpengadaan='$tgllapproseshasilpengadaan',
                                      sppbj='$sppbj',
                                      tglsppbj='$tglsppbj',
                                      suratpesanan='$suratpesanan',
                                      tglsuratpesanan='$tglsuratpesanan',
                                      notadinas='$notadinas',
                                      tglnotadinas='$tglnotadinas',
                                      waktupelaksanaan='$waktupelaksanaan',
                                      terbilangwaktupelaksanaan='$terbilangwaktupelaksanaan',

                                      pekerjaan='$pekerjaan',
                                      subkegiatan='$subkegiatan',
                                      kegiatan='$kegiatan',
                                      noreksubkegiatan='$noreksubkegiatan',
                                      namarekening='$namarekening',
                                      koderekeningkegiatan='$koderekeningkegiatan',
                                      namapptk='$namapptk',
                                      nippptk='$nippptk',
                                      nomorskpptk='$nomorskpptk',
                                      tglskpptk='$tglskpptk',
                                      jabatanpptk='$jabatanpptk',
                                      nilaihps='$nilaihps',
                                      terbilanghps='$terbilanghps',
                                      nilainego='$nilainego',
                                      terbilangnego='$terbilangnego',
                                      nilaippn='$nilaippn',
                                      nilaipph='$nilaipph',
                                      nilaitotal='$nilaitotal',
                                      terbilangtotal='$terbilangtotal',

                                      namapejabatbarjas='$namapejabatbarjas',
                                      nippejabatbarjas='$nippejabatbarjas',
                                      nomorskpejabatbarjas='$nomorskpejabatbarjas',
                                      tglskpejabatbarjas='$tglskpejabatbarjas',
                                      jabatanpejabatbarjas='$jabatanpejabatbarjas',
                                      namappk='$namappk',
                                      nipppk='$nipppk',
                                      nomorskppk='$nomorskppk',
                                      tglskppk='$tglskppk',
                                      jabatanppk='$jabatanppk',

                                      namaperusahaan='$namaperusahaan',
                                      namapimpinan='$namapimpinan',
                                      jabatan='$jabatan',
                                      norekening='$norekening',
                                      npwp='$npwp',
                                      namabank='$namabank',
                                      namarekbank='$namarekbank',
                                      alamat='$alamat',
                                      kota='$kota',
                                      kldi='$kldi',
                                      satuankerja='$satuankerja',
                                      sumberdana='$sumberdana',
                                      nomortlp='$nomortlp',
                                      alamatsatker='$alamatsatker',

                                      nopenawaran='$nopenawaran',
                                      nopemeriksaan='$nopemeriksaan',
                                      tglpemeriksaan='$tglpemeriksaan',
                                      nopembayaran='$nopembayaran',
                                      tglpembayaran='$tglpembayaran',
                                      noundanganppk='$noundanganppk',
                                      tglundanganppk='$tglundanganppk',
                                      nobaphp='$nobaphp',
                                      tglbaphp='$tglbaphp',
                                      nobastb='$nobastb',
                                      tglbastb='$tglbastb',
                                      pemeriksa1='$pemeriksa1',
                                      nippemeriksa1='$nippemeriksa1',
                                      jabatanpemeriksa1='$jabatanpemeriksa1',
                                      pemeriksa2='$pemeriksa2',
                                      nippemeriksa2='$nippemeriksa2',
                                      jabatanpemeriksa2='$jabatanpemeriksa2',
                                      pemeriksa3='$pemeriksa3',
                                      nippemeriksa3='$nippemeriksa3',
                                      jabatanpemeriksa3='$jabatanpemeriksa3'
                                      WHERE id='$id'");

// mengalihkan halaman kembali ke index.php
header("location:sp.php");
?>
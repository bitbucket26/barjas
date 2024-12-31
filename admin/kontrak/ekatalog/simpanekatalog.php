<?php
// <!-- tampilkan data dari database -->
include "../../koneksi.php";

// Check connection
if (mysqli_connect_error()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
// menangkap data yang di kirim dari form 
  $id = $_POST['id'];
  $tglproses = $_POST['tglproses'];
  $tglmulaikontrak = $_POST['tglmulaikontrak'];
  $tglselesaikontrak = $_POST['tglselesaikontrak'];
  $jeniskontrak = $_POST['jeniskontrak'];
  $bilangjeniskontrak   = $_POST['bilangjeniskontrak'];
  $nomorkontrak   = $_POST['nomorkontrak'];
  $waktupelaksanaan= $_POST['waktupelaksanaan'];
  $terbilangwaktupelaksanaan= $_POST['terbilangwaktupelaksanaan'];

  $pekerjaan= $_POST['pekerjaan'];
  $subkegiatan= $_POST['subkegiatan'];
  $kegiatan= $_POST['kegiatan'];
  $noreksubkegiatan= $_POST['noreksubkegiatan'];
  $namarekening= $_POST['namarekening'];
  $koderekeningkegiatan= $_POST['koderekeningkegiatan'];
  $namapptk= $_POST['namapptk'];
  $nippptk= $_POST['nippptk'];
  $nomorskpptk= $_POST['nomorskpptk'];
  $tglskpptk= $_POST['tglskpptk'];
  $jabatanpptk= $_POST['jabatanpptk'];
  $nilaihps= $_POST['nilaihps'];
  $terbilanghps= $_POST['terbilanghps'];
  $nilainego= $_POST['nilainego'];
  $terbilangnego= $_POST['terbilangnego'];
  $nilaippn= $_POST['nilaippn'];
  $nilaipph= $_POST['nilaipph'];
  $nilaitotal= $_POST['nilaitotal'];
  $terbilangtotal= $_POST['terbilangtotal'];

  $namapejabatbarjas= $_POST['namapejabatbarjas'];
  $nippejabatbarjas= $_POST['nippejabatbarjas'];
  $nomorskpejabatbarjas= $_POST['nomorskpejabatbarjas'];
  $tglskpejabatbarjas= $_POST['tglskpejabatbarjas'];
  $jabatanpejabatbarjas= $_POST['jabatanpejabatbarjas'];
  $namappk= $_POST['namappk'];
  $nipppk= $_POST['nipppk'];
  $nomorskppk= $_POST['nomorskppk'];
  $tglskppk= $_POST['tglskppk'];
  $jabatanppk= $_POST['jabatanppk'];

  $namaperusahaan= $_POST['namaperusahaan'];
  $namapimpinan= $_POST['namapimpinan'];
  $jabatan= $_POST['jabatan'];
  $norekening= $_POST['norekening'];
  $npwp= $_POST['npwp'];
  $namabank= $_POST['namabank'];
  $namarekbank= $_POST['namarekbank'];
  $alamat= $_POST['alamat'];
  $kota= $_POST['kota'];
  $kldi= $_POST['kldi'];
  $satuankerja= $_POST['satuankerja'];
  $tahunanggaran= $_POST['tahunanggaran'];
  $sumberdana= $_POST['sumberdana'];
  $nomortlp= $_POST['nomortlp'];
  $alamatsatker= $_POST['alamatsatker'];

  $nopenawaran= $_POST['nopenawaran'];
  $nopemeriksaan= $_POST['nopemeriksaan'];
  $tglpemeriksaan= $_POST['tglpemeriksaan'];
  $nopembayaran= $_POST['nopembayaran'];
  $tglpembayaran= $_POST['tglpembayaran'];
  $noundanganppk= $_POST['noundanganppk'];
  $tglundanganppk= $_POST['tglundanganppk'];
  $nobaphp= $_POST['nobaphp'];
  $tglbaphp= $_POST['tglbaphp'];
  $nobastb= $_POST['nobastb'];
  $tglbastb= $_POST['tglbastb'];
  $namapejabatpemeriksa= $_POST['namapejabatpemeriksa'];
  $nippejabatpemeriksa= $_POST['nippejabatpemeriksa'];
  $nomorskpejabatpemeriksa= $_POST['nomorskpejabatpemeriksa'];
  $tglskpejabatpemeriksa= $_POST['tglskpejabatpemeriksa'];
  
  

  $sql = "INSERT INTO ekatalog VALUES('$id',
                                      '$tglproses',
                                      '$tglmulaikontrak',
                                      '$tglselesaikontrak',
                                      '$jeniskontrak ',
                                      '$bilangjeniskontrak',
                                      '$nomorkontrak',
                                      '$waktupelaksanaan',
                                      '$terbilangwaktupelaksanaan',

                                      '$pekerjaan',
                                      '$subkegiatan',
                                      '$kegiatan',
                                      '$noreksubkegiatan',
                                      '$namarekening',
                                      '$koderekeningkegiatan',
                                      '$namapptk',
                                      '$nippptk',
                                      '$nomorskpptk',
                                      '$tglskpptk',
                                      '$jabatanpptk',
                                      '$nilaihps',
                                      '$terbilanghps',
                                      '$nilainego',
                                      '$terbilangnego',
                                      '$nilaippn',
                                      '$nilaipph',
                                      '$nilaitotal',
                                      '$terbilangtotal',

                                      '$namapejabatbarjas',
                                      '$nippejabatbarjas',
                                      '$nomorskpejabatbarjas',
                                      '$tglskpejabatbarjas',
                                      '$jabatanpejabatbarjas',
                                      '$namappk',
                                      '$nipppk',
                                      '$nomorskppk',
                                      '$tglskppk',
                                      '$jabatanppk',

                                      '$namaperusahaan',
                                      '$namapimpinan',
                                      '$jabatan',
                                      '$norekening',
                                      '$npwp',
                                      '$namabank',
                                      '$namarekbank',
                                      '$alamat',
                                      '$kota',
                                      '$kldi',
                                      '$satuankerja',
                                      '$tahunanggaran',
                                      '$sumberdana',
                                      '$nomortlp',
                                      '$alamatsatker',

                                      '$nopenawaran',
                                      '$nopemeriksaan',
                                      '$tglpemeriksaan',
                                      '$nopembayaran',
                                      '$tglpembayaran',
                                      '$noundanganppk',
                                      '$tglundanganppk',
                                      '$nobaphp',
                                      '$tglbaphp',
                                      '$nobastb',
                                      '$tglbastb',
                                      '$namapejabatpemeriksa',
                                      '$nippejabatpemeriksa',
                                      '$nomorskpejabatpemeriksa',
                                      '$tglskpejabatpemeriksa'
                                      )";

  mysqli_query($koneksi, $sql);

  header ("location: ekatalog.php");
  
?>
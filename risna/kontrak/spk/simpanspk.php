<?php
// <!-- tampilkan data dari database -->
include "../../../koneksi.php";

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
  $hps= $_POST['hps'];
  $tglhps= $_POST['tglhps'];
  $undanganpejabatbarjas= $_POST['undanganpejabatbarjas'];
  $tglundanganpejabatbarjas= $_POST['tglundanganpejabatbarjas'];
  $pembukaan= $_POST['pembukaan'];
  $tglpembukaan= $_POST['tglpembukaan'];
  $baevaluasi= $_POST['baevaluasi'];
  $tglbaevaluasi= $_POST['tglbaevaluasi'];
  $lambaevaluasi= $_POST['lambaevaluasi'];
  $tgllambaevaluasi= $_POST['tgllambaevaluasi'];
  $baklarifikasi= $_POST['baklarifikasi'];
  $tglbaklarifikasi= $_POST['tglbaklarifikasi'];
  $lambaklarifikasi= $_POST['lambaklarifikasi'];
  $tgllambaklarifikasi= $_POST['tgllambaklarifikasi'];
  $bahasildasung= $_POST['bahasildasung'];
  $tglbahasildasung= $_POST['tglbahasildasung'];
  $penetapanpenyedia= $_POST['penetapanpenyedia'];
  $tglpenetapanpenyedia= $_POST['tglpenetapanpenyedia'];
  $pengumumanpenyedia= $_POST['pengumumanpenyedia'];
  $tglpengumumanpenyedia= $_POST['tglpengumumanpenyedia'];
  $lapproseshasilpengadaan= $_POST['lapproseshasilpengadaan'];
  $tgllapproseshasilpengadaan= $_POST['tgllapproseshasilpengadaan'];
  $sppbj= $_POST['sppbj'];
  $tglsppbj= $_POST['tglsppbj'];
  $suratpesanan= $_POST['suratpesanan'];
  $tglsuratpesanan= $_POST['tglsuratpesanan'];
  $notadinas= $_POST['notadinas'];
  $tglnotadinas= $_POST['tglnotadinas'];
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
  $nilaippnhps= $_POST['nilaippnhps'];
  $terbilangppnhps= $_POST['terbilangppnhps'];
  $nilaitotalhps= $_POST['nilaitotalhps'];
  $terbilangtotalhps= $_POST['terbilangtotalhps'];
  $nilainego= $_POST['nilainego'];
  $terbilangnego= $_POST['terbilangnego'];
  $nilaippnnego= $_POST['nilaippnnego'];
  $terbilangppnnego= $_POST['terbilangppnnego'];
  $nilaipph= $_POST['nilaipph'];
  $terbilangpph= $_POST['terbilangpph'];
  $nilaitotalnego= $_POST['nilaitotalnego'];
  $terbilangtotalnego= $_POST['terbilangtotalnego'];
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
  $namapejabatpemeriksa1= $_POST['namapejabatpemeriksa1'];
  $nippejabatpemeriksa1= $_POST['nippejabatpemeriksa1'];
  $nomorskpejabatpemeriksa1= $_POST['nomorskpejabatpemeriksa1'];
  $tglskpejabatpemeriksa1= $_POST['tglskpejabatpemeriksa1'];
  $namapejabatpemeriksa2= $_POST['namapejabatpemeriksa2'];
  $nippejabatpemeriksa2= $_POST['nippejabatpemeriksa2'];
  $nomorskpejabatpemeriksa2= $_POST['nomorskpejabatpemeriksa2'];
  $tglskpejabatpemeriksa2= $_POST['tglskpejabatpemeriksa2'];
  $namapejabatpemeriksa3= $_POST['namapejabatpemeriksa3'];
  $nippejabatpemeriksa3= $_POST['nippejabatpemeriksa3'];
  $nomorskpejabatpemeriksa3= $_POST['nomorskpejabatpemeriksa3'];
  $tglskpejabatpemeriksa3= $_POST['tglskpejabatpemeriksa3'];
  $nomordpa= $_POST['nomordpa'];
  $tgldpa= $_POST['tgldpa'];
  $user= $_POST['user'];
  $totalbap= $_POST['totalbap'];
  $terbilangbap= $_POST['terbilangbap'];
  
  

  $sql = "INSERT INTO kontrak VALUES( '$id',
                                      '$tglproses',
                                      '$tglmulaikontrak',
                                      '$tglselesaikontrak',
                                      '$jeniskontrak ',
                                      '$bilangjeniskontrak',
                                      '$nomorkontrak',
                                      '$hps',
                                      '$tglhps',
                                      '$undanganpejabatbarjas',

                                      '$tglundanganpejabatbarjas',
                                      '$pembukaan',
                                      '$tglpembukaan',
                                      '$baevaluasi',
                                      '$tglbaevaluasi',
                                      '$lambaevaluasi',
                                      '$tgllambaevaluasi',
                                      '$baklarifikasi',
                                      '$tglbaklarifikasi',
                                      '$lambaklarifikasi',

                                      '$tgllambaklarifikasi',
                                      '$bahasildasung',
                                      '$tglbahasildasung',
                                      '$penetapanpenyedia',
                                      '$tglpenetapanpenyedia',
                                      '$pengumumanpenyedia',
                                      '$tglpengumumanpenyedia',
                                      '$lapproseshasilpengadaan',
                                      '$tgllapproseshasilpengadaan',
                                      '$sppbj',

                                      '$tglsppbj',
                                      '$suratpesanan',
                                      '$tglsuratpesanan',
                                      '$notadinas',
                                      '$tglnotadinas',
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

                                      '$nilaippnhps',
                                      '$terbilangppnhps',
                                      '$nilaitotalhps',
                                      '$terbilangtotalhps',
                                      '$nilainego',
                                      '$terbilangnego',
                                      '$nilaippnnego',
                                      '$terbilangppnnego',
                                      '$nilaipph',
                                      '$terbilangpph',

                                      '$nilaitotalnego',
                                      '$terbilangtotalnego',
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
                                      '$tglskpejabatpemeriksa',
                                      '$namapejabatpemeriksa1',
                                      '$nippejabatpemeriksa1',
                                      '$nomorskpejabatpemeriksa1',
                                      '$tglskpejabatpemeriksa1',
                                      '$namapejabatpemeriksa2',
                                      '$nippejabatpemeriksa2',
                                      '$nomorskpejabatpemeriksa2',
                                      '$tglskpejabatpemeriksa2',
                                      
                                      '$namapejabatpemeriksa3',
                                      '$nippejabatpemeriksa3',
                                      '$nomorskpejabatpemeriksa3',
                                      '$tglskpejabatpemeriksa3',
                                      '$nomordpa',
                                      '$tgldpa',
                                      '$user',
                                      '$totalbap',
                                      '$terbilangbap'
                                      )";

  mysqli_query($koneksi, $sql);
  // mysqli_query($koneksi, $kontrak);

  header ("location: spk.php");
  
?>
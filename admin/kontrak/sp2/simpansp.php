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

  $pemeriksa1= $_POST['pemeriksa1'];
  $nippemeriksa1= $_POST['nippemeriksa1'];
  $nomorskpemeriksa1= $_POST['nomorskpemeriksa1'];
  $tglskpemeriksa1= $_POST['tglskpemeriksa1'];
  $pemeriksa2= $_POST['pemeriksa2'];
  $nippemeriksa2= $_POST['nippemeriksa2'];
  $nomorskpemeriksa2= $_POST['nomorskpemeriksa2'];
  $tglskpemeriksa2= $_POST['tglskpemeriksa2'];
  $pemeriksa3= $_POST['pemeriksa3'];
  $nippemeriksa3= $_POST['nippemeriksa3'];
  $nomorskpemeriksa3= $_POST['nomorskpemeriksa3'];
  $tglskpemeriksa3= $_POST['tglskpemeriksa3'];
  

  $sql = "INSERT INTO sp VALUES(      '$id',
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

                                      '$pemeriksa1',
                                      '$nippemeriksa1',
                                      '$nomorskpemeriksa1',
                                      '$tglskpemeriksa1',
                                      '$pemeriksa2',
                                      '$nippemeriksa2',
                                      '$nomorskpemeriksa2',
                                      '$tglskpemeriksa2',
                                      '$pemeriksa3',
                                      '$nippemeriksa3',
                                      '$nomorskpemeriksa3',
                                      '$tglskpemeriksa3')";

  mysqli_query($koneksi, $sql);

  header ("location: sp.php");
  
?>
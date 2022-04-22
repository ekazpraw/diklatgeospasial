<title>Verifikasi Data</title>
<link rel="icon" type="image/x-icon" href="images/pavicon.png" />
<?php 
include '../koneksi.php';
include '../function/pesan_dalam.php';
$id  = $_POST['id'];
$kode0 = $_POST['kode0'];
$kode = $_POST['kode'];
$program = $_POST['nama'];
$programK = ucwords($program);
$vol = $_POST['vol'];
$sat = $_POST['sat'];
$satK = ucwords($sat);
$ket = $_POST['ket'];
$ketK = ucwords($ket);
$f = $_POST['f'];
$u = $_POST['u'];
$c = $_POST['c'];
$k = $_POST['k'];
$tgltb = $_POST['tgltb'];
$petugastb = $_POST['petugastb'];
$tglub = $_POST['tglub'];
$petugasub = $_POST['petugasub'];
mysqli_query($connect, "update y_isilayanan set z_idlayanan='$kode0', z_kodeisilayanan='$kode', z_namaisilayanan='$programK', z_volumeil='$vol', z_satuanil='$sat', z_paguil='$f', z_jmlrealisasiil='$u', z_jmlsaldoil='$c', z_rjmlsaldoil='$k', z_keteranganil='$ketK', z_dc='$tgltb', z_pb='$petugastb', z_dm='$tglub', z_pg='$petugasub' where z_idisilayanan='$id'");
echo SUbahMsgIL();
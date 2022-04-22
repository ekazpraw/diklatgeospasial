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
$ket = $_POST['ket'];
$ketK = ucwords($ket);
$tgltb = $_POST['tgltb'];
$petugastb = $_POST['petugastb'];
$tglub = $_POST['tglub'];
$petugasub = $_POST['petugasub'];
mysqli_query($connect, "update y_penyelenggaraan set z_idprogram='$kode0', z_kodepenyelenggaraan='$kode', z_namapenyelenggaraan='$programK', z_keterangan='$ketK', z_dc='$tgltb', z_pb='$petugastb', z_dm='$tglub', z_pg='$petugasub' where z_idpenyelenggaraan='$id'");
echo SUbahMsgPy();
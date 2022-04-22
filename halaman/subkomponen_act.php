<title>Verifikasi Data</title>
<link rel="icon" type="image/x-icon" href="images/pavicon.png" />
<?php 
include '../koneksi.php';
include '../function/pesan_dalam.php';
$kode0 = $_POST['kode0'];
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$namaK = ucwords($nama);
$vol = $_POST['vol'];
$sat = $_POST['sat'];
$satK = ucwords($sat);
$ket = $_POST['ket'];
$ketK = ucwords($ket);
$tgltb = $_POST['tgltb'];
$petugastb = $_POST['petugastb'];
$tglub = '0000-00-00 00:00:00';
$petugasub = '0';
mysqli_query($connect, "insert into y_subkomponen values (NULL,'$kode0','$kode','$namaK','$vol','$satK','0','0','0','0','$ketK','$tgltb','$tglub','$petugastb','$petugasub')");
echo STambahMsgSK();
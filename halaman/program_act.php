<title>Verifikasi Data</title>
<link rel="icon" type="image/x-icon" href="images/pavicon.png" />
<?php 
include '../koneksi.php';
include '../function/pesan_dalam.php';
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$namaK = ucwords($nama);
$ket = $_POST['ket'];
$ketK = ucwords($ket);
$tgltb = $_POST['tgltb'];
$petugastb = $_POST['petugastb'];
$tglub = '0000-00-00 00:00:00';
$petugasub = '0';
mysqli_query($connect, "insert into y_program values (NULL,'$kode','$namaK','$ketK','$tgltb','$tglub','$petugastb','$petugasub')");
echo STambahMsgPr();
<title>Verifikasi Data</title>
<link rel="icon" type="image/x-icon" href="images/pavicon.png" />
<?php 
include '../koneksi.php';
include '../function/pesan_dalam.php';
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$alamat = $_POST['alamat'];
$nik = $_POST['nik'];
$tlp = $_POST['tlp'];
$tl = $_POST['tl'];
$jekel = $_POST['jekel'];
$level = $_POST['level'];
$tgltb = $_POST['tgltb'];
$tglub = $_POST['tglub'];
$petugastb = $_POST['petugastb'];
$petugasub = $_POST['petugasub'];
	mysqli_query($connect, "insert into y_admin values (NULL,'$nama','$username','$password','$alamat','$nik','$tlp','$tl','$jekel','$level','','$tgltb','$tglub','$petugastb','$petugasub')");
echo STambahMsgU();
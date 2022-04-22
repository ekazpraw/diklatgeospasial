<title>Verifikasi Data</title>
<link rel="icon" type="image/x-icon" href="../images/pavicon.png" />
<?php 
include '../koneksi.php';
include '../function/pesan_dalam.php';
$id  = $_POST['id'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$alamat = $_POST['alamat'];
$nik = $_POST['nik'];
$tlp = $_POST['tlp'];
$tl = $_POST['tl'];
$jekel = $_POST['jekel'];
$level = $_POST['level'];
$tgltb = $_POST['tgltb'];
$petugastb = $_POST['petugastb'];
$tglub = $_POST['tglub'];
$petugasub = $_POST['petugasub'];
$data = mysqli_query($connect, "select * from y_admin where z_idadmin='$id'");
$d = mysqli_fetch_assoc($data);
mysqli_query($connect, "update y_admin set z_namalengkap='$nama', z_namapengguna='$username', z_alamat='$alamat', z_nik='$nik', z_tlp='$tlp', z_tl='$tl', z_jekel='$jekel', z_level='$level', z_dc='$tgltb', z_pb='$petugastb', z_dm='$tglub', z_pg='$petugasub' where z_idadmin='$id'");		
echo SUbahMsgU();
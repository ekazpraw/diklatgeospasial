<title>Verifikasi Data</title>
<link rel="icon" type="image/x-icon" href="images/pavicon.png" />
<?php 
include '../koneksi.php';
include '../function/pesan_dalam.php';
$idp  = $_POST['idp'];
$tglc = $_POST['tglc'];
$tgls = $_POST['tgls'];
$nosp2d = $_POST['nosp2d'];
$tgls2 = $_POST['tgls2'];
$tgltb = $_POST['tgltb'];
$petugastb = $_POST['petugastb'];
$tglub = $_POST['tglub'];
$petugasub = $_POST['petugasub'];
mysqli_query($connect, "update y_pengajuan set z_tglc='$tglc', z_tgls='$tgls', z_nosp2d='$nosp2d', z_tgls2='$tgls2', z_dc='$tgltb', z_pb='$petugastb', z_dm='$tglub', z_pg='$petugasub' where z_idp='$idp'");
echo STambahMsgPRK();
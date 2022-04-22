<title>Verifikasi Data</title>
<link rel="icon" type="image/x-icon" href="images/pavicon.png" />
<?php 
include '../koneksi.php';
include '../function/pesan_dalam.php';
$idp  = $_POST['idp'];
$tglp = $_POST['tglp'];
$urap = $_POST['urap'];
$KUrap = ucwords($urap);
$lsgu = $_POST['lsgu'];
$cat = $_POST['cat'];
$catK = ucwords($cat);
$tgltb = $_POST['tgltb'];
$petugastb = $_POST['petugastb'];
$tglub = $_POST['tglub'];
$petugasub = $_POST['petugasub'];
mysqli_query($connect, "update y_pengajuan set z_tglp='$tglp', z_uraip='$KUrap', z_plsgu='$lsgu', z_pcatatan='$catK', z_dc='$tgltb', z_pb='$petugastb', z_dm='$tglub', z_pg='$petugasub' where z_idp='$idp'");
echo SUbahMsgPRK();
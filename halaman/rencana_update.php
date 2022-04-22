<title>Verifikasi Data</title>
<link rel="icon" type="image/x-icon" href="images/pavicon.png" />
<?php 
include '../koneksi.php';
include '../function/pesan_dalam.php';
$idr  = $_POST['idr'];
$nk = $_POST['nk'];
$Knk = ucwords($nk);
$kbk = $_POST['kbk'];
$Kkbk = ucwords($kbk);
$lsgu = $_POST['lsgu'];
$cat = $_POST['cat'];
$catK = ucwords($cat);
$idg = $_POST['ID'];
$tgltb = $_POST['tgltb'];
$petugastb = $_POST['petugastb'];
$tglub = $_POST['tglub'];
$petugasub = $_POST['petugasub'];
mysqli_query($connect, "update y_rencana set z_nk='$Knk', z_kbk='$Kkbk', z_rlsgu='$lsgu', z_rcatatan='$catK', z_rID='$idg', z_dc='$tgltb', z_pb='$petugastb', z_dm='$tglub', z_pg='$petugasub' where z_idr='$idr'");
echo SUbahMsgKR();
<title>Verifikasi Data</title>
<link rel="icon" type="image/x-icon" href="images/pavicon.png" />
<?php 
include '../koneksi.php';
include '../function/pesan_dalam.php';
$id  = $_POST['id'];
$pwd = md5($_POST["sandi"]);
$tglub = $_POST['tglub'];
$petugasub = $_POST['petugasub'];
if(empty ($_POST["sandi"])){
    echo GGantiPwdMsg();
}else{
    mysqli_query($connect, "update y_admin set z_sandi='$pwd', z_dm='$tglub', z_pg='$petugasub' where z_idadmin='$id'");
    echo SGantiPwdMsg();
}
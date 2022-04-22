<title>Verifikasi Masuk</title>
<link rel="icon" type="image/x-icon" href="images/pavicon.png" />
<?php
session_start();
include "koneksi.php";
include "function/pesan_luar.php";
$nik = $_POST["nik"];
$password = md5($_POST["password"]);
if ($_POST){
    $queryuser = mysqli_query($connect, "SELECT * FROM y_admin WHERE z_nik='$nik' AND z_sandi='$password'");
    $user = mysqli_fetch_array($queryuser);
if(mysqli_num_rows($queryuser) > 0){
    $nama = $user["z_namalengkap"];
    $_SESSION["id_pengguna"] = $user["z_idadmin"];
    $_SESSION["nik"] = $user["z_nik"];
    $_SESSION['nama'] = $user["z_namalengkap"];
    $_SESSION["username"] = $user["z_namapengguna"];
    $_SESSION["password"] = $user["z_sandi"];
    $_SESSION["level"] = $user["z_level"];
    $_SESSION["foto"] = $user["z_foto"];
    $_SESSION['status'] = "Sedang Aktif";
    echo SuksesMasukMsg();
}else{
    echo GagalMasukMsg();
}
}
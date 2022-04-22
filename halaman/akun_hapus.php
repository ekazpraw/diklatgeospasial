<title>Verifikasi Data</title>
<link rel="icon" type="image/x-icon" href="images/pavicon.png" />
<?php 
include '../koneksi.php';
include '../function/pesan_dalam.php';
$id = $_GET['id'];
$data = mysqli_query($connect, "select * from y_akun where z_idakun='$id'");
$d = mysqli_fetch_assoc($data);
mysqli_query($connect, "delete from y_akun where z_idakun='$id'");
mysqli_query($connect, "ALTER TABLE y_akun ORDER BY z_idakun");
mysqli_query($connect, "SET @count:=0");
mysqli_query($connect, "UPDATE y_akun SET z_idakun=@count:=@count+1");
mysqli_query($connect, "ALTER TABLE y_akun AUTO_INCREMENT=1");
echo SHapusMsgA();
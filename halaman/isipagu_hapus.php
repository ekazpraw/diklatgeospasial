<title>Verifikasi Data</title>
<link rel="icon" type="image/x-icon" href="images/pavicon.png" />
<?php 
include '../koneksi.php';
include '../function/pesan_dalam.php';
$id = $_GET['id'];
$data = mysqli_query($connect, "select * from y_isipagu where z_idpagu='$id'");
$d = mysqli_fetch_assoc($data);
mysqli_query($connect, "delete from y_isipagu where z_idpagu='$id'");
mysqli_query($connect, "ALTER TABLE y_isipagu ORDER BY z_idpagu");
mysqli_query($connect, "SET @count:=0");
mysqli_query($connect, "UPDATE y_isipagu SET z_idpagu=@count:=@count+1");
mysqli_query($connect, "ALTER TABLE y_isipagu AUTO_INCREMENT=1");
echo SHapusMsgIP();
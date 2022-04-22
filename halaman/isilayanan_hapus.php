<title>Verifikasi Data</title>
<link rel="icon" type="image/x-icon" href="images/pavicon.png" />
<?php 
include '../koneksi.php';
include '../function/pesan_dalam.php';
$id = $_GET['id'];
$data = mysqli_query($connect, "select * from y_isilayanan where z_idisilayanan='$id'");
$d = mysqli_fetch_assoc($data);
mysqli_query($connect, "delete from y_isilayanan where z_idisilayanan='$id'");
mysqli_query($connect, "ALTER TABLE y_isilayanan ORDER BY z_idisilayanan");
mysqli_query($connect, "SET @count:=0");
mysqli_query($connect, "UPDATE y_isilayanan SET z_idisilayanan=@count:=@count+1");
mysqli_query($connect, "ALTER TABLE y_isilayanan AUTO_INCREMENT=1");
echo SHapusMsgIL();
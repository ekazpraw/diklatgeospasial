<title>Verifikasi Data</title>
<link rel="icon" type="image/x-icon" href="images/pavicon.png" />
<?php 
include '../koneksi.php';
include '../function/pesan_dalam.php';
$id = $_GET['id'];
$data = mysqli_query($connect, "select * from y_layanan where z_idlayanan='$id'");
$d = mysqli_fetch_assoc($data);
mysqli_query($connect, "delete from y_layanan where z_idlayanan='$id'");
mysqli_query($connect, "ALTER TABLE y_layanan ORDER BY z_idlayanan");
mysqli_query($connect, "SET @count:=0");
mysqli_query($connect, "UPDATE y_layanan SET z_idlayanan=@count:=@count+1");
mysqli_query($connect, "ALTER TABLE y_layanan AUTO_INCREMENT=1");
echo SHapusMsgL();
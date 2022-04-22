<title>Verifikasi Data</title>
<link rel="icon" type="image/x-icon" href="images/pavicon.png" />
<?php 
include '../koneksi.php';
include '../function/pesan_dalam.php';
$id = $_GET['id'];
$data = mysqli_query($connect, "select * from y_pengajuan where z_idp='$id'");
$d = mysqli_fetch_assoc($data);
mysqli_query($connect, "delete from y_pengajuan where z_idp='$id'");
mysqli_query($connect, "ALTER TABLE y_pengajuan ORDER BY z_idp");
mysqli_query($connect, "SET @count:=0");
mysqli_query($connect, "UPDATE y_pengajuan SET z_idp=@count:=@count+1");
mysqli_query($connect, "ALTER TABLE y_pengajuan AUTO_INCREMENT=1");
echo SHapusMsgPRK();
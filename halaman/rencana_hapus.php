<title>Verifikasi Data</title>
<link rel="icon" type="image/x-icon" href="images/pavicon.png" />
<?php 
include '../koneksi.php';
include '../function/pesan_dalam.php';
$id = $_GET['id'];
$data = mysqli_query($connect, "select * from y_rencana where z_idr='$id'");
$d = mysqli_fetch_assoc($data);
mysqli_query($connect, "delete from y_rencana where z_idr='$id'");
mysqli_query($connect, "ALTER TABLE y_rencana ORDER BY z_idr");
mysqli_query($connect, "SET @count:=0");
mysqli_query($connect, "UPDATE y_rencana SET z_idr=@count:=@count+1");
mysqli_query($connect, "ALTER TABLE y_rencana AUTO_INCREMENT=1");
echo SHapusMsgKR();
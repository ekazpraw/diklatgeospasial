<title>Verifikasi Data</title>
<link rel="icon" type="image/x-icon" href="images/pavicon.png" />
<?php 
include '../koneksi.php';
include '../function/pesan_dalam.php';
$id = $_GET['id'];
$data = mysqli_query($connect, "select * from y_program where z_idprogram='$id'");
$d = mysqli_fetch_assoc($data);
mysqli_query($connect, "delete from y_program where z_idprogram='$id'");
mysqli_query($connect, "ALTER TABLE y_program ORDER BY z_idprogram");
mysqli_query($connect, "SET @count:=0");
mysqli_query($connect, "UPDATE y_program SET z_idprogram=@count:=@count+1");
mysqli_query($connect, "ALTER TABLE y_program AUTO_INCREMENT=1");
echo SHapusMsgPr();
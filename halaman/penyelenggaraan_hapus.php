<title>Verifikasi Data</title>
<link rel="icon" type="image/x-icon" href="images/pavicon.png" />
<?php 
include '../koneksi.php';
include '../function/pesan_dalam.php';
$id = $_GET['id'];
$data = mysqli_query($connect, "select * from y_penyelenggaraan where z_idpenyelenggaraan='$id'");
$d = mysqli_fetch_assoc($data);
mysqli_query($connect, "delete from y_penyelenggaraan where z_idpenyelenggaraan='$id'");
mysqli_query($connect, "ALTER TABLE y_penyelenggaraan ORDER BY z_idpenyelenggaraan");
mysqli_query($connect, "SET @count:=0");
mysqli_query($connect, "UPDATE y_penyelenggaraan SET z_idpenyelenggaraan=@count:=@count+1");
mysqli_query($connect, "ALTER TABLE y_penyelenggaraan AUTO_INCREMENT=1");
echo SHapusMsgPy();
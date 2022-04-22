<title>Verifikasi Data</title>
<link rel="icon" type="image/x-icon" href="images/pavicon.png" />
<?php 
include '../koneksi.php';
include '../function/pesan_dalam.php';
$id = $_GET['id'];
$data = mysqli_query($connect, "select * from y_komponen where z_idkomponen='$id'");
$d = mysqli_fetch_assoc($data);
mysqli_query($connect, "delete from y_komponen where z_idkomponen='$id'");
mysqli_query($connect, "ALTER TABLE y_komponen ORDER BY z_idkomponen");
mysqli_query($connect, "SET @count:=0");
mysqli_query($connect, "UPDATE y_komponen SET z_idkomponen=@count:=@count+1");
mysqli_query($connect, "ALTER TABLE y_komponen AUTO_INCREMENT=1");
echo SHapusMsgK();
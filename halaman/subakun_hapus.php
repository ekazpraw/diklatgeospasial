<title>Verifikasi Data</title>
<link rel="icon" type="image/x-icon" href="images/pavicon.png" />
<?php 
include '../koneksi.php';
include '../function/pesan_dalam.php';
$id = $_GET['id'];
$data = mysqli_query($connect, "select * from y_subakun where z_idsubakun='$id'");
$d = mysqli_fetch_assoc($data);
mysqli_query($connect, "delete from y_subakun where z_idsubakun='$id'");
mysqli_query($connect, "ALTER TABLE y_subakun ORDER BY z_idsubakun");
mysqli_query($connect, "SET @count:=0");
mysqli_query($connect, "UPDATE y_subakun SET z_idsubakun=@count:=@count+1");
mysqli_query($connect, "ALTER TABLE y_subakun AUTO_INCREMENT=1");
echo SHapusMsgSA();
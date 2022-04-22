<title>Verifikasi Data</title>
<link rel="icon" type="image/x-icon" href="images/pavicon.png" />
<?php 
include '../koneksi.php';
include '../function/pesan_dalam.php';
$id = $_GET['id'];
$data = mysqli_query($connect, "select * from y_subkomponen where z_idsubkomponen='$id'");
$d = mysqli_fetch_assoc($data);
mysqli_query($connect, "delete from y_subkomponen where z_idsubkomponen='$id'");
mysqli_query($connect, "ALTER TABLE y_subkomponen ORDER BY z_idsubkomponen");
mysqli_query($connect, "SET @count:=0");
mysqli_query($connect, "UPDATE y_subkomponen SET z_idsubkomponen=@count:=@count+1");
mysqli_query($connect, "ALTER TABLE y_subkomponen AUTO_INCREMENT=1");
echo SHapusMsgSK();
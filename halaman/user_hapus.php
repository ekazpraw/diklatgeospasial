<title>Verifikasi Data</title>
<link rel="icon" type="image/x-icon" href="images/pavicon.png" />
<?php 
include '../koneksi.php';
include '../function/pesan_dalam.php';
$id = $_GET['id'];
$data = mysqli_query($connect, "select * from y_admin where z_idadmin='$id'");
$d = mysqli_fetch_assoc($data);
$foto = $d['z_foto'];
unlink("../foto/$foto");
mysqli_query($connect, "delete from y_admin where z_idadmin='$id'");
mysqli_query($connect, "ALTER TABLE y_admin ORDER BY z_idadmin");
mysqli_query($connect, "SET @count:=0");
mysqli_query($connect, "UPDATE y_admin SET z_idadmin=@count:=@count+1");
mysqli_query($connect, "ALTER TABLE y_admin AUTO_INCREMENT=1");
echo SHapusMsgU();
<title>Verifikasi Data</title>
<link rel="icon" type="image/x-icon" href="../images/pavicon.png" />
<?php 
include '../koneksi.php';
include '../function/pesan_dalam.php';
$id  = $_POST['id'];
$tgltb = $_POST['tgltb'];
$petugastb = $_POST['petugastb'];
$tglub = $_POST['tglub'];
$petugasub = $_POST['petugasub'];
$data = mysqli_query($connect, "select * from y_admin where z_idadmin='$id'");
$d = mysqli_fetch_assoc($data);
$foto = $d['z_foto'];
$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');
$filename = $_FILES['foto']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
if($filename==""){
	echo GGantiFotoMsg();
}else{
    unlink("../foto/$foto");
    move_uploaded_file($_FILES['foto']['tmp_name'], '../foto/'.$rand.'_GEOSPASIAL_'.$filename);
    $x = $rand.'_GEOSPASIAL_'.$filename;
    mysqli_query($connect, "update y_admin set z_foto='$x', z_dc='$tgltb', z_pb='$petugastb', z_dm='$tglub', z_pg='$petugasub' where z_idadmin='$id'");		
	echo SGantiFotoMsg();
}
<?php 
include '../koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($connect, "select * from y_uraian where z_idurai='$id'");
$d = mysqli_fetch_assoc($data);
mysqli_query($connect, "delete from y_uraian where z_idurai='$id'");
mysqli_query($connect, "ALTER TABLE y_uraian ORDER BY z_idurai");
mysqli_query($connect, "SET @count:=0");
mysqli_query($connect, "UPDATE y_uraian SET z_idurai=@count:=@count+1");
mysqli_query($connect, "ALTER TABLE y_uraian AUTO_INCREMENT=1");
header("location: uraian.php");
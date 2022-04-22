<?php 
include '../koneksi.php';
$kode = $_POST['kode'];
$uraian = $_POST['urai'];
$uraiK = ucwords($uraian);
$ket = $_POST['ket'];
$ketK = ucwords($ket);
$tgltb = $_POST['tgltb'];
$petugastb = $_POST['petugastb'];
$tglub = '0000-00-00 00:00:00';
$petugasub = '0';
mysqli_query($connect, "insert into y_uraian values (NULL,'$kode','$uraiK','0','0','$ketK','$tgltb','$tglub','$petugastb','$petugasub')");
header("location: uraian.php");
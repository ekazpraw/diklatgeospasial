<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$kode = $_POST['kode'];
$uraian = $_POST['urai'];
$uraiK = ucwords($uraian);
$ket = $_POST['ket'];
$ketK = ucwords($ket);
$j = $_POST['j'];
$t = $_POST['t'];
$tgltb = $_POST['tgltb'];
$petugastb = $_POST['petugastb'];
$tglub = $_POST['tglub'];
$petugasub = $_POST['petugasub'];
mysqli_query($connect, "update y_uraian set z_kodeurai='$kode', z_namaurai='$uraiK', z_jmllayanan='$j', z_total='$t', z_keterangan='$ketK', z_dc='$tgltb', z_pb='$petugastb', z_dm='$tglub', z_pg='$petugasub' where z_idurai='$id'");
header("location: uraian.php?alert=Ubah Data Berhasil!");
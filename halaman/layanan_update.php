<title>Verifikasi Data</title>
<link rel="icon" type="image/x-icon" href="images/pavicon.png" />
<?php 
include '../koneksi.php';
include '../function/pesan_dalam.php';
$id  = $_POST['id'];
$kode0 = $_POST['kode0'];
$kode = $_POST['kode'];
$program = $_POST['nama'];
$programK = ucwords($program);
$vol = $_POST['vol'];
$sat = $_POST['sat'];
$satK = ucwords($sat);
$ket = $_POST['ket'];
$ketK = ucwords($ket);
$f = $_POST['f'];
$u = $_POST['u'];
$c = $_POST['c'];
$k = $_POST['k'];
$tgltb = $_POST['tgltb'];
$petugastb = $_POST['petugastb'];
$tglub = $_POST['tglub'];
$petugasub = $_POST['petugasub'];
mysqli_query($connect, "update y_layanan set z_idpenyelenggaraan='$kode0', z_kodelayanan='$kode', z_namalayanan='$programK', z_volumel='$vol', z_satuanl='$sat', z_pagul='$f', z_jmlrealisasil='$u', z_jmlsaldol='$c', z_rjmlsaldol='$k', z_keteranganl='$ketK', z_dc='$tgltb', z_pb='$petugastb', z_dm='$tglub', z_pg='$petugasub' where z_idlayanan='$id'");
echo SUbahMsgL();
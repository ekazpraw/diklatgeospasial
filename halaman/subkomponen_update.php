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
mysqli_query($connect, "update y_subkomponen set z_idkomponen='$kode0', z_kodesubkomponen='$kode', z_namasubkomponen='$programK', z_volumesk='$vol', z_satuansk='$sat', z_pagusk='$f', z_jmlrealisasisk='$u', z_jmlsaldosk='$c', z_rjmlsaldosk='$k', z_keterangansk='$ketK', z_dc='$tgltb', z_pb='$petugastb', z_dm='$tglub', z_pg='$petugasub' where z_idsubkomponen='$id'");
echo SUbahMsgSK();
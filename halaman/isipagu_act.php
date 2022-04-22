<title>Verifikasi Data</title>
<link rel="icon" type="image/x-icon" href="images/pavicon.png" />
<?php 
include '../koneksi.php';
include '../function/pesan_dalam.php';
$kode0 = $_POST['kode0'];
$kode01 = $_POST['kode01'];
$kode02 = $_POST['kode02'];
$kode03 = $_POST['kode03'];
$kode04 = $_POST['kode04'];
$kode05 = $_POST['kode05'];
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$namaK = ucwords($nama);
$ket = $_POST['ket'];
$ketK = ucwords($ket);
$vol = $_POST['vol'];
$sat = $_POST['sat'];
$satK = ucwords($sat);
$hars = $_POST['hars'];
$pagu = $_POST['pagu'];
$tgltb = $_POST['tgltb'];
$petugastb = $_POST['petugastb'];
$tglub = '0000-00-00 00:00:00';
$petugasub = '0';
$isiquery = mysqli_query($connect, "insert into y_isipagu values(
    NULL,
    '$kode0',
    '$kode01',
    '$kode02',
    '$kode03',
    '$kode04',
    '$kode05',
    '$kode',
    '$namaK',
    '$vol',
    '$satK',
    '$hars',
    '$pagu',
    '$ketK',
    '$tgltb',
    '$tglub',
    '$petugastb',
    '$petugasub'
    )");
echo STambahMsgIP();
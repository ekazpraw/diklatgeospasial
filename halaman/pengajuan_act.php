<title>Verifikasi Data</title>
<link rel="icon" type="image/x-icon" href="images/pavicon.png" />
<?php 
include '../koneksi.php';
include '../function/pesan_dalam.php';
$tglp = $_POST['tglp'];
$urap = $_POST['urap'];
$KUrap = ucwords($urap);
$kode0 = $_POST['kode0'];
$kode01 = $_POST['kode01'];
$kode02 = $_POST['kode02'];
$kode03 = $_POST['kode03'];
$kode04 = $_POST['kode04'];
$nom = $_POST['nominal'];
$sal = $_POST['saldo'];
$lsgu = $_POST['lsgu'];
$cat = $_POST['cat'];
$catK = ucwords($cat);
$idg = $_POST['ID'];
$tglc = '0000-00-00';
$tgls = '0000-00-00';
$nosp2d = '-';
$tgls2 = '0000-00-00';
$tgltb = $_POST['tgltb'];
$petugastb = $_POST['petugastb'];
$tglub = '0000-00-00 00:00:00';
$petugasub = '0';
$rbp = $_POST['rbp'];
if($rbp=="Januari"){ $mon = "1"; }
elseif($rbp=="Februari"){ $mon = "2"; }
elseif($rbp=="Maret"){ $mon = "3"; }
elseif($rbp=="April"){ $mon = "4"; }
elseif($rbp=="Mei"){ $mon = "5"; }
elseif($rbp=="Juni"){ $mon = "6"; }
elseif($rbp=="Juli"){ $mon = "7"; }
elseif($rbp=="Agustus"){ $mon = "8"; }
elseif($rbp=="September"){ $mon = "9"; }
elseif($rbp=="Oktober"){ $mon = "10"; }
elseif($rbp=="November"){ $mon = "11"; }
elseif($rbp=="Desember"){ $mon = "12"; }
else{ $mon = "0"; }
mysqli_query($connect, "insert into y_pengajuan values (NULL,'$tglp','$KUrap','$kode0','$kode01','$kode02','$kode03','$kode04','$nom','$sal','$lsgu','$catK','$mon','$idg','$tglc','$tgls','$nosp2d','$tgls2','$tgltb','$tglub','$petugastb','$petugasub')");
echo STambahMsgPRK();
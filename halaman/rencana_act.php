<title>Verifikasi Data</title>
<link rel="icon" type="image/x-icon" href="images/pavicon.png" />
<?php 
include '../koneksi.php';
include '../function/pesan_dalam.php';
$rbp = $_POST['rbp'];
$nk = $_POST['nk'];
$Knk = ucwords($nk);
$kbk = $_POST['kbk'];
$Kkbk = ucwords($kbk);
$kode0 = $_POST['kode0'];
$kode01 = $_POST['kode01'];
$kode02 = $_POST['kode02'];
$kode03 = $_POST['kode03'];
$kode04 = $_POST['kode04'];
$js = $_POST['js'];
$hars = $_POST['hars'];
$nom = $_POST['nominal'];
$sal = $_POST['psr'];
$lsgu = $_POST['lsgu'];
$cat = $_POST['cat'];
$catK = ucwords($cat);
$idg = $_POST['ID'];
$tgltb = $_POST['tgltb'];
$petugastb = $_POST['petugastb'];
$tglub = '0000-00-00 00:00:00';
$petugasub = '0';
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
mysqli_query($connect, "insert into y_rencana values (NULL,'$rbp','$Knk','$Kkbk','$kode0','$kode01','$kode02','$kode03','$kode04','$js','$hars','$nom','$sal','$lsgu','$catK','$mon','$idg','$tgltb','$tglub','$petugastb','$petugasub')");
echo STambahMsgKR();
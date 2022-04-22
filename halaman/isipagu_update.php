<title>Verifikasi Data</title>
<link rel="icon" type="image/x-icon" href="images/pavicon.png" />
<?php 
include '../koneksi.php';
include '../function/pesan_dalam.php';
$id  = $_POST['id'];
$kode0 = $_POST['kode0'];
$kode01 = $_POST['kode01'];
$kode02 = $_POST['kode02'];
$kode03 = $_POST['kode03'];
$kode04 = $_POST['kode04'];
$kode05 = $_POST['kode05'];
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$namaK = ucwords($nama);
$vol = $_POST['vol'];
$sat = $_POST['sat'];
$satK = ucwords($sat);
$hars = $_POST['hars'];
$pagu = $_POST['pagu'];
$ket = $_POST['ket'];
$ketK = ucwords($ket);
$tgltb = $_POST['tgltb'];
$petugastb = $_POST['petugastb'];
$tglub = $_POST['tglub'];
$petugasub = $_POST['petugasub'];
$isiquery = mysqli_query($connect, "update y_isipagu set 
    z_idsubakun='$kode0', 
    z_idakun='$kode01', 
    z_idsubkomponen='$kode02', 
    z_idkomponen='$kode03', 
    z_idisilayanan='$kode04', 
    z_idlayanan='$kode05', 
    z_kodepagu='$kode', 
    z_namapagu='$namaK',  
    z_volumeip='$vol', 
    z_satuanip='$satK', 
    z_hargasatuanip='$hars', 
    z_paguip='$pagu', 
    z_keteranganip='$ketK',
    z_dc='$tgltb', 
    z_pb='$petugastb', 
    z_dm='$tglub', 
    z_pg='$petugasub' 
where z_idpagu='$id'");
echo SUbahMsgIP();
<?php 
    session_start();
    include '../koneksi.php';
    include '../function/hari_kalender.php';
if(isset($_GET['tanggal_dari']) && isset($_GET['tanggal_sampai'])){
    $tgl_dari = $_GET['tanggal_dari'];
    $tgl_sampai = $_GET['tanggal_sampai'];
?>
<?php }else{ ?>
<?php } ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo "Rekap Data Pengajuan: Dari Tanggal $tgl_dari Sampai $tgl_sampai" ?></title>
    <link rel="icon" href="../images/pavicon.png" sizes="400x400" type="image/png">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/bower_components/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="../assets/bower_components/Ionicons/css/ionicons.min.css">
<link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="../assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="../assets/dist/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="../assets/bower_components/morris.js/morris.css">
<link rel="stylesheet" href="../assets/bower_components/jvectormap/jquery-jvectormap.css">
<link rel="stylesheet" href="../assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="../assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<style type="text/css">
    body{ font-family: sans-serif; }
    .table{ width: 100%; }
    th,td{ }
    .table,
    .table th,
    .table td {
        padding: 5px;
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>
<center>
    <img src="../images/kop.jpg" width="150px" height="150px">
    <h4>
        <font color="black"><b>GEOSPASIAL V.1 - <?php echo date('Y') ?></b></font>
        <br>Badan Informasi Geospasial
        <br>JL. Raya Jakarta - Bogor KM 46, Cibinong 16911
    </h4>
<p>======================================================================================</p>
</center>
    <b>Pengambilan Data Dari:</b>
    <br>
<?php 
include '../koneksi.php';
if(isset($_GET['tanggal_dari']) && isset($_GET['tanggal_sampai'])){
date_default_timezone_set("Asia/Jakarta");
    $tgl_dari = $_GET['tanggal_dari'];
    $tgl_sampai = $_GET['tanggal_sampai'];
?>
    <table class="table table-bordered table-striped">
        <tr>
            <th width="30%">Dari Tanggal</th>
            <th width="1%">:</th>
            <td><?php echo $tgl_dari; ?></td>
        </tr>
        <tr>
            <th>Hingga Tanggal</th>
            <th>:</th>
            <td><?php echo $tgl_sampai; ?></td>
        </tr>
    </table>  
    <b>Rincian Data:</b>
    <table class="table table-bordered table-striped" id="table-datatable0">
        <thead>
        <tr>
            <th width="1%">No:</th>
            <th>Tanggal Pengajuan:</th>
            <th>Uraian Pengajuan:</th>
            <th>Nama Akun:</th>
            <th>Nama Sub Komponen:</th>
            <th>Nominal:</th>
            <th>Sisa Saldo Realisasi:</th>
            <th>LS/GU:</th>
            <th>Catatan:</th>
            <th>Bulan:</th>
            <th>Tanggal Cair:</th>
            <th>Tanggal SPP:</th>
            <th>Nomor SP2D:</th>
            <th>Tanggal SP2D:</th>
            <th>Dibuat Oleh:</th>
            <th>Diubah Oleh:</th>
        </tr>
        </thead>
        <tbody>
        <?php 
            $no = 1;
            $data = mysqli_query($connect, "SELECT * FROM y_pengajuan 
                    INNER JOIN y_akun
                    ON y_akun.z_idakun = y_pengajuan.z_idakun
                    INNER JOIN y_subkomponen
                    ON y_subkomponen.z_idsubkomponen = y_pengajuan.z_idsubkomponen
                    INNER JOIN y_komponen
                    ON y_komponen.z_idkomponen = y_pengajuan.z_idkomponen
                    INNER JOIN y_isilayanan
                    ON y_isilayanan.z_idisilayanan = y_pengajuan.z_idisilayanan
                    INNER JOIN y_layanan
                    ON y_layanan.z_idlayanan = y_pengajuan.z_idlayanan
                    WHERE date(z_tglp) >= '$tgl_dari' AND date(z_tglp) <= '$tgl_sampai'");
            while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['z_tglp']; ?></td>
            <td><?php echo $d['z_uraip']; ?></td>
            <td><?php echo $d['z_namaakun']; ?></td>
            <td><?php echo $d['z_namasubkomponen']; ?></td>
            <td><?php if($d['z_pnominal'] == "0"){ echo "Tidak Ada Nominal"; }else{ echo $d['z_pnominal']; } ?></td>
            <td><?php if($d['z_psaldo'] == "0"){ echo "Saldo Habis"; }else{ echo 'Rp. '.number_format($d['z_psaldo'], 2, ",", "."); } ?></td>
            <td><?php echo $d['z_plsgu']; ?></td>
            <td><?php if($d['z_pcatatan'] == ""){ echo "Tidak Ada Catatan"; }else{ echo $d['z_pcatatan']; } ?></td>
            <td><?php echo $d['z_pmonth']; ?></td>
            <td><?php if($d['z_tglc'] == "0000-00-00"){ echo "Belum Ada Tanggal Cair"; }else{ echo $d['z_tglc']; } ?></td>
            <td><?php if($d['z_tgls'] == "0000-00-00"){ echo "Belum Ada Tanggal SPP"; }else{ echo $d['z_tgls']; } ?></td>
            <td><?php if($d['z_nosp2d'] == "-"){ echo "Belum Ada Nomor SP2D"; }else{ echo $d['z_nosp2d']; } ?></td>
            <td><?php if($d['z_tgls2'] == "0000-00-00"){ echo "Belum Ada Tanggal SP2D"; }else{ echo $d['z_tgls2']; } ?></td>
            <td><?php echo $d['z_pb']." (Pada: ".$d['z_dc'].")"; ?></td>
            <td><?php if($d['z_pg'] == "0"){ echo "Data Belum Pernah Diubah"; }else{ echo $d['z_pg']." (Pada: ".$d['z_dm'].")"; } ?></td>
        </tr>
        <?php } ?>
        </tbody>
        </table>
<?php }else{ ?>
<br>
<div class="alert alert-danger text-center">
    Data Tidak Tersedia, Silahkan Filter Laporan Terlebih Dulu.
</div>
<?php } ?>
</body>
<footer>
    <div align="right">
        Badan Informasi Geospasial - <a href="www.alamatsitus.com">Diklat Geospasial</a>
    </div>
    <strong>Dicetak Oleh: <?php echo $_SESSION['nama'].' - '.$_SESSION['nik']; ?></strong><br>
    <strong>Dicetak Pada: <?php echo indonesian_date('l') ?>, Jam: <?php echo date('H:i:s A') ?></strong>
</footer>
    <script> 
        var css = '@page { size: landscape; }',
            head = document.head || document.getElementsByTagName('head')[0],
            style = document.createElement('style');
            style.type = 'text/css';
            style.media = 'print';
        if (style.styleSheet){
            style.styleSheet.cssText = css;
        }else{
            style.appendChild(document.createTextNode(css));
        }
            head.appendChild(style);
        window.print();
    </script>
</html>
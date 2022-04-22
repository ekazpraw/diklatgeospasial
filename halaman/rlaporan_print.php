<?php 
    session_start();
    include '../koneksi.php';
    include '../function/hari_kalender.php';
if(isset($_GET['kode0']) && isset($_GET['kode1'])){
    $ida = $_GET['kode0'];
    $data = mysqli_query($connect, "SELECT * FROM y_akun WHERE z_idakun = '$ida'");
    $id1 = mysqli_fetch_array($data);
    $id2 = $id1['z_namaakun'];
    $month = $_GET['kode1'];
?>
<?php }else{ ?>
<?php } ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo "Rekap Data Rencana Kegiatan  Dari (Akun $id2) Pada (Bulan $month)" ?></title>
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
if(isset($_GET['kode0']) && isset($_GET['kode1'])){
date_default_timezone_set("Asia/Jakarta");
    $ida = $_GET['kode0'];
    $data = mysqli_query($connect, "SELECT * FROM y_akun WHERE z_idakun = '$ida'");
    $id1 = mysqli_fetch_array($data);
    $id2 = $id1['z_namaakun'];
    $month = $_GET['kode1'];
?>
    <table class="table table-bordered table-striped" >
    <tr>
        <td width="20%">Nama Akun:</td>
        <td width="1%">:</td>
        <td><?php echo $id2; ?></td>
    </tr>
    <tr>
        <td>Pada Bulan</td>
        <td>:</td>
        <td><?php echo $month; ?></td>
    </tr>
    </table>
    <b>Rincian Data:</b>
    <br>
    <table class="table table-bordered table-striped" id="table-datatable0">
        <thead>
        <tr>
            <th width="1%">No:</th>
            <th>Rencana Bulan Pelaksanaan (Bulan):</th>
            <th>Nama Kegiatan:</th>
            <th>Komponen Kegiatan:</th>
            <th>Akun:</th>
            <th>Sub Komponen:</th>
            <th>Jumlah:</th>
            <th>Harga Satuan:</th>
            <th>Nominal:</th>
            <th>Saldo Rencana Realisasi:</th>
            <th>LS/GU:</th>
            <th>Catatan:</th>
            <th>ID:</th>
            <th>Dibuat Oleh:</th>
            <th>Diubah Oleh:</th>
        </tr>
        </thead>
        <tbody>
        <?php 
            $no = 1;
            $data = mysqli_query($connect, "SELECT * FROM y_rencana 
                    INNER JOIN y_akun
                    ON y_akun.z_idakun = y_rencana.z_idakun
                    INNER JOIN y_subkomponen
                    ON y_subkomponen.z_idsubkomponen = y_rencana.z_idsubkomponen
                    WHERE y_rencana.z_idakun = '$ida' AND y_rencana.z_rbp = '$month'"); 
            $data2 = mysqli_query($connect, "SELECT * FROM y_rencana WHERE y_rencana.z_idakun = '$ida' AND y_rencana.z_rbp = '$month'");
            $d2 = mysqli_fetch_array($data2);
            while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['z_rbp']." (Bulan ".$d['z_rmonth'].")"; ?></td>
            <td><?php echo $d['z_nk']; ?></td>
            <td><?php echo $d['z_kbk']; ?></td>
            <td><?php echo $d['z_namaakun']; ?></td>
            <td><?php echo $d['z_namasubkomponen']; ?></td>
            <td><?php if($d['z_rjml'] == "0"){ echo "Tidak Ada Jumlah"; }else{ echo $d['z_rjml']; } ?></td>
            <td><?php if($d2['z_rhargasatuan'] == "0"){ echo "Tidak Ada Harga Satuan"; }else{ echo 'Rp. '.number_format($d2['z_rhargasatuan'], 2, ",", "."); } ?></td>
            <td><?php if($d['z_rnominal'] == "0"){ echo "Tidak Ada Nominal"; }else{ echo 'Rp. '.number_format($d['z_rnominal'], 2, ",", "."); } ?></td>
            <td><?php if($d['z_rsaldo'] == "0"){ echo "Saldo Habis"; }else{ echo 'Rp. '.number_format($d['z_rsaldo'], 2, ",", "."); } ?></td>
            <td><?php echo $d['z_rlsgu']; ?></td>
            <td><?php echo $d['z_rcatatan']; ?></td>
            <td><?php echo $d['z_rID']; ?></td>
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
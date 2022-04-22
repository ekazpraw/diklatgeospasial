<?php include 'header.php'; ?>
<div class="content-wrapper">
<section class="content-header">
    <h1>
        LAPORAN RENCANA KEGIATAN
        <small>Data Laporan Rencana Kegiatan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Data Laporan Rencana Kegiatan</li>
    </ol>
</section>
<section class="content">
<div class="row">
<section class="col-lg-12">
<div class="box box-info">
    <div class="box-header">
        <h3 class="box-title">Filter Laporan:</h3>
    </div>
<div class="box-body">
    <form method="get" action="">
    <div class="row">
        <div class="col-md-3">
        <div class="form-group">
        <label>Kode Akun:</label>
            <select name="kode0" required="required" class="form-control" required="required">
            <option value="">- Pilih Kode Akun -</option>
        <?php 
            include '../koneksi.php';
            $data = mysqli_query($connect, "SELECT * FROM y_akun");
            while($d = mysqli_fetch_array($data)){
        ?>
            <option value="<?php echo $d['z_idakun']; ?>"><?php echo $d['z_namaakun']; ?></option>
        <?php } ?>
            </select>
        </div>
        </div>
        <div class="col-md-3">
        <div class="form-group">
        <label>Bulan:</label>
            <select name="kode1" required="required" class="form-control" required="required">
                <option value="">- Pilih Bulan -</option>
                <option value="Januari">Januari</option>
                <option value="Februari">Februari</option>
                <option value="Maret">Maret</option>
                <option value="April">April</option>
                <option value="Mei">Mei</option>
                <option value="Juni">Juni</option>
                <option value="Juli">Juli</option>
                <option value="Agustus">Agustus</option>
                <option value="September">September</option>
                <option value="Oktober">Oktober</option>
                <option value="November">November</option>
                <option value="Desember">Desember</option>
            </select>
        </div>
        </div>
        <div class="col-md-3">
        <div class="form-group">
        <label>Opsi:</label>
            <input type="submit" value="TAMPILKAN LAPORAN" class="btn btn-sm btn-success">
        </div>
        </div>        
            <?php 
            if(isset($_GET['kode0']) && isset($_GET['kode1'])){
                $ida = $_GET['kode0'];
                $data = mysqli_query($connect, "SELECT * FROM y_akun WHERE z_idakun = '$ida'");
                $id1 = mysqli_fetch_array($data);
                $id2 = $id1['z_namaakun'];
                $month = $_GET['kode1'];
            ?>
        <div class="col-md-2 col-lg-16">
        <div class="form-group">
        <label>&nbsp;</label>
            <a href="rlaporan_print.php?kode0=<?php echo $ida ?>&kode1=<?php echo $month ?>" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> &nbsp; CETAK / PDF LAPORAN</a> 
        </div>
        </div>
            <?php } ?>
    </div>
    </form>
</div>
</div>
    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">Laporan Rencana Kegiatan:</h3>
        </div>
    <div class="box-body">
    <?php 
        if(isset($_GET['kode0']) && isset($_GET['kode1'])){
            $ida = $_GET['kode0'];
            $data = mysqli_query($connect, "SELECT * FROM y_akun WHERE z_idakun = '$ida'");
            $id1 = mysqli_fetch_array($data);
            $id2 = $id1['z_namaakun'];
            $month = $_GET['kode1'];
    ?>
    <div class="row">
    <div class="col-lg-6">
        <table class="table table-bordered">
        <tr>
            <th width="30%">Nama Akun</th>
            <th width="1%">:</th>
            <td><?php echo $id2; ?></td>
        </tr>
        <tr>
            <th>Di Bulan</th>
            <th>:</th>
            <td><?php echo $month; ?></td>
        </tr>
        </table>              
    </div>
    </div>   
    <div class="table-responsive">
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
    </div>
    <?php }else{ ?>
    <div class="alert alert-danger text-center">
        Silahkan Filter Laporan Dengan Memasukkan Detail Terlebih Dahulu.
    </div>
    <?php } ?>
    </div>
    </div>
</section>
</div>
</section>
</div>
<?php include 'footer.php'; ?>
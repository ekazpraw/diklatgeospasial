<?php include 'header.php'; ?>
<div class="content-wrapper">
<section class="content-header">
    <h1>
        LAPORAN PENGAJUAN
        <small>Data Laporan Pengajuan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Data Laporan Pengajuan</li>
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
        <label>Dari Tanggal:</label>
            <input autocomplete="off" type="text" value="<?php if(isset($_GET['tanggal_dari'])){echo $_GET['tanggal_dari'];}else{echo "";} ?>" name="tanggal_dari" class="form-control" id="datepicker3" placeholder="Mulai Dari Tanggal" required="required">
        </div>
        </div>
        <div class="col-md-3">
        <div class="form-group">
        <label>Hingga Tanggal:</label>
            <input autocomplete="off" type="text" value="<?php if(isset($_GET['tanggal_sampai'])){echo $_GET['tanggal_sampai'];}else{echo "";} ?>" name="tanggal_sampai" class="form-control" id="datepicker4" placeholder="Hingga Ke Tanggal" required="required">
        </div>
        </div>
        <div class="col-md-3">
        <div class="form-group">
        <label>Opsi:</label>
            <input type="submit" value="TAMPILKAN LAPORAN" class="btn btn-sm btn-success">
        </div>
        </div>        
        <?php 
            if(isset($_GET['tanggal_dari']) && isset($_GET['tanggal_sampai'])){
                $tgl_dari = $_GET['tanggal_dari'];
                $tgl_sampai = $_GET['tanggal_sampai'];
        ?>
        <div class="col-md-2 col-lg-16">
        <div class="form-group">
        <label>&nbsp;</label>
            <a href="plaporan_print.php?tanggal_dari=<?php echo $tgl_dari ?>&tanggal_sampai=<?php echo $tgl_sampai ?>" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> &nbsp; CETAK / PDF LAPORAN</a> 
        </div>
        </div>
            <?php } ?>
    </div>
    </form>
</div>
</div>
    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">Laporan Rinci Pengajuan:</h3>
        </div>
    <div class="box-body">
    <?php 
        if(isset($_GET['tanggal_dari']) && isset($_GET['tanggal_sampai'])){
            $tgl_dari = $_GET['tanggal_dari'];
            $tgl_sampai = $_GET['tanggal_sampai'];
    ?>
    <div class="row">
    <div class="col-lg-6">
        <table class="table table-bordered">
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
    </div>
    </div>   
    <div class="table-responsive">
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
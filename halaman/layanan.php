<?php include 'header.php'; ?>
<div class="content-wrapper">
<section class="content-header">
    <h1>
        Layanan
        <small>Data Layanan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Data Layanan</li>
    </ol>
</section>
<section class="content">
<div class="row">
<section class="col-lg-12 col-lg-offset-0">
    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">Daftar Layanan:</h3>
                <a href="layanan_tambah.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i> &nbsp Tambah Layanan Baru</a>     
        </div>
        <div class="box-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table-datatable">
            <thead>
                <tr>
                    <th width="1%">No:</th>
                    <th>Kode Penyelenggaraan:</th>
                    <th>Kode Layanan:</th>
                    <th>Nama Layanan:</th>
                    <th>Volume Satuan:</th>
                    <th>Jenis Satuan:</th>
                    <th>PAGU:</th>
                    <th>Jumlah Realisasi:</th>
                    <th>Saldo Realisasi:</th>
                    <th>Saldo Rencana Realisasi:</th>
                    <th width="auto"></th>
                    <th width="auto"></th>
                    <?php 
                    include '../koneksi.php';
                    $no=1;
                    $data = mysqli_query($connect, "SELECT * FROM y_layanan");
                    while($d = mysqli_fetch_array($data)){
                    ?>
                    <?php if($d['z_idlayanan'] != 0){ ?>
                    <?php } ?>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include '../koneksi.php';
                    $no=1;
                    $data = mysqli_query($connect, "SELECT * FROM y_layanan
                    INNER JOIN y_penyelenggaraan
                    ON y_penyelenggaraan.z_idpenyelenggaraan = y_layanan.z_idpenyelenggaraan");
                    while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['z_kodepenyelenggaraan'].' ('.$d['z_namapenyelenggaraan'].')'; ?></td>
                    <td><?php echo $d['z_kodelayanan']; ?></td>
                    <td><?php if($d['z_keteranganl'] == ""){ echo $d['z_namalayanan']; }else{ echo $d['z_namalayanan']." (".$d['z_keteranganl'].")"; } ?></td>
                    <td><?php if($d['z_volumel'] == "0"){ echo "Tidak Ada Volume"; }else{ echo $d['z_volumel']; } ?></td>
                    <td><?php if($d['z_satuanl'] == ""){ echo "Tidak Ada Satuan"; }else{ echo $d['z_satuanl']; } ?></td>
                    <td><?php if($d['z_pagul'] == "0"){ echo "Tidak Ada PAGU"; }else{ echo 'Rp. '.number_format($d['z_pagul'], 2, ",", "."); } ?></td>
                    <td><?php if($d['z_jmlrealisasil'] == "0"){ echo "Tidak Ada Jumlah Realisasi"; }else{ echo 'Rp. '.number_format($d['z_jmlrealisasil'], 2, ",", "."); } ?></td>
                    <td><?php if($d['z_jmlsaldol'] == "0"){ echo "Tidak Ada Saldo Realisasi"; }else{ echo 'Rp. '.number_format($d['z_jmlsaldol'], 2, ",", "."); } ?></td>
                    <td><?php if($d['z_rjmlsaldol'] == "0"){ echo "Tidak Ada Saldo Rencana Realisasi"; }else{ echo 'Rp. '.number_format($d['z_rjmlsaldol'], 2, ",", "."); } ?></td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="layanan_edit.php?id=<?php echo $d['z_idlayanan'] ?>"><i class="fa fa-edit"></i></a>
                    </td>
                    <td>
                        <a class="btn btn-danger btn-sm" href="layanan_hapus.php?id=<?php echo $d['z_idlayanan'] ?>"><i class="fa fa-trash"></i></a>
                    </td>
                    
                </tr>
                <?php } ?>
            </tbody>
            </table>
        </div>
        </div>
    </div>
</section>
</div>
</section>
</div>
<?php include 'footer.php'; ?>
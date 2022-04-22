<?php include 'header.php'; ?>
<div class="content-wrapper">
<section class="content-header">
    <h1>
        Sub Komponen
        <small>Data Sub Komponen</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Data Sub Komponen</li>
    </ol>
</section>
<section class="content">
<div class="row">
<section class="col-lg-12 col-lg-offset-0">
    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">Daftar Sub Komponen:</h3>
                <a href="subkomponen_tambah.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i> &nbsp Tambah Sub Komponen Baru</a>     
        </div>
        <div class="box-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table-datatable">
            <thead>
                <tr>
                    <th width="1%">No:</th>
                    <th>Kode Komponen:</th>
                    <th>Kode Sub Komponen:</th>
                    <th>Nama Sub Komponen:</th>
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
                    $data = mysqli_query($connect, "SELECT * FROM y_subkomponen");
                    while($d = mysqli_fetch_array($data)){
                    ?>
                    <?php if($d['z_idsubkomponen'] != 0){ ?>
                    <?php } ?>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include '../koneksi.php';
                    $no=1;
                    $data = mysqli_query($connect, "SELECT * FROM y_subkomponen
                    INNER JOIN y_komponen
                    ON y_komponen.z_idkomponen = y_subkomponen.z_idkomponen");
                    while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['z_kodekomponen'].' ('.$d['z_namakomponen'].')'; ?></td>
                    <td><?php echo $d['z_kodesubkomponen']; ?></td>
                    <td><?php if($d['z_keterangansk'] == ""){ echo $d['z_namasubkomponen']; }else{ echo $d['z_namasubkomponen']." (".$d['z_keterangansk'].")"; } ?></td>
                    <td><?php if($d['z_volumesk'] == "0"){ echo "Tidak Ada Volume"; }else{ echo $d['z_volumesk']; } ?></td>
                    <td><?php if($d['z_satuansk'] == ""){ echo "Tidak Ada Satuan"; }else{ echo $d['z_satuansk']; } ?></td>
                    <td><?php if($d['z_pagusk'] == "0"){ echo "Tidak Ada PAGU"; }else{ echo 'Rp. '.number_format($d['z_pagusk'], 2, ",", "."); } ?></td>
                    <td><?php if($d['z_jmlrealisasisk'] == "0"){ echo "Tidak Ada Jumlah Realisasi"; }else{ echo 'Rp. '.number_format($d['z_jmlrealisasisk'], 2, ",", "."); } ?></td>
                    <td><?php if($d['z_jmlsaldosk'] == "0"){ echo "Tidak Ada Saldo Realisasi"; }else{ echo 'Rp. '.number_format($d['z_jmlsaldosk'], 2, ",", "."); } ?></td>
                    <td><?php if($d['z_rjmlsaldosk'] == "0"){ echo "Tidak Ada Saldo Rencana Realisasi"; }else{ echo 'Rp. '.number_format($d['z_rjmlsaldosk'], 2, ",", "."); } ?></td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="subkomponen_edit.php?id=<?php echo $d['z_idsubkomponen'] ?>"><i class="fa fa-edit"></i></a>
                    </td>
                    <td>
                        <a class="btn btn-danger btn-sm" href="subkomponen_hapus.php?id=<?php echo $d['z_idsubkomponen'] ?>"><i class="fa fa-trash"></i></a>
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
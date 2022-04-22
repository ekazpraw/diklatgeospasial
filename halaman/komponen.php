<?php include 'header.php'; ?>
<div class="content-wrapper">
<section class="content-header">
    <h1>
        Komponen
        <small>Data Komponen</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Data Komponen</li>
    </ol>
</section>
<section class="content">
<div class="row">
<section class="col-lg-12 col-lg-offset-0">
    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">Daftar Komponen:</h3>
                <a href="komponen_tambah.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i> &nbsp Tambah Komponen Baru</a>     
        </div>
        <div class="box-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table-datatable">
            <thead>
                <tr>
                    <th width="1%">No:</th>
                    <th>Kode Isi Layanan:</th>
                    <th>Kode Komponen:</th>
                    <th>Nama Komponen:</th>
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
                    $data = mysqli_query($connect, "SELECT * FROM y_komponen");
                    while($d = mysqli_fetch_array($data)){
                    ?>
                    <?php if($d['z_idkomponen'] != 0){ ?>
                    <?php } ?>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include '../koneksi.php';
                    $no=1;
                    $data = mysqli_query($connect, "SELECT * FROM y_komponen
                    INNER JOIN y_isilayanan
                    ON y_isilayanan.z_idisilayanan = y_komponen.z_idisilayanan");
                    while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['z_kodeisilayanan'].' ('.$d['z_namaisilayanan'].')'; ?></td>
                    <td><?php echo $d['z_kodekomponen']; ?></td>
                    <td><?php if($d['z_keterangank'] == ""){ echo $d['z_namakomponen']; }else{ echo $d['z_namakomponen']." (".$d['z_keterangank'].")"; } ?></td>
                    <td><?php if($d['z_volumek'] == "0"){ echo "Tidak Ada Volume"; }else{ echo $d['z_volumek']; } ?></td>
                    <td><?php if($d['z_satuank'] == ""){ echo "Tidak Ada Satuan"; }else{ echo $d['z_satuank']; } ?></td>
                    <td><?php if($d['z_paguk'] == "0"){ echo "Tidak Ada PAGU"; }else{ echo 'Rp. '.number_format($d['z_paguk'], 2, ",", "."); } ?></td>
                    <td><?php if($d['z_jmlrealisasik'] == "0"){ echo "Tidak Ada Jumlah Realisasi"; }else{ echo 'Rp. '.number_format($d['z_jmlrealisasik'], 2, ",", "."); } ?></td>
                    <td><?php if($d['z_jmlsaldok'] == "0"){ echo "Tidak Ada Saldo Realisasi"; }else{ echo 'Rp. '.number_format($d['z_jmlsaldok'], 2, ",", "."); } ?></td>
                    <td><?php if($d['z_rjmlsaldok'] == "0"){ echo "Tidak Ada Saldo Rencana Realisasi"; }else{ echo 'Rp. '.number_format($d['z_rjmlsaldok'], 2, ",", "."); } ?></td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="komponen_edit.php?id=<?php echo $d['z_idkomponen'] ?>"><i class="fa fa-edit"></i></a>
                    </td>
                    <td>
                        <a class="btn btn-danger btn-sm" href="komponen_hapus.php?id=<?php echo $d['z_idkomponen'] ?>"><i class="fa fa-trash"></i></a>
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
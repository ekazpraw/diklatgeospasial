<?php include 'header.php'; ?>
<div class="content-wrapper">
<section class="content-header">
    <h1>
        Akun
        <small>Data Akun</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Data Akun</li>
    </ol>
</section>
<section class="content">
<div class="row">
<section class="col-lg-12 col-lg-offset-0">
    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">Daftar Akun:</h3>
                <a href="akun_tambah.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i> &nbsp Tambah Akun Baru</a>     
        </div>
        <div class="box-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table-datatable">
            <thead>
                <tr>
                    <th width="1%">No:</th>
                    <th>Kode Sub Komponen:</th>
                    <th>Kode Akun:</th>
                    <th>Nama Akun:</th>
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
                    $data = mysqli_query($connect, "SELECT * FROM y_akun");
                    while($d = mysqli_fetch_array($data)){
                    ?>
                    <?php if($d['z_idakun'] != 0){ ?>
                    <?php } ?>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include '../koneksi.php';
                    $no=1;
                    $data = mysqli_query($connect, "SELECT * FROM y_akun
                    INNER JOIN y_subkomponen
                    ON y_subkomponen.z_idsubkomponen = y_akun.z_idsubkomponen");
                    while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['z_kodesubkomponen'].' ('.$d['z_namasubkomponen'].')'; ?></td>
                    <td><?php echo $d['z_kodeakun']; ?></td>
                    <td><?php if($d['z_keterangana'] == ""){ echo $d['z_namaakun']; }else{ echo $d['z_namaakun']." (".$d['z_keterangana'].")"; } ?></td>
                    <td><?php if($d['z_volumea'] == "0"){ echo "Tidak Ada Volume"; }else{ echo $d['z_volumea']; } ?></td>
                    <td><?php if($d['z_satuana'] == ""){ echo "Tidak Ada Satuan"; }else{ echo $d['z_satuana']; } ?></td>
                    <td><?php if($d['z_pagua'] == "0"){ echo "Tidak Ada PAGU"; }else{ echo 'Rp. '.number_format($d['z_pagua'], 2, ",", "."); } ?></td>
                    <td><?php if($d['z_jmlrealisasia'] == "0"){ echo "Tidak Ada Jumlah Realisasi"; }else{ echo 'Rp. '.number_format($d['z_jmlrealisasia'], 2, ",", "."); } ?></td>
                    <td><?php if($d['z_jmlsaldoa'] == "0"){ echo "Tidak Ada Saldo Realisasi"; }else{ echo 'Rp. '.number_format($d['z_jmlsaldoa'], 2, ",", "."); } ?></td>
                    <td><?php if($d['z_rjmlsaldoa'] == "0"){ echo "Tidak Ada Saldo Rencana Realisasi"; }else{ echo 'Rp. '.number_format($d['z_rjmlsaldoa'], 2, ",", "."); } ?></td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="akun_edit.php?id=<?php echo $d['z_idakun'] ?>"><i class="fa fa-edit"></i></a>
                    </td>
                    <td>
                        <a class="btn btn-danger btn-sm" href="akun_hapus.php?id=<?php echo $d['z_idakun'] ?>"><i class="fa fa-trash"></i></a>
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
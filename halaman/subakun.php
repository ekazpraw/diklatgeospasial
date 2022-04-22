<?php include 'header.php'; ?>
<div class="content-wrapper">
<section class="content-header">
    <h1>
        Sub Akun
        <small>Data Sub Akun</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Data Sub Akun</li>
    </ol>
</section>
<section class="content">
<div class="row">
<section class="col-lg-12 col-lg-offset-0">
    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">Daftar Sub Akun:</h3>
                <a href="subakun_tambah.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i> &nbsp Tambah Sub Akun Baru</a>     
        </div>
        <div class="box-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table-datatable">
            <thead>
                <tr>
                    <th width="1%">No:</th>
                    <th>Kode Akun:</th>
                    <th>Kode Sub Akun:</th>
                    <th>Nama Sub Akun:</th>
                    <th>Volume Satuan:</th>
                    <th>Jenis Satuan:</th>
                    <th>PAGU:</th>
                    <th width="auto"></th>
                    <th width="auto"></th>
                    <?php 
                    include '../koneksi.php';
                    $no=1;
                    $data = mysqli_query($connect, "SELECT * FROM y_subakun");
                    while($d = mysqli_fetch_array($data)){
                    ?>
                    <?php if($d['z_idsubakun'] != 0){ ?>
                    <?php } ?>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include '../koneksi.php';
                    $no=1;
                    $data = mysqli_query($connect, "SELECT * FROM y_subakun
                    INNER JOIN y_akun
                    ON y_akun.z_idakun = y_subakun.z_idakun");
                    while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['z_kodeakun'].' ('.$d['z_namaakun'].')'; ?></td>
                    <td><?php echo $d['z_kodesubakun']; ?></td>
                    <td><?php if($d['z_keterangansa'] == ""){ echo $d['z_namasubakun']; }else{ echo $d['z_namasubakun']." (".$d['z_keterangansa'].")"; } ?></td>
                    <td><?php if($d['z_volumesa'] == "0"){ echo "Tidak Ada Volume"; }else{ echo $d['z_volumesa']; } ?></td>
                    <td><?php if($d['z_satuansa'] == ""){ echo "Tidak Ada Satuan"; }else{ echo $d['z_satuansa']; } ?></td>
                    <td><?php if($d['z_pagusa'] == "0"){ echo "Tidak Ada PAGU"; }else{ echo 'Rp. '.number_format($d['z_pagusa'], 2, ",", "."); } ?></td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="subakun_edit.php?id=<?php echo $d['z_idsubakun'] ?>"><i class="fa fa-edit"></i></a>
                    </td>
                    <td>
                        <a class="btn btn-danger btn-sm" href="subakun_hapus.php?id=<?php echo $d['z_idsubakun'] ?>"><i class="fa fa-trash"></i></a>
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
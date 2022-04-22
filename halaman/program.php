<?php include 'header.php'; ?>
<div class="content-wrapper">
<section class="content-header">
    <h1>
        Program
        <small>Data Program</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Data Program</li>
    </ol>
</section>
<section class="content">
<div class="row">
<section class="col-lg-12 col-lg-offset-0">
    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">Daftar Program:</h3>
                <a href="program_tambah.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i> &nbsp Tambah Program Baru</a>     
        </div>
        <div class="box-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table-datatable">
            <thead>
                <tr>
                    <th width="1%">No:</th>
                    <th>Kode Program:</th>
                    <th>Nama Program:</th>
                    <th width="auto"></th>
                    <th width="auto"></th>
                    <?php 
                    include '../koneksi.php';
                    $no=1;
                    $data = mysqli_query($connect, "SELECT * FROM y_program");
                    while($d = mysqli_fetch_array($data)){
                    ?>
                    <?php if($d['z_idprogram'] != 0){ ?>
                    <?php } ?>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include '../koneksi.php';
                    $no=1;
                    $data = mysqli_query($connect, "SELECT * FROM y_program");
                    while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['z_kodeprogram']; ?></td>
                    <td><?php if($d['z_keterangan'] == ""){ echo $d['z_namaprogram']; }else{ echo $d['z_namaprogram']." (".$d['z_keterangan'].")"; } ?></td>
                    <td align="center" width="auto">
                        <a class="btn btn-warning btn-sm" href="program_edit.php?id=<?php echo $d['z_idprogram'] ?>"><i class="fa fa-edit"></i></a>
                    </td>
                    <td align="center" width="auto">
                        <a class="btn btn-danger btn-sm" href="program_hapus.php?id=<?php echo $d['z_idprogram'] ?>"><i class="fa fa-trash"></i></a>
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
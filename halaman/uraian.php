<?php include 'header.php'; ?>
<div class="content-wrapper">
<section class="content-header">
    <h1>
        Uraian
        <small>Data Uraian</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Data Uraian</li>
    </ol>
</section>
<section class="content">
<div class="row">
<section class="col-lg-12 col-lg-offset-0">
    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">Daftar Uraian:</h3>
                <a href="uraian_tambah.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i> &nbsp Tambah Uraian Baru</a>     
        </div>
        <div class="box-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table-datatable">
            <thead>
                <tr>
                    <th width="1%">No:</th>
                    <th>Kode:</th>
                    <th>Uraian:</th>
                    <th>Jumlah Layanan:</th>
                    <th>Total Biaya:</th>
                    <th width="10%">OPSI:</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include '../koneksi.php';
                    $no=1;
                    $data = mysqli_query($connect, "SELECT * FROM y_uraian");
                    while($d = mysqli_fetch_array($data)){
                    $rp = 'Rp. '.number_format($d['z_total'], 2, ",", ".");
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['z_kodeurai']; ?></td>
                    <td><?php echo $d['z_namaurai']." (".$d['z_keterangan'].")"; ?></td>
                    <td><?php if($d['z_jmllayanan'] == "0"){ echo "Belum Ada Layanan"; }else{ echo $d['z_jmllayanan']." Layanan"; } ?></td>
                    <td><?php echo $rp; ?></td>
                    <td>                        
                        <a class="btn btn-warning btn-sm" href="uraian_edit.php?id=<?php echo $d['z_idurai'] ?>"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger btn-sm" href="uraian_hapus.php?id=<?php echo $d['z_idurai'] ?>"><i class="fa fa-trash"></i></a>
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
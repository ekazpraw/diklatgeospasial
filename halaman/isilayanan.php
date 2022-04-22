<?php include 'header.php'; ?>
<div class="content-wrapper">
<section class="content-header">
    <h1>
        Isi Layanan
        <small>Data Isi Layanan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Data Isi Layanan</li>
    </ol>
</section>
<section class="content">
<div class="row">
<section class="col-lg-12 col-lg-offset-0">
    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">Daftar Isi Layanan:</h3>
                <a href="isilayanan_tambah.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i> &nbsp Tambah Isi Layanan Baru</a>     
        </div>
        <div class="box-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table-datatable">
            <thead>
                <tr>
                    <th width="1%">No:</th>
                    <th>Kode Layanan:</th>
                    <th>Kode Isi Layanan:</th>
                    <th>Nama Isi Layanan:</th>
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
                    $data = mysqli_query($connect, "SELECT * FROM y_isilayanan");
                    while($d = mysqli_fetch_array($data)){
                    ?>
                    <?php if($d['z_idisilayanan'] != 0){ ?>
                    <?php } ?>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include '../koneksi.php';
                    $no=1;
                    $data = mysqli_query($connect, "SELECT * FROM y_isilayanan
                    INNER JOIN y_layanan
                    ON y_layanan.z_idlayanan = y_isilayanan.z_idlayanan");
                    while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['z_kodelayanan'].' ('.$d['z_namalayanan'].')'; ?></td>
                    <td><?php echo $d['z_kodeisilayanan']; ?></td>
                    <td><?php if($d['z_keteranganil'] == ""){ echo $d['z_namaisilayanan']; }else{ echo $d['z_namaisilayanan']." (".$d['z_keteranganil'].")"; } ?></td>
                    <td><?php if($d['z_volumeil'] == "0"){ echo "Tidak Ada Volume"; }else{ echo $d['z_volumeil']; } ?></td>
                    <td><?php if($d['z_satuanil'] == ""){ echo "Tidak Ada Satuan"; }else{ echo $d['z_satuanil']; } ?></td>
                    <td><?php if($d['z_paguil'] == "0"){ echo "Tidak Ada PAGU"; }else{ echo 'Rp. '.number_format($d['z_paguil'], 2, ",", "."); } ?></td>
                    <td><?php if($d['z_jmlrealisasiil'] == "0"){ echo "Tidak Ada Jumlah Realisasi"; }else{ echo 'Rp. '.number_format($d['z_jmlrealisasiil'], 2, ",", "."); } ?></td>
                    <td><?php if($d['z_jmlsaldoil'] == "0"){ echo "Tidak Ada Saldo Realisasi"; }else{ echo 'Rp. '.number_format($d['z_jmlsaldoil'], 2, ",", "."); } ?></td>
                    <td><?php if($d['z_rjmlsaldoil'] == "0"){ echo "Tidak Ada Saldo Rencana Realisasi"; }else{ echo 'Rp. '.number_format($d['z_rjmlsaldoil'], 2, ",", "."); } ?></td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="isilayanan_edit.php?id=<?php echo $d['z_idisilayanan'] ?>"><i class="fa fa-edit"></i></a>
                    </td>
                    <td>
                        <a class="btn btn-danger btn-sm" href="isilayanan_hapus.php?id=<?php echo $d['z_idisilayanan'] ?>"><i class="fa fa-trash"></i></a>
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
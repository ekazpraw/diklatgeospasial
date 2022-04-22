<?php include 'header.php'; ?>
<div class="content-wrapper">
<section class="content-header">
    <h1>
        Kegiatan (Rencana)
        <small>Data Kegiatan (Rencana)</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Data Kegiatan (Rencana)</li>
    </ol>
</section>
<section class="content">
<div class="row">
<section class="col-lg-12 col-lg-offset-0">
    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">Daftar Kegiatan (Rencana):</h3>
                <a href="rencana_tambah.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i> &nbsp Tambah Kegiatan (Rencana) Baru</a>     
        </div>
        <div class="box-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table-datatable">
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
                    <th width="auto"></th>
                    <th width="auto"></th>
                    <?php 
                    include '../koneksi.php';
                    $no=1;
                    $data = mysqli_query($connect, "SELECT * FROM y_rencana");
                    while($d = mysqli_fetch_array($data)){
                    ?>
                    <?php if($d['z_idr'] != 0){ ?>
                    <?php } ?>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include '../koneksi.php';
                    $data = mysqli_query($connect, "SELECT * FROM y_rencana 
                    INNER JOIN y_akun
                    ON y_akun.z_idakun = y_rencana.z_idakun
                    INNER JOIN y_subkomponen
                    ON y_subkomponen.z_idsubkomponen = y_rencana.z_idsubkomponen"); 
                    $data2 = mysqli_query($connect, "SELECT * FROM y_rencana");
                    $d2 = mysqli_fetch_array($data2);
                    while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo $d['z_idr']; ?></td>
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
                    <td>
                        <a class="btn btn-warning btn-sm" href="rencana_edit.php?id=<?php echo $d['z_idr'] ?>"><i class="fa fa-edit"></i></a>
                    </td>
                    <td>
                        <a class="btn btn-danger btn-sm" href="rencana_hapus.php?id=<?php echo $d['z_idr'] ?>"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
            </table>
        </div>
        </div>
    </div>
    <div align="right"><small class="text-muted">* <font color="blue">Kuning</font> Hanyalah Untuk <font color="blue">Ubah Beberapa Data dan Ubah Keterangan Kegiatan (Rencana)</font></small></div>
    <div align="right"><small class="text-muted"><font color="red">* Data Bulan, Akun dan Saldo</font> Yang Sudah Diinput <font color="red">Tidak Dapat Diubah</font>, Mohon <font color="red">Input Dengan Teliti</font> Sebelum Menyelesaikan!</small></div>
</section>
</div>
</section>
</div>
<?php include 'footer.php'; ?>
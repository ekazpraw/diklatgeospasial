<?php include 'header.php'; ?>
<div class="content-wrapper">
<section class="content-header">
    <h1>
        Pengajuan (Rinci)
        <small>Data Pengajuan (Rinci)</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Data Pengajuan (Rinci)</li>
    </ol>
</section>
<section class="content">
<div class="row">
<section class="col-lg-12 col-lg-offset-0">
    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">Daftar Pengajuan (Rinci):</h3>
                <a href="pengajuan_tambah.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i> &nbsp Tambah Pengajuan (Rinci) Baru</a>     
        </div>
        <div class="box-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table-datatable">
            <thead>
                <tr>
                    <th width="1%">No:</th>
                    <th>Tanggal Pengajuan:</th>
                    <th>Uraian Pengajuan:</th>
                    <th>Akun:</th>
                    <th>Sub Komponen:</th>
                    <th>Nominal:</th>
                    <th>Saldo Realisasi:</th>
                    <th>LS/GU:</th>
                    <th>Catatan:</th>
                    <th>Bulan:</th>
                    <th>ID:</th>
                    <th>Tanggal Cair:</th>
                    <th>Tanggal SPP:</th>
                    <th>No. SP2D:</th>
                    <th>Tanggal SP2D:</th>
                    <th width="auto"></th>
                    <th width="auto"></th>
                    <th width="auto"></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include '../koneksi.php';
                    $no=1;   
                    $data = mysqli_query($connect, "SELECT * FROM y_pengajuan 
                    INNER JOIN y_akun
                    ON y_akun.z_idakun = y_pengajuan.z_idakun
                    INNER JOIN y_subkomponen
                    ON y_subkomponen.z_idsubkomponen = y_pengajuan.z_idsubkomponen"); 
                    while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['z_tglp']; ?></td>
                    <td><?php echo $d['z_uraip']; ?></td>
                    <td><?php echo $d['z_namaakun']; ?></td>
                    <td><?php echo $d['z_namasubkomponen']; ?></td>
                    <td><?php if($d['z_pnominal'] == "0"){ echo "Tidak Ada Nominal"; }else{ echo 'Rp. '.number_format($d['z_pnominal'], 2, ",", "."); } ?></td>
                    <td><?php if($d['z_psaldo'] == "0"){ echo "Tidak Ada Saldo"; }else{ echo 'Rp. '.number_format($d['z_psaldo'], 2, ",", "."); } ?></td>
                    <td><?php echo $d['z_plsgu']; ?></td>
                    <td><?php echo $d['z_pcatatan']; ?></td>
                    <td><?php echo $d['z_pmonth']; ?></td>
                    <td><?php echo $d['z_pID']; ?></td>
                    <td><?php if($d['z_tglc'] == "0000-00-00"){ echo "Tidak Ada Tanggal Cair"; }else{ echo $d['z_tglc']; } ?></td>
                    <td><?php if($d['z_tgls'] == "0000-00-00"){ echo "Tidak Ada Tanggal SPP"; }else{ echo $d['z_tgls']; } ?></td>
                    <td><?php if($d['z_nosp2d'] == "-"){ echo "Tidak Ada Tanggal SPP"; }else{ echo $d['z_nosp2d']; } ?></td>
                    <td><?php if($d['z_tgls2'] == "0000-00-00"){ echo "Tidak Ada Tanggal SPP"; }else{ echo $d['z_tgls2']; } ?></td>
                    <td>
                        <a class="btn btn-success btn-sm" href="pengajuan_tambahsp2d.php?id=<?php echo $d['z_idp'] ?>"><i class="fa fa-edit"></i></a>
                    </td>                    
                    <td>
                        <a class="btn btn-warning btn-sm" href="pengajuan_edit.php?id=<?php echo $d['z_idp'] ?>"><i class="fa fa-edit"></i></a>
                    </td>
                    <td>
                        <a class="btn btn-danger btn-sm" href="pengajuan_hapus.php?id=<?php echo $d['z_idp'] ?>"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
            </table>
        </div>
        </div>
    </div>
    <div align="right"><small class="text-muted">* <font color="green">Hijau</font> Untuk <font color="green">Data SP2D</font>, <font color="blue">Kuning</font> Hanyalah Untuk <font color="blue">Ubah Data dan Ubah Keterangan SP2D</font></small></div>
    <div align="right"><small class="text-muted"><font color="red">* Data Akun dan Saldo</font> Yang Sudah Diinput <font color="red">Tidak Dapat Diubah</font>, Mohon <font color="red">Input Dengan Teliti</font> Sebelum Menyelesaikan!</small></div>
</section>
</div>
</section>
</div>
<?php include 'footer.php'; ?>
<?php include 'header.php'; ?>
<?php include '../function/hari_kalender.php'; ?>
<?php include '../function/pesan_dalam.php'; ?>
<div class="content-wrapper">
<section class="content-header">
    <h1>
        Pengguna
        <small>Data Pengguna</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Data Pengguna</li>
    </ol>
</section>
<section class="content">
<div class="row">
<section class="col-lg-12 col-lg-offset-0">
    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">Daftar Pengguna:</h3>
                <a href="user_tambah.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i> &nbsp Tambah Pengguna Baru</a>     
        </div>
        <div class="box-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table-datatable">
            <thead>
                <tr>
                    <th width="1%">No:</th>
                    <th>NIK:</th>
                    <th>Nama Lengkap:</th>
                    <th>Nomor Telepon:</th>
                    <th>Tanggal Lahir:</th>
                    <th>Alamat Pengguna:</th>
                    <th>Level Kewenangan:</th>
                    <th width="10%">Foto:</th>
                    <th width="auto"></th>
                    <th width="auto"></th>
                    <th width="auto"></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include '../koneksi.php';
                    $no=1;
                    $data = mysqli_query($connect, "SELECT * FROM y_admin");
                    while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['z_nik']; ?></td>
                    <td><?php echo $d['z_namalengkap']; ?></td>
                    <td><?php echo $d['z_tlp']; ?></td>
                    <td><?php echo indonesian_date($d['z_tl']); ?></td>
                    <td><?php echo $d['z_alamat']; ?></td>
                    <td><?php echo $d['z_level']; ?></td>
                    <td>
                    <center>
                    <?php if($d['z_foto'] == ""){ ?>
                        <img src="../foto/default.jpg" style="width: 100px;height: auto">
                    <?php }else{ ?>
                        <a href='../foto/<?php echo $d['z_foto'] ?>' target="_blank"><img src="../foto/<?php echo $d['z_foto'] ?>" style="height: 100px; width: 100px"></a>
                    <?php } ?>
                    </center>
                    </td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="user_edit.php?id=<?php echo $d['z_idadmin'] ?>"><i class="fa fa-edit"></i></a>
                    </td>
                    <td>
                    <?php if($d['z_foto'] == ""){ ?>
                        <a class="btn btn-primary btn-sm" href="user_tambahfoto.php?id=<?php echo $d['z_idadmin'] ?>"><i class="fa fa-photo"></i></a>
                    <?php }else{ ?>
                        <a class="btn btn-primary btn-sm" href="user_ubahfoto.php?id=<?php echo $d['z_idadmin'] ?>"><i class="fa fa-photo"></i></a>
                    <?php } ?>
                    </td>
                    <td>
                        <a class="btn btn-success btn-sm" href="user_pwd.php?id=<?php echo $d['z_idadmin'] ?>"><i class="fa fa-lock"></i></a>
                    </td>
                    <?php if($d['z_idadmin']!=1 && $d['z_foto']!=''){ ?>
                    <td>
                        <a class="btn btn-danger btn-sm" href="user_hapus.php?id=<?php echo $d['z_idadmin'] ?>"><i class="fa fa-trash"></i></a>
                    </td>
                    <?php } ?>
                </tr>
                <?php } ?>
            </tbody>
            </table>
        </div>
        </div>
    </div>
    <div align="right"><small class="text-muted">* <font color="green">Hijau</font> Untuk <font color="green">Ubah Kata Sandi</font>, <font color="red">Kuning</font> Hanyalah Untuk <font color="red">Ubah Biodata Saja</font></small></div>
    <div align="right"><small class="text-muted"><font color="blue">Biru</font> Untuk <font color="red">Mengubah</font> atau <font color="red">Menambahkan</font><font color="blue"> Foto Pada Data Diri</font> Anda!</small></div>
</section>
</div>
</section>
</div>
<?php include 'footer.php'; ?>
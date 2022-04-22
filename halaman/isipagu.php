<?php include 'header.php'; ?>
<div class="content-wrapper">
<section class="content-header">
    <h1>
        PAGU
        <small>Data PAGU</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Data PAGU</li>
    </ol>
</section>
<section class="content">
<div class="row">
<section class="col-lg-12 col-lg-offset-0">
    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">Daftar PAGU:</h3>
                <a href="isipagu_tambah.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i> &nbsp Tambah PAGU Baru</a>     
        </div>
        <div class="box-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table-datatable">
            <thead>
                <tr>
                    <th width="auto">No:</th>
                    <th width="auto">Kode Akun:</th>
                    <th width="auto">Kode Sub Akun:</th>
                    <th width="auto">Kode PAGU:</th>
                    <th width="auto">Nama PAGU:</th>
                    <th width="auto">Volume:</th>
                    <th width="auto">Jumlah Satuan:</th>
                    <th width="auto">Harga Satuan:</th>
                    <th>PAGU:</th>
                    <th width="auto"></th>
                    <th width="auto"></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include '../koneksi.php';
                    $no=1;
                    $data = mysqli_query($connect, "SELECT * FROM y_isipagu
                    INNER JOIN y_subakun
                    ON y_subakun.z_idsubakun = y_isipagu.z_idsubakun
                    INNER JOIN y_akun
                    ON y_akun.z_idakun = y_subakun.z_idakun");
                    while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['z_kodeakun'].' ('.$d['z_namaakun'].')'; ?></td>
                    <td><?php echo $d['z_kodesubbakun'].' ('.$d['z_namasubakun'].')'; ?></td>
                    <td><?php if($d['z_kodepagu'] == "-"){ echo "Tidak Ada Kode"; }else{ echo $d['z_kodepagu']; } ?></td>
                    <td>
                        <?php if($d['z_keteranganip']=="" && $d['z_namapagu']!=""){ 
                            echo $d['z_namapagu']; 
                        }else if($d['z_keteranganip']!="" && $d['z_namapagu']==""){ 
                            echo "Tidak Ada Nama (Tidak Dapat Menampilkan Keterangan)";
                        }else if($d['z_keteranganip']=="" && $d['z_namapagu']==""){ 
                            echo "Tidak Ada Nama & Keterangan";
                        }else{ 
                            echo $d['z_namapagu']." (".$d['z_keteranganip'].")";
                        } ?>
                    </td>
                    <td><?php if($d['z_volumeip'] == "0"){ echo "Tidak Ada Volume"; }else{ echo $d['z_volumeip']; } ?></td>
                    <td><?php if($d['z_satuanip'] == ""){ echo "Tidak Ada Satuan"; }else{ echo $d['z_satuanip']; } ?></td>
                    <td><?php if($d['z_hargasatuanip'] == "0"){ echo "Tidak Ada Harga Satuan"; }else{ echo 'Rp. '.number_format($d['z_hargasatuanip'], 2, ",", "."); } ?></td>
                    <td><?php if($d['z_paguip'] == "0"){ echo "Tidak Ada PAGU"; }else{ echo 'Rp. '.number_format($d['z_paguip'], 2, ",", "."); } ?></td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="isipagu_edit.php?id=<?php echo $d['z_idpagu'] ?>"><i class="fa fa-edit"></i></a>
                    </td>
                    <td>
                        <a class="btn btn-danger btn-sm" href="isipagu_hapus.php?id=<?php echo $d['z_idpagu'] ?>"><i class="fa fa-trash"></i></a>
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
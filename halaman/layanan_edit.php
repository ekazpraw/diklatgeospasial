<?php 
    include 'header.php';
    include '../koneksi.php';
?>
<div class="content-wrapper">
<section class="content-header">
    <h1>
        Layanan
        <small>Ubah Layanan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Ubah Layanan</li>
    </ol>
</section>
<section class="content">
<div class="row">
<section class="col-lg-6 col-lg-offset-3">       
    <div class="box box-info">
    <div class="box-header">
        <h3 class="box-title">Ubah Layanan:</h3>
        <a href="layanan.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp; Kembali</a> 
    </div>
    <div class="box-body">
<form action="layanan_update.php" method="post" enctype="multipart/form-data">
<?php 
    $id = $_GET['id'];              
    $data = mysqli_query($connect, "select * from y_layanan where z_idlayanan='$id'");
    while($d = mysqli_fetch_array($data)){
?>
    <div class="form-group">
    <label>Kode Penyelenggaraan:</label>
        <select name="kode0" required="required" class="form-control">
        <option value="">- Pilih Kode Penyelenggaraan -</option>
        <?php 
            include '../koneksi.php';
            $data = mysqli_query($connect, "SELECT * FROM y_penyelenggaraan");
            while($k = mysqli_fetch_array($data)){
        ?>
            <option <?php if($d['z_idpenyelenggaraan'] == $k['z_idpenyelenggaraan']){echo "selected='selected'";} ?> value="<?php echo $k['z_idpenyelenggaraan']; ?>"><?php echo $k['z_kodepenyelenggaraan'].' - '.$k['z_namapenyelenggaraan']; ?></option>
        <?php } ?>
        </select>
    </div>
    <div class="form-group">
    <label>Kode Layanan:</label>
        <input type="text" class="form-control" name="kode" onkeyup="this.value = this.value.toUpperCase()" value="<?php echo $d['z_kodelayanan'] ?>" required="required" placeholder="Masukkan Kode Layanan..." maxlength="25">
        <input type="hidden" class="form-control" name="id" value="<?php echo $d['z_idlayanan'] ?>" required="required">
        <small class="text-muted">* Isi - Jika Tidak Ada Isinya</small>
    </div>
    <div class="form-group">
    <label>Nama Layanan:</label>
        <input type="text" class="form-control" name="nama" value="<?php echo $d['z_namalayanan'] ?>" required="required" placeholder="Masukkan Nama Layanan..." maxlength="100">
        <small class="text-muted">* Isi - Jika Tidak Ada Isinya</small>
    </div>
    <div class="form-group">
    <label>Volume Satuan:</label>
        <input type="number" class="form-control" name="vol" value="<?php echo $d['z_volumel'] ?>" placeholder="Masukkan Volume Satuan..." maxlength="5">
        <small class="text-muted">* Isi 0 Jika Tidak Ada Isinya</small>
    </div>
    <div class="form-group">
    <label>Jenis Satuan:</label>
        <input type="text" class="form-control" name="sat" value="<?php echo $d['z_satuanl'] ?>" onkeyup="this.value = this.value.toUpperCase()" placeholder="Masukkan Jenis Satuan..." maxlength="25">
        <small class="text-muted">* Jangan Diisi Jika Tidak Ada Isinya</small>
    </div>
    <div class="form-group">
    <label>Keterangan:</label>
        <textarea class="form-control" name="ket" rows="3" placeholder="Masukkan Keterangan Layanan..."><?php echo $d['z_keteranganl']; ?></textarea>
        <small class="text-muted">* Jangan Diisi Jika Tidak Ada Isinya</small>
    </div>
        <input type="hidden" class="form-control" name="f" value="<?php echo $d['z_pagul'] ?>">
        <input type="hidden" class="form-control" name="u" value="<?php echo $d['z_jmlrealisasil'] ?>">
        <input type="hidden" class="form-control" name="c" value="<?php echo $d['z_jmlsaldol'] ?>">
        <input type="hidden" class="form-control" name="k" value="<?php echo $d['z_rjmlsaldol'] ?>">
        <input type="hidden" class="form-control" name="petugastb" id="petugastb" value="<?php echo $d['z_pb'] ?>">
        <input type="hidden" class="form-control" name="tgltb" value="<?php echo $d['z_dc'] ?>" readonly>
        <input type="hidden" class="form-control" name="petugasub" id="petugasub" value="<?php echo $_SESSION['nik']; ?>">
        <input type="hidden" class="form-control" name="tglub" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date("Y-m-d h:i:s"); ?>" readonly>
    <div class="form-group" align="right">
        <input type="submit" class="btn btn-sm btn-primary" value="Ubah">
    </div>
<?php } ?>
</form>
    </div>
    </div>
</section>
</div>
</section>
</div>
<?php include 'footer.php'; ?>
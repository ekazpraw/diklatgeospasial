<?php 
    include 'header.php';
    include '../koneksi.php';
?>
<div class="content-wrapper">
<section class="content-header">
    <h1>
        Komponen
        <small>Ubah Komponen</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Ubah Komponen</li>
    </ol>
</section>
<section class="content">
<div class="row">
<section class="col-lg-6 col-lg-offset-3">       
    <div class="box box-info">
    <div class="box-header">
        <h3 class="box-title">Ubah Komponen:</h3>
        <a href="komponen.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp; Kembali</a> 
    </div>
    <div class="box-body">
<form action="komponen_update.php" method="post" enctype="multipart/form-data">
<?php 
    $id = $_GET['id'];              
    $data = mysqli_query($connect, "select * from y_komponen where z_idkomponen='$id'");
    while($d = mysqli_fetch_array($data)){
?>
    <div class="form-group">
    <label>Kode Isi Layanan:</label>
        <select name="kode0" required="required" class="form-control">
        <option value="">- Pilih Kode Isi Layanan -</option>
        <?php 
            include '../koneksi.php';
            $data = mysqli_query($connect, "SELECT * FROM y_isilayanan");
            while($k = mysqli_fetch_array($data)){
        ?>
            <option <?php if($d['z_idisilayanan'] == $k['z_idisilayanan']){echo "selected='selected'";} ?> value="<?php echo $k['z_idisilayanan']; ?>"><?php echo $k['z_kodeisilayanan'].' - '.$k['z_namaisilayanan']; ?></option>
        <?php } ?>
        </select>
    </div>
    <div class="form-group">
    <label>Kode Komponen:</label>
        <input type="text" class="form-control" name="kode" onkeyup="this.value = this.value.toUpperCase()" value="<?php echo $d['z_kodekomponen'] ?>" required="required" placeholder="Masukkan Kode Isi Komponen..." maxlength="25">
        <input type="hidden" class="form-control" name="id" value="<?php echo $d['z_idkomponen'] ?>" required="required">
        <small class="text-muted">* Isi - Jika Tidak Ada Isinya</small>
    </div>
    <div class="form-group">
    <label>Nama Komponen:</label>
        <input type="text" class="form-control" name="nama" value="<?php echo $d['z_namakomponen'] ?>" required="required" placeholder="Masukkan Nama Isi Layanan..." maxlength="100">
        <small class="text-muted">* Isi - Jika Tidak Ada Isinya</small>
    </div>
    <div class="form-group">
    <label>Volume Satuan:</label>
        <input type="number" class="form-control" name="vol" value="<?php echo $d['z_volumek'] ?>" placeholder="Masukkan Volume Satuan..." maxlength="5">
        <small class="text-muted">* Isi 0 Jika Tidak Ada Isinya</small>
    </div>
    <div class="form-group">
    <label>Jenis Satuan:</label>
        <input type="text" class="form-control" name="sat" value="<?php echo $d['z_satuank'] ?>" onkeyup="this.value = this.value.toUpperCase()" placeholder="Masukkan Jenis Satuan..." maxlength="25">
        <small class="text-muted">* Jangan Diisi Jika Tidak Ada Isinya</small>
    </div>
    <div class="form-group">
    <label>Keterangan:</label>
        <textarea class="form-control" name="ket" rows="3" placeholder="Masukkan Keterangan Program..."><?php echo $d['z_keterangank']; ?></textarea>
        <small class="text-muted">* Jangan Diisi Jika Tidak Ada Isinya</small>
    </div>
        <input type="hidden" class="form-control" name="f" value="<?php echo $d['z_paguk'] ?>">
        <input type="hidden" class="form-control" name="u" value="<?php echo $d['z_jmlrealisasik'] ?>">
        <input type="hidden" class="form-control" name="c" value="<?php echo $d['z_jmlsaldok'] ?>">
        <input type="hidden" class="form-control" name="k" value="<?php echo $d['z_rjmlsaldok'] ?>">
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
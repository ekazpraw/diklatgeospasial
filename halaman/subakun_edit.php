<?php 
    include 'header.php';
    include '../koneksi.php';
?>
<div class="content-wrapper">
<section class="content-header">
    <h1>
        Sub Akun
        <small>Ubah Sub Akun</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Ubah Sub Akun</li>
    </ol>
</section>
<section class="content">
<div class="row">
<section class="col-lg-6 col-lg-offset-3">       
    <div class="box box-info">
    <div class="box-header">
        <h3 class="box-title">Ubah Sub Akun:</h3>
        <a href="subakun.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp; Kembali</a> 
    </div>
    <div class="box-body">
<form action="subakun_update.php" method="post" enctype="multipart/form-data">
<?php 
    $id = $_GET['id'];              
    $data = mysqli_query($connect, "select * from y_subakun where z_idsubakun='$id'");
    while($d = mysqli_fetch_array($data)){
?>
    <div class="form-group">
    <label>Kode Akun:</label>
        <select name="kode0" required="required" class="form-control">
        <option value="">- Pilih Kode Akun -</option>
        <?php 
            include '../koneksi.php';
            $data = mysqli_query($connect, "SELECT * FROM y_akun");
            while($k = mysqli_fetch_array($data)){
        ?>
            <option <?php if($d['z_idakun'] == $k['z_idakun']){echo "selected='selected'";} ?> value="<?php echo $k['z_idakun']; ?>"><?php echo $k['z_kodeakun'].' - '.$k['z_namaakun']; ?></option>
        <?php } ?>
        </select>
    </div>
    <div class="form-group">
    <label>Kode Sub Akun:</label>
        <input type="text" class="form-control" name="kode" onkeyup="this.value = this.value.toUpperCase()" value="<?php echo $d['z_kodesubakun'] ?>" required="required" placeholder="Masukkan Kode Sub Akun..." maxlength="25">
        <input type="hidden" class="form-control" name="id" value="<?php echo $d['z_idsubakun'] ?>" required="required">
        <small class="text-muted">* Isi - Jika Tidak Ada Isinya</small>
    </div>
    <div class="form-group">
    <label>Nama Sub Akun:</label>
        <input type="text" class="form-control" name="nama" value="<?php echo $d['z_namasubakun'] ?>" required="required" placeholder="Masukkan Nama Sub Akun..." maxlength="100">
        <small class="text-muted">* Isi - Jika Tidak Ada Isinya</small>
    </div>
    <div class="form-group">
    <label>Volume Satuan:</label>
        <input type="number" class="form-control" name="vol" value="<?php echo $d['z_volumesa'] ?>" placeholder="Masukkan Volume Satuan..." maxlength="5">
        <small class="text-muted">* Isi 0 Jika Tidak Ada Isinya</small>
    </div>
    <div class="form-group">
    <label>Jenis Satuan:</label>
        <input type="text" class="form-control" name="sat" value="<?php echo $d['z_satuansa'] ?>" onkeyup="this.value = this.value.toUpperCase()" placeholder="Masukkan Jenis Satuan..." maxlength="25">
        <small class="text-muted">* Jangan Diisi Jika Tidak Ada Isinya</small>
    </div>
    <div class="form-group">
    <label>Keterangan:</label>
        <textarea class="form-control" name="ket" rows="3" placeholder="Masukkan Keterangan Sub Akun..."><?php echo $d['z_keterangansa']; ?></textarea>
        <small class="text-muted">* Jangan Diisi Jika Tidak Ada Isinya</small>
    </div>
        <input type="hidden" class="form-control" name="f" value="<?php echo $d['z_pagusa'] ?>">
        <input type="hidden" class="form-control" name="u" value="<?php echo $d['z_jmlrealisasisa'] ?>">
        <input type="hidden" class="form-control" name="c" value="<?php echo $d['z_jmlsaldosa'] ?>">
        <input type="hidden" class="form-control" name="k" value="<?php echo $d['z_rjmlsaldosa'] ?>">
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
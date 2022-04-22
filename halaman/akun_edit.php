<?php 
    include 'header.php';
    include '../koneksi.php';
?>
<div class="content-wrapper">
<section class="content-header">
    <h1>
        Akun
        <small>Ubah Akun</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Ubah Akun</li>
    </ol>
</section>
<section class="content">
<div class="row">
<section class="col-lg-6 col-lg-offset-3">       
    <div class="box box-info">
    <div class="box-header">
        <h3 class="box-title">Ubah Akun:</h3>
        <a href="akun.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp; Kembali</a> 
    </div>
    <div class="box-body">
<form action="akun_update.php" method="post" enctype="multipart/form-data">
<?php 
    $id = $_GET['id'];              
    $data = mysqli_query($connect, "select * from y_akun where z_idakun='$id'");
    while($d = mysqli_fetch_array($data)){
?>
    <div class="form-group">
    <label>Kode Sub Komponen:</label>
        <select name="kode0" required="required" class="form-control">
        <option value="">- Pilih Kode Sub Komponen -</option>
        <?php 
            include '../koneksi.php';
            $data = mysqli_query($connect, "SELECT * FROM y_subkomponen");
            while($k = mysqli_fetch_array($data)){
        ?>
            <option <?php if($d['z_idsubkomponen'] == $k['z_idsubkomponen']){echo "selected='selected'";} ?> value="<?php echo $k['z_idsubkomponen']; ?>"><?php echo $k['z_kodesubkomponen'].' - '.$k['z_namasubkomponen']; ?></option>
        <?php } ?>
        </select>
    </div>
    <div class="form-group">
    <label>Kode Akun:</label>
        <input type="text" class="form-control" name="kode" onkeyup="this.value = this.value.toUpperCase()" value="<?php echo $d['z_kodeakun'] ?>" required="required" placeholder="Masukkan Kode Akun..." maxlength="25">
        <input type="hidden" class="form-control" name="id" value="<?php echo $d['z_idakun'] ?>" required="required">
        <small class="text-muted">* Isi - Jika Tidak Ada Isinya</small>
    </div>
    <div class="form-group">
    <label>Nama Akun:</label>
        <input type="text" class="form-control" name="nama" value="<?php echo $d['z_namaakun'] ?>" required="required" placeholder="Masukkan Nama Akun..." maxlength="100">
        <small class="text-muted">* Isi - Jika Tidak Ada Isinya</small>
    </div>
    <div class="form-group">
    <label>Volume Satuan:</label>
        <input type="number" class="form-control" name="vol" value="<?php echo $d['z_volumea'] ?>" placeholder="Masukkan Volume Satuan..." maxlength="5">
        <small class="text-muted">* Isi 0 Jika Tidak Ada Isinya</small>
    </div>
    <div class="form-group">
    <label>Jenis Satuan:</label>
        <input type="text" class="form-control" name="sat" value="<?php echo $d['z_satuana'] ?>" onkeyup="this.value = this.value.toUpperCase()" placeholder="Masukkan Jenis Satuan..." maxlength="25">
        <small class="text-muted">* Jangan Diisi Jika Tidak Ada Isinya</small>
    </div>
    <div class="form-group">
    <label>Keterangan:</label>
        <textarea class="form-control" name="ket" rows="3" placeholder="Masukkan Keterangan Akun..."><?php echo $d['z_keterangana']; ?></textarea>
        <small class="text-muted">* Jangan Diisi Jika Tidak Ada Isinya</small>
    </div>
        
        <input type="hidden" class="form-control" name="jan" value="<?php echo $d['z_jan'] ?>" readonly>
        <input type="hidden" class="form-control" name="feb" value="<?php echo $d['z_feb'] ?>" readonly>
        <input type="hidden" class="form-control" name="mar" value="<?php echo $d['z_mar'] ?>" readonly>
        <input type="hidden" class="form-control" name="apr" value="<?php echo $d['z_apr'] ?>" readonly>
        <input type="hidden" class="form-control" name="mei" value="<?php echo $d['z_mei'] ?>" readonly>
        <input type="hidden" class="form-control" name="jun" value="<?php echo $d['z_jun'] ?>" readonly>
        <input type="hidden" class="form-control" name="jul" value="<?php echo $d['z_jul'] ?>" readonly>
        <input type="hidden" class="form-control" name="agu" value="<?php echo $d['z_agu'] ?>" readonly>
        <input type="hidden" class="form-control" name="sep" value="<?php echo $d['z_sep'] ?>" readonly>
        <input type="hidden" class="form-control" name="okt" value="<?php echo $d['z_okt'] ?>" readonly>
        <input type="hidden" class="form-control" name="nov" value="<?php echo $d['z_nov'] ?>" readonly>
        <input type="hidden" class="form-control" name="des" value="<?php echo $d['z_des'] ?>" readonly>
        <input type="hidden" class="form-control" name="jr" value="<?php echo $d['z_jmlrealisasia'] ?>" readonly>
        <input type="hidden" class="form-control" name="js" value="<?php echo $d['z_jmlsaldoa'] ?>" readonly>
        <input type="hidden" class="form-control" name="jan2" value="<?php echo $d['z_rjan'] ?>" readonly>
        <input type="hidden" class="form-control" name="feb2" value="<?php echo $d['z_rfeb'] ?>" readonly>
        <input type="hidden" class="form-control" name="mar2" value="<?php echo $d['z_rmar'] ?>" readonly>
        <input type="hidden" class="form-control" name="apr2" value="<?php echo $d['z_rapr'] ?>" readonly>
        <input type="hidden" class="form-control" name="mei2" value="<?php echo $d['z_rmei'] ?>" readonly>
        <input type="hidden" class="form-control" name="jun2" value="<?php echo $d['z_rjun'] ?>" readonly>
        <input type="hidden" class="form-control" name="jul2" value="<?php echo $d['z_rjul'] ?>" readonly>
        <input type="hidden" class="form-control" name="agu2" value="<?php echo $d['z_ragu'] ?>" readonly>
        <input type="hidden" class="form-control" name="sep2" value="<?php echo $d['z_rsep'] ?>" readonly>
        <input type="hidden" class="form-control" name="okt2" value="<?php echo $d['z_rokt'] ?>" readonly>
        <input type="hidden" class="form-control" name="nov2" value="<?php echo $d['z_rnov'] ?>" readonly>
        <input type="hidden" class="form-control" name="des2" value="<?php echo $d['z_rdes'] ?>" readonly>
        <input type="hidden" class="form-control" name="js2" value="<?php echo $d['z_rjmlsaldoa'] ?>" readonly>
        <input type="hidden" class="form-control" name="x" value="<?php echo $d['z_pagua'] ?>">
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
<?php 
    include 'header.php';
    include '../koneksi.php';
?>
<div class="content-wrapper">
<section class="content-header">
    <h1>
        Isi Layanan
        <small>Ubah Isi Layanan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Ubah Isi Layanan</li>
    </ol>
</section>
<section class="content">
<div class="row">
<section class="col-lg-6 col-lg-offset-3">       
    <div class="box box-info">
    <div class="box-header">
        <h3 class="box-title">Ubah Isi Layanan:</h3>
        <a href="isilayanan.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp; Kembali</a> 
    </div>
    <div class="box-body">
<form action="isilayanan_update.php" method="post" enctype="multipart/form-data">
<?php 
    $id = $_GET['id'];              
    $data = mysqli_query($connect, "select * from y_isilayanan where z_idisilayanan='$id'");
    while($d = mysqli_fetch_array($data)){
?>
    <div class="form-group">
    <label>Kode Penyelenggaraan:</label>
        <select name="kode0" required="required" class="form-control">
        <option value="">- Pilih Kode Penyelenggaraan -</option>
        <?php 
            include '../koneksi.php';
            $data = mysqli_query($connect, "SELECT * FROM y_layanan");
            while($k = mysqli_fetch_array($data)){
        ?>
            <option <?php if($d['z_idlayanan'] == $k['z_idlayanan']){echo "selected='selected'";} ?> value="<?php echo $k['z_idlayanan']; ?>"><?php echo $k['z_kodelayanan'].' - '.$k['z_namalayanan']; ?></option>
        <?php } ?>
        </select>
    </div>
    <div class="form-group">
    <label>Kode Layanan:</label>
        <input type="text" class="form-control" name="kode" onkeyup="this.value = this.value.toUpperCase()" value="<?php echo $d['z_kodeisilayanan'] ?>" required="required" placeholder="Masukkan Kode Isi Layanan..." maxlength="25">
        <input type="hidden" class="form-control" name="id" value="<?php echo $d['z_idisilayanan'] ?>" required="required">
        <small class="text-muted">* Isi - Jika Tidak Ada Isinya</small>
    </div>
    <div class="form-group">
    <label>Nama Layanan:</label>
        <input type="text" class="form-control" name="nama" value="<?php echo $d['z_namaisilayanan'] ?>" required="required" placeholder="Masukkan Nama Isi Layanan..." maxlength="100">
        <small class="text-muted">* Isi - Jika Tidak Ada Isinya</small>
    </div>
    <div class="form-group">
    <label>Volume Satuan:</label>
        <input type="number" class="form-control" name="vol" value="<?php echo $d['z_volumeil'] ?>" placeholder="Masukkan Volume Satuan..." maxlength="5">
        <small class="text-muted">* Isi 0 Jika Tidak Ada Isinya</small>
    </div>
    <div class="form-group">
    <label>Jenis Satuan:</label>
        <input type="text" class="form-control" name="sat" value="<?php echo $d['z_satuanil'] ?>" onkeyup="this.value = this.value.toUpperCase()" placeholder="Masukkan Jenis Satuan..." maxlength="25">
        <small class="text-muted">* Jangan Diisi Jika Tidak Ada Isinya</small>
    </div>
    <div class="form-group">
    <label>Keterangan:</label>
        <textarea class="form-control" name="ket" rows="3" placeholder="Masukkan Keterangan Program..."><?php echo $d['z_keteranganil']; ?></textarea>
        <small class="text-muted">* Jangan Diisi Jika Tidak Ada Isinya</small>
    </div>
        <input type="hidden" class="form-control" name="f" value="<?php echo $d['z_paguil'] ?>">
        <input type="hidden" class="form-control" name="u" value="<?php echo $d['z_jmlrealisasiil'] ?>">
        <input type="hidden" class="form-control" name="c" value="<?php echo $d['z_jmlsaldoil'] ?>">
        <input type="hidden" class="form-control" name="k" value="<?php echo $d['z_rjmlsaldoil'] ?>">
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
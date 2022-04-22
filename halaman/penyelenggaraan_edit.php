<?php 
    include 'header.php';
    include '../koneksi.php';
?>
<div class="content-wrapper">
<section class="content-header">
    <h1>
        Penyelenggaraan
        <small>Ubah Penyelenggaraan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Ubah Penyelenggaraan</li>
    </ol>
</section>
<section class="content">
<div class="row">
<section class="col-lg-6 col-lg-offset-3">       
    <div class="box box-info">
    <div class="box-header">
        <h3 class="box-title">Ubah Penyelenggaraan:</h3>
        <a href="penyelenggaraan.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp; Kembali</a> 
    </div>
    <div class="box-body">
<form action="penyelenggaraan_update.php" method="post" enctype="multipart/form-data">
<?php 
    $id = $_GET['id'];              
    $data = mysqli_query($connect, "select * from y_penyelenggaraan where z_idpenyelenggaraan='$id'");
    while($d = mysqli_fetch_array($data)){
?>
    <div class="form-group">
    <label>Kode Program:</label>
        <select name="kode0" required="required" class="form-control">
        <option value="">- Pilih Kode Program -</option>
        <?php 
            include '../koneksi.php';
            $data = mysqli_query($connect, "SELECT * FROM y_program");
            while($k = mysqli_fetch_array($data)){
        ?>
            <option <?php if($d['z_idprogram'] == $k['z_idprogram']){echo "selected='selected'";} ?> value="<?php echo $k['z_idprogram']; ?>"><?php echo $k['z_kodeprogram'].' - '.$k['z_namaprogram']; ?></option>
        <?php } ?>
        </select>
    </div>
    <div class="form-group">
    <label>Kode Penyelenggaraan:</label>
        <input type="text" class="form-control" name="kode" onkeyup="this.value = this.value.toUpperCase()" value="<?php echo $d['z_kodepenyelenggaraan'] ?>" required="required" placeholder="Masukkan Kode Penyelenggaraan..." maxlength="25">
        <input type="hidden" class="form-control" name="id" value="<?php echo $d['z_idpenyelenggaraan'] ?>" required="required">
        <small class="text-muted">* Isi - Jika Tidak Ada Isinya</small>
    </div>
    <div class="form-group">
    <label>Nama Penyelenggaraan:</label>
        <input type="text" class="form-control" name="nama" value="<?php echo $d['z_namapenyelenggaraan'] ?>" required="required" placeholder="Masukkan Nama Penyelenggaraan..." maxlength="100">
        <small class="text-muted">* Isi - Jika Tidak Ada Isinya</small>
    </div>
    <div class="form-group">
    <label>Keterangan:</label>
        <textarea class="form-control" name="ket" rows="3" placeholder="Masukkan Keterangan Penyelenggaraan..."><?php echo $d['z_keterangan']; ?></textarea>
        <small class="text-muted">* Jangan Diisi Jika Tidak Ada Isinya</small>
    </div>
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
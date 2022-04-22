<?php include 'header.php'; ?>
<div class="content-wrapper">
<section class="content-header">
    <h1>
        Sub Akun
        <small>Tambah Sub Akun Baru</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Tambah Sub Akun Baru</li>
    </ol>
</section>
<section class="content">
<div class="row">
<section class="col-lg-6 col-lg-offset-3">       
    <div class="box box-info">
    <div class="box-header">
        <h3 class="box-title">Tambah Sub Akun:</h3>
        <a href="subakun.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp Kembali</a> 
    </div>
    <div class="box-body">
<form action="subakun_act.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
    <label>Kode Akun:</label>
        <select name="kode0" required="required" class="form-control">
        <option value="">- Pilih Kode Akun -</option>
        <?php 
            include '../koneksi.php';
            $data = mysqli_query($connect, "SELECT * FROM y_akun");
            while($d = mysqli_fetch_array($data)){
        ?>
            <option value="<?php echo $d['z_idakun']; ?>"><?php echo $d['z_kodeakun'].' - '.$d['z_namaakun']; ?></option>
        <?php } ?>
        </select>
    </div>
    <div class="form-group">
    <label>Kode Sub Akun:</label>
        <input type="text" class="form-control" name="kode" onkeyup="this.value = this.value.toUpperCase()" required="required" placeholder="Masukkan Kode Sub Akun..." maxlength="25">
        <small class="text-muted">* Isi - Jika Tidak Ada Isinya</small>
    </div>
    <div class="form-group">
    <label>Nama Sub Akun:</label>
        <input type="text" class="form-control" name="nama" required="required" placeholder="Masukkan Nama Sub Akun..." maxlength="100">
        <small class="text-muted">* Isi - Jika Tidak Ada Isinya</small>
    </div>
    <div class="form-group">
    <label>Volume Satuan:</label>
        <input type="number" class="form-control" name="vol" placeholder="Masukkan Volume Satuan..." maxlength="5">
        <small class="text-muted">* Isi 0 Jika Tidak Ada Isinya</small>
    </div>
    <div class="form-group">
    <label>Jenis Satuan:</label>
        <input type="text" class="form-control" name="sat" onkeyup="this.value = this.value.toUpperCase()" placeholder="Masukkan Jenis Satuan..." maxlength="25">
        <small class="text-muted">* Jangan Diisi Jika Tidak Ada Isinya</small>
    </div>
    <div class="form-group">
    <label>Keterangan:</label>
        <textarea class="form-control" name="ket" rows="3" placeholder="Masukkan Keterangan Isi Layanan..."></textarea>
        <small class="text-muted">* Jangan Diisi Jika Tidak Ada Isinya</small>
    </div>
        <input type="hidden" class="form-control" name="petugastb" id="petugastb" value="<?php echo $_SESSION['nik']; ?>" readonly>
        <input type="hidden" class="form-control" name="tgltb" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date("Y-m-d h:i:s"); ?>" readonly>
        <input type="hidden" class="form-control" name="petugasub" id="petugasub" value="0" readonly>
        <input type="hidden" class="form-control" name="tglub" value="0000-00-00 00:00:00" readonly>
    <div class="form-group" align="right">
        <input type="submit" class="btn btn-sm btn-primary" value="Simpan">
    </div>
</form>
    </div>
    </div>
</section>
</div>
</section>
</div>
<?php include 'footer.php'; ?>
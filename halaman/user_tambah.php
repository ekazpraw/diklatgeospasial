<?php include 'header.php'; ?>
<div class="content-wrapper">
<section class="content-header">
    <h1>
        Pengguna
        <small>Tambah Pengguna Baru</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Tambah Pengguna Baru</li>
    </ol>
</section>
<section class="content">
<div class="row">
<section class="col-lg-6 col-lg-offset-3">
    <div class="box box-info">
    <div class="box-header">
        <h3 class="box-title">Tambah Pengguna:</h3>
        <a href="user.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp Kembali</a> 
    </div>
    <div class="box-body">
<form action="user_act.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
    <label>Nama Lengkap:</label>
        <input type="text" class="form-control" name="nama" required="required" placeholder="Masukkan Nama Lengkap..." maxlength="250">
    </div>
    <div class="form-group">
    <label>Nama Pengguna:</label>
        <input type="text" class="form-control" name="username" required="required" placeholder="Masukkan Nama Pengguna..." maxlength="11">
    </div>
    <div class="form-group">
    <label>Kata Sandi:</label>
        <input type="password" class="form-control" name="password" required="required" min="6" placeholder="Masukkan Kata Sandi..." maxlength="50">
    </div>
    <div class="form-group">
    <label>Alamat:</label>
        <textarea class="form-control" name="alamat" rows="3" required="required" placeholder="Masukkan Alamat..."></textarea>
    </div>
    <div class="form-group">
    <label>NIK:</label>
        <input type="text" class="form-control" name="nik" required="required" placeholder="Masukkan Nomor KTP Karyawan..." min="16" maxlength="16">
    </div>
    <div class="form-group">
    <label>Nomor Telepon:</label>
        <input type="number" class="form-control" name="tlp" required="required" placeholder="Masukkan Nomor Telepon..." maxlength="50">
    </div>    
    <div class="form-group">
    <label>Tanggal Lahir:</label>
        <input type="text" id="datepicker" class="form-control" name="tl" required="required" placeholder="YYYY/MM/DD">
    </div>
    <div class="form-group">
    <label>Jenis Kelamin:</label>
        <select name="jekel" required="required" class="form-control">
            <option value="">- Pilih Jenis Kelamin -</option>
            <option value="L">Laki-Laki</option>
            <option value="P">Perempuan</option>
            <option value="X">Tidak Ingin Memberitahukan</option>
            <option value="C">Kustom</option>
        </select>
    </div>
    <div class="form-group">
    <label>Kewenangan:</label>
        <select name="level" required="required" class="form-control">
            <option value="">- Pilih Level Kewenangan -</option>
            <option value="Super Admin">Super Admin</option>
            <option value="Admin">Admin</option>
            <option value="Petugas">Petugas</option>
        </select>
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
<?php 
    include 'header.php';
    include '../koneksi.php';
?>
<div class="content-wrapper">
<section class="content-header">
    <h1>
        Pengguna
        <small>Ubah Pengguna</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Ubah Pengguna</li>
    </ol>
</section>
<section class="content">
<div class="row">
<section class="col-lg-6 col-lg-offset-3">
    <div class="box box-info">
    <div class="box-header">
        <h3 class="box-title">Ubah Pengguna:</h3>
        <a href="user.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp; Kembali</a> 
    </div>
    <div class="box-body">
<form action="user_update.php" method="post" enctype="multipart/form-data">
<?php 
    $id = $_GET['id'];              
    $data = mysqli_query($connect, "select * from y_admin where z_idadmin='$id'");
    while($d = mysqli_fetch_array($data)){
?>
    <div class="form-group">
    <label>Nama Lengkap:</label>
        <input type="text" class="form-control" name="nama" required="required" value="<?php echo $d['z_namalengkap'] ?>" placeholder="Masukkan Nama Lengkap..." maxlength="250">
        <input type="hidden" class="form-control" name="id" value="<?php echo $d['z_idadmin'] ?>" required="required">
    </div>
    <div class="form-group">
    <label>Nama Pengguna:</label>
        <input type="text" class="form-control" name="username" required="required" value="<?php echo $d['z_namapengguna'] ?>" placeholder="Masukkan Nama Pengguna..." maxlength="11">
    </div>
    <div class="form-group">
    <label>Alamat:</label>
        <textarea class="form-control" name="alamat" rows="3" required="required" placeholder="Masukkan Alamat..."><?php echo $d['z_alamat']; ?></textarea>
    </div>
    <div class="form-group">
    <label>NIK:</label>
        <input type="text" class="form-control" name="nik" required="required" value="<?php echo $d['z_nik'] ?>" placeholder="Masukkan Nomor KTP Karyawan..." min="16" maxlength="16">
    </div>
    <div class="form-group">
    <label>Nomor Telepon:</label>
        <input type="number" class="form-control" name="tlp" required="required" value="<?php echo $d['z_tlp'] ?>" placeholder="Masukkan Nomor Telepon..." maxlength="50">
    </div>    
    <div class="form-group">
    <label>Tanggal Lahir:</label>
        <input type="text" id="datepicker" class="form-control" name="tl" required="required" value="<?php echo $d['z_tl'] ?>" placeholder="YYYY/MM/DD">
    </div>
    <div class="form-group">
    <label>Jenis Kelamin:</label>
        <select name="jekel" required="required" class="form-control">
            <option value="">- Pilih Jenis Kelamin -</option>
            <option value="L"<?php if ($d['z_jekel']=="L") { echo "selected=\"selected\""; } ?>>Laki-Laki</option>
            <option value="P"<?php if ($d['z_jekel']=="P") { echo "selected=\"selected\""; } ?>>Perempuan</option>
            <option value="X"<?php if ($d['z_jekel']=="X") { echo "selected=\"selected\""; } ?>>Tidak Ingin Memberitahukan</option>
            <option value="C"<?php if ($d['z_jekel']=="C") { echo "selected=\"selected\""; } ?>>Kustom</option>
        </select>
    </div>
    <div class="form-group">
    <label>Kewenangan:</label>
        <select name="level" required="required" class="form-control">
            <option value="">- Pilih Level Kewenangan -</option>
            <option value="Super Admin"<?php if ($d['z_level']=="Super Admin") { echo "selected=\"selected\""; } ?>>Super Admin</option>
            <option value="Admin"<?php if ($d['z_level']=="Admin") { echo "selected=\"selected\""; } ?>>Admin</option>
            <option value="Petugas"<?php if ($d['z_level']=="Petugas") { echo "selected=\"selected\""; } ?>>Petugas</option>
        </select>
    </div>
    <div class="form-group">
        <input type="hidden" class="form-control" name="petugastb" id="petugastb" value="<?php echo $d['z_pb'] ?>" readonly>
        <input type="hidden" class="form-control" name="tgltb" value="<?php echo $d['z_dc'] ?>" readonly>
        <input type="hidden" class="form-control" name="petugasub" id="petugasub" value="<?php echo $_SESSION['nik']; ?>" readonly>
        <input type="hidden" class="form-control" name="tglub" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date("Y-m-d h:i:s"); ?>" readonly>
    </div>
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
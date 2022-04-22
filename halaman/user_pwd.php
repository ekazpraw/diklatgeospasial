<?php 
    include 'header.php';
    include '../function/assets_luar.php';
    include '../function/pesan.php';
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
<form action="user_updatepwd.php" method="post" enctype="multipart/form-data">
<?php 
    $id = $_GET['id'];              
    $data = mysqli_query($connect, "select * from y_admin where z_idadmin='$id'");
    while($d = mysqli_fetch_array($data)){
?>
    <div class="form-group">
    <label>Kata Sandi Baru:</label>
        <input type="password" id="form-password" class="form-control" name="sandi" placeholder="Masukkan Kata Sandi Baru Anda..." minlength="8">
        <p>&nbsp;&nbsp;<input type="checkbox" id="form-checkbox" style="margin: 10px 10px 10px 0px;"><b font-size:12px>Perlihatkan Kata Sandi?</b></p>
        <input type="hidden" class="form-control" name="id" value="<?php echo $d['z_idadmin'] ?>" required="required">
    </div>
    <div class="form-group">
        <input type="hidden" class="form-control" name="petugasub" value="<?php echo $d['z_pg'] ?>" readonly>
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
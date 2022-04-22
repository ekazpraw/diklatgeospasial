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
<section class="col-lg-4 col-lg-offset-4">  
    <div class="box box-info">
    <div class="box-header">
        <h3 class="box-title">Ubah Pengguna:</h3>
        <a href="user.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp; Kembali</a> 
    </div>
    <div class="box-body">
<form action="user_fotoact.php" method="post" enctype="multipart/form-data">
<?php 
    $id = $_GET['id'];              
    $data = mysqli_query($connect, "select * from y_admin where z_idadmin='$id'");
    while($d = mysqli_fetch_array($data)){
?>
    <div class="form-group col-lg-12 col-lg-offset-0">
    <label>Foto User:</label>
        <br>
        <?php if($d['z_foto'] == ""){ ?>
            <img src="../foto/default.jpg" class="user-image" height="200px">
        <?php }else{ ?>
            <img src="../foto/<?php echo $d['z_foto']; ?>" class="user-image" height="200px">
        <?php } ?>
        <br>
        <br>
        <input type="file" name="foto">
        <input type="hidden" class="form-control" name="id" value="<?php echo $d['z_idadmin'] ?>" required="required">
        <small class="text-muted">* Lewatkan Jika Tidak Ingin Diganti</small>
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
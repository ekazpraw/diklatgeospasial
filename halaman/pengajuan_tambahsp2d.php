<?php 
    include 'header.php';
    include '../koneksi.php';
?>
<div class="content-wrapper">
<section class="content-header">
    <h1>
        Pengajuan (SP2D)
        <small>Ubah Pengajuan (SP2D)</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Ubah Pengajuan (SP2D)</li>
    </ol>
</section>
<section class="content">
<div class="row">
<section class="col-lg-6 col-lg-offset-3">       
    <div class="box box-info">
    <div class="box-header">
        <h3 class="box-title">Ubah Pengajuan (SP2D):</h3>
        <a href="pengajuan.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp; Kembali</a> 
    </div>
    <div class="box-body">
<form action="pengajuan_actsp2d.php" method="post" enctype="multipart/form-data">
<?php 
    $id = $_GET['id'];              
    $data = mysqli_query($connect, "select * from y_pengajuan where z_idp='$id'");
    while($d = mysqli_fetch_array($data)){
?>  
    <div class="form-group">
    <label>Tanggal Cair:</label>
        <input type="text" id="datepicker" class="form-control" name="tglc" placeholder="YYYY/MM/DD">
        <small class="text-muted">* Jangan Diisi Jika Tidak Ada Isinya</small>
    </div>
    <div class="form-group">
    <label>Tanggal SPP:</label>
        <input type="text" id="datepicker2" class="form-control" name="tgls" placeholder="YYYY/MM/DD">
        <small class="text-muted">* Jangan Diisi Jika Tidak Ada Isinya</small>
    </div>
    <div class="form-group">
    <label>No. SP2D:</label>
        <input type="text" class="form-control" name="nosp2d" placeholder="Masukkan Nomor SP2D..." maxlength="100" value="<?php echo $d['z_nosp2d'] ?>">
        <small class="text-muted">* Isi - Jika Tidak Ada Isinya</small>
    </div>
    <div class="form-group">
    <label>Tanggal SP2D:</label>
        <input type="text" id="datepicker3" class="form-control" name="tgls2" placeholder="YYYY/MM/DD">
        <small class="text-muted">* Jangan Diisi Jika Tidak Ada Isinya</small>
    </div>
        <input type="hidden" class="form-control" name="idp" value="<?php echo $d['z_idp'] ?>" required="required">
        <input type="hidden" class="form-control" name="petugastb" id="petugastb" value="<?php echo $d['z_pb']; ?>">
        <input type="hidden" class="form-control" name="tgltb" value="<?php echo $d['z_dc']; ?>" readonly>
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
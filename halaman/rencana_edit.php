<?php 
    include 'header.php';
    include '../koneksi.php';
?>
<div class="content-wrapper">
<section class="content-header">
    <h1>
        Kegiatan (Rencana)
        <small>Ubah Kegiatan (Rencana)</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Ubah Kegiatan (Rencana)</li>
    </ol>
</section>
<section class="content">
<div class="row">
<section class="col-lg-6 col-lg-offset-3">       
    <div class="box box-info">
    <div class="box-header">
        <h3 class="box-title">Ubah Kegiatan (Rencana):</h3>
        <a href="rencana.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp; Kembali</a> 
    </div>
    <div class="box-body">
<form action="rencana_update.php" method="post" enctype="multipart/form-data">
<?php 
    $id = $_GET['id'];              
    $data = mysqli_query($connect, "select * from y_rencana where z_idr='$id'");
    while($d = mysqli_fetch_array($data)){
?>  
    <div class="form-group">
    <label>Nama Kegiatan:</label>
        <input type="text" class="form-control" name="nk" required="required" value="<?php echo $d['z_nk'] ?>" placeholder="Masukkan Uraian Kegiatan (Rencana)..." maxlength="100">
    </div>
    <div class="form-group">
    <label>Komponen Biaya Kegiatan:</label>
        <input type="text" class="form-control" name="kbk" required="required" value="<?php echo $d['z_kbk'] ?>" placeholder="Masukkan Uraian Kegiatan (Rencana)..." maxlength="100">
    </div>
    <div class="form-group">
    <label>LS / GU:</label>
        <select name="lsgu" required="required" class="form-control">
            <option value="">- Pilih LS / GU -</option>
            <option value="LS Pengajuan"<?php if ($d['z_rlsgu']=="LS Pengajuan") { echo "selected=\"selected\""; } ?>>LS Pengajuan</option>
            <option value="LS Rampung"<?php if ($d['z_rlsgu']=="LS Rampung") { echo "selected=\"selected\""; } ?>>LS Rampung</option>
            <option value="GU"<?php if ($d['z_rlsgu']=="GU") { echo "selected=\"selected\""; } ?>>GU</option>
        </select>
    </div>
    <div class="form-group">
    <label>Catatan:</label>
        <textarea class="form-control" name="cat" rows="2" placeholder="Masukkan Catatan Kegiatan (Rencana)..."><?php echo $d['z_rcatatan'] ?></textarea>
    </div>
    <div class="form-group">
    <label>ID:</label>
        <input type="text" class="form-control" name="ID" value="<?php echo $d['z_rID'] ?>" maxlength="100" readonly>
    </div>
        <input type="hidden" class="form-control" name="idr" value="<?php echo $d['z_idr'] ?>" required="required">
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
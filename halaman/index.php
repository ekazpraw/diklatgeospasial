<?php include 'header.php'; ?>
<div class="content-wrapper">
<section class="content-header">
    <h1>
        Dasbor
        <small>Panel Kontrol</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Dasbor</li>
    </ol>
</section>
<section class="content">
<div class="row">
<div class="col-lg-6 col-xs-12">
    <div class="small-box bg-green">
        <div class="inner">
            Semua Detail Kegiatan (Rencana):
            <?php 
                $y_kg = mysqli_query($connect, "SELECT SUM(z_rjmlsaldol) AS z_tot_rsal FROM y_layanan");
                $d = mysqli_fetch_array($y_kg);
            ?>
            <h3><?php if($d['z_tot_rsal'] == ""){ echo "No Saldo"; }else{ echo 'Rp. '.number_format($d['z_tot_rsal'], 0, ",", "."); } ?></h3>            
            <p>Sisa Saldo Rencana Realisasi</p>
        </div>
        <div class="icon">
            <i class="ion ion-cash"></i>
        </div>
            <a href="akun.php" class="small-box-footer">Lihat Selengkapnya&nbsp;&nbsp;<i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>
<div class="col-lg-6 col-xs-12">
    <div class="small-box bg-blue">
        <div class="inner">
            Semua Detail Pengajuan (Rinci):
            <?php 
                $y_rj = mysqli_query($connect, "SELECT SUM(z_jmlsaldol) AS z_tot_sal FROM y_layanan");
                $d = mysqli_fetch_array($y_rj);
            ?>
            <h3><?php if($d['z_tot_sal'] == ""){ echo "No Saldo"; }else{ echo 'Rp. '.number_format($d['z_tot_sal'], 0, ",", "."); } ?></h3> 
            <p>Sisa Saldo Realisasi</p>
        </div>
        <div class="icon">
            <i class="ion ion-cash"></i>
        </div>
            <a href="akun.php" class="small-box-footer">Lihat Selengkapnya&nbsp;&nbsp;<i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--<div class="col-lg-3 col-xs-6">
    <div class="small-box bg-green">
        <div class="inner">
            Semua Detail Kegiatan (Rencana):
            <?php 
                $y_kg = mysqli_query($connect, "SELECT * FROM y_rencana");
                $d = mysqli_fetch_array($y_kg);
            ?>
            <h3><?php if($d['z_idr'] == ""){ echo "No Data"; }else{ echo mysqli_num_rows($y_kg); } ?></h3>
            <p>Jumlah Kegiatan (Rencana)</p>
        </div>
        <div class="icon">
            <i class="ion ion-android-alarm-clock"></i>
        </div>
            <a href="rencana.php" class="small-box-footer">Info Selengkapnya&nbsp;&nbsp;<i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>
<div class="col-lg-3 col-xs-6">
    <div class="small-box bg-blue">
        <div class="inner">
            Semua Detail Pengajuan (Rinci):
            <?php 
                $y_pj = mysqli_query($connect, "SELECT * FROM y_pengajuan");
                $d = mysqli_fetch_array($y_pj);
            ?>
            <h3><?php if($d['z_idp'] == ""){ echo "No Data"; }else{ echo mysqli_num_rows($y_pj); } ?></h3>
            <p>Jumlah Pengajuan (Rinci)</p>
        </div>
        <div class="icon">
            <i class="ion ion-clipboard"></i>
        </div>
            <a href="pengajuan.php" class="small-box-footer">Info Selengkapnya&nbsp;&nbsp;<i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>-->
</div>
<div class="row">    
<section class="col-lg-6">
    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">Detail Masuk Anda:</h3>
        </div>
        <div class="box-body">
        <table class="table table-bordered">
        <tr>
            <th width="auto">Identitas Diri:</th>
            <td><img src="../foto/<?php echo $_SESSION['foto']; ?>" class="user-image" height="100px"></td>
        </tr>
        <tr>
            <th width="30%">Nama Lengkap:</th>
            <td><?php echo $_SESSION['nama']; ?></td>
        </tr>
        <tr>
            <th>NIK:</th>
            <td><?php echo $_SESSION['nik']; ?></td>
        </tr>
        <tr>
            <th>Status:</th>
            <td><span class="label label-success text-uppercase"><?php echo $_SESSION['status']; ?></span></td>
              </tr>
        </table>
        </div>
    </div>
</section>
</div>
</section>
</div>
<?php include 'footer.php'; ?>
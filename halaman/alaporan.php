<?php include 'header.php'; ?>
<div class="content-wrapper">
<section class="content-header">
    <h1>
        LAPORAN AKUN
        <small>Data Laporan Akun</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Data Laporan Akun</li>
    </ol>
</section>
<section class="content">
<div class="row">
<section class="col-lg-12">
<div class="box box-info">
    <div class="box-header">
        <h3 class="box-title">Filter Laporan:</h3>
    </div>
<div class="box-body">
    <form method="get" action="">
    <div class="row">
        <div class="col-md-3">
        <div class="form-group">
        <label>Kode Akun:</label>
            <select name="kode0" required="required" class="form-control">
                <option value="">- Pilih Kode Program -</option>
            <?php 
                include '../koneksi.php';
                $data = mysqli_query($connect, "SELECT * FROM y_akun
                    INNER JOIN y_subkomponen
                    ON y_subkomponen.z_idsubkomponen = y_akun.z_idsubkomponen
                    INNER JOIN y_komponen
                    ON y_komponen.z_idkomponen = y_subkomponen.z_idkomponen
                    INNER JOIN y_isilayanan
                    ON y_isilayanan.z_idisilayanan = y_komponen.z_idisilayanan
                    INNER JOIN y_layanan
                    ON y_layanan.z_idlayanan = y_isilayanan.z_idlayanan
                    INNER JOIN y_penyelenggaraan
                    ON y_penyelenggaraan.z_idpenyelenggaraan = y_layanan.z_idpenyelenggaraan
                    INNER JOIN y_program
                    ON y_program.z_idprogram = y_penyelenggaraan.z_idprogram
                    WHERE z_idakun");
                while($d = mysqli_fetch_array($data)){
            ?>
                <option value="<?php echo $d['z_idakun']; ?>"><?php echo $d['z_kodeprogram'].'.'.$d['z_kodepenyelenggaraan'].'.'.$d['z_kodelayanan'].'.'.$d['z_kodeisilayanan'].'.'.$d['z_kodekomponen'].''.$d['z_kodesubkomponen'].': '.$d['z_namaakun']; ?></option>
            <?php } ?>
        </select>
        </div>
        </div>
        <div class="col-md-3">
        <div class="form-group">
        <label>Opsi:</label>
            <input type="submit" value="TAMPILKAN LAPORAN" class="btn btn-sm btn-success">
        </div>
        </div>        
            <?php 
            if(isset($_GET['kode0'])){
                $ida = $_GET['kode0'];
            ?>
        <div class="col-md-2 col-lg-16">
        <div class="form-group">
        <label>&nbsp;</label>
            <a href="alaporan_print.php?kode0=<?php echo $ida ?>" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> &nbsp; CETAK / PDF LAPORAN</a> 
        </div>
        </div>
            <?php } ?>
    </div>
    </form>
</div>
</div>
    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">Laporan Akun:</h3>
        </div>
    <div class="box-body">
    <?php 
        if(isset($_GET['kode0'])){
            $ida = $_GET['kode0'];
            $data = mysqli_query($connect, "SELECT * FROM y_akun
                INNER JOIN y_subkomponen
                ON y_subkomponen.z_idsubkomponen = y_akun.z_idsubkomponen
                INNER JOIN y_komponen
                ON y_komponen.z_idkomponen = y_subkomponen.z_idkomponen
                INNER JOIN y_isilayanan
                ON y_isilayanan.z_idisilayanan = y_komponen.z_idisilayanan
                INNER JOIN y_layanan
                ON y_layanan.z_idlayanan = y_isilayanan.z_idlayanan
                INNER JOIN y_penyelenggaraan
                ON y_penyelenggaraan.z_idpenyelenggaraan = y_layanan.z_idpenyelenggaraan
                INNER JOIN y_program
                ON y_program.z_idprogram = y_penyelenggaraan.z_idprogram
                WHERE z_idakun = '$ida'");
            $id1 = mysqli_fetch_array($data);
            $id2 = $id1['z_namaakun'];
            $id3 = $id1['z_kodesubkomponen'];
            $id4 = $id1['z_kodekomponen'];
            $id5 = $id1['z_kodeisilayanan'];
            $id6 = $id1['z_kodelayanan'];
            $id7 = $id1['z_kodepenyelenggaraan'];
            $id8 = $id1['z_kodeprogram'];
    ?>
    <div class="row">
    <div class="col-lg-6">
        <table class="table table-bordered">
        <tr>
            <th width="30%">Rincian Lengkap Akun</th>
            <th width="1%">:</th>
            <td><?php echo $id8.'.'.$id7.'.'.$id6.'.'.$id5.'.'.$id4.''.$id3.': '.$id2; ?></td>
        </tr>
        </table>              
    </div>
    </div>   
    <div class="table-responsive">
        <table class="table table-bordered table-striped" id="table-datatable0">
        <thead>
        <tr>
            <th width="1%">No:</th>
            <th>Nama Sub Komponen:</th>
            <th>Kode Akun:</th>
            <th>Nama Akun (Keterangan):</th>
        </tr>
        </thead>
        <tbody>
        <?php 
            $no = 1;
            $data = mysqli_query($connect, "SELECT * FROM y_akun
                INNER JOIN y_subkomponen
                ON y_subkomponen.z_idsubkomponen = y_akun.z_idsubkomponen
                WHERE z_idakun = '$ida'");
            while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['z_kodesubkomponen'].' ('.$d['z_namasubkomponen'].')'; ?></td>
            <td><?php echo $d['z_kodeakun']; ?></td>
            <td><?php if($d['z_keterangana'] == ""){ echo $d['z_namaakun']; }else{ echo $d['z_namaakun']." (".$d['z_keterangana'].")"; } ?></td>
        </tr>
        <?php } ?>
        </tbody>
        <thead>
        <tr>
            <th>PAGU:</th>
            <th>Jumlah Realisasi:</th>
            <th>Januari</th>
            <th>Februari</th>
            <th>Maret</th>
            <th>April</th>
            <th>Mei</th>
            <th>Juni</th>
            <th>Juli</th>
            <th>Agustus</th>
            <th>September</th>
            <th>Oktober</th>
            <th>November</th>
            <th>Desember</th>
            <th>Sisa Saldo Realisasi:</th>
        </tr>
        </thead>
        <tbody>
        <?php 
            $data = mysqli_query($connect, "SELECT * FROM y_akun WHERE z_idakun = '$ida'");
            while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?php if($d['z_pagua'] == ""){ echo "Tidak Ada PAGU"; }else{ echo 'Rp. '.number_format($d['z_pagua'], 2, ",", "."); } ?></td>
            <td><?php if($d['z_jmlrealisasia'] == "0"){ echo "Tidak Ada Jumlah Realisasi"; }else{ echo 'Rp. '.number_format($d['z_jmlrealisasia'], 2, ",", "."); } ?></td>
            <td><?php if($d['z_jan'] == "0"){ echo "-"; }else{ echo 'Rp. '.number_format($d['z_jan'], 2, ",", "."); } ?></td>
            <td><?php if($d['z_feb'] == "0"){ echo "-"; }else{ echo 'Rp. '.number_format($d['z_feb'], 2, ",", "."); } ?></td>
            <td><?php if($d['z_mar'] == "0"){ echo "-"; }else{ echo 'Rp. '.number_format($d['z_mar'], 2, ",", "."); } ?></td>
            <td><?php if($d['z_apr'] == "0"){ echo "-"; }else{ echo 'Rp. '.number_format($d['z_apr'], 2, ",", "."); } ?></td>
            <td><?php if($d['z_mei'] == "0"){ echo "-"; }else{ echo 'Rp. '.number_format($d['z_mei'], 2, ",", "."); } ?></td>
            <td><?php if($d['z_jun'] == "0"){ echo "-"; }else{ echo 'Rp. '.number_format($d['z_jun'], 2, ",", "."); } ?></td>
            <td><?php if($d['z_jul'] == "0"){ echo "-"; }else{ echo 'Rp. '.number_format($d['z_jul'], 2, ",", "."); } ?></td>
            <td><?php if($d['z_agu'] == "0"){ echo "-"; }else{ echo 'Rp. '.number_format($d['z_agu'], 2, ",", "."); } ?></td>
            <td><?php if($d['z_sep'] == "0"){ echo "-"; }else{ echo 'Rp. '.number_format($d['z_sep'], 2, ",", "."); } ?></td>
            <td><?php if($d['z_okt'] == "0"){ echo "-"; }else{ echo 'Rp. '.number_format($d['z_okt'], 2, ",", "."); } ?></td>
            <td><?php if($d['z_nov'] == "0"){ echo "-"; }else{ echo 'Rp. '.number_format($d['z_nov'], 2, ",", "."); } ?></td>
            <td><?php if($d['z_des'] == "0"){ echo "-"; }else{ echo 'Rp. '.number_format($d['z_des'], 2, ",", "."); } ?></td>
            <td><?php if($d['z_jmlsaldoa'] == "0"){ echo "Saldo Realisasi Habis"; }else{ echo 'Rp. '.number_format($d['z_jmlsaldoa'], 2, ",", "."); } ?></td>
        </tr>
        <?php } ?>
        </tbody>
        <thead>
        <tr>
            <th>PAGU:</th>
            <th>Rencana Januari</th>
            <th>Rencana Februari</th>
            <th>Rencana Maret</th>
            <th>Rencana April</th>
            <th>Rencana Mei</th>
            <th>Rencana Juni</th>
            <th>Rencana Juli</th>
            <th>Rencana Agustus</th>
            <th>Rencana September</th>
            <th>Rencana Oktober</th>
            <th>Rencana November</th>
            <th>Rencana Desember</th>
            <th>Sisa Saldo Rencana Realisasi:</th>
        </tr>
        </thead>
        <tbody>
        <?php 
            $data = mysqli_query($connect, "SELECT * FROM y_akun WHERE z_idakun = '$ida'");
            while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?php if($d['z_pagua'] == "0"){ echo "Tidak Ada PAGU"; }else{ echo 'Rp. '.number_format($d['z_pagua'], 2, ",", "."); } ?></td>
            <td><?php if($d['z_rjan'] == "0"){ echo "-"; }else{ echo 'Rp. '.number_format($d['z_rjan'], 2, ",", "."); } ?></td>
            <td><?php if($d['z_rfeb'] == "0"){ echo "-"; }else{ echo 'Rp. '.number_format($d['z_rfeb'], 2, ",", "."); } ?></td>
            <td><?php if($d['z_rmar'] == "0"){ echo "-"; }else{ echo 'Rp. '.number_format($d['z_rmar'], 2, ",", "."); } ?></td>
            <td><?php if($d['z_rapr'] == "0"){ echo "-"; }else{ echo 'Rp. '.number_format($d['z_rapr'], 2, ",", "."); } ?></td>
            <td><?php if($d['z_rmei'] == "0"){ echo "-"; }else{ echo 'Rp. '.number_format($d['z_rmei'], 2, ",", "."); } ?></td>
            <td><?php if($d['z_rjun'] == "0"){ echo "-"; }else{ echo 'Rp. '.number_format($d['z_rjun'], 2, ",", "."); } ?></td>
            <td><?php if($d['z_rjul'] == "0"){ echo "-"; }else{ echo 'Rp. '.number_format($d['z_rjul'], 2, ",", "."); } ?></td>
            <td><?php if($d['z_ragu'] == "0"){ echo "-"; }else{ echo 'Rp. '.number_format($d['z_ragu'], 2, ",", "."); } ?></td>
            <td><?php if($d['z_rsep'] == "0"){ echo "-"; }else{ echo 'Rp. '.number_format($d['z_rsep'], 2, ",", "."); } ?></td>
            <td><?php if($d['z_rokt'] == "0"){ echo "-"; }else{ echo 'Rp. '.number_format($d['z_rokt'], 2, ",", "."); } ?></td>
            <td><?php if($d['z_rnov'] == "0"){ echo "-"; }else{ echo 'Rp. '.number_format($d['z_rnov'], 2, ",", "."); } ?></td>
            <td><?php if($d['z_rdes'] == "0"){ echo "-"; }else{ echo 'Rp. '.number_format($d['z_rdes'], 2, ",", "."); } ?></td>
            <td><?php if($d['z_rjmlsaldoa'] == "0"){ echo "Saldo Rencana Realisasi Habis"; }else{ echo 'Rp. '.number_format($d['z_rjmlsaldoa'], 2, ",", "."); } ?></td>
        </tr>
        <?php } ?>
        </tbody>
        <thead>
        <tr>
            <th>Dibuat Oleh:</th>
            <th>Diubah Oleh:</th>
        </tr>
        </thead>
        <tbody>
        <?php 
            $no = 1;
            $data = mysqli_query($connect, "SELECT * FROM y_akun
                INNER JOIN y_subkomponen
                ON y_subkomponen.z_idsubkomponen = y_akun.z_idsubkomponen
                WHERE z_idakun = '$ida'");
            while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?php echo $d['z_pb']." (Pada: ".$d['z_dc'].")"; ?></td>
            <td><?php if($d['z_pg'] == "0"){ echo "Data Belum Pernah Diubah"; }else{ echo $d['z_pg']." (Pada: ".$d['z_dm'].")"; } ?></td>
        </tr>
        <?php } ?>
        </tbody>
        </table>
    </div>
    <?php }else{ ?>
    <div class="alert alert-danger text-center">
        Silahkan Filter Laporan Dengan Memasukkan Detail Terlebih Dahulu.
    </div>
    <?php } ?>
    </div>
    </div>
</section>
</div>
</section>
</div>
<?php include 'footer.php'; ?>
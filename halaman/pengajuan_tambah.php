<?php include 'header.php'; ?>
<div class="content-wrapper">
<section class="content-header">
    <h1>
        Pengajuan (Rinci)
        <small>Tambah Pengajuan (Rinci) Baru</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Tambah Pengajuan (Rinci) Baru</li>
    </ol>
</section>
<section class="content">
<div class="row">
<section class="col-lg-6 col-lg-offset-3">       
    <div class="box box-info">
    <div class="box-header">
        <h3 class="box-title">Tambah Pengajuan (Rinci):</h3>
        <a href="pengajuan.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp Kembali</a> 
    </div>
    <div class="box-body">
<form action="pengajuan_act.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
    <label>Tanggal Pengajuan:</label>
        <input type="text" id="datepicker" class="form-control" name="tglp" required="required" placeholder="YYYY/MM/DD">
    </div>
    <div class="form-group">
    <label>Uraian Pengajuan:</label>
        <input type="text" class="form-control" name="urap" required="required" placeholder="Masukkan Uraian Pengajuan..." maxlength="100">
        <small class="text-muted">* Isi - Jika Tidak Ada Isinya</small>
    </div>
    <div class="form-group">
    <label>Kode Akun:</label>
        <select name="kode0" id="kode0" onchange="changeValue(this.value)"  required="required" class="form-control">
        <option value="">- Pilih Kode Akun -</option>
        <?php 
            $result = mysqli_query($connect, "SELECT * FROM y_akun
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
        $jsArray = "var prdName = new Array();\n";
        while ($row = mysqli_fetch_array($result)){
            echo '<option name="kode0" value="'.$row['z_idakun'].'">'.$row['z_kodeakun'].' - '.$row['z_namaakun'].'</option>';  
        $jsArray .= "prdName['".$row['z_idakun']."'] = {  ID:'".addslashes($row['z_kodepenyelenggaraan']).".".addslashes($row['z_kodelayanan']).".".addslashes($row['z_kodeisilayanan']).".".addslashes($row['z_kodekomponen'])."".addslashes($row['z_kodesubkomponen']).".".addslashes($row['z_kodeakun'])."',
            kode01:'".addslashes($row['z_idsubkomponen'])."',
            kode11:'".addslashes($row['z_kodesubkomponen'])." - ".addslashes($row['z_namasubkomponen'])."',            kode02:'".addslashes($row['z_idkomponen'])."',
            kode12:'".addslashes($row['z_kodekomponen'])." - ".addslashes($row['z_namakomponen'])."',            kode03:'".addslashes($row['z_idisilayanan'])."',
            kode13:'".addslashes($row['z_kodeisilayanan'])." - ".addslashes($row['z_namaisilayanan'])."',            kode04:'".addslashes($row['z_idlayanan'])."',
            kode14:'".addslashes($row['z_kodelayanan'])." - ".addslashes($row['z_namalayanan'])."',
            ssr:'".addslashes($row['z_jmlsaldoa'])."'};\n";
        } ?> 
        </select>
    </div>
    <div class="form-group">
    <label>Kode Sub Komponen:</label>
        <input type="hidden" class="form-control" name="kode01" id="kode01" maxlength="25" readonly>
        <input type="text" class="form-control" name="kode11" id="kode11" maxlength="25" placeholder="Kode Sub Komponen Muncul Otomatis" readonly>
    </div>    
    <!--<div class="form-group">
    <label>Kode Komponen:</label>-->
        <input type="hidden" class="form-control" name="kode02" id="kode02" maxlength="25" readonly>
        <input type="hidden" class="form-control" name="kode12" id="kode12" maxlength="25" placeholder="Kode Komponen Muncul Otomatis" readonly>
    <!--</div>
    <div class="form-group">
    <label>Kode Isi Layanan:</label>-->
        <input type="hidden" class="form-control" name="kode03" id="kode03" maxlength="25" readonly>
        <input type="hidden" class="form-control" name="kode13" id="kode13" maxlength="25" placeholder="Kode Isi Layanan Muncul Otomatis" readonly>
    <!--</div>
    <div class="form-group">
    <label>Kode Layanan:</label>-->
        <input type="hidden" class="form-control" name="kode04" id="kode04" maxlength="25" readonly>
        <input type="hidden" class="form-control" name="kode14" id="kode14" maxlength="25" placeholder="Kode Layanan Muncul Otomatis" readonly>
    <!--</div>-->
    <div class="form-group">
    <label>PAGU:</label>
        <input type="text" class="form-control" name="ssr" id="ssr" onkeyup="minus()" maxlength="25" placeholder="Rp. 0,-" readonly>
    </div>
    <div class="form-group">
    <label>Nominal:</label>
        <input type="number" class="form-control" name="nominal" id="nominal" onkeyup="minus()" maxlength="25" placeholder="Masukkan Nominal Pengajuan...">
        <small class="text-muted">* Isi 0 Jika Tidak Ada Isinya</small>
    </div>
    <div class="form-group">
    <label>Sisa Saldo Realisasi:</label>
        <input type="number" class="form-control" name="saldo" id="saldo" maxlength="25" placeholder="Rp. 0,-" readonly>
    </div>
    <div class="form-group">
    <label>LS / GU:</label>
        <select name="lsgu" required="required" class="form-control">
            <option value="">- Pilih LS / GU -</option>
            <option value="LS Pengajuan">LS Pengajuan</option>
            <option value="LS Rampung">LS Rampung</option>
            <option value="GU">GU</option>
        </select>
    </div>
    <div class="form-group">
    <label>Catatan:</label>
        <textarea class="form-control" name="cat" rows="2" placeholder="Masukkan Catatan Pengajuan..."></textarea>
        <small class="text-muted">* Jangan Diisi Jika Tidak Ada Isinya</small>
    </div>
    <div class="form-group">
    <label>Bulan Pengajuan:</label>
        <select name="rbp" required="required" class="form-control">
            <option value="">- Pilih Bulan Pengajuan -</option>
            <option value="Januari">Januari</option>
            <option value="Februari">Februari</option>
            <option value="Maret">Maret</option>
            <option value="April">April</option>
            <option value="Mei">Mei</option>
            <option value="Juni">Juni</option>
            <option value="Juli">Juli</option>
            <option value="Agustus">Agustus</option>
            <option value="September">September</option>
            <option value="Oktober">Oktober</option>
            <option value="November">November</option>
            <option value="Desember">Desember</option>
        </select>
    </div>
    <div class="form-group">
    <label>ID:</label>
        <input type="text" class="form-control" name="ID" id="ID" maxlength="100" placeholder="ID Muncul Otomatis" readonly>
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
<script type="text/javascript"> 
<?php echo $jsArray; ?>
function changeValue(id){
    document.getElementById('ssr').value = prdName[id].ssr;
    document.getElementById('ID').value = prdName[id].ID;
    document.getElementById('kode01').value = prdName[id].kode01;
    document.getElementById('kode11').value = prdName[id].kode11;    document.getElementById('kode02').value = prdName[id].kode02;
    document.getElementById('kode12').value = prdName[id].kode12;    document.getElementById('kode03').value = prdName[id].kode03;
    document.getElementById('kode13').value = prdName[id].kode13;    document.getElementById('kode04').value = prdName[id].kode04;
    document.getElementById('kode14').value = prdName[id].kode14;
};
</script>
<script>
function minus() {
    var txtFirstNumberValue = document.getElementById('ssr').value;
    var txtSecondNumberValue = document.getElementById('nominal').value;
    var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
    if (!isNaN(result)){
        document.getElementById('saldo').value = result;
    }
}
</script>
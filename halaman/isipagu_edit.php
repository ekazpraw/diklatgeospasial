<?php 
    include 'header.php';
    include '../koneksi.php';
?>
<div class="content-wrapper">
<section class="content-header">
    <h1>
        PAGU
        <small>Ubah PAGU</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Ubah PAGU</li>
    </ol>
</section>
<section class="content">
<div class="row">
<section class="col-lg-6 col-lg-offset-3">       
    <div class="box box-info">
    <div class="box-header">
        <h3 class="box-title">Ubah PAGU:</h3>
        <a href="isipagu.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp; Kembali</a> 
    </div>
    <div class="box-body">
<form action="isipagu_update.php" method="post" enctype="multipart/form-data">
<?php 
    $id = $_GET['id'];              
    $data = mysqli_query($connect, "SELECT * FROM y_isipagu
        INNER JOIN y_subakun
        ON y_subakun.z_idsubakun = y_isipagu.z_idsubakun
        INNER JOIN y_akun
        ON y_akun.z_idakun = y_subakun.z_idakun                    
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
    WHERE z_idpagu='$id'");
while($d = mysqli_fetch_array($data)){
?>
    <div class="form-group">
    <label>Kode Sub Akun:</label>
        <select name="kode0" id="kode0" onchange="changeValue(this.value)" required="required" class="form-control">
        <option value="">- Pilih Kode Sub Akun -</option>
        <?php 
            $result = mysqli_query($connect, "SELECT * FROM y_subakun
                    INNER JOIN y_akun
                    ON y_akun.z_idakun = y_subakun.z_idakun                    
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
                    WHERE z_idsubakun");
        $jsArray = "var prdName = new Array();\n";
        while ($row = mysqli_fetch_array($result)){
            echo '<option name="kode0" value="'.$row['z_idsubakun'].'">'.$row['z_kodesubakun'].' - '.$row['z_namasubakun'].'</option>';  
        $jsArray .= "prdName['".$row['z_idsubakun']."'] = {
            kode01:'".addslashes($row['z_idakun'])."',
            kode11:'".addslashes($row['z_kodeakun'])." - ".addslashes($row['z_namaakun'])."',
            kode02:'".addslashes($row['z_idsubkomponen'])."',
            kode12:'".addslashes($row['z_kodesubkomponen'])." - ".addslashes($row['z_namasubkomponen'])."',
            kode03:'".addslashes($row['z_idkomponen'])."',
            kode13:'".addslashes($row['z_kodekomponen'])." - ".addslashes($row['z_namakomponen'])."',
            kode04:'".addslashes($row['z_idisilayanan'])."',
            kode14:'".addslashes($row['z_kodeisilayanan'])." - ".addslashes($row['z_namaisilayanan'])."',
            kode05:'".addslashes($row['z_idlayanan'])."',
            kode15:'".addslashes($row['z_kodelayanan'])." - ".addslashes($row['z_namalayanan'])."'
            };\n";
        } ?> 
        </select>
    </div>
    <div class="form-group">
    <label>Kode Akun:</label>
        <input type="hidden" class="form-control" name="kode01" id="kode01" maxlength="25" value="<?php echo $d['z_idakun'] ?>" readonly>
        <input type="text" class="form-control" name="kode11" id="kode11" maxlength="25" placeholder="Kode Komponen Muncul Otomatis" readonly>
    </div>
    <div class="form-group">
    <label>Kode Sub Komponen:</label>
        <input type="hidden" class="form-control" name="kode02" id="kode02" maxlength="25" value="<?php echo $d['z_idsubkomponen'] ?>" readonly>
        <input type="text" class="form-control" name="kode12" id="kode12" maxlength="25" placeholder="Kode Komponen Muncul Otomatis" readonly>
    </div>
    <div class="form-group">
    <label>Kode Komponen:</label>
        <input type="hidden" class="form-control" name="kode03" id="kode03" maxlength="25" value="<?php echo $d['z_idkomponen'] ?>" readonly>
        <input type="text" class="form-control" name="kode13" id="kode13" maxlength="25" placeholder="Kode Komponen Muncul Otomatis" readonly>
    </div>
    <div class="form-group">
    <label>Kode Isi Layanan:</label>
        <input type="hidden" class="form-control" name="kode04" id="kode04" maxlength="25" value="<?php echo $d['z_idisilayanan'] ?>" readonly>
        <input type="text" class="form-control" name="kode14" id="kode14" maxlength="25" placeholder="Kode Komponen Muncul Otomatis" readonly>
    </div>    
    <div class="form-group">
    <label>Kode Layanan:</label>
        <input type="hidden" class="form-control" name="kode05" id="kode05" maxlength="25" value="<?php echo $d['z_idlayanan'] ?>" readonly>
        <input type="text" class="form-control" name="kode15" id="kode15" maxlength="25" placeholder="Kode Komponen Muncul Otomatis" readonly>
    </div>
    <div class="form-group">
    <label>Kode PAGU:</label>
        <input type="text" class="form-control" name="kode" onkeyup="this.value = this.value.toUpperCase()" value="<?php echo $d['z_kodepagu'] ?>" required="required" placeholder="Masukkan Kode PAGU..." maxlength="25">
        <input type="hidden" class="form-control" name="id" value="<?php echo $d['z_idpagu'] ?>" required="required">
        <small class="text-muted">* Isi - Jika Tidak Ada Isinya</small>
    </div>
    <div class="form-group">
    <label>Nama PAGU:</label>
        <input type="text" class="form-control" name="nama" value="<?php echo $d['z_namapagu'] ?>" required="required" placeholder="Masukkan Nama PAGU..." maxlength="100">
        <small class="text-muted">* Isi - Jika Tidak Ada Isinya</small>
    </div>
    <div class="form-group">
    <label>Volume Satuan:</label>
        <input type="number" class="form-control" name="vol" id="vol" onkeyup="plus()" value="<?php echo $d['z_volumeip'] ?>" placeholder="Masukkan Volume Satuan..." maxlength="5">
        <small class="text-muted">* Isi 0 Jika Tidak Ada Isinya</small>
    </div>
    <div class="form-group">
    <label>Jenis Satuan:</label>
        <input type="text" class="form-control" name="sat" value="<?php echo $d['z_satuanip'] ?>" onkeyup="this.value = this.value.toUpperCase()" placeholder="Masukkan Jenis Satuan..." maxlength="25">
        <small class="text-muted">* Jangan Diisi Jika Tidak Ada Isinya</small>
    </div>
    <div class="form-group">
    <label>Harga Satuan:</label>
        <input type="number" class="form-control" name="hars" id="hars" onkeyup="plus()" value="<?php echo $d['z_hargasatuanip'] ?>" placeholder="Masukkan Harga Satuan..." maxlength="25">
        <small class="text-muted">* Isi 0 Jika Tidak Ada Isinya</small>
    </div>
    <div class="form-group">
    <label>PAGU:</label>
        <input type="number" class="form-control" name="pagu" id="pagu" value="<?php echo $d['z_paguip'] ?>" maxlength="25" placeholder="Rp. 0,-" readonly>
    </div>
    <div class="form-group">
    <label>Keterangan:</label>
        <textarea class="form-control" name="ket" rows="3" placeholder="Masukkan Keterangan PAGU..."><?php echo $d['z_keteranganip']; ?></textarea>
        <small class="text-muted">* Jangan Diisi Jika Tidak Ada Isinya</small>
    </div>
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
<script type="text/javascript"> 
<?php echo $jsArray; ?>
function changeValue(id){
    document.getElementById('kode01').value = prdName[id].kode01;
    document.getElementById('kode02').value = prdName[id].kode02;
    document.getElementById('kode03').value = prdName[id].kode03;
    document.getElementById('kode04').value = prdName[id].kode04;
    document.getElementById('kode05').value = prdName[id].kode05;
    document.getElementById('kode11').value = prdName[id].kode11;
    document.getElementById('kode12').value = prdName[id].kode12;
    document.getElementById('kode13').value = prdName[id].kode13;
    document.getElementById('kode14').value = prdName[id].kode14;
    document.getElementById('kode15').value = prdName[id].kode15;
};
</script>
<script>
function plus() {
    var txtFirstNumberValue = document.getElementById('vol').value;
    var txtSecondNumberValue = document.getElementById('hars').value;
    var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
    if (!isNaN(result)){
        document.getElementById('pagu').value = result;
    }
}
</script>
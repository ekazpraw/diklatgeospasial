<?php
session_start();
include "koneksi.php";
include "function/beda_ip.php";
include "function/assets_luar.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pintu Masuk: Badan Informasi Geospasial - Diklat Geospasial</title>
    <link rel="icon" type="image/x-icon" href="images/pavicon.png" />
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>
<body class="hold-transition login-page">
<div class="login-logo">
<br>
</div>
<div class="login-box">
    <div class="login-box-body">
        <center><img src="images/Badges.png" width="200px" height="200px" style="color:black" class="img-login"></center>
        <p class="login-box-msg" style=" font-size: 16px">Rencana Kerja dan Anggaran Kementerian Negara/ Lembaga (RKA-KL)</p>
    <form action="login.php" method="post">
        <div class="form-group has-feedback">
            <input type="username" name="nik" class="form-control" placeholder="Masukkan NIK Anda">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" id="form-password" name="password" class="form-control" placeholder="Masukkan Kata Sandi Anda">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
        <p>&nbsp;&nbsp;<input type="checkbox" id="form-checkbox" style="margin: 10px 10px 10px 0px;"><b font-size:12px>Perlihatkan Kata Sandi?</b></p>
        </div>
    <div class="row">
        <div class="col-xs-8">     
        </div> 
        <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
        </div> 
    </div>
    </form> 
    </div>
</div>
</body>
</html>
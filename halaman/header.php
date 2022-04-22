<?php include "../function/belum_login.php"; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Badan Informasi Geospasial - Diklat Geospasial</title>
    <link rel="icon" href="../images/pavicon.png" sizes="400x400" type="image/png">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<?php 
include '../koneksi.php';
include '../function/assets_dalam.php';
session_start();
?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<header class="main-header">
    <a href="index.php" class="logo">
        <span class="logo-mini" ><img src="../images/logcil.png" style="border: none;" width="32" alt="" /></span>
        <span class="logo-lg"><b>GEOSPASIAL V.1.</b><font size="1pt"></font></span>
    </a>
    <nav class="navbar navbar-static-top">
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="hidden-xs"><?php echo $_SESSION['nama']; ?> - <?php echo $_SESSION['level']; ?></span>
            </a>
            </li>
            <li>
                <a href="../logout.php"><i class="fa fa-sign-out"></i> KELUAR</a>
            </li>
        </ul>
    </div>
    </nav>
</header>
<aside class="main-sidebar">
    <section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVIGASI MENU:</li>
        <?php 
            $id = $_SESSION['id_pengguna'];
            $menu = mysqli_query($connect, "select * from y_admin where z_idadmin='$id'");
            $menu = mysqli_fetch_assoc($menu);
        if($_SESSION['level'] == "Super Admin"){ 
        ?>
        <li> 
            <a href="index.php">
                <i class="fa fa-home"></i> <span>DASBOR</span>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-database"></i> <span>SET PAGU / REKAP</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li>
                <a href="program.php">
                    <i class="fa fa-cog"></i> <span>PROGRAM</span>
                </a>
                </li>
                <li>
                <a href="penyelenggaraan.php">
                    <i class="fa fa-archive"></i> <span>PENYELENGGARAAN</span>
                </a>
                </li>
                <li>
                <a href="layanan.php">
                    <i class="fa fa-file"></i> <span>LAYANAN</span>
                </a>
                </li>
                <li>
                <a href="isilayanan.php">
                    <i class="fa fa-file-text"></i> <span>ISI LAYANAN</span>
                </a>
                </li>
                <li>
                <a href="komponen.php">
                    <i class="fa fa-sort-amount-desc"></i> <span>KOMPONEN</span>
                </a>
                </li>
                <li>
                <a href="subkomponen.php">
                    <i class="fa fa-sort-alpha-asc"></i> <span>SUB KOMPONEN</span>
                </a>
                </li>
                <li>
                <a href="akun.php">
                    <i class="fa fa-sitemap"></i> <span>AKUN</span>
                </a>
                </li>                
                <li>
                <a href="subakun.php">
                    <i class="fa fa-map-signs"></i> <span>SUB AKUN</span>
                </a>
                </li>
                <li>
                <a href="isipagu.php">
                    <i class="fa fa-money"></i> <span>ISI PAGU</span>
                </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="rencana.php">
                <i class="fa fa-refresh"></i> <span>KEGIATAN</span>
            </a>
        </li>         
        <li>
            <a href="pengajuan.php">
                <i class="fa fa-send"></i> <span>PENGAJUAN</span>
            </a>
        </li>        
        <li class="treeview">
            <a href="#">
                <i class="fa fa-file-pdf-o"></i> <span>LAPORAN</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li>
                <a href="rlaporan.php">
                    <i class="fa fa-download"></i> <span>LAPORAN KEGIATAN</span>
                </a>
                </li>
                <li>
                <a href="plaporan.php">
                    <i class="fa fa-download"></i> <span>LAPORAN PENGAJUAN</span>
                </a>
                </li>
                <li>
                <a href="alaporan.php">
                    <i class="fa fa-download"></i> <span>LAPORAN AKUN</span>
                </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="user.php">
                <i class="fa fa-users"></i> <span>DATA PENGGUNA</span>
            </a>
        </li>
        <li>
            <a href="../logout.php">
                <i class="fa fa-sign-out"></i> <span>KELUAR</span>
            </a>
        </li>
        <?php
            }else if($_SESSION['level'] == "Admin"){
        ?>   
        <li> 
            <a href="index.php">
                <i class="fa fa-home"></i> <span>DASBOR</span>
            </a>
        </li>
        <li>
            <a href="rencana.php">
                <i class="fa fa-refresh"></i> <span>KEGIATAN</span>
            </a>
        </li>         
        <li>
            <a href="pengajuan.php">
                <i class="fa fa-send"></i> <span>PENGAJUAN</span>
            </a>
        </li>
        <li>
            <a href="user.php">
                <i class="fa fa-users"></i> <span>DATA PENGGUNA</span>
            </a>
        </li>
        <li>
            <a href="../logout.php">
                <i class="fa fa-sign-out"></i> <span>KELUAR</span>
            </a>
        </li>
        <?php
            }else if($_SESSION['level'] == "Petugas"){
        ?>
        <li> 
            <a href="index.php">
                <i class="fa fa-home"></i> <span>DASBOR</span>
            </a>
        </li>
        <li>
            <a href="rencana.php">
                <i class="fa fa-refresh"></i> <span>KEGIATAN</span>
            </a>
        </li>        
        <li>
            <a href="../logout.php">
                <i class="fa fa-sign-out"></i> <span>KELUAR</span>
            </a>
        </li>
        <?php } ?>
    </ul>
    </section>
</aside>
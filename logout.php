<title>Verifikasi Keluar</title>
<link rel="icon" type="image/x-icon" href="images/pavicon.png" />
<?php 
    session_start();
    session_destroy();
    include "function/pesan_luar.php";
    echo KeluarMsg();
?>
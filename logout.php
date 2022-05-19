<?php
session_start();
session_destroy();
echo "<script>window.alert('Anda sudah keluar');window.location.replace('index.php')</script>";
 ?>

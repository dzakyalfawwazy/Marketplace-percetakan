<?php 
date_default_timezone_set("Asia/Jakarta");
$con= new mysqli('localhost','root','','db_beras');
// $con= new mysqli('localhost','id11055392_db_binagrahita','jaringamal','id11055392_db_binagrahita');
//$con= new mysqli('localhost:3306','sipedasd_root','disnakerin','sipedasd_disnakerin');
if ($con->connect_error)
{
	die($con->connect_error);
}
$kad=mysqli_query($con,"update tb_faktur set status='Batal' where status='Belum Bayar' and waktu_kadaluarsa < now()");
?>
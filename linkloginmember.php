<?php
include 'konfig.php';
$username=$_POST['username'];
$password=$_POST['password'];
$num=mysqli_fetch_array(mysqli_query($con,"select * from tb_user where nama_user='$username' and password='$password' and level='user'"));
if ($num['level']=='user')
{
	session_start();
	$_SESSION['status']='userok';
	$_SESSION['id_pelanggan']=$num['id_pelanggan']; 
	$_SESSION['username']=$num['nama_user']; 
	echo "<script>window.location.replace('products.php')</script>";}
	else {
		echo "<script>window.location.replace('index.php');window.alert('Username dan Password Salah')</script>";
	}
	?>

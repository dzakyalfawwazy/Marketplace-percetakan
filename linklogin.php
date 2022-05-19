<?php
include 'konfig.php';
$username=$_POST['username'];
$password=$_POST['password'];
$num=mysqli_fetch_array(mysqli_query($con,"select * from tb_user where nama_user='$username' and password='$password'"));
if ($num['level']=='admin')
{
	session_start();
	$_SESSION['status']='adminok';
	echo "<script>window.location.replace('admin/')</script>";
} elseif ($num['level']=='user')
{
	session_start();
	$_SESSION['status']='userok';
	$_SESSION['id_pelanggan']=$num['id_pelanggan']; 
	$_SESSION['username']=$num['nama_user']; 
	echo "<script>window.location.replace('index.php')</script>";}

	elseif ($num['level']=='toko')
	{
		session_start();
		$_SESSION['status']='tokook';
		$_SESSION['id_toko']=$num['id_pelanggan'];
		echo "<script>window.location.replace('toko/index.php')</script>";}
		else {
			echo "<script>window.alert('Opp! Username atau Password salah!'); window.location.href='login.php'</script>";
		}
		?>

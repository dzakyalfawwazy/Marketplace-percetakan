<?php
include 'konfig.php';
$username=$_POST['username'];
$password=$_POST['password'];
$count=mysqli_num_rows(mysqli_query($con,"select * from tb_karyawan where username='$username' and password='$password'"));
if ($count==1)
	{
$num=mysqli_fetch_array(mysqli_query($con,"select * from tb_karyawan where username='$username' and password='$password'"));
		session_start();
		$_SESSION['status']='karyawanok';
		$_SESSION['id_karyawan']=$num['nik_karyawan'];
		$_SESSION['id_toko']=$num['id_toko'];
		echo "<script>window.location.replace('karyawan/index.php')</script>";}
		else {
			echo "<script>window.alert('Opp! Username atau Password salah!'); window.location.href='loginkaryawan.php'</script>";
		}
		?>

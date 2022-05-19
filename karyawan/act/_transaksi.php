<?php
include '../acc/crudApp.php';
$db = new crud();
$tipe=$_GET['type'];
session_start();
if($tipe=='inputresi'){
	$id=$_POST['id'];
	$value="resi = '".$_POST['resi']."',nik='".$_SESSION['id_karyawan']."'";
	$query=$db->edit('tb_faktur',$value,'no_faktur',$id);

	echo "<script>alert('Resi Berhasil diinputkan');window.location.href='../index.php?hal=konfirmasitransaksi'</script>";
}
if($tipe=='verifikasipembayaran'){
	$id=$_GET['id'];
	$query=$db->edit("tb_faktur","status='Verifikasi Pembayaran' ,nik='".$_SESSION['id_karyawan']."'","no_faktur",$id);

	echo "<script>alert('Pembayaran diverifikasi');window.location.href='../index.php?hal=konfirmasitransaksi'</script>";
}
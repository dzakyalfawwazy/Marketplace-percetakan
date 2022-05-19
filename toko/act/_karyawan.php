<?php
include '../acc/crudApp.php';
$db = new crud();
session_start();
$tipe=$_GET['type'];
if($tipe=='tambah'){
	$value= "'".$_POST['nik']."','".$_POST['nama']."','".$_POST['jabatan']."','".$_POST['username']."','".$_POST['password']."','".$_SESSION['id_toko']."'";
	$query = $db->insert('tb_karyawan', $value);
	
	echo "<script>window.alert('Data Berhasil Ditambah');window.location.href='../index.php?hal=datakaryawan'</script>";
}
if ($tipe=='hapus'){
	$id=$_GET['id'];
	$query = $db->delete('tb_karyawan','nik_karyawan',$id);
	header('location:../index.php?hal=datakaryawan');
}
if($tipe=='edit'){
	$value= "	nama_kategori = '".$_POST['nama']."',
				gambar = '-'";
	$query = $db->edit('tb_pelanggan', $value, 'id_pelanggan', $_POST["id_pelanggan"]);
}
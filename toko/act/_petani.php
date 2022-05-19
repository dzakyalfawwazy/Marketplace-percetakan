<?php
include '../acc/crudApp.php';
$db = new crud();
$tipe=$_GET['type'];
if($tipe=='tambah'){
	$value= "NULL,'".$_POST['nama']."','-'";
	$query = $db->insert('tb_pelanggan', $value);
}
if ($tipe=='hapus'){
	$id=$_GET['id'];
	$query = $db->delete('tb_toko','id_toko',$id);
	header('location:../index.php?hal=datatoko');
}
if($tipe=='edit'){
	$value= "	nama_kategori = '".$_POST['nama']."',
				gambar = '-'";
	$query = $db->edit('tb_pelanggan', $value, 'id_pelanggan', $_POST["id_pelanggan"]);
}
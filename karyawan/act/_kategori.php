<?php
include '../acc/crudApp.php';
$db = new crud();
$tipe=$_GET['type'];
if($tipe=='tambah'){
	$value= "NULL,'".$_POST['nama']."'";
	$query = $db->insert('tb_kategori', $value);
}
if ($tipe=='hapus'){
	$id=$_GET['id'];
	$query = $db->delete('tb_kategori','id_kategori',$id);
	header('location:../index.php?hal=datakategori');
}
if($tipe=='edit'){
	$value= "	nama_kategori = '".$_POST['nama']."'";
	$query = $db->edit('tb_kategori', $value, 'id_kategori', $_POST["id_kategori"]);
}
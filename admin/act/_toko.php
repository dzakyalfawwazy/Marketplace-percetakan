<?php
include '../acc/crudApp.php';
$db = new crud();
$tipe=$_GET['type'];
if($tipe=='tambah'){
	$value= "NULL,'".$_POST['jenis']."','".$_POST['isi']."'";
	$query = $db->insert('tb_profil', $value);
}
if ($tipe=='hapus'){
	$id=$_GET['id'];
	$query = $db->delete('tb_profil','id',$id);
	header('location:../index.php?hal=datatoko');
}
if($tipe=='edit'){
	$value= "	jenis = '".$_POST['jenis']."',
				nilai = '".$_POST['isi']."'";
	$query = $db->edit('tb_profil', $value, 'id', $_POST["id"]);
}
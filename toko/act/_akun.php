<?php
include '../acc/crudApp.php';
$db = new crud();
$tipe=$_GET['type'];
if($tipe=='confirmaccount'){
	$value = "status = 'active'";
	$query = $db->edit( 'tb_user', $value, 'id_user', $_GET["id"]);
	header('location:../index.php?hal=konfirmasiakun');
}
if($tipe=='deactivatedaccount'){
	$value = "status = 'deactivated'";
	$query = $db->edit( 'tb_user', $value, 'id_user', $_GET["id"]);
	header('location:../index.php?hal=dataakun');
}
if($tipe=='confirmaccounttoko'){
	$value = "status = 'active'";
	$query = $db->edit( 'tb_user', $value, 'id_user', $_GET["id"]);
	header('location:../index.php?hal=konfirmasiakuntoko');
}
if($tipe=='deactivatedaccounttoko'){
	$value = "status = 'deactivated'";
	$query = $db->edit( 'tb_user', $value, 'id_user', $_GET["id"]);
	header('location:../index.php?hal=dataakuntoko');
}
if($tipe=='activatedaccounttoko'){
	$value = "status = 'active'";
	$query = $db->edit( 'tb_user', $value, 'id_user', $_GET["id"]);
	header('location:../index.php?hal=dataakuntoko');
}
if($tipe=='edit'){
	$value= "	nama_user = '".$_POST['username']."',
				password = '".$_POST['password']."'";
	$query = $db->edit('tb_user', $value, 'id_user', $_POST["id"]);
}
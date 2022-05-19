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

if($tipe=='edittoko'){
	$id=$_POST['id_toko'];
	if($_FILES['imagess']['name']==NULL){
	$value="
	nama_toko='".$_POST['nama_toko']."',
	email='".$_POST['email']."',
	nohp='".$_POST['nohp']."',
	kodepos='".$_POST['kodepos']."',
	alamat='".$_POST['alamat']."'";
} else {
	$ekstensi_diperbolehkan = array('png','jpg','jpeg');
	$nama = $_FILES['imagess']['name'];
	$x = explode('.', $nama);
	$ekstensi = strtolower(end($x));
	$ukuran = $_FILES['imagess']['size'];
	$file_tmp = $_FILES['imagess']['tmp_name'];  
	$temp = explode(".", $_FILES["imagess"]["name"]);
	$nama_baru = round(microtime(true)) . '.' . end($temp);
	$value="
	nama_toko='".$_POST['nama_toko']."',
	email='".$_POST['email']."',
	nohp='".$_POST['nohp']."',
	kodepos='".$_POST['kodepos']."',
	alamat='".$_POST['alamat']."',
	foto='".$nama_baru."'";
	move_uploaded_file($file_tmp, '../../upload/toko/'.$nama_baru);
}
// echo $value;
	$query=$db->edit('tb_toko',$value,'id_toko',$id);

	$value1="
	nama_user='".$_POST['nama_user']."',
	password='".$_POST['password']."'";

	$query2=$db->edit('tb_user',$value1,'id_pelanggan',$id);
	echo "<script> alert('Data Profil Berhasil diubah');window.location='../index.php?hal=detailtoko';</script>";
}
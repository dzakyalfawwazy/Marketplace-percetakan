<?php
include '../acc/crudApp.php';
$db = new crud();
$tipe=$_GET['type'];
if($tipe=='tambah'){
	$idbarang = "PR-".date('Y')."".date('m')."".date('d')."".date('h')."".date('i')."".date('s');
	$value= "
	'".$idbarang."',
	'".$_POST['nama']."',
	'".$_POST['kategori']."',
	'".$_POST['merk']."',
	'".$_POST['berat']."',
	'".$_POST['deskripsi']."',
	'".date('Y-m-d h:i:s')."'";
	$query = $db->insert('tb_produk', $value);
}
if($tipe=='tambahdetail'){
	$idbarang = "PD-".date('Y')."".date('m')."".date('d')."".date('h')."".date('i')."".date('s');
	$image=addslashes(file_get_contents($_FILES['imagess']['tmp_name']));
	$value= "'".$idbarang."','".$_POST['id_produk']."','".$_POST['ukuran']."','".$_POST['warna']."','".$_POST['hargabeli']."','".$_POST['hargajual']."','".$_POST['jumlah']."','".$image."'";
	$query = $db->insert('tb_produkdetail', $value);
}
if ($tipe=='hapus'){
	$id=$_GET['id'];
	$query = $db->delete('tb_produk','id_produk',$id);
	header('location:../index.php?hal=dataproduk');
}
if ($tipe=='hapusdetail'){
	$id=$_GET['id'];
	$query = $db->delete('tb_produkdetail','id_produkdetail',$id);
	header('location:../index.php?hal=datadetailproduk');
}
if($tipe=='edit'){
	$value= "	nama_produk = '".$_POST['nama']."',
				id_kategori = '".$_POST['kategori']."',
				merk = '".$_POST['merk']."',
				berat = '".$_POST['berat']."',
				deskripsi = '".$_POST['deskripsi']."'";
	$query = $db->edit('tb_produk', $value, 'id_produk', $_POST["id_produk"]);

}
if($tipe=='editdetail'){
	if(($_FILES['imagess']['name'])==NULL){
	$value= "	
				ukuran = '".$_POST['ukuran']."',
				warna = '".$_POST['warna']."',
				hargabeli = '".$_POST['hargabeli']."',
				hargajual = '".$_POST['hargajual']."',
				stok = '".$_POST['jumlah']."'";
			}
	else {
	$image=addslashes(file_get_contents($_FILES['imagess']['tmp_name']));
	$value= "
				ukuran = '".$_POST['ukuran']."',
				warna = '".$_POST['warna']."',
				hargabeli = '".$_POST['hargabeli']."',
				hargajual = '".$_POST['hargajual']."',
				stok = '".$_POST['jumlah']."',
				gambar = '".$image."'";
	}
	$query = $db->edit('tb_produkdetail', $value, 'id_produkdetail', $_POST["id_produkdetail"]);
}
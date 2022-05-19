<?php
include '../acc/crudApp.php';
session_start();
$db = new crud();
$tipe=$_GET['type'];
if($tipe=='tambah'){
	$idbarang = "PR-".date('Y')."".date('m')."".date('d')."".date('h')."".date('i')."".date('s');
	$value= "
	'".$idbarang."',
	'".$_SESSION['id_toko']."',
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
	$ekstensi_diperbolehkan = array('png','jpg','jpeg');
	$nama = $_FILES['imagess']['name'];
	$x = explode('.', $nama);
	$ekstensi = strtolower(end($x));
	$ukuran = $_FILES['imagess']['size'];
	$file_tmp = $_FILES['imagess']['tmp_name'];  
	$temp = explode(".", $_FILES["imagess"]["name"]);
	$nama_baru = round(microtime(true)) . '.' . end($temp);
	$value= "'".$idbarang."','".$_POST['id_produk']."','".$_POST['ukuran']."','".$_POST['warna']."','".$_POST['harga']."','".$_POST['jumlah']."','".$nama_baru."'";
	// echo $value;
	$query = $db->insert('tb_produkdetail', $value);
	
	move_uploaded_file($file_tmp, '../../upload/barang/'.$nama_baru);
	echo "<script>window.alert('Berhasil Menyimpan!');window.location.href='../index.php?hal=datadetailproduk'</script>";
	
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
		harga = '".$_POST['harga']."',
		stok = '".$_POST['jumlah']."'";
	}
	else {
		$ekstensi_diperbolehkan = array('png','jpg','jpeg');
		$nama = $_FILES['imagess']['name'];
		$x = explode('.', $nama);
		$ekstensi = strtolower(end($x));
		$ukuran = $_FILES['imagess']['size'];
		$file_tmp = $_FILES['imagess']['tmp_name'];  
		$temp = explode(".", $_FILES["imagess"]["name"]);
		$nama_baru = round(microtime(true)) . '.' . end($temp);
		$value= "
		ukuran = '".$_POST['ukuran']."',
		warna = '".$_POST['warna']."',
		harga = '".$_POST['harga']."',
		stok = '".$_POST['jumlah']."',
		gambar = '".$nama_baru."'";
		move_uploaded_file($file_tmp, '../../upload/barang/'.$nama_baru);
	}
	$query = $db->edit('tb_produkdetail', $value, 'id_produkdetail', $_POST["id_produkdetail"]);
}
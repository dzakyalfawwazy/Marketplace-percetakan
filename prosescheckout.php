<?php 
session_start();
if(isset($_SESSION['status'])!='userok')
 echo "<script>window.alert('Anda harus login dulu untuk melanjutkan'); window.location.href='cart.php'</script>";
else {}
include 'konfig.php';
$y=date('Y');
    $m=date('m');
    $d=date('d');
    $h=date('h');
    $i=date('i');
    $s=date('s');
    $id="TR-".$y."".$m."".$d."".$h."".$i."".$s;
    if($_POST['jenis_pembayaran'] == '2'){
// echo "insert into tb_faktur values('$id',now(),date_add(now(), INTERVAL 1 DAY),'$_POST[alamat]','$_POST[ongkirr]','$_POST[tot_hasil]','$_POST[jenis_pembayaran]','Belum Bayar','-','$_SESSION[id_pelanggan]','-')";
mysqli_query($con,"insert into tb_faktur values('$id',now(),date_add(now(), INTERVAL 1 DAY),'$_POST[alamat]','$_POST[ongkirr]','$_POST[tot_hasil]','$_POST[jenis_pembayaran]','Belum Bayar','-','$_SESSION[id_pelanggan]','-')") or die(mysqli_error($con));
}
else {    
    // echo "insert into tb_faktur values('$id',now(),date_add(now(), INTERVAL 1 DAY),'-','0','$_POST[tot_belanja]','$_POST[jenis_pembayaran]','Belum Bayar','-','$_SESSION[id_pelanggan]','-')";
mysqli_query($con,"insert into tb_faktur values('$id',now(),date_add(now(), INTERVAL 1 DAY),'-','0','$_POST[tot_belanja]','$_POST[jenis_pembayaran]','Belum Bayar','-','$_SESSION[id_pelanggan]','-')") or die(mysqli_error($con));
}
foreach ($_SESSION['shopping_cart'] as $key => $value) {
    $quantity=($value['item_quantity']);
	$query=mysqli_query($con,"INSERT INTO `tb_detailfaktur`(`iddetail`, `no_faktur`, `id_produk`, `jumlah`) VALUES (NULL,'$id','$value[item_id]','$value[item_quantity]')") or die(mysqli_error($con));
	$query2=mysqli_query($con,"UPDATE tb_produk set stok=stok-'$quantity' where id_produk='$value[item_id]'");

	if($query){unset($_SESSION['shopping_cart'][$key]);} else {};
}
	echo '<script> window.alert("Proses Checkout Selesai"); window.location="checkout.php?id='.$id.'";</script>';
?>
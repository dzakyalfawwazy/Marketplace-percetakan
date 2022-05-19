<?php
include "konfig.php";
if(empty($_GET))
{
	echo "<script>window.alert('Data Tidak di temukan'); window.location.href='products.php'</script>";
} else {}
if(isset($_GET['id']))
{
	$q=mysqli_query($con,"SELECT * FROM tb_detailfaktur where no_faktur='$_GET[id]'");
	while($r=mysqli_fetch_array($q)){
	$que=mysqli_query($con,"UPDATE tb_produkdetail set stok=stok+'$r[jumlah]' where id_produkdetail='$r[id_produk]'");
	}
	if($que){
	$qu2=mysqli_query($con,"UPDATE tb_faktur set status='Batal' where no_faktur='$_GET[id]'"); }
	echo "<script>window.alert('Order Anda sudah di hapus');window.location.href='history'</script>";
}
else echo "<script>window.alert('Data Tidak di temukan'); window.location.href='cart'</script>";
?>

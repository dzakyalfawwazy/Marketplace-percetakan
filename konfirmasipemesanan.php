<?php
include "konfig.php";
if(empty($_GET))
{
	echo "<script>window.alert('Data Tidak di temukan'); window.location.href='products.php'</script>";
} else {}
if(isset($_GET['id']))
{
	$qu2=mysqli_query($con,"UPDATE tb_faktur set status='Selesai' where no_faktur='$_GET[id]'"); 
	echo "<script>window.alert('Barang Sudah Dikonfirmasi');window.location.href='history?page=Selesai'</script>";
}
else echo "<script>window.alert('Data Tidak di temukan'); window.location.href='cart'</script>";
?>

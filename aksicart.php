<?php 
session_start();
foreach ($_SESSION['shopping_cart'] as $key => $value) {
	if ($value['item_id']==$_GET['id']){
	unset($_SESSION['shopping_cart'][$key]);
	echo '<script> window.alert("Item sudah di hapus"); window.location="cart.php";</script>'; }
}
?>
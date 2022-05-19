<?php 
session_start();
$id=$_GET['id'];
if(isset($_POST['add'])){
  if(isset($_SESSION['status'])=='userok'){
  if (isset($_SESSION['shopping_cart']))
  {
    $item_array_id=array_column($_SESSION["shopping_cart"], "item_id");
    if (!in_array($_GET['id'],$item_array_id)) {
      $count =count($_SESSION['shopping_cart']);
      $item_array = array(
       'item_id' => $_POST['id_produkdetail'],
       'item_quantity' => $_POST['jumlah']
     );
      $_SESSION['shopping_cart'][$count]=$item_array;
    }
      else {
        echo "<script> window.alert('Data Sudah ada'); window.location='detailproduct.php?id=$id';</script>";
      }
    }
  
  else {
    $item_array = array(
      'item_id' => $_GET['id'],
      'item_quantity' => $_POST['jumlah']
    );
    $_SESSION["shopping_cart"][0]=$item_array;
  }
  echo "<script>window.location='cart.php';</script>";
  }
  else {
        echo "<script> window.alert('Untuk memesan produk anda harus login terlebih dahulu'); window.location='detailproduct.php?id=$id';</script>";
      }
}
?>
<?php session_start();
include 'konfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no, minimal-ui"/>
    
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Questrial|Raleway:700,900" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.extension.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/swiper.css" rel="stylesheet" type="text/css" />
    <link href="css/sumoselect.css" rel="stylesheet" type="text/css" />
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <link rel="shortcut icon" href="img/icon.png" />
    <title>Marketplace Percetakan</title>
</head>
<body style="  background: url('img/back.jpg'); background-repeat:  repeat-y repeat-x;">

    <div id="content-block">
        <!-- HEADER -->
        <header>
            <div class="header-top">
                <div class="content-margins">
                    <div class="row">
                        <div class="col-md-5 hidden-xs hidden-sm">
                            <div class="entry"><b>contact us:</b> <a href="tel:+6281277590193">0812 7759 0193</a></div>
                            <!-- <div class="entry"><b>email:</b> <a href="mailto:tokoberasyanti@gmail.com">tokoberasyanti@gmail.com</a></div> -->
                        </div>
                        <div class="col-md-7 col-md-text-right">
                            <?php if($_SESSION['status']=='userok'){ ?>
                                <div class="entry"><a href="logout.php"><b>Logout</b></a></div><div class="entry"><a href="profil.php"><b>Profil</b></a></div>
                            <?php } else { ?>
                                <div class="entry"><a class="open-popup" data-rel="1"><b>login</b></a>&nbsp; or &nbsp;<a class="open-popup" data-rel="2"><b>register</b></a></div>
                            <?php } ?>
                            <div class="entry hidden-xs hidden-sm cart">
                                <a href="cart.php">
                                    <b class="hidden-xs">Keranjang</b>
                                    <span class="cart-icon">
                                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                        <span class="cart-label">
                                         <?php
                                         if (!empty($_SESSION))
                                         {
                                          if (isset($_SESSION['shopping_cart'])){
                                            ?>
                                            (<?=  count($_SESSION['shopping_cart']) ?>)
                                        <?php  } else { echo "0";}
                                    } 
                                    else {echo "0";} ?>
                                </span>
                            </span>
                        </a>
                        <div class="cart-toggle hidden-xs hidden-sm">
                            <div class="cart-overflow">
                                <?php 
                                if(!empty($_SESSION['shopping_cart']))
                                    {  $total = 0;
                                      foreach ($_SESSION['shopping_cart'] as $key => $value) {
                                        $dataa=mysqli_fetch_array(mysqli_query($con,"select * from tb_produk,tb_produkdetail where tb_produkdetail.id_produkdetail='$value[item_id]' and tb_produk.id_produk=tb_produkdetail.id_produk"));
                                        ?>
                                        <div class="cart-entry clearfix">
                                            <a class="cart-entry-thumbnail" href="#"><img src="upload/barang/<?=$dataa['gambar']?>" alt="" width='100px' class="img-rounded" /></a>
                                            <div class="cart-entry-description">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <div class="h6"><a href="#"><?= $dataa['nama_produk']; ?></a></div>
                                                            <div class="simple-article size-1">QUANTITY: <?= $value['item_quantity'];?></div>
                                                        </td>
                                                        <td>
                                                            <div class="simple-article size-3 grey"><?=$dataa['harga']?></div>
                                                            <div class="simple-article size-1"><?php $totalbarang=(int)($dataa['harga'])* ($value['item_quantity']);
                                                            $tot_belanja1[]=$totalbarang;
                                                            echo $totalbarang;  ?></div>
                                                        </td>
                                                        <td>
                                                            <a class="button-close" href="aksicart.php?id=<?= $value['item_id'] ?>"></a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    <?php } } ?>
                                </div>
                                <div class="empty-space col-xs-b40"></div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="cell-view empty-space col-xs-b50">
                                            <div class="simple-article size-5 light">TOTAL <span class="color">Rp.<?= @$tot_belanja=array_sum($tot_belanja1); ?>.00</span></div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <a class="button size-2 style-3" href="cart.php">
                                            <span class="button-wrapper">
                                                <span class="icon"><img src="img/icon-4.png" alt=""></span>
                                                <span class="text">Proses Checkout Barang</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hamburger-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="content-margins">
                <div class="row">
                    <div class="col-xs-3 col-sm-1">
                        <a id="logo" href="index.php"><img src="img/icon.png" alt="" /><div class="h6" style="color: green">Marketplace Percetakan</div></a>  
                    </div>
                    <div class="col-xs-9 col-sm-11 text-right">
                        <div class="nav-wrapper">
                            <div class="nav-close-layer"></div>
                            <nav>
                                <ul>
                                    <?php if($_SESSION['status']=='userok'){} else { ?>
                                    <li>
                                        <a href="index.php">Home</a>
                                    </li>
                                    
                                <?php } ?>
                                    <li>
                                        <a href="toko.php">Toko</a>
                                    </li>
                                    <li>
                                        <a href="products.php">Produk</a>
                                    </li>
                                    <li>
                                        <a href="about.php">tentang</a>
                                    </li>
                                    <li>
                                        <a href="#">Halaman</a>
                                        <div class="menu-toggle"></div>
                                        <ul>
                                            <li>
                                                <a href="cart.php">Keranjang</a>
                                            </li>
                                            <li>
                                                <a href="history.php">Riwayat</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- <li><a href="contact.php">Kontak</a></li> -->
                                </ul>
                                <div class="navigation-title">
                                    Navigation
                                    <div class="hamburger-icon active">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

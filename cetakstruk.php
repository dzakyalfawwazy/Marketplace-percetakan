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
    <title>Ecommerce Percetakan</title>
</head>
<?php if(isset($_SESSION['status'])=='userok')
{}
else  echo "<script>window.alert('Anda harus login dulu untuk melanjutkan'); window.location.href='index.php'</script>";

if(empty($_GET)) echo "<script>window.alert('Silahkan Pilih Data Dahulu');window.location.href='products.php'</script>";
?>
<?php $sel_order=mysqli_fetch_array(mysqli_query($con,"select * from tb_faktur where id_pelanggan='$_SESSION[id_pelanggan]' and no_faktur='$_GET[id]' and status <> 'batal'"));
$query_tr=mysqli_query($con,"select * from tb_detailfaktur,tb_produk,tb_produkdetail,tb_faktur where tb_faktur.no_faktur ='$sel_order[no_faktur]' and tb_faktur.no_faktur=tb_detailfaktur.no_faktur and tb_produkdetail.id_produk=tb_produk.id_produk and tb_produkdetail.id_produkdetail=tb_detailfaktur.id_produk");

if(isset($_POST['upload']))
{
   $ekstensi_diperbolehkan = array('png','jpg','jpeg');
   $nama = $_FILES['bukti']['name'];
   $x = explode('.', $nama);
   $ekstensi = strtolower(end($x));
   $ukuran = $_FILES['bukti']['size'];
   $file_tmp = $_FILES['bukti']['tmp_name'];  
   $temp = explode(".", $_FILES["bukti"]["name"]);
   $nama_baru = round(microtime(true)) . '.' . end($temp);

   if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)
   {
        // echo "insert into tb_produk values('','$_POST[nama]','$_POST[kategori]','$_POST[harga]','$_POST[stok]','$nama_baru','$_POST[desk]', now()";
    $query = mysqli_query($con,"update tb_faktur set bukti_pembayaran='$nama_baru', alamat_penerima='$_POST[alamat]', status='Upload' where no_faktur='$_GET[id]'") or die(mysqli_error($con));
      if($query){
        $rowpro=mysqli_query($con,"select * from tb_detailfaktur where no_faktur='$_GET[id]'");
        while ($datapro=mysqli_fetch_array($rowpro)) {

            mysqli_query($con,"update tb_produk set stok=stok-'".$datapro['jumlah']."' where id_produk ='$datapro[id_produk]'");

        }

        move_uploaded_file($file_tmp, 'upload/bukti_pembayaran/'.$nama_baru);
        echo "<script>window.alert('Bukti Pembayaran Sudah di Upload, silahkan cek riwayat pembelian anda'); window.location.href='index'</script>";
    }
    else{echo "<script> window.alert('GAGAL MENGUPLOAD GAMBAR');</script>";}
}

else{ echo "<script> window.alert('EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN');</script>";}
}
?>
<body>
<div class="container">
    
    <div class="text-center">
        <div class="h2">Struk Pembelian</div>
       
    </div>
</div>

<div class="empty-space col-xs-b35 col-md-b70"></div>

<div class="container">
    <form method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6 col-xs-b50 col-md-b0">
                <h4 class="h4 col-xs-b25">Detail Pembayaran</h4>
                <div class="row m10">
                    <div class="col-sm-6">
                        <label>ID Faktur</label>
                        <input class="simple-input" readonly type="text" value="<?= $sel_order['no_faktur'] ?>"/>
                        <div class="empty-space col-xs-b20"></div>
                    </div>
                    <div class="col-sm-6">
                        <label>Status Pemesanan</label>
                        <input class="simple-input" readonly type="text" value="<?php if($sel_order['status']=="upload") echo 'Uploaded';else echo $sel_order['status'] ; ?>" placeholder="Last name" />
                        <div class="empty-space col-xs-b20"></div>
                    </div>
                </div>
                <label> Waktu Order
                    <input class="simple-input" type="text" readonly value="<?= date('h:i / d M Y',strtotime($sel_order['waktu_penjualan'])) ?>" placeholder="Company name" />
                    <div class="empty-space col-xs-b20"></div>
                </label>
                <label>Bayar Sebelum
                    <input class="simple-input" type="text" value="<?= date('h:i / d M Y',strtotime($sel_order['waktu_kadaluarsa'])) ?>" placeholder="Street address" />
                    <div class="empty-space col-xs-b20"></div>
                </label>
                <?php if($sel_order['alamat_penerima']!='-')
                    {
                        $st=$sel_order['alamat_penerima'];
                        $read="readonly";
                    } else {  $st="";
                        $read="";}?>

                <div class="row m10">
                    <label>Alamat Penerima</label>
                    <textarea class="simple-input" name="alamat" <?= $read ?> style="height: 100px" placeholder="Alamat Penerima" required><?= $st; ?></textarea>
                </div>
        </div>
        <div class="col-md-6">
            <h4 class="h4 col-xs-b25">Orderan kamu</h4>
            <?php while($row=mysqli_fetch_array($query_tr)){ ?>
                <div class="cart-entry clearfix">
                    <a class="cart-entry-thumbnail" href="#"><img class="img-thumbnail" width="100px" src="upload/barang/<?= $row['gambar'] ?>" alt=""></a>
                    <div class="cart-entry-description">
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="h6"><a href="#"><?= $row['nama_produk'] ?></a></div>
                                        <div class="simple-article size-1">QUANTITY: <?= $row['jumlah'] ?></div>
                                    </td>
                                    <td>
                                        <div class="simple-article size-1 grey">Rp.<?= (int)($row['harga'] ) ?>,00/KG</div>
                                        <div class="simple-article size-4">TOTAL: Rp.<?= number_format((int)($row['harga'] * $row['jumlah']),2,',','.') ?></div>
                                    </td>
                                    <td>
                                        <div class="cart-color" style="background: #eee;"></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php } ?>
            <div class="order-details-entry simple-article size-3 grey uppercase" style="background-color: white; border-radius: 10px">
                <div class="row">
                    <div class="col-xs-6 h6">
                        Total Belanja
                    </div>
                    <div class="col-xs-6 col-xs-text-right">
                        <div class="color"><?= $sel_order['total_bayar']?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6 h6">
                        Ongkos Kirim
                    </div>
                    <div class="col-xs-6 col-xs-text-right">
                        <div class="color"><?= $sel_order['ongkos_kirim']?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6 h6">
                        Total
                    </div>
                    <div class="col-xs-6 col-xs-text-right">
                        <div class="color"><?= $sel_order['total_bayar'] + $sel_order['ongkos_kirim']?></div>
                    </div>
                </div>
            </div>
            <h4 class="h4 col-xs-b25">Bukti Pembayaran</h4>
            <div class="row">
              <div class="col-md-12 p-5">
                <?php if($sel_order['bukti_pembayaran']!='-')
                {
                    $linkgambar="upload/bukti_pembayaran/".$sel_order['bukti_pembayaran'];
                    $dis="disabled";
              } else 
              {
                $linkgambar='#';
                } ?>
          </div>
      </div>
      <img id="blah" src="<?= $linkgambar ?>" alt="your image" class="img-thumbnail" />
      <?php if($sel_order['bukti_pembayaran']=='-')
                { ?>
      <div class="input-file-wrapper">
        <div class="simple-input" data-placeholder="Attach your resume">Attach your resume</div>
        <input type="file" name="bukti" required accept="image/x-png,image/jpeg" onchange="$(this).parent().addClass('active').find('.simple-input').text($(this).val().split( '\\' ).pop()); if($(this).val()=='') $(this).next().click();" />
        <div class="file-remove"></div>
    </div>  
    <div class="empty-space col-xs-b30"></div>
    <div class="row">
        <div class="col-md-6">
            <div class="button block size-2 style-3">
                <span class="button-wrapper">
                    <span class="icon"><img src="img/icon-4.png" alt=""></span>
                    <span class="text">Unggah Bukti Pembayaran</span>
                </span>
                <input type="submit" name="upload" />
            </div>
        </div>
        <div class="col-md-6">
            <a onclick="return confirm('Anda yakin untuk membatalkan order?')" href="aksicheckout?id=<?=$_GET['id']?>" class="button size-2 style-2">
                <span class="button-wrapper">
                    <span class="icon">X</span>
                    <span class="text">Batal Pemesanan</span>
                </span>
            </a>
        </div>
    </div>
    <?php } else 
              {}?>
</div>
</div>
</form>
</div>
</div>

</div>

<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/swiper.jquery.min.js"></script>

<script src="js/map.js"></script>

<!-- CONTACT -->
<script src="js/contact.form.js"></script>
<script type="text/javascript">
    window.print();
</script>
</body>
</html>

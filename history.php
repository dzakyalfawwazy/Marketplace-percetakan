<?php include 'template/header.php';
if(isset($_SESSION['status'])=='userok')
{}
else  echo "<script>window.alert('Anda harus login dulu untuk melanjutkan'); window.location.href='index.php'</script>";

 if(isset($_GET['page'])){ 
 $op=$_GET["page"];}
 else {$op="Menu Riwayat";}?>

<div class="header-empty-space"></div>

<div class="container">
    <div class="empty-space col-xs-b15 col-sm-b30"></div>
    <div class="breadcrumbs">
        <a href="#">home</a>
        <a href="#">checkout</a>
    </div>
    <div class="text-center">
        <div class="simple-article size-3 grey uppercase col-xs-b5">Halaman</div>
        <div class="h2">Riwayat Transaksi</div>
        <div class="title-underline center"><span></span></div>
        <div class="row">
            <div class="col-md-12">
                <div class="simple-article size-4 grey">Marketplace Toko Percetakan</div>
                <div class="empty-space col-xs-b20 col-sm-b35 col-md-b70"></div>
                <div class="row m10">
                    <form name="form2" method="get">
                    <div class="col-sm-6">
                        <select class="SlectBox" name="page">
                            <option disabled="disabled" selected="selected"><?= $op ?></option>
                            <option value="Berhasil">Berhasil</option>
                            <option value="Proses">Proses</option>
                            <option value="Batal">Batal</option>
                        </select>
                        <div class="empty-space col-xs-b20"></div>
                    </div>
                    <div class="col-sm-6">

                        <div class="button size-2 style-3">
                            <span class="button-wrapper">
                                <span class="icon"><img src="img/icon-4.png" alt=""></span>
                                <span class="text">Lihat</span>
                            </span>
                            <input type="submit"/>
                        </div>
                    </div>
                </form>
                <div class="col-sm-12">
                        <?php if(isset($_GET['page'])){ ?>
                    <table class="table table-stripped">
                        <tr class="bg-danger font-weight-bold">
                            <td>Waktu</td>
                            <td>Nama Produk</td>
                            <td>Alamat Penerima</td>
                            <td>Jumlah</td>
                            <td>Metode Bayar</td>
                            <td>Status</td>
                            <td>Harga</td>
                            <td>Total</td>
                            <?php if($_GET['page']=='Batal'){ } else { echo "
                            <td>Aksi</td>";} ?>
                        </tr>
                        <?php 
                        if($_GET['page']=='Berhasil'){$proses="and tb_faktur.status='Selesai'";}
                        elseif($_GET['page']=='Batal'){$proses="and tb_faktur.status='Batal'";}
                        else {$proses="and tb_faktur.status <> 'Batal' and tb_faktur.status <> 'Selesai'";}

                        $query=$con->query("select * from tb_detailfaktur,tb_produk,tb_faktur,tb_produkdetail,tb_metodebayar where tb_produk.id_produk=tb_produkdetail.id_produk and tb_produkdetail.id_produkdetail=tb_detailfaktur.id_produk and tb_faktur.no_faktur=tb_detailfaktur.no_faktur $proses and tb_metodebayar.id_metode_bayar=tb_faktur.id_metode_bayar and tb_faktur.id_pelanggan='$_SESSION[id_pelanggan]'");
                        while($row=$query->fetch_array()){ ?>
                        <tr>
                            <td><?= date('h:i d M Y',strtotime($row['waktu_penjualan'])) ?></td>
                            <td><?= $row['nama_produk'] ?></td>
                            <td><?= $row['alamat_penerima'] ?></td>
                            <td><?= $row['jumlah'] ?></td>
                            <td><?= $row['metodebayar'] ?></td>
                            <td><?= $row['status'] ?></td>
                            <td>Rp.<?= number_format($row['harga'],2,',','.') ?></td>
                            <td>Rp.<?php $harga=$row['jumlah']*$row['harga']; echo number_format($harga,2,'.',',') ?></td>
                            <?php if($_GET['page']=='Batal'){ } else { ?>
                            <td><a class="btn btn-success btn-sm" href="checkout?id=<?=$row['no_faktur']?>"><i class="fa fa-eye"></i></a></td>
                        <?php }?>
                        </tr>
                    <?php } ?>
                    </table>
                    <?php } else {}?>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="empty-space col-xs-b35 col-md-b70"></div>
<div class="empty-space col-xs-b35 col-md-b70"></div>


<?php include 'template/footer.php' ?>

<!-- masonry -->
<script src="js/isotope.pkgd.min.js"></script>
<script>
    $(window).load(function(){
        var $container = $('.grid').isotope({
            itemSelector: '.grid-item',
            masonry: {
                columnWidth: '.grid-sizer'
            }
        });
    });
</script>

</body>
</html>

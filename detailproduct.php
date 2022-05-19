<?php include 'template/header.php' ?>
<?php 
if(isset($_GET))
{
    if(isset($_GET['id']))
    {
        $cari="select * from tb_produk, tb_produkdetail, tb_kategori  where tb_produk.id_kategori=tb_kategori.id_kategori and tb_produkdetail.id_produk=tb_produk.id_produk and tb_produk.id_produk='$_GET[id]'";
    }
    else echo "<script>window.location.href='products.php'</script>";
} 
if(empty($_GET)) echo "<script>window.location.href='products.php'</script>";
$selproduk=mysqli_query($con,$cari);
$rowproduk=mysqli_fetch_array($selproduk);

?>

<div class="header-empty-space"></div>
<div class="container">
    <div class="empty-space col-xs-b15 col-sm-b30"></div>
    <div class="breadcrumbs">
        <a href="#">home</a>
        <a href="#">produk</a>
    </div>
    <div class="empty-space col-xs-b15 col-sm-b50 col-md-b100"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-sm-6 col-xs-b30 col-sm-b0">

                    <div class="main-product-slider-wrapper swipers-couple-wrapper">
                        <div class="swiper-container swiper-control-top">
                           <div class="swiper-button-prev hidden"></div>
                           <div class="swiper-button-next hidden"></div>
                           <div class="swiper-wrapper">
                            <?php $gambar=mysqli_query($con, "select * from tb_produkdetail,tb_produk where tb_produk.id_produk=tb_produkdetail.id_produk and tb_produk.id_produk='$_GET[id]'");
                            while($dgambar=mysqli_fetch_array($gambar)){
                                ?>
                                <div class="swiper-slide">
                                    <div class="swiper-lazy-preloader"></div>
                                    <div class="product-big-preview-entry swiper-lazy" data-background="upload/barang/<?= $dgambar['gambar'] ?>"></div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="empty-space col-xs-b30 col-sm-b60"></div>

                    <div class="swiper-container swiper-control-bottom" data-breakpoints="1" data-xs-slides="3" data-sm-slides="3" data-md-slides="4" data-lt-slides="4" data-slides-per-view="5" data-center="1" data-click="1">
                       <div class="swiper-button-prev hidden"></div>
                       <div class="swiper-button-next hidden"></div>
                       <div class="swiper-wrapper">
                        <?php while($dgambar2=mysqli_fetch_array($gambar)){
                            ?>
                            <div class="swiper-slide">
                                <div class="product-small-preview-entry">
                                    <img src="img/product-preview-4_.jpg" alt="" />
                                </div>
                            </div>

                        <?php } ?>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-sm-6" style="background-color: white;border-radius: 30px; box-shadow: 10px 10px 5px grey">
            <form method="post" action="proseskeranjang.php?id=<?= $rowproduk['id_produk']?>">
                <input type="hidden" name="id_produkdetail" id="idpd" value="">
                <div class="simple-article size-3 grey col-xs-b5"><?=$rowproduk['nama_kategori']?></div>
                <div class="h3 col-xs-b25"><?=$rowproduk['nama_produk']?></div>
                <div class="row col-xs-b25">
                    <div class="col-sm-6">
                        <div class="simple-article size-5 grey">Harga: <span class="color">Rp.<?=number_format((int)$rowproduk['harga'],2,',','.')?></span></div>        
                    </div>
                    <div class="col-sm-6 col-sm-text-right">

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="simple-article size-3 col-xs-b5">ITEM NO.: <span class="grey"><?=$rowproduk['id_produk']?></span></div>
                        <input type="hidden" id="harga" value="<?=$rowproduk['harga']?>">
                    </div>
                    <div class="col-sm-6 col-sm-text-right">
                        <div class="simple-article size-3 col-xs-b20"></div>
                    </div>
                </div>
                <div class="row col-xs-b40">
                    <div class="col-sm-12">
                        <div class="panel panel-default">

                            <div class="panel-body">
                              <div class="h6 detail-data-title size-3 col-xs-b20">Varian:
                              </div>
                                    <select class="form-control" required="" name="varian" id="varian" required >
                                    <option value="" selected disabled>Pilih Varian</option>
                              <?php $var=mysqli_query($con,"select * from tb_produkdetail where id_produk='$_GET[id]'");
                              while($dav=mysqli_fetch_array($var)){ ?>
                                    <option value="<?= $dav['id_produkdetail'] ?>"><?= $dav['ukuran'] ?>- <?= $dav['warna'] ?></option>

                            <?php } ?>
                                    </select>
                        </div>
                    </div>

                </div>

            <div class="col-sm-3">
                <div class="h6 detail-data-title size-1">Harga:
                </div>
            </div>
            <div class="col-sm-9">
                 <div class="h6 detail-data-title size-1" id="hargaa">&nbsp;</div>
            </div>
            <div class="col-sm-3">
                <div class="h6 detail-data-title size-1">Jumlah:
                </div>
            </div>
            <div class="col-sm-9">
                <div class="quantity-select">
                    <div class="form-row">
                        <div class="col-sm-12">
                            <input type="number" id="jumlah" name="jumlah" maxlength="12" min='0' max="<?= $rowproduk['stok'] ?>" value="0" pattern='[0-9]+' title="Masukan dengan angka" class="input-text qty">
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="h6 detail-data-title size-1">Total:
                </div>
            </div>
            <div class="col-sm-9">
                <div class="quantity-select">
                    <div class="form-row">
                        <div class="col-sm-12">
                            <input type="text" id="total" title="Masukan dengan angka" class="input-text qty">
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="row m5 col-xs-b40">
            <div class="col-sm-6 col-xs-b10 col-sm-b0">

                <button type="submit" class="button size-2 style-2 block" name="add">
                    <span class="button-wrapper">
                        <span class="icon"><img src="img/icon-2.png" alt=""></span>
                        <span class="text">Tambah Keranjang</span>
                    </span>
                </button>
            </div>
            <div class="col-sm-6">
                <a class="button size-2 style-1 block noshadow" href="#">
                    <span class="button-wrapper">
                        <span class="icon"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
                        <span class="text">Tambah ke Favorit</span>
                    </span>
                </a>
            </div>
        </div>
    </form>
</div>
</div>

<div class="empty-space col-xs-b35 col-md-b70"></div>

<div class="tabs-block">
    <div class="tabulation-menu-wrapper text-center">
        <div class="tabulation-title simple-input">description</div>
        <ul class="tabulation-toggle">
            <li><a class="tab-menu active">description</a></li>
        </ul>
    </div>
    <div class="empty-space col-xs-b30 col-sm-b60"></div>

    <div class="tab-entry visible">
        <div class="row">
            <div class="col-sm-6 col-xs-b30 col-sm-b0">
                <div class="h5"><?= $rowproduk['nama_produk'] ?></div>
                <div class="simple-article">
                    <img class="rounded-image" width="500px" src="img/produk/<?= $rowproduk['gambar'] ?>" alt="" />
                </div>
                <div class="empty-space col-xs-b25"></div>
                <div class="empty-space col-xs-b20"></div>
            </div>
            <div class="col-sm-6">
                <div class="empty-space col-xs-b25"></div>
                <div class="h5">Deskripsi</div>
                <div class="empty-space col-xs-b20"></div>
                <div class="simple-article size-2"><?= $rowproduk['deskripsi'] ?></div>
            </div>
        </div>

    </div>
</div>

</div>
<?php //include 'template/kategori.php' ?>
</div>
<?php $q1=mysqli_query($con,"SELECT * FROM tb_kategori");
while($rowk=mysqli_fetch_array($q1)){ ?>
    <div class="swiper-container arrows-align-top" data-breakpoints="1" data-xs-slides="1" data-sm-slides="3" data-md-slides="4" data-lt-slides="4" data-slides-per-view="5">
        <div class="h4 swiper-title"><?= $rowk['nama_kategori'] ?></div>
        <div class="empty-space col-xs-b20"></div>
        <div class="swiper-button-prev style-1"></div>
        <div class="swiper-button-next style-1"></div>
        <div class="swiper-wrapper">
            <?php $q2=mysqli_query($con,"SELECT * FROM tb_produk, tb_kategori,tb_produkdetail where tb_produkdetail.id_produk=tb_produk.id_produk and tb_kategori.id_kategori=tb_produk.id_kategori and tb_produk.id_kategori='$rowk[id_kategori]'");
            while($row1=mysqli_fetch_array($q2)) { ?>
                <div class="swiper-slide">
                    <div class="product-shortcode style-1 small">
                        <div class="title">
                            <div class="simple-article size-1 color col-xs-b5"><a href="#"><?= $row1['nama_kategori']?></a></div>
                            <div class="h6 animate-to-green"><a href="detailproduct.php?id=<?= $row1['id_produk'] ?>"><?= $row1['nama_produk'] ?></a></div>
                        </div>
                        <div class="preview">
                            <img src="upload/barang/<?= $row1['gambar'] ?>" alt="">
                            <div class="preview-buttons valign-middle">
                                <div class="valign-middle-content">
                                    <a class="button size-2 style-2" href="detailproduct.php?id=<?= $row1['id_produk'] ?>">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="img/icon-1.png" alt=""></span>
                                            <span class="text">Lihat Lebih Lanjut</span>
                                        </span>
                                    </a>
                                    <a class="button size-2 style-3" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="img/icon-3.png" alt=""></span>
                                            <span class="text">Tambah Kekeranjang</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="price">
                            <div class="simple-article size-4 dark">Rp.<?= number_format($row1['harga'],2,'.',',') ?></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="swiper-pagination relative-pagination visible-xs"></div>
    </div>

    <div class="empty-space col-xs-b35 col-md-b70"></div>
    <div class="empty-space col-md-b70"></div>
<?php } ?>

</div>

<?php include 'template/footer.php' ?>

<script type="text/javascript">
    $(document).ready(function() {
    $("#varian").change(function() {

        // var selectedVal = $("#myselect option:selected").text();
        var selectedVal = $("#varian option:selected").val();
       <?php 
       $sel=mysqli_query($con,"select * from tb_produkdetail");
       while($rsel=mysqli_fetch_array($sel)){ ?>
        if(selectedVal=="<?= $rsel['id_produkdetail'] ?>")
        {

            $("#hargaa").text("<?= $rsel['harga'] ?>");
            $("#idpd").val("<?= $rsel['id_produkdetail'] ?>");
             var jml=$("#jumlah").val();
            var hrg=$("#hargaa").text()
            var total = jml*hrg;
            $("#total").val(total);
        }
    <?php  }
       ?>

    });
    $("#jumlah").change(function() {
        var jml=$("#jumlah").val();
        var hrg=$("#hargaa").text()
        var total = jml*hrg;
        $("#total").val(total);
    });
});
</script>
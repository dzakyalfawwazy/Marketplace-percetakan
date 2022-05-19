<?php include 'template/header.php';
$query=$con->query("SELECT * from tb_profil");
$row=$query->fetch_array(); ?>        
            <div class="empty-space col-xs-b15 col-sm-b30"></div>
        <div class="container">
            <div class="empty-space col-xs-b15 col-sm-b30"></div>
            <div class="breadcrumbs">
                <a href="#">home</a>
                <a href="#">blog</a>
            </div>
            <div class="empty-space col-xs-b15 col-sm-b50 col-md-b100"></div>
            <div class="text-center">
                <div class="simple-article size-3 grey uppercase col-xs-b5">Tentang kami</div>
                <div class="h2">Toko Beras Yanti</div>
                <div class="title-underline center"><span></span></div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="blog-shortcode style-3">
                        <a class="preview rounded-image simple-mouseover" href="#"><img width="100%" class="img-responsive" src="img/bunga2.jpg" alt="" /></a>
                        <div class="content">
                            <h4 class="title h4"><a href="#">Tentang Kami</a></h4>
                               <div class="panel penel-default">
                                <div class="panel-heading bg-primary">
                            <div class="h5" style="color: white">Toko Beras Yanti</div>
                        </div>
                                <div class="panel-body">
                            <div class="description-article simple-article size-2">
                                <?= $row['profil'] ?>
                            </div>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="empty-space col-xs-b35 col-md-b70"></div>

                    <div class="blog-shortcode style-3">
                        <div class="preview rounded-image blog-blockquote">
                            <div class="cell-view">
                                <blockquote>
                                    <p class="blockquote-title">Sistem Informasi Penjualan Beras Pada Toko Beras Yanti</p>
                                    <p class="blockquote-author">STMIK INDONESIA</p>
                                    <p class="blockquote-position">Padang</p>
                                </blockquote>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="single-line-form">
                        <input class="simple-input small" type="text" value="" placeholder="Enter keyword">
                        <div class="submit-icon">
                            <i class="fa fa-search" aria-hidden="true"></i>
                            <input type="submit"/>
                        </div>
                    </div>
                    <div class="empty-space col-xs-b25 col-sm-b50"></div>

                    <div class="h4 col-xs-b10">Kategori</div>
                    <ul class="categories-menu transparent">
                        <?php $query1=$con->query("SELECT * FROM tb_kategori");
                        while($r=$query1->fetch_array()){ ?>
                        <li>
                            <a href="products?kategori=<?=$r['id_kategori']?>"><?= $r['nama_kategori'] ?></a>
                        </li>
                    <?php } ?>
                    </ul>

                    <div class="empty-space col-xs-b25 col-sm-b50"></div>

                    <div class="h4 col-xs-b25">beras</div>

                        <?php $query2=$con->query("SELECT * FROM tb_produk LIMIT 2");
                        while($ro=$query2->fetch_array()){ ?>
                    <div class="blog-shortcode style-2">
                        <a href="detailproduct.php?id=<?= $ro['id_produk'] ?>" class="preview rounded-image simple-mouseover"><img class="rounded-image" src="img/produk/<?= $ro['gambar'] ?>" alt="" /></a>
                        <div class="title h6"><a href="#"><?=$ro['nama_produk']?></a></div>
                        <div class="description simple-article size-1 grey uppercase"><?= $ro['harga']?></div>
                    </div>
                    <div class="empty-space col-xs-b25"></div>
                <?php } ?>

                </div>
            </div>
        </div>

        <div class="empty-space col-xs-b35 col-md-b70"></div>

<?php include 'template/footer.php' ?>  
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
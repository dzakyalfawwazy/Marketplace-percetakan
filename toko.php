<?php include 'template/header.php'; ?>
<div class="header-empty-space"></div>

<div class="container">
    <div class="empty-space col-xs-b15 col-sm-b30"></div>
    <div class="breadcrumbs">
        <a href="#">home</a>
        <a href="#">Toko</a>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="align-inline spacing-1">
                <div class="h2">Toko Percetakan</div>
            </div>
            <div class="products-content">
                <div class="products-wrapper">
                    <div class="row nopadding">
                        <?php 
                        $qb=mysqli_query($con,"SELECT * FROM tb_toko order by rand()");
                        while($row=mysqli_fetch_array($qb)){ ?>
                            <div class="col-sm-3">
                                <div class="product-shortcode style-1">
                                    <div class="title">
                                        <div class="simple-article size-1 color col-xs-b5"><a href="#">Toko Percetakan</a></div>
                                        <div class="h6 animate-to-green"><a href="producttoko.php?id=<?= $row['id_toko'] ?>"><?= $row['nama_toko'] ?></a></div>
                                    </div>
                                    <div class="preview">
                                        <div class="img text-center" style="width: 100%; height: 200px">
                                            <img class="img-responsive img-rounded" style="height: 200px" src="upload/toko/<?= $row['foto'] ?>" alt="">
                                        </div>
                                        <div class="preview-buttons valign-middle">
                                            <div class="valign-middle-content">
                                                <a class="button size-2 style-2" href="producttoko.php?id=<?= $row['id_toko'] ?>">
                                                    <span class="button-wrapper">
                                                        <span class="icon"><img src="img/icon-1.png" alt=""></span>
                                                        <span class="text">Kunjungi</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="description">
                                        <div class="icons text-center">
                                            <a class="entry"><i class="fa fa-check" aria-hidden="true"></i></a>
                                            <a class="entry" href="producttoko.php?id=<?= $row['id_toko'] ?>" data-rel="3"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="empty-space col-xs-b35 col-sm-b0"></div><!-- 
            <div class="row">
                <div class="col-sm-3 hidden-xs">
                    <a class="button size-1 style-5" href="#">
                        <span class="button-wrapper">
                            <span class="icon"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                            <span class="text">prev page</span>
                        </span>
                    </a>
                </div>
                <div class="col-sm-6 text-center">
                    <div class="pagination-wrapper">
                        <a class="pagination active">1</a>
                        <a class="pagination">2</a>
                        <a class="pagination">3</a>
                        <a class="pagination">4</a>
                        <span class="pagination">...</span>
                        <a class="pagination">23</a>
                    </div>
                </div>
                <div class="col-sm-3 hidden-xs text-right">
                    <a class="button size-1 style-5" href="#">
                        <span class="button-wrapper">
                            <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                            <span class="text">prev page</span>
                        </span>
                    </a>
                </div>
            </div> -->
        </div>
        <?php //include 'template/kategori.php'; ?>
    </div>
</div>

<div class="empty-space col-xs-b15 col-sm-b45"></div>
<div class="empty-space col-md-b70"></div>
<?php include 'template/footer.php'; ?>
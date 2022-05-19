
        <div class="col-md-3 col-md-pull-9">
            <div class="h4 col-xs-b10">Kategori Terpopuler</div>
            <?php $qt=mysqli_query($con,"select * from tb_kategori");
            while($datat=mysqli_fetch_array($qt)){ ?>
                <ul class="categories-menu transparent">
                    <li>
                        <a href="?kategori=<?= $datat['id_kategori'] ?>"><?= $datat['nama_kategori'] ?></a>
                        <div class="toggle"></div>
                        <ul>
                            <li>
                                <a href="?kategori=<?= $datat['id_kategori'] ?>"><?= $datat['keterangan'] ?></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            <?php } ?>

            <div class="empty-space col-xs-b25 col-sm-b50"></div>

            <div class="h4 col-xs-b25">Price</div>
            <div id="prices-range"></div>
            <div class="simple-article size-1">PRICE: <b class="grey">$<span class="min-price">40</span> - $<span class="max-price">300</span></b></div>


            <div class="empty-space col-xs-b25 col-sm-b50"></div>


            <div class="h4 col-xs-b25">Popular Tags</div>
            <div class="tags light clearfix">
                <a class="tag">headphoness</a>
                <a class="tag">accessories</a>
                <a class="tag">new</a>
                <a class="tag">wireless</a>
                <a class="tag">cables</a>
                <a class="tag">devices</a>
                <a class="tag">gadgets</a>
                <a class="tag">brands</a>
                <a class="tag">replacements</a>
                <a class="tag">cases</a>
                <a class="tag">cables</a>
                <a class="tag">professional</a>
            </div>

            <div class="empty-space col-xs-b25 col-sm-b50"></div>


        </div>
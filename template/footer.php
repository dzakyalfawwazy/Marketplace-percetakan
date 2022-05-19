        <footer>
            <div class="container">
                <div class="footer-top">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-xs-b30 col-md-b0">
                            <img src="img/icon.png" alt="" height="100" /><div class="h6" style="color: green">Marketplace Percetakan</div>
                            <div class="empty-space col-xs-b20"></div>
                            <div class="footer-contact"><i class="fa fa-mobile" aria-hidden="true"></i> contact us: <a href="tel:+6281277590193">0812 7759 0193</a></div>
                            <div class="footer-contact"><i class="fa fa-map-marker" aria-hidden="true"></i> address: <a href="#"> Kota Padang, Sumatera Barat</a></div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-xs-b30 col-md-b0">
                            <h6 class="h6 light">Navigasi</h6>
                            <div class="empty-space col-xs-b20"></div>
                            <div class="footer-column-links">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <a href="index.php">Home</a>
                                        <a href="products.php">Produk</a>
                                        <a href="cart.php">Keranjang</a>
                                    </div>
                                    <div class="col-xs-6">
                                        <a href="history.php">Riwayat</a>
                                        <a class="open-popup" data-rel="1">login</a>
                                        <a class="open-popup" data-rel="2">Registrasi</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clear visible-sm"></div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="row">
                        <div class="col-lg-8 col-xs-text-center col-lg-text-left col-xs-b20 col-lg-b0">
                            <div class="copyright">&copy; 2020 STMIK INDONESIA PADANG</div>
                            <div class="follow">
                                
                            </div>
                        </div>
                        <div class="col-lg-4 col-xs-text-center col-lg-text-right">
                            <div class="footer-payment-icons">
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <div class="popup-wrapper">
        <div class="bg-layer"></div>

        <div class="popup-content" data-rel="1">
            <div class="layer-close"></div>
            <div class="popup-container size-1">
                <div class="popup-align">
                    <form name="formlogin" method="post" action="linkloginmember.php">
                        <h3 class="h3 text-center">Log in</h3>
                        <div class="empty-space col-xs-b30"></div>
                        <input class="simple-input" type="text" value="" placeholder="Username" name="username" />
                        <div class="empty-space col-xs-b10 col-sm-b20"></div>
                        <input class="simple-input" type="password" value="" name="password" placeholder="Enter password" />
                        <div class="empty-space col-xs-b10 col-sm-b20"></div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-b10 col-sm-b0">
                                <div class="empty-space col-sm-b5"></div>
                                <a class="simple-link">Forgot password?</a>
                                <div class="empty-space col-xs-b5"></div>
                                <a class="simple-link open-popup" data-rel="2">register now</a>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button type="submit" class="button size-2 style-3" href="#">
                                    <span class="button-wrapper">
                                        <span class="icon"><img src="img/icon-4.png" alt="" /></span>
                                        <span class="text">submit</span>
                                    </span>
                                </button>  
                            </div>
                        </div>
                    </form>
                </div>
                <div class="button-close"></div>
            </div>
        </div>

        <div class="popup-content" data-rel="2">
            <div class="layer-close"></div>
            <div class="popup-container size-1">
                <div class="popup-align">
                    <form name="formregis" method="post" action="prosesdaftar.php">
                        <h3 class="h3 text-center">register</h3>
                        <div class="empty-space col-xs-b30"></div>
                        <input class="simple-input" type="text" name="username" placeholder="Username" />
                        <div class="empty-space col-xs-b10 col-sm-b20"></div>
                        <input class="simple-input" type="password" name="password" value="" placeholder="Enter password" />
                        <div class="empty-space col-xs-b10 col-sm-b20"></div>
                        <input class="simple-input" type="text" name="namapelanggan" value="" placeholder="Nama" />
                        <div class="empty-space col-xs-b10 col-sm-b20"></div>


                        <select class="SlectBox" name="jenkel">
                            <option disabled="disabled" selected="selected">Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <div class="empty-space col-xs-b10 col-sm-b20"></div>
                        <div class="h6">Tanggal Lahir</div>
                        <input class="simple-input" type="date" name="tgl_lahir" placeholder="Your email" value="<?= date('Y/m/d') ?>" />
                        <div class="empty-space col-xs-b10 col-sm-b20"></div>
                        <input class="simple-input" type="email" name="email" placeholder="Your email" />
                        <div class="empty-space col-xs-b10 col-sm-b20"></div>
                        <input class="simple-input" type="text" name="nohp" placeholder="No. Hp" />
                        <div class="empty-space col-xs-b10 col-sm-b20"></div>
                        <input class="simple-input" type="text" name="kodepos" placeholder="Kode Pos" />
                        <div class="empty-space col-xs-b10 col-sm-b20"></div>
                        <input class="simple-input" type="text" name="alamat" placeholder="Alamat" />
                        <div class="empty-space col-xs-b10 col-sm-b20"></div>
                        <div class="row">
                            <div class="col-sm-5 text-right">
                                <button type="submit" name="daftar" class="button size-2 style-3">
                                    <span class="button-wrapper">
                                        <span class="icon"><img src="img/icon-4.png" alt="" /></span>
                                        <span class="text">submit</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="button-close"></div>
            </div>
        </div>
        <div class="button-close"></div>
    </div>
</div>

</div>

<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/swiper.jquery.min.js"></script>
<script src="js/global.js"></script>

<!-- styled select -->
<script src="js/jquery.sumoselect.min.js"></script>

<!-- counter -->
<script src="js/jquery.classycountdown.js"></script>
<script src="js/jquery.knob.js"></script>
<script src="js/jquery.throttle.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.ui.touch-punch.min.js"></script>
<script>
    $(document).ready(function(){
        var minVal = parseInt($('.min-price').text());
        var maxVal = parseInt($('.max-price').text());
        $( "#prices-range" ).slider({
            range: true,
            min: minVal,
            max: maxVal,
            step: 5,
            values: [ minVal, maxVal ],
            slide: function( event, ui ) {
                $('.min-price').text(ui.values[ 0 ]);
                $('.max-price').text(ui.values[ 1 ]);
            }
        });
    });
</script>

<script src="https://maps.googleapis.com/maps/api/js"></script>
<script src="js/map.js"></script>

<!-- CONTACT -->
<script src="js/contact.form.js"></script>
</body>
</html>

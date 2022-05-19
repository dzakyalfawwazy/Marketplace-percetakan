<?php include 'template/header.php'; ?>
<?php
if(isset($_SESSION['status'])!='userok')
{ echo "<script>window.alert('Anda harus login dulu untuk melanjutkan'); window.location.href='index.php'</script>";}
else {}
if(isset($_POST['send']))
{
  mysqli_query($con, "insert into tb_contact value(NULL,'$_SESSION[id_pelanggan]','$_POST[subject]','$_POST[message]',now())");
  echo "<script>window.alert('Pesan sudah masuk'); window.location.href='contact.php'</script>";
}
?>
        <div class="header-empty-space"></div>

        <div class="block-entry fixed-background" style="background-image: url(img/bunga2.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="cell-view simple-banner-height text-center">
                            <div class="empty-space col-xs-b35 col-sm-b70"></div>
                            <h1 class="h1 light">Kontak Kami</h1>
                            <div class="title-underline center"><span></span></div>
                            <div class="simple-article light transparent size-4">Kami siap melayani 24 Jam</div>
                            <div class="empty-space col-xs-b35 col-sm-b70"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="empty-space col-xs-b35 col-md-b70"></div>

        <div class="container">
            <div class="text-center">
                <div class="simple-article size-3 grey uppercase col-xs-b5">Kontak kami untuk</div>
                <div class="h2">pertanyaan dan keluhan anda</div>
                <div class="title-underline center"><span></span></div>
            </div>
        </div>

        <div class="empty-space col-sm-b15 col-md-b50"></div>

        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="icon-description-shortcode style-1">
                        <img class="icon" src="img/icon-25.png" alt="">
                        <div class="title h6">Alamat</div>
                        <div class="description simple-article size-2">Kota Padang, Sumatera Barat</div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="icon-description-shortcode style-1">
                        <img class="icon" src="img/icon-23.png" alt="">
                        <div class="title h6">Telpon</div>
                        <div class="description simple-article size-2" style="line-height: 26px;">
                            <a href="tel:+35235551238745">+62 823 8708 6466</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="icon-description-shortcode style-1">
                        <img class="icon" src="img/icon-28.png" alt="">
                        <div class="title h6">email</div>
                        <div class="description simple-article size-2"><a href="mailto:tokoyanti@exzo.com">tokoyanti@gmail.com</a></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="empty-space col-xs-b25 col-sm-b50"></div>
    
        <div class="container">    
            <iframe width="100%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.3635011179117!2d100.34291121427272!3d-0.8651364355545917!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4c0cc3332bd61%3A0x83575abe123b6a3f!2sDikrez%20Florist!5e0!3m2!1sid!2sid!4v1579609864037!5m2!1sid!2sid" width="800" height="600" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>

        <div class="empty-space col-xs-b25 col-sm-b50"></div>

        <div class="container">
            <h4 class="h4 text-center col-xs-b25">tanyakan disini</h4>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <form method="post">
                        <div class="row m5">
                            <div class="col-sm-12">
                                <input class="simple-input col-xs-b20" type="text" value="" placeholder="Subject" name="subject" />
                            </div>
                            <div class="col-sm-12">
                                <textarea class="simple-input col-xs-b20" placeholder="Your message" name="message"></textarea>
                            </div>
                            <div class="col-sm-12">
                                <div class="text-center">
                                    <div class="button size-2 style-3">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="img/icon-4.png" alt=""></span>
                                            <span class="text">send message</span>
                                        </span>
                                        <input type="submit" name="send" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="empty-space col-xs-b35 col-md-b70"></div>
        <div class="empty-space col-xs-b35 col-md-b70"></div>

        <!-- FOOTER -->
   <?php include 'template/footer.php'; ?>
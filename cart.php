<?php include 'template/header.php' ?>
<script>
  function displayResult(tokir){ 
    var tok = tokir;
    var tot = document.getElementById("tot_belanja").value;
    var totalbelanja = parseInt(tok) + parseInt(tot);
    $("#ong").html(tok); 
    $("#hasil").html(totalbelanja); 
    document.getElementById("result").value=tokir; 
    document.getElementById("tot_hasil").value=totalbelanja; 
  }
</script>
<div class="header-empty-space"></div>

<div class="container">
    <div class="empty-space col-xs-b15 col-sm-b30"></div>
    <div class="breadcrumbs">
        <a href="#">home</a>
        <a href="#">Keranjang Belanja</a>
    </div>
    <div class="empty-space col-xs-b15 col-sm-b50 col-md-b100"></div>
    <div class="text-center">
        <div class="simple-article size-3 grey uppercase col-xs-b5">Keranjang Belanja</div>
        <div class="h2">Check Produk Anda</div>
        <div class="title-underline center"><span></span></div>
    </div>
</div>

<div class="empty-space col-xs-b35 col-md-b70"></div>

<div class="container">
    <table class="cart-table">
        <thead>
            <tr>
                <th style="width: 95px;"></th>
                <th>Nama Produk</th>
                <th style="width: 150px;">Harga</th>
                <th style="width: 150px;">Ukuran</th>
                <th style="width: 150px;">Warna</th>
                <th style="width: 260px;">Jumlah</th>
                <th style="width: 70px;">Keterangan</th>
                <th style="width: 150px;">total</th>
                <th style="width: 70px;"></th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($_SESSION['shopping_cart']))
            {  $total = 0;
              foreach ($_SESSION['shopping_cart'] as $key => $value) {
                $dataa=mysqli_fetch_array(mysqli_query($con,"select * from tb_produk,tb_produkdetail where tb_produk.id_produk=tb_produkdetail.id_produk and tb_produkdetail.id_produkdetail='$value[item_id]'"));
                  $hitung[]=$dataa['harga']*$value['item_quantity'];
                ?>
                <tr>
                    <td data-title=" ">
                        <a class="cart-entry-thumbnail" href="#"><img class="img img-responsive img-rounded" src="../img/produk/<?= $dataa['gambar']; ?>" alt=""></a>
                    </td>
                    <td data-title=" "><h6 class="h6"><a href="#"><?= $dataa['nama_produk']; ?></a></h6></td>
                    <td data-title="Price: ">Rp.<?= $dataa['harga']; ?></td>
                    <td data-title="Price: "><?= $dataa['ukuran']; ?></td>
                    <td data-title="Price: "><?= $dataa['warna']; ?></td>
                    <td data-title="Quantity: "><?= $value['item_quantity']; ?>
                </td>
                <td data-title="Color: "><div class="cart-color" style="background: #eee;"></div></td>
                <td data-title="Total:">Rp.
                    <?php $totalbarang=(int)($dataa['harga']) * (int)($value['item_quantity']);
                    echo number_format($totalbarang,2,',','.');
                    $tb[]=(int)$totalbarang;
                    $berat[]=(int)$dataa['berat'] * $value['item_quantity'];
                    ?></td>
                    <td data-title=""><a href="aksicart.php?id=<?= $value['item_id'] ?>">
                        <div class="button-close"></div></a>
                    </td>
                </tr>
            <?php } } @$tot_belanja=array_sum($tb);@$beratt=array_sum($berat);  ?>
        </tbody>
    </table>
    <div class="empty-space col-xs-b35"></div>
    <form method="post" action="prosescheckout.php">
        <div class="row">
            <div class="col-sm-6 col-md-5 col-xs-b10 col-sm-b0">
                <div class="single-line-form">
                    <span class="text h5">Jenis Pembayaran</span>
                    <select class="form-control" required="" id="jen_pem" name="jenis_pembayaran">
                        <option value="" disabled selected>Pilih Satu</option>
                        <option value="1">COD</option>
                        <option value="2">Transfer</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-6 col-md-7 col-sm-text-right">
                <div class="buttons-wrapper">
                    <a class="button size-2 style-2" href="cart.php">
                        <span class="button-wrapper">
                            <span class="icon"><img src="img/icon-2.png" alt=""></span>
                            <span class="text">Perbaharui Keranjang</span>
                        </span>
                    </a>
                    <button class="button size-2 style-3" href="checkout.php" type="submit">
                        <input type="hidden" name="tot_hasil" value="<?= $tot_belanja ?>">
                        <span class="button-wrapper">
                            <span class="icon"><img src="img/icon-4.png" alt=""></span>
                            <span class="text">Proses Checkout Barang</span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="empty-space col-xs-b35 col-md-b70"></div>
        <div class="row">
            <div class="col-md-6 col-xs-b50 col-md-b0" style="background-color: white; border-radius: 20px;" id="infoongkir">
                <h4 class="h4">Informasi Ongkos Kirim</h4>
                <div class="order-details-entry simple-article size-3 grey uppercase">
                  <input type="hidden" id="asal" value="345">
                  <input type="hidden" id="berat" value="<?= array_sum($berat); ?>">
                    <div class="input-group mb-3">
                      <textarea class="form-control" name="alamat" placeholder="Alamat"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Provinsi</label>
                      <select class="form-control select2 select2-danger" name="provinsi" id="provinsi" data-dropdown-css-class="select2-danger" style="width: 100%;">
                        <?php
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                          CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
                          CURLOPT_RETURNTRANSFER => true,
                          CURLOPT_ENCODING => "",
                          CURLOPT_MAXREDIRS => 10,
                          CURLOPT_TIMEOUT => 30,
                          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                          CURLOPT_CUSTOMREQUEST => "GET",
                          CURLOPT_HTTPHEADER => array(
                            "key: 3c21ab4b331111711ebb7cc7572f832b"
                          ),
                        ));

                        $response = curl_exec($curl);
                        $err = curl_error($curl);
                        echo "<option>Pilih Provinsi</option>";
                        $data = json_decode($response, true);
                        for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
                          echo "<option value='".$data['rajaongkir']['results'][$i]['province_id'].",".$data['rajaongkir']['results'][$i]['province']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Kabupaten/Kota</label>
                      <select class="form-control select2 select2-danger" name="kabupaten" id="kabupaten" data-dropdown-css-class="select2-danger" style="width: 100%;">
                      </select>
                    </div>
                    <label>Kurir</label><br>
                    <select id="kurir" name="kurir" class="form-control">
                      <option value="">Pilih</option>
                      <option value="jne">JNE</option>
                      <option value="tiki">TIKI</option>
                      <option value="pos">POS INDONESIA</option>
                    </select><br><br>
                </div>
            </div>
            <div class="col-md-6" style="background-color: white; border-radius: 20px">
                <h4 class="h4">Total Belanja</h4>
                <div class="order-details-entry simple-article size-3 grey uppercase">
                  <div id="ongkir">
                    </div>
                    <div class="table-responsive">
                      <table class="table">
                        <tr>
                          <th style="width:50%">Subtotal:</th>
                          <td>Rp.<?= array_sum($hitung) ?>,-  <input type="hidden" name="tot_belanja" id="tot_belanja" value="<?= array_sum($hitung) ?>"></td>
                        </tr>
                        <tr>
                          <th>Pengiriman:</th>
                          <td><div id="ong"></div><input type="text" name="ongkirr" id="result"/></td>
                        </tr>
                        <tr>
                          <th>Total:</th>
                          <td><div id="hasil"></div>
                          <input type="hidden" id="tot_hasil" name="tot_hasil"></td>
                        </tr>
                      </table>
                    </div>
            </div>
        </div>
    </div>
</form>
<div class="empty-space col-xs-b35 col-md-b70"></div>
<div class="empty-space col-xs-b35 col-md-b70"></div>
</div>
<?php include 'template/footer.php' ?>
 <script type="text/javascript">

    $(document).ready(function(){

      $('#provinsi').change(function(){

      //Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax 
      var pro = $('#provinsi').val();
      var pecah= pro.split(',');
      var prov = pecah[0];

      $.ajax({
        type : 'GET',
        url : 'ongkir/cek_kabupaten.php',
        data :  'prov_id=' + prov,
        success: function (data) {

          //jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
          $("#kabupaten").html(data);
        }
      });
    });
    $("#kurir").change(function(){
      //Mengambil value dari option select provinsi asal, kabupaten, kurir, berat kemudian parameternya dikirim menggunakan ajax 
      var kab = $('#kabupaten').val();
      var kurir = $('#kurir').val();
      var berat = $('#berat').val();
      var asal = $('#asal').val();

      console.log(kab);
      console.log(kurir);
      console.log(berat);
      console.log(asal);

      $.ajax({
        type : 'POST',
        url : 'ongkir/cek_ongkir.php',
        data :  {'kab_id' : kab, 'kurir' : kurir, 'berat' : berat, 'asal' : asal},
        success: function (data) {

          //jika data berhasil didapatkan, tampilkan ke dalam element div ongkir
          $("#ongkir").html(data);
        }
      });
    });

  });
</script>
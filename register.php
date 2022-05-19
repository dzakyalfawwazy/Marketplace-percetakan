
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Market place</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- leaflet -->
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
  
  <style type="text/css">
   #mapid { height: 300px; }
  </style>
</head>
<body class="hold-transition layout-top-nav">
  <div class="wrapper">

<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<section class="content">
  <div class=" bg-light">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="h1 text-danger">Halaman Registrasi Toko</div>
        </div>
        <div class="col-md-10 offset-md-1">
          <div class="card card-outline card-primary bg-gradient-white">
            <div class="card-body">
              <form role="form" method="post" action="prosesdaftartoko.php" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-12">
                    <input type="submit" name="kirim" class="btn btn-flat bg-gradient-success float-right" id="kirim" value="Daftar Sekarang!">
                  </div>
                  <div class="col-md-4">
                    <h3>Data Akun</h3>

                    <div class="card">
                      <div class="card-body">
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" required name="nama_plg" placeholder="Nama toko">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-home"></span>
                            </div>
                          </div>
                        </div>
                        <label class="text-danger float-right username" style="display: none;"></label>
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" id="username" required name="nama_user" placeholder="Username">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-user"></span>
                            </div>
                          </div>
                        </div>
                        <label class="text-danger password" style="display: none;"></label>
                        <div class="input-group mb-3">
                          <input type="password" class="form-control" id="password" required name="password" placeholder="Password">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-lock"></span>
                            </div>
                          </div>
                        </div>
                        <label class="text-danger confirm" style="display: none;"></label>
                        <div class="input-group mb-3">
                          <input type="password" class="form-control" id="confirm" required name="confirm" placeholder="Konfirmasi Password">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-lock"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.form-box -->
                    </div><!-- /.card -->
                    <h3>Data toko</h3>

                    <div class="card">
                      <div class="card-body">
                        <div class="input-group mb-3">
                          <input type="email" class="form-control" required name="email" placeholder="Email">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-envelope"></span>
                            </div>
                          </div>
                        </div>
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" required name="nohp" placeholder="Np. Telp">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-phone"></span>
                            </div>
                          </div>
                        </div>
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" required name="kodepos" placeholder="Kode Pos">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-envelope"></span>
                            </div>
                          </div>
                        </div>
                        <div class="input-group mb-3">
                          <textarea class="form-control" required name="alamat" placeholder="Alamat"></textarea>
                        </div>
                      </div>
                      <!-- /.form-box -->
                    </div><!-- /.card -->
                    <h3>Foto toko</h3>

                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="input-group mb-3 col-8">
                            <div class="custom-file">
                              <input type="file" accept=".jpg" name="imagess" class="custom-file-input" id="exampleInputFile">
                              <label class="custom-file-label" for="exampleInputFile">Pilih Gambar</label>
                            </div>
                          </div>
                          <img src="#" id="output_image" class="product-image-thumb col-4" alt="Foto">
                        </div>
                      </div>
                      <!-- /.form-box -->
                    </div><!-- /.card -->
                  </div>
                  <div class="col-md-8">
                    <h3>Data Lokasi</h3>
                    <div class="card">
                      <div class="card-body">
                       <div id="mapid"></div>

                       <label>Koordinat</label>
                       <div class="input-group mb-3">
                        <input type="text" class="form-control" required name="longitude" id="long" readonly placeholder="Longitude">
                        <input type="text" class="form-control" required name="latitude" id="lat" readonly placeholder="Latitude">
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<script type="text/javascript">
  var mymap = L.map('mapid').setView([-0.4393646,99.9742294], 15);

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(mymap);
  var marker = L.marker([-0.4393646,99.9742294]).addTo(mymap);
  document.getElementById('lat').value = marker.getLatLng().lat,
  document.getElementById('long').value = marker.getLatLng().lng;
  mymap.on('click',function(e){
    marker.setLatLng(e.latlng);
    document.getElementById('lat').value = marker.getLatLng().lat,
    document.getElementById('long').value = marker.getLatLng().lng;
  });
  mymap.on('tileerror', function(error, tile) {
    console.log(error);
    console.log(tile);
  });
</script>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
crossorigin=""></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>

<script type="text/javascript">
  $(function () {
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
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
    function button(){

      if($('.username').is(":hidden")) 
      { 
        if($('.confirm').is(":hidden"))
        { 
          if($('.password').is(":hidden")){ $('#kirim').removeClass('disabled');}
        }  

      }
      else { $('#kirim').addClass('disabled');} 
      
    };
    <?php 
    $cekuse=$db->tampildetail('tb_user','level="toko"'); ?>
    $('#username').on('change',function(){
      if($('#username').val().length < 8 && $('#username').val().length > 0) {
        $('#username').addClass('is-invalid');
        $('.username').show();
        $('.username').text("Karakter harus lebih dari 8");

      } else {
        <?php
        foreach($cekuse as $cekuser) { ?> 
          if($('#username').val() == "<?php echo $cekuser['nama_user'] ?>" ) {
            $('.username').show();
            $('.username').text("username sudah dipakai");
            $('#username').addClass('is-invalid'); 
          } else {
            $('.username').hide();
            $('.username').text("");
            $('#username').removeClass('is-invalid'); 
          }

        <?php }?>
      }
      button(); 
    });
    $('#password').on('change',function(){
      if($('#password').val().length < 8 && $('#password').val().length > 0) {
        $('#password').addClass('is-invalid');
        $('.password').show();
        $('.password').text("Karakter harus lebih dari 8");

      } else {

        $('.password').hide();
        $('.password').text("");
        $('#password').removeClass('is-invalid'); 

      } 
      button();
    });
    $('#confirm').on('change',function(){
      if($('#confirm').val() != $('#password').val()) {
        $('#confirm').addClass('is-invalid');
        $('.confirm').show();
        $('.confirm').text("Password tidak sama");

      } else {

        $('.confirm').hide();
        $('.confirm').text("");
        $('#confirm').removeClass('is-invalid'); 

      } 
      button();
    });
  });
</script>
</body>
</html>

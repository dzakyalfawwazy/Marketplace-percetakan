
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

</head>

  
  <style type="text/css">
    @font-face{
      font-family: 'font baru';
      src : url('dist/font/coolvetica-rg.ttf');
    }
    @font-face{
      font-family: 'rob';
      src : url('dist/font/Lato-Regular.ttf');
    }
    * {
      font-family: 'font baru';
    }
    * .content-wrapper{
      font-family: 'rob';
      font-size: 10px;
    }
    div.produk{
      transition: all 0.2s ease;
      z-index: 0;
    }
    div.produk:hover {
      color: inherit;
      box-shadow: 0 0 5px -1px;
      transition-delay: 0.2s;
      transform: scale(1.2);
      z-index: 100;
    }
   #mapid { height: 300px; }
  </style>
</head>
<body class="hold-transition layout-top-nav">
  <div class="wrapper">

<section class="content">
          <div class="login-page">
            <div class="login-box">
              <div class="login-logo">
                <a href="loginkaryawan.php"><b>Halaman </b>Login Karyawan</a>
              </div>
              <!-- /.login-logo -->
              <div class="card">
                <div class="card-body login-card-body">
                  <p class="login-box-msg">Masuk untuk melakukan transaksi</p>

                  <form action="linkloginkaryawan.php" method="post">
                    <div class="input-group mb-3">
                      <input type="text" name="username" class="form-control" placeholder="Username">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-envelope"></span>
                        </div>
                      </div>
                    </div>
                    <div class="input-group mb-3">
                      <input type="password" name="password" class="form-control" placeholder="Password">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-lock"></span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-4 offset-8">
                        <button type="submit" class="btn btn-danger btn-block">Sign In</button>
                      </div>
                      <!-- /.col -->
                    </div>
                  </form>

                  <!-- /.social-auth-links -->

                </div>
                <!-- /.login-card-body -->
              </div>
            </div>
          </div>

        </section>
        <footer class="main-footer">
  <!-- To the right -->
  <div class="float-right d-none d-sm-inline">
    Copyright &copy; <?= date('Y'); ?>
  </div>
  <!-- Default to the left -->
  <strong class="text-primary">STMIK INDONESIA PADANG</strong>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
crossorigin=""></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script type="text/javascript">

$(function () {
 $("#example1").DataTable();
 $('#example2').DataTable({
  "paging": true,
  "lengthChange": false,
  "searching": false,
  "ordering": true,
  "info": true,
  "autoWidth": false,
});
});
</script>
</body>
</html>

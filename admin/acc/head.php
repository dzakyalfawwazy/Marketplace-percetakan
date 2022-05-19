
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin - <?= $datanamatoko['nilai'] ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <script src="../plugins/jquery-validation/jquery.validate.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
  <script src="../plugins/sweetalert2/sweetalert2.min.js"></script>

  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script src="plugins/jquery/jquery.min.js"></script>
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <style type="text/css">
      #mapid { height: 300px; }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header text-sm bg-danger navbar navbar-expand navbar-white navbar-dark border-bottom-0 mr-1">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index.php" class="nav-link">Home</a>
        </li>
      </ul>

      <?php
      $akun = $db->tampildetail('tb_user, tb_pelanggan', 'tb_user.id_pelanggan = tb_pelanggan.id_pelanggan and tb_user.status="unconfirmed"');
      $akuntoko = $db->tampildetail('tb_user, tb_toko', 'tb_user.id_pelanggan = tb_toko.id_toko and tb_user.status="unconfirmed"');
      $count_akun=$akun->num_rows;
      $count_toko=$akuntoko->num_rows;
      $notif= $count_akun + $count_toko;
      ?>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <?php if($notif > 0) { ?>
            <span class="badge badge-info navbar-badge">!</span>
          <?php } else {} ?>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header"><?= $notif ?> Notifications</span>
            <?php if($count_akun > 0){ ?>
            <div class="dropdown-divider"></div>
            <a href="index.php?hal=konfirmasiakun" class="dropdown-item">
              <i class="fas fa-user mr-2"></i> Ada <?= $count_akun ?> akun yang harus di konfirmasi
            </a>
            <div class="dropdown-divider"></div>
          <?php } else {} ?>
            <?php if($count_toko > 0){ ?>
            <div class="dropdown-divider"></div>
            <a href="index.php?hal=konfirmasiakuntoko" class="dropdown-item">
              <i class="fas fa-user mr-2"></i> Ada <?= $count_toko ?> akun toko yang harus di konfirmasi
            </a>
            <div class="dropdown-divider"></div>
          <?php } else {} ?>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" onclick="return confirm('Anda Yakin akan keluar?')" href="../logout.php">
            <i class="fas fa-power-off"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->


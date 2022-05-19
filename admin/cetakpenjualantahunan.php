<?php include 'acc/crudApp.php';$db = new crud();

$namatoko =$db->tampildata("tb_profil where jenis='Nama Toko'"); foreach($namatoko as $datanamatoko){}; 
$infobank =$db->tampildata("tb_profil where jenis='Bank'"); foreach($infobank as $bank){}; 
$infoalamat =$db->tampildata("tb_profil where jenis='Alamat'"); foreach($infoalamat as $alamat){};  ?>
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

</head>
<body>
       <?php
       if(isset($_GET['tanggal'])){
        $date=$_GET['tanggal'];
      } else 
      {
        $date=date('Y-m');
      }
      ?>
      <div class="container">
        <table width="100%">
          <tr>
            <td align="right" width="20%"><!-- <img src="../dist/img/AdminLTELogo.png"> --></td>
            <td align="center"><h1>Marketplace Toko Percetakan di Kota Padang</h1><h3>Laporan Penjualan Tahunan</h3>Alamat : <?= $alamat['nilai']; ?></td>
            <td width="20%"></td>
          </tr>
        </table>
        <hr style="border : black 2px solid">
        <table style="margin-bottom: 15px">
          <tr>
            <td>Tahun</td>
            <td>:</td>
            <td><?php echo date('Y',strtotime($_GET['tanggal'])) ?></td>
          </tr>
        </table>
           <table width="100%" border="1" cellpadding="10">
             <thead>
              <tr>
                <th>No.</th>
                <th>Bulan</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $row=$db->tampilselect('tb_faktur.no_faktur,tb_faktur.waktu_penjualan,sum(tb_faktur.total_bayar) as total','tb_faktur',' year(tb_faktur.waktu_penjualan)="'.$date.'" and tb_faktur.status="Selesai" group by tb_faktur.no_faktur and month(tb_faktur.waktu_penjualan)');
              $no=0;
              $total=array();
              foreach($row as $data): $no++; $total[]=$data['total']; ?>
                <tr>
                  <td><?= $no; ?></td>
                  <td>Bulan - <?= date('m',strtotime($data['waktu_penjualan'])) ?></td>
                  <td><div class="float-left"> Rp.</div><div class="float-right"><?= $data['total'] ?>.-</div></td>
                </tr>
              <?php endforeach; ?>
              <tr>
                <td colspan="2" align="center"><b>Total</b></td>
                <td><div class="float-left"><b> Rp.</div><div class="float-right"><?= array_sum($total) ?>.-</div></b></td>
              </tr>
            </tbody>
          </table>
          <table width="100%" style="margin-top: 30px">
            <tr>
              <td width="70%"></td>
              <td align="center"><div style="margin-bottom: 100px">Payakumbuh, <?= date('d/m/Y');?></div>(Administrator)</td>
            </tr>
          </table>
        </div>
        <!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/jquery-validation/jquery.validate.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Bootstrap Switch -->
<script src="../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<script type="text/javascript">window.print()</script>
</body>
</html>
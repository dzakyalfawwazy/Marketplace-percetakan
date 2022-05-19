<?php include 'acc/crudApp.php';$db = new crud();
session_start();
$row1=$db->tampildetail('tb_detailfaktur,tb_faktur,tb_produk,tb_produkdetail,tb_pelanggan,tb_metodebayar','tb_faktur.no_faktur=tb_detailfaktur.no_faktur and tb_detailfaktur.id_produk=tb_produkdetail.id_produkdetail and tb_produk.id_produk=tb_produkdetail.id_produk and tb_faktur.id_pelanggan=tb_pelanggan.id_pelanggan and tb_faktur.id_metode_bayar=tb_metodebayar.id_metode_bayar and tb_faktur.no_faktur="'.$_GET["id"].'" group by tb_faktur.no_faktur');
$no=0;
foreach($row1 as $dataa){};
$namatoko =$db->tampildata("tb_toko where id_toko='$_SESSION[id_toko]'"); foreach($namatoko as $datanamatoko){}; 
$nama =$db->tampildata("tb_karyawan where nik_karyawan='$_SESSION[id_karyawan]'"); foreach($nama as $namak){}; 
$infobank =$db->tampildata("tb_profil where jenis='Bank'"); foreach($infobank as $bank){}; 
$infoalamat =$db->tampildata("tb_profil where jenis='Alamat'"); foreach($infoalamat as $alamat){};  ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin - Marketplace Toko Percetakan</title>
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
            <td align="center"><h3>Marketplace Toko Percetakan di Kota Padang</h3><h1><?= $datanamatoko['nama_toko'] ?></h1>Alamat : <?= $alamat['nilai']; ?></td>
            <td width="20%"></td>
          </tr>
        </table>
        <hr style="border : black 2px solid">
        <h3 class="text-center">
            Faktur</h3>
        <table style="margin-bottom: 15px" width="100%">
          <tr>
            <td width="15%">No. Faktur</td>
            <td width="5%">:</td>
            <td width="30%"><?= $dataa['no_faktur'] ?></td>
            <td width="15%">Nama Pelanggan</td>
            <td width="5%">:</td>
            <td width="30%"><?= $dataa['nama_plg'] ?></td>
          </tr>
          <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td><?php echo date('d-m-Y',strtotime($dataa['tanggal'])) ?></td>
            <td>No. HP</td>
            <td>:</td>
            <td><?= $dataa['nohp'] ?></td>
          </tr>

          <tr>
            <td>Jenis Pembayaran</td>
            <td>:</td>
            <td><?= $dataa['metodebayar'] ?></td>
            <td>Alamat</td>
            <td>:</td>
            <td><?= $dataa['alamat_penerima'] ?></td>
          </tr>

        </table>
           <table width="100%" border="1" cellpadding="10">
            <thead>
        <tr>
          <th>No</th>
          <th>Nama Produk</th>
          <th>Kategori</th>
          <th>Jumlah Pemesanan</th>
          <th>Harga</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
       <?php 
       $row2 = $db -> tampildetail('tb_produk,tb_produkdetail,tb_detailfaktur,tb_kategori',' tb_detailfaktur.id_produk=tb_produkdetail.id_produkdetail and tb_produk.id_kategori=tb_kategori.id_kategori and tb_produk.id_produk=tb_produkdetail.id_produk and tb_detailfaktur.no_faktur="'.$_GET["id"].'"');
       $noo=0;
       $total1=array();
       foreach($row2 as $data2){
        $noo++;
         ?>
         <tr>
          <td><?= $noo ?></td>
          <td><?= $data2['nama_produk'] ?></td>
          <td><?= $data2['nama_kategori'] ?></td>
          <td><?= $data2['jumlah'] ?></td>
          <td>Rp.<?= $data2['harga'] ?>,-</td>
          <td>Rp. <?php $total= $data2['harga'] * $data2['jumlah'];
          echo $total;
           $total1[]=$total; ?></td>
        </tr><tr>
          <th colspan="5">Total</th>
          <th>Rp. <?= array_sum($total1); ?></th>
        </tr>
      <?php } ?>
    </tbody>
          </table>
          <table width="100%" style="margin-top: 30px">
            <tr>
              <td width="70%"></td>
              <td align="center"><div style="margin-bottom: 100px"><?= $alamat['nilai'] ?>, <?= date('d/m/Y');?></div><?= $namak['nama_karyawan'] ?><br>(Administrator)</td>
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
<script type="text/javascript">window.print()</script></body>
</html>
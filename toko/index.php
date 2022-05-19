<?php 
session_start();
date_default_timezone_set('Asia/Jakarta');
include 'acc/crudApp.php';
$db = new crud();
// if(empty($_SESSION['status']) or empty($_SESSION['id_toko']) or $_SESSION['status']!="login" or $_SESSION['level']!="toko"){
//   echo "<script>alert('Opps! Anda Harus Login untuk Kehalaman ini'); window.location.href='../login.php'</script>";
// } else {}
$namatoko =$db->tampildata("tb_profil where jenis='Nama Toko'"); foreach($namatoko as $datanamatoko){}; 
$infobank =$db->tampildata("tb_profil where jenis='Bank'"); foreach($infobank as $bank){}; 
$infoalamat =$db->tampildata("tb_profil where jenis='Alamat'"); foreach($infoalamat as $alamat){}; 
$infoprofil =$db->tampildata("tb_profil where jenis='profiltoko'"); foreach($infoprofil as $iprofil){}; 
$infohalamantoko = $db->tampildata("tb_toko where id_toko='$_SESSION[id_toko]'"); foreach($infohalamantoko as $htoko){};

if(empty($_GET)){ $page='pages/home.php';$title='Beranda';}

else {
 if($_GET['hal'])
 {
  switch ($_GET['hal'])
  {
    
    case 'detailtoko':
    $page='pages/_detailtoko.php';
    $title='Detail toko';
    break;
    case 'editdetailtoko':
    $page='pages/_editdetailtoko.php';
    $title='Edit Data toko';
    break;
    case 'tambahproduk':
    $page='pages/_tambahproduk.php';
    $title='Tambah produk baru';
    break;
    case 'dataproduk':
    $page='pages/_databarang.php';
    $title='Data Produk';
    break;
    case 'lihatproduk':
    $page='pages/_lihatproduk.php';
    $title='Produk';
    break;
    case 'editproduk':
    $page='pages/_editproduk.php';
    $title='Edit produk';
    break;
    case 'tambahdetailproduk':
    $page='pages/tambahbarang.php';
    $title='Tambah produk detail yang diinginkan';
    break;
    case 'datadetailproduk':
    $page='pages/_databarangdetail.php';
    $title='Data Detail Produk';
    break;
    case 'lihatdetailproduk':
    $page='pages/_lihatbarang.php';
    $title='Detail produk';
    break;
    case 'editdetailproduk':
    $page='pages/_editbarang.php';
    $title='Edit detail produk';
    break;
    case 'datakategori':
    $page='pages/_kategori.php';
    $title='Data Kategori';
    break;
    case 'datapenjualanharian':
    $page='pages/_penjualanharian.php';
    $title='Data Penjualan Harian';
    break;
    case 'datapenjualanbulanan':
    $page='pages/_penjualanbulanan.php';
    $title='Data Penjualan Bulanan';
    break;
    case 'datapenjualantahunan':
    $page='pages/_penjualantahunan.php';
    $title='Data Penjualan Tahunan';
    break;
    case 'konfirmasitransaksi':
    $page='pages/_konfirmasipenjualan.php';
    $title='Transaksi yang belum dikonfirmasi';
    break;
    case 'prosestransaksi':
    $page='pages/_prosespenjualan.php';
    $title='Transaksi dalam proses pengiriman';
    break;
    case 'berhasiltransaksi':
    $page='pages/_berhasilpenjualan.php';
    $title='Transaksi yang berhasil';
    break;
    case 'gagaltransaksi':
    $page='pages/_gagalpenjualan.php';
    $title='Transaksi yang gagal / dibatalkan';
    break;
    case 'detailpembelian':
    $page='pages/_detailpembelian.php';
    $title='Detail Pembelian';
    break;
    case 'datakaryawan':
    $page='pages/_karyawan.php';
    $title='Data Karyawan';
    break;
    case 'tambahkaryawan':
    $page='pages/_tambahkaryawan.php';
    $title='Tambah Karyawan';
    break;

    default:
    $title='Informasi';
    $page= '404.php';
    break;
  }
}
else  $page='404.php';
}
?>
<?php include 'acc/head.php' ?>
<?php include 'acc/side.php' ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><?= $title ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <?php include $page ?>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include 'acc/bot.php' ?>

<?php 
$penjualan=$db->tampildata('tb_detailfaktur,tb_faktur,tb_produk,tb_produkdetail where tb_faktur.no_faktur=tb_detailfaktur.no_faktur and tb_detailfaktur.id_produk=tb_produkdetail.id_produkdetail and tb_produk.id_produk=tb_produkdetail.id_produk and tb_faktur.status="Selesai"and tb_produk.id_toko="'.$_SESSION["id_toko"].'" group by tb_faktur.no_faktur');
$produk=$db->tampildata('tb_produk where id_toko="'.$_SESSION['id_toko'].'"');
$pelanggan=$db->tampildata('tb_pelanggan');
$kategori=$db->tampildata('tb_kategori');
 ?>
<div class="container-fluid">
  <div class="row">
   
  <!-- Small boxes (Stat box) -->
    <div class="col-lg-3">
  <div class="row">
    <div class="col-lg-12 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3><?= $penjualan->num_rows ?></h3>

          <p>Total Penjualan</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="index.php?hal=berhasiltransaksi" class="small-box-footer">Lihat Semua <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-12 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3><?= $produk->num_rows ?></h3>

          <p>Jumlah Produk</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="index.php?hal=dataproduk" class="small-box-footer">Lihat Semua <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-12 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3><?= $pelanggan->num_rows ?></h3>

          <p>Jumlah Pelanggan</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="index.php?hal=dataakun" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-12 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3><?= $kategori->num_rows ?></h3>

          <p>Jumlah Kategori</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="index.php?hal=datakategori" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->
 </div><!-- /.container-fluid -->
  <div class="col-lg-9">
  <div id="tentang" class="jumbotron m-0">
    <div class="row">
      <div class="container">
        <div class="col-md-12 text-center">
          <h2 class="mt-5 mb-5"><?= $datanamatoko['nilai'] ?></h2>
          <div class="card">
            <div class="card-body">
              <h5><?= $iprofil['nilai'] ?></h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
 </div><!-- /.container-fluid -->
 </div><!-- /.container-fluid -->
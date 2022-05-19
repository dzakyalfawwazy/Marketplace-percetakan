<?php
$row=$db->tampildetail('tb_detailfaktur,tb_faktur,tb_produk,tb_produkdetail,tb_pelanggan,tb_metodebayar','tb_faktur.no_faktur=tb_detailfaktur.no_faktur and tb_detailfaktur.id_produk=tb_produkdetail.id_produkdetail and tb_produk.id_produk=tb_produkdetail.id_produk and tb_faktur.id_pelanggan=tb_pelanggan.id_pelanggan and tb_faktur.no_faktur="'.$_GET["id"].'" and tb_faktur.id_metode_bayar=tb_metodebayar.id_metode_bayar group by tb_faktur.no_faktur');
$no=0;
foreach($row as $data): $no++; ?>
  <div class="card card-outline card-info">
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col-md-7">
          <div class="h4">Rincian Pemesanan</div>
      <table id="example2" class="table text-xs table-bordered table-striped">
        <tbody>
          <tr>
            <th>Tanggal</th>
            <td><?= date('d/m/Y',strtotime($data['tanggal'])) ?></td>
            <th>Faktur</th>
            <td><?= $data['no_faktur'] ?></td>
          </tr>
          <tr>
            <th>Pelanggan</th>
            <td><?= $data['nama_plg'] ?></td>
            <th>Status</th>
            <td><?= $data['status'] ?></td>
          </tr>
          <tr>
            <th>Jenis Pembayaran</th>
            <td><?= $data['metodebayar'] ?></td>
            <th>Total</th>
            <td><div class="float-left"> Rp.</div><div class="float-right"><?= $data['total_bayar'] ?>.-</div></td>
        </tr>
      </tbody>
    </table>
    <div class="h4">Rincian Pembelian </div>
    <table class="table text-xs table-bordered table-striped">
      <thead>
        <tr>
          <th>Qty</th>
          <th>Product</th>
          <th>Warna</th>
          <th>Ukuran</th>
          <th>Harga</th>
        </tr>
      </thead>
      <tbody>
       <?php 
       $row2 = $db -> tampildetail('tb_produk,tb_produkdetail,tb_detailfaktur',' tb_detailfaktur.id_produk=tb_produkdetail.id_produkdetail  and tb_produk.id_produk=tb_produkdetail.id_produk and tb_detailfaktur.no_faktur="'.$_GET["id"].'"');
       foreach($row2 as $data2){
         ?>
         <tr>
          <td><?= $data2['jumlah'] ?></td>
          <td><?= $data2['nama_produk'] ?></td>
          <td><?= $data2['warna'] ?></td>
          <td><?= $data2['ukuran'] ?></td>
          <td>Rp.<?= $data2['harga'] ?>,-</td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<div class="col-md-5">
  <div class="float-right">
    <a href="cetakstruk.php?id=<?= $_GET['id'] ?>" class="btn btn-success btn-sm"> <i class="fas fa-print"></i> Cetak Struk</a>
  </div>
  <?php if($data['status']=='Belum Bayar' or $data['status']=='Kadaluarsa' or $data['status']=='Batal' or $data['id_metode_bayar']=='1') {} else { ?>
  <div class="h1">Bukti Pembayaran</div>
   <img src="data:image/jpg;base64,<?= base64_encode($data['bukti_pembayaran'])?>" id="output_image" class="img-thumbnail col-12" alt="Bukti Pembayaran">
  </div>
<?php } ?>
</div>
</div>
<!-- /.card-body -->
</div>
<?php endforeach; ?>
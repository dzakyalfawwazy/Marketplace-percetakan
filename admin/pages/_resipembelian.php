<?php
$row=$db->tampildetail('tb_detailfaktur,tb_faktur,tb_produk,tb_produkdetail,tb_pelanggan','tb_faktur.no_faktur=tb_detailfaktur.no_faktur and tb_detailfaktur.id_produk=tb_produkdetail.id_produkdetail and tb_produk.id_produk=tb_produkdetail.id_produk and tb_faktur.id_pelanggan=tb_pelanggan.id_pelanggan and tb_faktur.no_faktur="'.$_GET["id"].'" group by tb_faktur.no_faktur');
$no=0;
foreach($row as $data): $no++; ?>
  <div class="card card-outline card-info">
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col-md-7">
          <div class="card">
          <div class="card-body">
            <div class="h5">Tambahkan Resi</div>
            <form method="post" class="form-inline" action="act/_transaksi.php?type=inputresi">
              <input type="hidden" name="id" required value="<?= $_GET['id'] ?>">
              <input type="text" name="resi" class="form-control form-control-sm mr-3" required placeholder="Nomor Resi..">
              <button type="submit" onclick="return confirm('Input Resi?')" class="btn btn-sm btn-success"><i class="fas fa-check"></i> Input Nomor Resi</button>
            </form>
          </div>
          </div>
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
            <th>No. Resi</th>
            <td><?= $data['resi'] ?>
          </td>
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
          <td>Rp.<?= $data2['hargajual'] ?>,-</td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<div class="col-md-5">
  <?php if($data['status']=='Belum Bayar' or $data['status']=='Kadaluarsa' or $data['status']=='Batal') {} else { ?>
  <div class="h1">Bukti Pembayaran</div>
   <img src="data:image/jpg;base64,<?= base64_encode($data['bukti_pembayaran'])?>" id="output_image" class="img-thumbnail col-12" alt="Bukti Pembayaran">
  </div>
<?php } ?>
</div>
</div>
<!-- /.card-body -->
</div>
<?php endforeach; ?>
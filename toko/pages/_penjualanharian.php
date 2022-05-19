       <?php
       if(isset($_GET['tanggal'])){
        $date=$_GET['tanggal'];
      } else 
      {
        $date=date('Y-m-d');
      }
      ?>
      <div class="card card-outline card-info">
        <!-- /.card-header -->
        <div class="card-body">
          <form method="get">
            <div class="form-row mb-4">
              <input type="hidden" class="form-control col-3" name="hal" value="datapenjualanharian">
              <input type="date" class="form-control col-3" onchange="submit()" name="tanggal" value="<?= $date ?>">
            </div>
          </form>
          <table id="example1" class="table text-xs table-bordered table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $row=$db->tampilselect('tb_detailfaktur.*,tb_faktur.*,tb_produk.*,tb_produkdetail.*,tb_pelanggan.*,sum(tb_produkdetail.harga) as totaljual,sum(tb_detailfaktur.jumlah) as jumlahbeli','tb_detailfaktur,tb_faktur,tb_produk,tb_produkdetail,tb_pelanggan','tb_faktur.no_faktur=tb_detailfaktur.no_faktur and tb_detailfaktur.id_produk=tb_produkdetail.id_produkdetail and tb_produk.id_produk=tb_produkdetail.id_produk and tb_faktur.id_pelanggan=tb_pelanggan.id_pelanggan and date(tb_faktur.waktu_penjualan)="'.$date.'" and tb_faktur.status="Selesai" and tb_produk.id_toko="'.$_SESSION['id_toko'].'" group by tb_produk.id_produk');
              $no=0;
              foreach($row as $data): $no++; ?>
                <tr>
                  <td><?=$no ?></td>
                  <td><?= $data['nama_produk'] ?></td>
                  <td><?= $data['jumlahbeli'] ?></td>
                  <td><?= $data['totaljual'] ?></td>
                  <td><div class="float-left"> Rp.</div><div class="float-right"><?= $data['totaljual'] * $data['jumlahbeli']  ?>.-</div>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
            <tfoot>
              <tr>
                <th>No.</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
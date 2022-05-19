          <div class="card card-outline card-info">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table text-xs table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Faktur</th>
                    <th>Pelanggan</th>
                    <th>Status</th>
                    <th>No. Resi</th>
                    <th>Total</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                   $row=$db->tampildetail('tb_detailfaktur,tb_faktur,tb_produk,tb_produkdetail,tb_pelanggan','tb_faktur.no_faktur=tb_detailfaktur.no_faktur and tb_detailfaktur.id_produk=tb_produkdetail.id_produkdetail and tb_produk.id_produk=tb_produkdetail.id_produk and tb_faktur.id_pelanggan=tb_pelanggan.id_pelanggan and tb_faktur.status="Verifikasi Pembayaran" group by tb_faktur.no_faktur');
                  $no=0;
                  foreach($row as $data): $no++; ?>
                  <tr>
                    <td><?=$no ?></td>
                    <td><?= date('d/m/Y',strtotime($data['tanggal'])) ?></td>
                    <td><?= $data['no_faktur'] ?></td>
                    <td><?= $data['nama_plg'] ?></td>
                    <td><?= $data['status'] ?></td>
                    <td><?= $data['resi'] ?></td>
                    <td><div class="float-left"> Rp.</div><div class="float-right"><?= $data['total_bayar'] ?>.-</div></td>
                    <td>
                      <div class="d-inline">
                        <a href="index.php?hal=detailpembelian&id=<?= $data['no_faktur'] ?>" class="badge badge-primary">Lihat</a>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Tanggal</th>
                  <th>Faktur</th>
                  <th>Pelanggan</th>
                  <th>Status</th>
                  <th>No. Resi</th>
                  <th>Total</th>
                  <th>Aksi</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
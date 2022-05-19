          <div class="card card-outline card-info">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table text-xs table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Kode</th>
                  <th>Produk</th>
                  <th>Merk</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $row = $db->tampildata('tb_produk order by tanggal asc');
                  $no=0;
                  foreach ($row as $data) :
                    $no++;
                   ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= $data['id_produk']?></td>
                  <td><?= $data['nama_produk']?></td>
                  <td><?= $data['merk']?></td>
                  <td>
                    <div class="d-inline">
                    <a href="index.php?hal=lihatproduk&id=<?= $data['id_produk']?>" class="badge badge-primary">Lihat</a>
                    <a href="index.php?hal=editproduk&id=<?= $data['id_produk']?>" class="badge badge-warning">Edit</a>
                    <a href="act/_barang.php?type=hapus&id=<?= $data['id_produk']?>" class="badge badge-danger">Hapus</a>
                  </div>
                </td>
                </tr>
              <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Kode</th>
                  <th>Produk</th>
                  <th>Merk</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
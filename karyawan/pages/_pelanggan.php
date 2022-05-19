          <div class="card card-outline card-info">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table text-xs table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Kode</th>
                  <th>Foto</th>
                  <th>Nama</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $row = $db->tampildata('tb_pelanggan');
                  $no=0;
                  foreach ($row as $data): 
                    $no++; ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= $data['id_pelanggan'] ?>
                  </td>
                  <td>-</td>
                  <td><?= $data['nama_plg'] ?></td>
                  <td>
                    <div class="d-inline">
                    <a href="index.php?hal=detailpelanggan&id=<?= $data['id_pelanggan'] ?>" class="badge badge-primary">Lihat</a>
                    <a href="act/_pelanggan.php?type=hapus&id=<?= $data ['id_pelanggan'] ?>" class="badge badge-danger">Hapus</a>
                  </div>
                </td>
                </tr>
              <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Kode</th>
                  <th>Foto</th>
                  <th>Nama</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
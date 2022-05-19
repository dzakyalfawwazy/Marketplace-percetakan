          <div class="card card-outline card-info">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table text-xs table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Waktu Daftar</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>ID Toko</th>
                  <th>Nama Toko</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $row = $db->tampildetail('tb_user, tb_toko', 'tb_user.id_pelanggan = tb_toko.id_toko and tb_user.status="unconfirmed"');
                  $no=0;
                  foreach($row as $data) : 
                    $no++;?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= $data['tgl_daftar'] ?></td>
                  <td><?= $data['nama_user'] ?></td>
                  <td><?= $data['password'] ?></td>
                  <td><?= $data['id_pelanggan'] ?></td>
                  <td><?= $data['nama_toko'] ?></td>
                  <td><?= $data['status'] ?></td>
                  <td>
                    <div class="d-inline">
                    <a href="act/_akun.php?type=confirmaccounttoko&id=<?= $data['id_user'] ?>" onclick="return confirm('Konfirmasi Akun?')" class="badge badge-success">Konfirmasi</a>
                  </div>
                </td>
                </tr>
              <?php endforeach ?>
                </tbody>
                <tfoot>
                <tr>
                 <th>No.</th>
                  <th>Waktu Daftar</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>ID Toko</th>
                  <th>Nama Toko</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
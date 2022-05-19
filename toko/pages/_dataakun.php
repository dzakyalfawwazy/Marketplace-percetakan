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
                  <th>ID Pelanggan</th>
                  <th>Nama Pelanggan</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $row = $db->tampildetail('tb_user, tb_pelanggan', 'tb_user.id_pelanggan = tb_pelanggan.id_pelanggan');
                  $no=0;
                  foreach($row as $data) : 
                    $no++;?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= $data['tgl_daftar'] ?></td>
                  <td><?= $data['nama_user'] ?></td>
                  <td><?= $data['password'] ?></td>
                  <td><?= $data['id_pelanggan'] ?></td>
                  <td><?= $data['nama_plg'] ?></td>
                  <td><?= $data['status'] ?></td>
                  <td>
                    <div class="d-inline">
                    <a href="act/_akun.php?type=deactivatedaccount&id=<?= $data['id_user'] ?>" class="badge badge-danger">Nonaktifkan Akun</a>
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
                  <th>ID Pelanggan</th>
                  <th>Nama Pelanggan</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
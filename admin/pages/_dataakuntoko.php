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
                  <?php $row = $db->tampildetail('tb_user, tb_toko', 'tb_user.id_pelanggan = tb_toko.id_toko');
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
                      <?php if($data['status']=='deactivated'){ ?> 
                    <a href="act/_akun.php?type=activatedaccounttoko&id=<?= $data['id_user'] ?>" onclick="return confirm('Anda yakin akan men-aktif-kan akun?')" class="badge badge-warning">Aktifkan Akun</a>
                    <?php } else { ?> 
                    <a href="act/_akun.php?type=deactivatedaccounttoko&id=<?= $data['id_user'] ?>"  onclick="return confirm('Anda yakin akan men-non aktif-kan akun?')" class="badge badge-danger">Nonaktifkan Akun</a>
                      <?php } ?>
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
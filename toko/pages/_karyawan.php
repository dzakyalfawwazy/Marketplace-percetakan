          <div class="card card-outline card-info">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table text-xs table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Nik</th>
                  <th>Nama</th>
                  <th>Jabatan</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $row = $db->tampildata("tb_karyawan where id_toko='$_SESSION[id_toko]'");
                  $no=0;
                  foreach ($row as $data): 
                    $no++; ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= $data['nik_karyawan'] ?>
                  </td>
                  <td><?= $data['nama_karyawan'] ?></td>
                  <td><?= $data['jabatan'] ?></td>
                  <td><?= $data['username'] ?></td>
                  <td><?= $data['password'] ?></td>
                  <td>
                    <div class="d-inline">
                    <a onclick="return confirm('Anda Yakin Hapus?')" href="act/_karyawan.php?type=hapus&id=<?= $data ['nik_karyawan'] ?>" class="badge badge-danger">Hapus</a>
                  </div>
                </td>
                </tr>
              <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
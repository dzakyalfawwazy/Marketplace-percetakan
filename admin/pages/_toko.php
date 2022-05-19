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
                  <?php $row = $db->tampildata('tb_toko');
                  $no=0;
                  foreach ($row as $data): 
                    $no++; ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= $data['id_toko'] ?>
                  </td>
                  <td> <img class="profile-user-img img-fluid"
               src="../upload/toko/<?= $data['foto']?>"
               alt="User profile picture"></td>
                  <td><?= $data['nama_toko'] ?></td>
                  <td>
                    <div class="d-inline">
                    <a href="index.php?hal=detailtoko&id=<?= $data['id_toko'] ?>" class="badge badge-primary">Lihat</a>
                    <a href="act/_toko.php?type=hapus&id=<?= $data ['id_toko'] ?>" onclick="return confirm('Anda yakin akan menghapus?')" class="badge badge-danger">Hapus</a>
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
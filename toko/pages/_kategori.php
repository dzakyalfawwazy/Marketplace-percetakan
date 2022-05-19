          <div class="card card-outline card-info">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table text-xs table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>ID Kategori</th>
                    <th>Kategori</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $row = $db->tampildata('tb_kategori order by id_kategori asc');

                  $no = 0;
                  foreach ($row as $data) : 
                   $no++;?>
                   <tr>
                    <td><?= $no ?></td>
                    <td><?= $data['id_kategori'] ?>
                    <td><?= $data['nama_kategori'] ?>
                  </tr>
                <?php endforeach ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>No.</th>
                  <th>ID Kategori</th>
                  <th>Kategori</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
          <div class="card card-outline card-info">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table text-xs table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Kode</th>
                  <th>Foto</th>
                  <th>Produk</th>
                  <th>Ukuran</th>
                  <th>Warna</th>
                  <th>Harga</th>
                  <th>Stok</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $row = $db->tampildetail('tb_produkdetail,tb_produk','tb_produkdetail.id_produk = tb_produk.id_produk and tb_produk.id_toko = "'.$_SESSION["id_toko"].'" order by tanggal asc');
                  $no=0;
                  foreach ($row as $data) :
                    $no++;
                   ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= $data['id_produk']?></td>
                  <td><img class="img-fluid" style="height: 100px; width: auto" src="../upload/barang/<?= $data['gambar'] ?>"></td>
                  <td><?= $data['nama_produk']?></td>
                  <td><?= $data['ukuran']?></td>
                  <td><?= $data['warna']?></td>
                  <td><div class="float-left"> Rp.</div><div class="float-right"><?= $data['harga']?>.-</div></td>
                  <td><?= $data['stok']?></td>
                  <td>
                    <div class="d-inline">
                    <a href="index.php?hal=lihatdetailproduk&id=<?= $data['id_produkdetail']?>" class="badge badge-primary">Lihat</a>
                    <a href="index.php?hal=editdetailproduk&id=<?= $data['id_produkdetail']?>" class="badge badge-warning">Edit</a>
                    <a href="act/_barang.php?type=hapusdetail&id=<?= $data['id_produkdetail']?>" class="badge badge-danger">Hapus</a>
                  </div>
                </td>
                </tr>
              <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
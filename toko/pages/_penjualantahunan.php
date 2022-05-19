       <?php
       if(isset($_GET['tanggal'])){
        $date=$_GET['tanggal'];
      } else 
      {
        $date=date('Y');
      }
      ?>
      <div class="card card-outline card-info">
        <!-- /.card-header -->
        <div class="card-body">
          <form method="get">
            <div class="form-row mb-4">
              <label for="tanggal" class="text-sm col-1">Pilih Tahun
              </label>
              <input type="hidden" class="form-control col-3" name="hal" id="tanggal" value="datapenjualantahunan">
              <input type="number" max='<?= date('Y')?>' min='2019' class="form-control col-3" onchange="submit()" name="tanggal" value="<?= $date ?>">
            </div>
          </form>
          
          <table id="example1" class="table text-xs table-bordered table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>Bulan</th>
                <th>Total</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $row=$db->tampilselect('tb_faktur.no_faktur,tb_faktur.waktu_penjualan,sum(tb_faktur.total_bayar) as total','tb_faktur',' year(tb_faktur.waktu_penjualan)="'.$date.'" and tb_faktur.status="Selesai" group by tb_faktur.no_faktur and month(tb_faktur.waktu_penjualan)');
              $no=0;
              foreach($row as $data): $no++; ?>
                <tr>
                  <td><?= $no; ?></td>
                  <td>Bulan - <?= date('m',strtotime($data['waktu_penjualan'])) ?></td>
                  <td><div class="float-left"> Rp.</div><div class="float-right"><?= $data['total'] ?>.-</div></td>
                  <td>
                    <div class="d-inline">
                      <a href="index.php?hal=datapenjualanbulanan&tanggal=<?= date('Y-m',strtotime($data['waktu_penjualan'])) ?>" class="badge badge-primary">Lihat</a>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
            <tfoot>
              <tr>
                <th>No.</th>
                <th>Bulan</th>
                <th>Total</th>
                <th>Aksi</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
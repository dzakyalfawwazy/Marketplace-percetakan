       <?php
       if(isset($_GET['tanggal'])){
        $date=$_GET['tanggal'];
      } else 
      {
        $date=date('Y-m');
      }
      ?>
      <div class="card card-outline card-info">
        <!-- /.card-header -->
        <div class="card-body">
          <form method="get">
            <div class="form-row mb-4">
              <input type="hidden" class="form-control col-3" name="hal" value="datapenjualanbulanan">
              <input type="month" class="form-control col-3" onchange="submit()" name="tanggal" value="<?= $date ?>">
            </div>
          </form>
           <div class="float-right"><a href="cetakpenjualanbulanan.php?tanggal=<?= $date ?>-1"  target="_blank" class="btn btn-success"><i class="fas fa-print"></i>Cetak</a></div>
           <table id="example1" class="table text-xs table-bordered table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $row=$db->tampilselect('tb_faktur.no_faktur,tb_faktur.waktu_penjualan,sum(tb_faktur.total_bayar) as total','tb_faktur',' month(tb_faktur.waktu_penjualan)=month("'.$date.'-01") and tb_faktur.status="Selesai" group by tb_faktur.no_faktur and date(tb_faktur.waktu_penjualan)');
              $no=0;
              foreach($row as $data): $no++; ?>
                <tr>
                  <td><?= $no; ?></td>
                  <td>Tanggal - <?= date('d',strtotime($data['waktu_penjualan'])) ?></td>
                  <td><div class="float-left"> Rp.</div><div class="float-right"><?= $data['total'] ?>.-</div></td>
                  <td>
                    <div class="d-inline">
                      <a href="index.php?hal=datapenjualanharian&tanggal=<?= date('Y-m-d',strtotime($data['waktu_penjualan'])) ?>" class="badge badge-primary">Lihat</a>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
            <tfoot>
              <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Aksi</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
<?php $baris = $db->editdata('tb_profil', 'id', $_GET['id']);
foreach($baris as $value):
 ?>
<div class="row">
  <div class="col-md-4">
    <form class="form-horizontal" method="POST" id="formktg">

      <div class="card">
        <div class="card-body card-outline card-danger">
          <div class="form-group">
            <label for="exampleInputEmail1">Jenis</label>
            <input type="text" name="jenis" value="<?= $value['jenis']?>" class="form-control" id="exampleInputEmail1" placeholder="...." readonly>
            <input type="hidden" name="id" value="<?= $value['id']?>" class="form-control"  placeholder="....">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail2">Isi</label>
           <textarea class="textarea" name="isi" id="textarea" placeholder="Place some text here"
          style="width: 100%; height: 400px; font-size: 10px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $value['nilai']?></textarea>
          </div>
        </div>
        <div class="card-footer">
          <button type="button" id="submitktg" class="btn btn-warning btn-sm float-right"><div class="fas fa-plus"></div> Edit Data Toko</button>
        </div>
      </div>
    </form>

  </div>
<?php endforeach;?>
  <div class="col-md-8">
              <div class="card card-outline card-info">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table text-xs table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Jenis</th>
                    <th>Isi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $row = $db->tampildata('tb_profil order by id asc');

                  $no = 0;
                  foreach ($row as $data) : 
                   $no++;?>
                   <tr>
                    <td><?= $no ?></td>
                    <td><?= $data['jenis'] ?>
                    <td><?= $data['nilai'] ?>
                    <td>
                      <div class="d-inline">
                        <a href="index.php?hal=edittoko&id=<?= $data['id']?>" class="badge badge-warning">Edit</a>
                        <a href="act/_toko.php?type=hapus&id=<?= $data['id']?>" class="badge badge-danger">Hapus</a>
                      </div>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Jenis</th>
                  <th>Isi</th>
                  <th>Aksi</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
   const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });

   $('#submitktg').click(function(){
    var data = $('#formktg').serialize();
    $.ajax({
      type : 'POST',
      url : 'act/_toko.php?type=edit',
      data : data,
      success : function(){
        Toast.fire({
          type: 'warning',
          title: 'Data Toko berhasil diubah.'
        });
        $('#formktg').trigger("reset"),
        setTimeout(function() {window.location.href = 'index.php?hal=datatoko'}, 1000);
        
      }
    })

  });
 });
</script>
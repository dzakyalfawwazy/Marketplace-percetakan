     <div class="row">

      <div class="col-md-8 offset-md-2">
        <div class="card card-outline card-info">
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table text-xs table-bordered table-striped">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Level</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $row =$db->tampildata("tb_user where level <> 'user' and  level <> 'toko'");
                $no=0;
                foreach($row as $data): $no++;?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><?= $data['nama_user'] ?></td>
                    <td><?= $data['password'] ?></td>
                    <td><?= $data['level'] ?></td>
                    <td>
                      <div class="d-inline">
                        <a href="index.php?hal=editpengelola&id=<?= $data['id_user'] ?>" class="badge badge-warning">Edit</a>
                      </div>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
              <tfoot>
                <tr>
                 <th>No.</th>
                 <th>Username</th>
                 <th>Password</th>
                 <th>Level</th>
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
        url : 'act/_toko.php?type=tambah',
        data : data,
        success : function(){
          Toast.fire({
            type: 'success',
            title: 'Data Toko berhasil ditambah.'
          });
          $('#formktg').trigger("reset"),
          setTimeout(function() {window.location.reload()}, 1000);

        }
      })

    });
   });
 </script>
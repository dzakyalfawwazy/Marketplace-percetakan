    <?php $baris = $db->editdata('tb_user', 'id_user', $_GET['id']);
foreach($baris as $data):
 ?>
     <div class="row">
      <div class="col-md-4 offset-md-4">
        <form class="form-horizontal" method="POST" id="formktg">

          <div class="card">
            <div class="card-body card-outline card-danger">
              <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" name="username" class="form-control" value="<?= $data['nama_user'] ?>" id="exampleInputEmail1" placeholder="....">
                <input type="hidden" name="id" class="form-control" value="<?= $data['id_user'] ?>" id="exampleInputEmail1" placeholder="....">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail2">Password Baru</label>
                <input type="password" name="password" class="form-control" value="<?= $data['password'] ?>" id="exampleInputEmail2" placeholder="....">
              </div>
            </div>
            <div class="card-footer">
              <button type="button" id="submitktg" class="btn btn-warning btn-sm float-right"><div class="fas fa-check"></div> Edit Pengelola</button>
            </div>
          </div>
        </form>

      </div>
      
   </div>
 <?php endforeach ?>
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
        url : 'act/_akun.php?type=edit',
        data : data,
        success : function(){
          Toast.fire({
            type: 'success',
            title: 'Data Pengelola berhasil ditambah.'
          });
          $('#formktg').trigger("reset"),
          setTimeout(function() {window.location.href='index.php?hal=datapengelola'}, 1000);

        }
      })

    });
   });
 </script>
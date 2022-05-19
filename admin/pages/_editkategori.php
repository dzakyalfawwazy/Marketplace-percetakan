
<?php $row = $db->editdata('tb_kategori', 'id_kategori', $_GET['id']);
foreach ($row as $data) :
 ?>
<form class="form-horizontal" method="POST" enctype="multipart/form-data" id="formktg">
  <div class="row">
    <div class="col-md-4 offset-md-4">
      <div class="card">
        <div class="card-body card-outline card-danger">
          <div class="form-group">
            <label for="exampleInputEmail1">Kategori</label>
            <input type="text" name="nama" class="form-control" value="<?= $data['nama_kategori'] ?>" id="exampleInputEmail1" placeholder="....">
            <input type="hidden" name="id_kategori" class="form-control" value="<?= $data['id_kategori'] ?>"  placeholder="....">
          </div>
        </div>
        <div class="card-footer">
          <button type="button" id="submitktg" class="btn btn-info float-right"><div class="fas fa-check"></div> Edit Kategori</button>
        </div>
      </div>
    </div>
  </div>
</form>
<?php  endforeach ?>
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
        url : 'act/_kategori.php?type=edit',
        data : data,
       success : function(){
          Toast.fire({
            type: 'warning',
            title: ' Kategori berhasil diubah.'
          }),
        setTimeout(function() {
           window.location ='index.php?hal=datakategori'
         }, 1000);
          
        }
      })
    });
 });
</script>
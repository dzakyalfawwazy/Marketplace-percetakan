
<form class="form-horizontal" method="POST" enctype="multipart/form-data" id="formktg">
  <div class="row">
    <div class="col-md-4 offset-md-4">
      <div class="card">
        <div class="card-body card-outline card-danger">
          <div class="form-group">
            <label for="exampleInputEmail1">Kategori</label>
            <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="....">
          </div>
        </div>
        <div class="card-footer">
          <button type="button" id="submitktg" class="btn btn-info float-right"><div class="fas fa-plus"></div> Tambah Kategori</button>
        </div>
      </div>
    </div>
  </div>
</form>
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
        url : 'act/_kategori.php?type=tambah',
        data : data,
        success : function(){
          Toast.fire({
            type: 'success',
            title: 'Kategori berhasil ditambah.'
          }),
          $('#formktg').trigger("reset");
            $("#output_image").attr('src','#');
            window.location="index.php?hal=datakategori";
        }
      })
    });
      $(":file").change(function(){
      if (this.files && this.files[0]) {
         var reader = new FileReader();
         reader.onload = imageIsLoaded;
         reader.readAsDataURL(this.files[0]);
      }
     });
     function imageIsLoaded(e) {
      $("#output_image").attr('src',e.target.result);
     };
 });
</script>
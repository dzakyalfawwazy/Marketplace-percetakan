<form class="form-horizontal" id="formbarang" method="post" enctype="multipart/form-data">
  <div class="container p-5">
   <div class="card  card-outline card-info">
    <div class="card-body">
      <div class="row">
       <div class="col-md-8">
        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-3 col-form-label">Produk</label>
          <div class="col-sm-9">
            <div class="form-group">
              <select class="form-control select2 select2-danger" name="id_produk" required data-allow-clear="true" data-placeholder="..." data-dropdown-css-class="select2-danger">
                <option value=""></option>
                <?php 
                $row = $db->tampildata('tb_produk');
                foreach ($row as $data) :
                 echo "<option value='".$data['id_produk']."'>". $data['nama_produk'] . "</option>";
               endforeach;
               ?>
             </select>
           </div>
         </div>
       </div>

       <div class="form-group row">
        <label for="inputUkuran" class="col-sm-3 col-form-label">Ukuran</label>
        <div class="col-sm-9">
          <input type="text" name="ukuran" class="form-control" id="inputUkuran" placeholder="...">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputWarna" class="col-sm-3 col-form-label">Warna</label>
        <div class="col-sm-9">
          <input type="text" name="warna" class="form-control" id="inputWarna" placeholder="...">
        </div>
      </div>
      <div class="form-group row">
        <label for="hargajual" class="col-sm-3 col-form-label">Harga</label>
        <div class="col-sm-9">
         <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Rp.</span>
          </div>
          <input type="text" name="hargajual" class="form-control" required placeholder="...">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputPassword3" class="col-sm-3 col-form-label">Jumlah yg tersedia</label>
      <div class="col-sm-9">
        <input type="text" name="jumlah" class="form-control" id="inputPassword3" placeholder="...">
      </div>
    </div>
  </div>
  <div class="col-md-4">

    <div class="row">         
      <div class="col-md-9 offset-md-3">
        <div class="text-center" style="height: 150px; width: 150px; border: 1px orange solid; border-radius: 15px; padding: 5px; margin: 5px">
          <img src="#" id="output_image" class="img img-fluid" alt="Foto Produk">
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <div class="input-group">
            <div class="custom-file">
              <input accept=".jpg" type="file" name="imagess" class="custom-file-input" id="exampleInputFile">
              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="col-md-12 mb-3">
   <button type="button" name="submitbarang" id="submitbarang" class="btn btn-success btn-sm float-right swalDefaultSuccess">
    <div class="fas fa-plus"></div> Tambah Detail Produk
  </button>
  <a href="index.php?hal=tambahproduk" name="tambahproduk" id="tambahproduk"  class="btn btn-danger btn-sm float-left">
    <div class="fas fa-plus"></div> Produk Baru
  </a>
</div>
</div>
</div>

</div>
</div>
</form>

<script type="text/javascript">
  $(document).ready(function(){
   
    $('#tambahproduk').click(function(){
      window.location.href = 'index.php?hal=tambahproduk';
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

<form class="form-horizontal" method="post" action="act/_barang.php?type=tambahdetail" enctype="multipart/form-data">
  <div class="container p-2">
   <div class="card  card-outline card-info">
    <div class="card-body">
      <div class="row">

        <div class="col-md-4">

          <div class="row">         
            <div class="col-md-10 offset-md-1">
              <h4>Foto Produk</h4>
              <div class="text-center img-thumbnail" style="height: 150px">
                <img src="#" id="output_image" style="height: 150px" class="img img-fluid" alt="Foto Produk">
              </div>
            </div>
            <div class="col-md-12 mt-1">
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
        <div class="col-md-8">
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-3 col-form-label">Produk</label>
            <div class="col-sm-9">
              <div class="form-group">

               <div class="input-group">
                <select class="form-control select2 select2-danger" name="id_produk" required data-allow-clear="true" data-placeholder="..." data-dropdown-css-class="select2-danger">
                  <option value=""></option>
                  <?php 
                  $row = $db->tampildata('tb_produk where id_toko="'.$_SESSION["id_toko"].'"');
                  foreach ($row as $data) :
                   echo "<option value='".$data['id_produk']."'>". $data['nama_produk'] . "</option>";
                 endforeach;
                 ?>
               </select>
               <div class="input-group-append">
                <a href="index.php?hal=tambahproduk" class="btn btn-info"><i class="fas fa-plus"></i> Tambah Produk</a>
              </div>
            </div>
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
          <input type="text" name="harga" class="form-control" required placeholder="...">
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

  <div class="col-md-12 mb-3">
   <button type="submit" name="submitbarang" class="btn btn-success btn-sm float-right swalDefaultSuccess">
    <div class="fas fa-save"></div> Simpan Detail
  </button>
  <a href="index.php?hal=tambahproduk" name="tambahproduk" id="tambahproduk"  class="btn btn-primary btn-sm float-left">
    <div class="fas fa-angle-left"></div><div class="fas fa-angle-left"></div> Lihat Detail Produk
  </a>
</div>
</div>
</div>

</div>
</div>
</form>

<script type="text/javascript">
  $(document).ready(function(){

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

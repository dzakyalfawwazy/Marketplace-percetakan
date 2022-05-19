<?php
$row=$db->editdata('tb_produkdetail','id_produkdetail',$_GET["id"]);
foreach ($row as $data) :
 ?>
 <form class="form-horizontal" id="formbarang" method="post" enctype="multipart/form-data">
  <div class="container p-5">
   <div class="card  card-outline card-info">
    <div class="card-body">
      <div class="row">
       <div class="col-md-8">
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Produk</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="inputEmail3" readonly value="<?= $data['nama_produk'] ?>" required name="nama" placeholder="..."/>
            <input type="hidden" value="<?= $data['id_produkdetail'] ?>" required name="id_produkdetail" placeholder="..."/>
          </div>
        </div>


        <div class="form-group row">
          <label for="harga" class="col-sm-3 col-form-label">Harga Beli</label>
          <div class="col-sm-9">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Rp.</span>
              </div>
              <input type="text" name="hargabeli" readonly value="<?= $data['hargabeli'] ?>" required class="form-control" />
              <div class="input-group-append">
                <span class="input-group-text">.00</span>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="hargajual" class="col-sm-3 col-form-label">Harga Jual</label>
          <div class="col-sm-9">
           <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">Rp.</span>
            </div>
            <input type="text" name="hargajual" readonly class="form-control" value="<?= $data['hargajual'] ?>" required placeholder="hargajual">
            <div class="input-group-append">
              <span class="input-group-text">.00</span>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-3 col-form-label">Jumlah yg tersedia</label>
        <div class="col-sm-9">
          <input type="text" name="jumlah" readonly class="form-control" id="inputPassword3" value="<?= $data['stok'] ?>" placeholder="...">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-3 col-form-label">Kategori</label>
        <div class="col-sm-9">
          <div class="form-group">
            <select class="form-control select2 select2-danger"  disabled="disabled" name="kategori" required data-allow-clear="true" data-placeholder="Pilih Kategori" data-dropdown-css-class="select2-danger">
              <option value=""></option>
              <?php 
              $row1 = $db->tampildata('tb_kategori');
              foreach ($row1 as $data1) :
                if ($data['id_kategori']==$data1['id_kategori']) $opt = "selected"; else $opt ="";
                echo "<option value='".$data1['id_kategori']."' ". $opt .">". $data1['nama_kategori'] . "</option>";
              endforeach;
              ?>
            </select>

          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 offset-md-1">
          <div class="card card-outline card-warning">
        <div class="card-header">
         <label>  
         Gambar Foto
         </label>
        </div>
        <div class="card-body">
        <div class="text-center" style="height: 150px; width: 150px; border: 1px orange solid; border-radius: 15px; padding: 5px; margin: 5px">
            <img class="img img-fluid" id="output_image" src="data:image;base64,<?= base64_encode($data['gambar'])?>" alt="Foto Produk">
          </div>
        </div>
      </div>
          
    </div>
    <div class="col-md-12">
      <div class="card card-outline card-info">
        <div class="card-header">
          <label for="textarea">Deskripsi Produk</label>
        </div>
        <div class="card-body">
          <?= $data['deskripsi'] ?>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
</div>
</form>
<?php endforeach; ?>
<script type="text/javascript">
  $(document).ready(function(){
   const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });

   $('#submitbarang').click(function(){
    var data = new FormData($('#formbarang')[0]);
    data.append("file", document.getElementById('exampleInputFile').files[0]);
    $.ajax({
      type : 'POST',
      url : 'act/_barang.php?type=edit',
      data : data,
      cache : false,
      processData : false,
      contentType : false,
      success : function(){
        Toast.fire({
          type: 'warning',
          title: ' Produk berhasil diubah.'
        }),
        setTimeout(function() {
         window.location ='index.php?hal=dataproduk'
       }, 1000);

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

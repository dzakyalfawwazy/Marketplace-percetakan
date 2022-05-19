<?php
$row=$db->editdata('tb_produkdetail,tb_produk','tb_produk.id_produk=tb_produkdetail.id_produk and id_produkdetail',$_GET["id"]);
foreach ($row as $data) :
 ?>
<form class="form-horizontal" id="formbarang" method="post" enctype="multipart/form-data">
  <div class="container p-5">
   <div class="card  card-outline card-info">
    <div class="card-body">
      <div class="row">
        <div class="col-md-12 mb-3">
         <button type="button" name="submitbarang" id="submitbarang" class="btn btn-warning btn-sm float-right swalDefaultWarning"><div class="fas fa-check"></div> Edit Produk</button>
       </div>
       <div class="col-md-8">
        <div class="form-group row">
        <label for="inputPassword3" class="col-sm-3 col-form-label">Produk</label>
        <div class="col-sm-9">
          <div class="form-group">
            <select class="form-control select2 select2-danger" name="id_produk" required data-allow-clear="true" data-placeholder="..." data-dropdown-css-class="select2-danger">
              <option value=""></option>
              <?php 
              $row1 = $db->tampildata('tb_produk');
              foreach ($row1 as $data1) :
                  if ($data['id_produk']==$data1['id_produk']) $opt = "selected"; else $opt ="";
               echo "<option value='".$data1['id_produk']."'".$opt.">". $data1['nama_produk'] . "</option>";
             endforeach;
             ?>
           </select>
         </div>
       </div>
     </div>

      <div class="form-group row">
        <label for="inputUkuran" class="col-sm-3 col-form-label">Ukuran</label>
        <div class="col-sm-9">
          <input type="text" name="ukuran" class="form-control" value="<?= $data['ukuran'] ?>" id="inputUkuran" placeholder="...">
          <input type="hidden" name="id_produkdetail" class="form-control" value="<?= $data['id_produkdetail'] ?>" id="inputUkuran" placeholder="...">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputWarna" class="col-sm-3 col-form-label">Warna</label>
        <div class="col-sm-9">
          <input type="text" name="warna" class="form-control" value="<?= $data['warna'] ?>" id="inputWarna" placeholder="...">
        </div>
      </div>
        <div class="form-group row">
          <label for="harga" class="col-sm-3 col-form-label">Harga Beli</label>
          <div class="col-sm-9">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Rp.</span>
              </div>
              <input type="text" name="hargabeli" placeholder="..." value="<?= $data['hargabeli'] ?>" required class="form-control" />
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
            <input type="text" name="hargajual" class="form-control" value="<?= $data['hargajual'] ?>" required placeholder="...">
            <div class="input-group-append">
              <span class="input-group-text">.00</span>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-3 col-form-label">Jumlah yg tersedia</label>
        <div class="col-sm-9">
          <input type="text" name="jumlah" class="form-control" value="<?= $data['stok'] ?>" id="inputPassword3" placeholder="...">
        </div>
      </div>
   </div>
   <div class="col-md-4">

    <div class="row">         
      <div class="col-md-9 offset-md-3">
        <div class="text-center" style="height: 150px; width: 150px; border: 1px orange solid; border-radius: 15px; padding: 5px; margin: 5px">
          <img class="img img-fluid" id="output_image" src="data:image;base64,<?= base64_encode($data['gambar'])?>" alt="Foto Produk">
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <div class="input-group">
            <div class="custom-file">
              <input accept="image/*" type="file" name="imagess" class="custom-file-input" id="exampleInputFile">
              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
          </div>
        </div>
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
        url : 'act/_barang.php?type=editdetail',
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
           window.location ='index.php?hal=datadetailproduk'
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

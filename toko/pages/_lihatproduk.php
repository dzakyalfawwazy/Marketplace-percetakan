<?php
$row=$db->editdata('tb_produk','id_produk',$_GET["id"]);
foreach ($row as $data) :
 ?>
<form class="form-horizontal" id="formbarang" method="post">
  <div class="container p-5">
   <div class="card  card-outline card-info">
    <div class="card-body">
      <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-3 col-form-label">Produk</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="inputEmail3" readonly required name="nama" value="<?= $data['nama_produk'] ?>" placeholder="..."/>
            <input type="hidden" class="form-control" id="inputEmail" required name="id_produk" value="<?= $data['id_produk'] ?>" placeholder="..."/>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-3 col-form-label">Merk</label>
          <div class="col-sm-9">
            <input type="text" name="merk" class="form-control" readonly id="inputPassword3" value="<?= $data['merk'] ?>" placeholder="...">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputBerat" class="col-sm-3 col-form-label">Berat</label>
          <div class="col-sm-9">
            <div class="input-group">
            <input type="text" name="berat" id="inputBerat" class="form-control" readonly value="<?= $data['berat'] ?>" required placeholder="...">
            <div class="input-group-append">
              <span class="input-group-text">Gram</span>
            </div>
          </div>
          </div>
        </div>
        <div class="form-group row">
        <label for="inputPassword3" class="col-sm-3 col-form-label">Kategori</label>
        <div class="col-sm-9">
          <div class="form-group">
            <select class="form-control" name="kategori" readonly required data-allow-clear="true" data-placeholder="..." data-dropdown-css-class="select2-danger">
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
        <div class="form-group">
          <label for="textarea">Deskripsi Produk</label>
      <?= $data['deskripsi'] ?>
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
      var data = $('#formbarang').serialize();
    $.ajax({
      type : 'POST',
      url : 'act/_barang.php?type=edit',
      data : data,
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
        
 });
</script>

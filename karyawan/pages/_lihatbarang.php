<?php
$row=$db->editdata('tb_produkdetail,tb_produk','tb_produk.id_produk=tb_produkdetail.id_produk and id_produkdetail',$_GET["id"]);
foreach ($row as $data) :
 ?>
<form class="form-horizontal" id="formbarang" method="post" enctype="multipart/form-data">
  <div class="container p-2">
   <div class="card  card-outline card-info">
    <div class="card-body">
      <div class="row">
       <div class="col-md-8">
        <div class="form-group row">
        <label for="inputPassword3" class="col-sm-3 col-form-label">Produk</label>
        <div class="col-sm-9">
          <div class="form-group">
            <select class="form-control"  readonly name="id_produk" required data-allow-clear="true" data-placeholder="..." data-dropdown-css-class="select2-danger">
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
          <input type="text" name="ukuran"  readonly class="form-control" value="<?= $data['ukuran'] ?>" id="inputUkuran" placeholder="...">
          <input type="hidden"  readonly name="id_produkdetail" class="form-control" value="<?= $data['id_produkdetail'] ?>" id="inputUkuran" placeholder="...">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputWarna" class="col-sm-3 col-form-label">Warna</label>
        <div class="col-sm-9">
          <input type="text" name="warna"  readonly class="form-control" value="<?= $data['warna'] ?>" id="inputWarna" placeholder="...">
        </div>
      </div>
        <div class="form-group row">
          <label for="hargajual" class="col-sm-3 col-form-label">Harga</label>
          <div class="col-sm-9">
           <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">Rp.</span>
            </div>
            <input type="text" name="hargajual" class="form-control"  readonly value="<?= $data['harga'] ?>" required placeholder="...">
            <div class="input-group-append">
              <span class="input-group-text">.00</span>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-3 col-form-label">Jumlah yg tersedia</label>
        <div class="col-sm-9">
          <input type="text" name="jumlah" class="form-control"  readonly value="<?= $data['stok'] ?>" id="inputPassword3" placeholder="...">
        </div>
      </div>
   </div>
   <div class="col-md-4">

    <div class="row">         
      <div class="col-md-9 offset-md-3">
        <div class="h5"> Gambar Produk</div>
        <div class="card text-center">
          <img class="img img-fluid" id="output_image" src="../upload/barang/<?= $data['gambar'] ?>" alt="Foto Produk">
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
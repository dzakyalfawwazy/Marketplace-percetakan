<?php
$profil=$db->tampildetail('tb_toko,tb_user','tb_user.id_pelanggan=tb_toko.id_toko and tb_user.id_pelanggan="'.$_SESSION["id_toko"].'"');
foreach($profil as $pro):
 ?>
 <section class="content">
  <form method="post" action="act/_toko.php?type=edittoko" enctype="multipart/form-data">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
               <img class="profile-user-img img-fluid img-circle" id='output_image'
               src="../upload/toko/<?= $pro['foto']?>"
               alt="User profile picture">
             </div>
             <div class="input-group mb-3">
              <div class="custom-file">
                <input type="file" accept=".jpg" name="imagess" class="custom-file-input" id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">Pilih Gambar</label>
              </div>
            </div>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>ID Toko</b> <a class="float-right"><?= $pro['id_toko'] ?></a>
                <input type="hidden" name="id_toko" value="<?= $pro['id_toko'] ?>">
              </li>
              <li class="list-group-item">
                <button type="submit" class="btn btn-block btn-sm btn-success">Selesai</button>
              </li>
            </ul>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card">
          <div class="card-body">
            <div class="form-group row">
              <label for="inputName" class="col-sm-2 col-form-label">Username</label>
              <div class="col-sm-10">
                <input type="text" name="nama_user" class="form-control" id="inputuserName" placeholder="username" value="<?= $pro['nama_user'] ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputName" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                <input type="text" name="password" class="form-control" id="inputpassword" placeholder="password" value="<?= $pro['password'] ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input type="text"  name="nama_toko" class="form-control" id="inputName" placeholder="Name" value="<?= $pro['nama_toko'] ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputName2" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email"  name="email" class="form-control" id="inputName2" placeholder="Email" value="<?= $pro['email'] ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputName2" class="col-sm-2 col-form-label">No. HP</label>
              <div class="col-sm-10">
                <input type="text"  name="nohp" class="form-control" id="inputName2" placeholder="No. HP" value="<?= $pro['nohp'] ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputName2" class="col-sm-2 col-form-label">Kode Pos</label>
              <div class="col-sm-10">
                <input type="text" name="kodepos" class="form-control" id="inputName2" placeholder="Kode Pos" value="<?= $pro['kodepos'] ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputExperience" class="col-sm-2 col-form-label">Alamat</label>
              <div class="col-sm-10">
                <textarea class="form-control" name="alamat" id="inputExperience" placeholder="Alamat"><?= $pro['alamat'] ?></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputName2" class="col-sm-2 col-form-label">Koordinat</label>
              <div class="col-sm-10">
                <div class="form-inline">
                  <input type="text" class="form-control mr-1" required name="longitude" id="long" readonly placeholder="Longitude">
                  <input type="text" class="form-control" required name="latitude" id="lat" readonly placeholder="Latitude">
                </div>
              </div>
            </div>

          </div><!-- /.card-body -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <label>Lokasi</label>
            <div id="mapid"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</form>
</section>
<?php endforeach; ?>
<script type="text/javascript">
  var mymap = L.map('mapid').setView([<?= $pro['latitude'] ?>,<?= $pro['longitude'] ?>], 15);

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(mymap);
  var marker = L.marker([<?= $pro['latitude'] ?>,<?= $pro['longitude'] ?>], {
    draggable : true}).addTo(mymap);
  document.getElementById('lat').value = marker.getLatLng().lat,
  document.getElementById('long').value = marker.getLatLng().lng;
  marker.on('drag',function(e){
    marker.setLatLng(e.latlng);
    document.getElementById('lat').value = marker.getLatLng().lat,
    document.getElementById('long').value = marker.getLatLng().lng;
  });
  mymap.on('tileerror', function(error, tile) {
    console.log(error);
    console.log(tile);
  });
  $(document).ready(function(){

    $('#provinsi').change(function(){

      //Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax 
      var pro = $('#provinsi').val();
      var pecah= pro.split(',');
      var prov = pecah[0];

      $.ajax({
        type : 'GET',
        url : '../ongkir/cek_kabupaten.php',
        data :  'prov_id=' + prov,
        success: function (data) {

          //jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
          $("#kabupaten").html(data);
        }
      });
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
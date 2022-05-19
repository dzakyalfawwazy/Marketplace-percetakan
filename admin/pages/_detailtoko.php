<?php
$profil=$db->tampildetail('tb_toko,tb_user','tb_user.id_pelanggan=tb_toko.id_toko and tb_user.id_pelanggan="'.$_GET["id"].'"');
foreach($profil as $pro):
 ?>
 <section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
             <img class="profile-user-img img-fluid img-circle"
             src="../upload/toko/<?= $pro['foto']?>"
             alt="User profile picture">
           </div>

           <h3 class="profile-username text-center"><?= $pro['nama_toko'] ?></h3>

           <p class="text-muted text-center">Toko</p>

           <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
              <b>ID Toko</b> <a class="float-right"><?= $pro['id_toko'] ?></a>
            </li>
            <li class="list-group-item">
              <b>Username</b> <a class="float-right"><?= $pro['nama_user'] ?></a>
            </li>
            <li class="list-group-item">
              <b>Password</b> <a class="float-right"><?= $pro['password'] ?></a>
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
          <form class="form-horizontal">
            <div class="form-group row">
              <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" readonly id="inputName" placeholder="Name" value="<?= $pro['nama_toko'] ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputName2" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" readonly id="inputName2" placeholder="Email" value="<?= $pro['email'] ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputName2" class="col-sm-2 col-form-label">No. HP</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" readonly id="inputName2" placeholder="No. HP" value="<?= $pro['nohp'] ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputName2" class="col-sm-2 col-form-label">Kode Pos</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" readonly id="inputName2" placeholder="Kode Pos" value="<?= $pro['kodepos'] ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputExperience" class="col-sm-2 col-form-label">Alamat</label>
              <div class="col-sm-10">
                <textarea class="form-control" readonly id="inputExperience" placeholder="Alamat"><?= $pro['alamat'] ?></textarea>
              </div>
            </div>
          </form>
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
</section>
<?php endforeach; ?>
<script type="text/javascript">
  var mymap = L.map('mapid').setView([<?= $pro['latitude'] ?>,<?= $pro['longitude'] ?>], 15);

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(mymap);
  var marker = L.marker([<?= $pro['latitude'] ?>,<?= $pro['longitude'] ?>]).addTo(mymap);

  mymap.on('tileerror', function(error, tile) {
    console.log(error);
    console.log(tile);
  });
</script>
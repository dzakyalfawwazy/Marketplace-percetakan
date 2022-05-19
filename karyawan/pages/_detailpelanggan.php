<?php
  $profil=$db->tampildetail('tb_pelanggan,tb_user','tb_user.id_pelanggan=tb_pelanggan.id_pelanggan and tb_user.id_pelanggan="'.$_GET["id"].'"');
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
               src="data:image/jpg;base64,<?= base64_encode($pro['foto'])?>"
               alt="User profile picture">
             </div>

             <h3 class="profile-username text-center"><?= $pro['nama_plg'] ?></h3>

             <p class="text-muted text-center">Costumer</p>

             <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>ID Costumer</b> <a class="float-right"><?= $pro['id_pelanggan'] ?></a>
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
        <!-- /.card -->
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card">
          <div class="card-body">
            <form class="form-horizontal">
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" readonly id="inputName" placeholder="Name" value="<?= $pro['nama_plg'] ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" readonly id="inputEmail" placeholder="Jenis Kelamin" value="<?= $pro['jenkel'] ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" readonly id="inputEmail" placeholder="Tanggal Lahir" value="<?= $pro['tgl_lahir'] ?>">
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
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<?php endforeach; ?>

<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="act/_karyawan.php?type=tambah">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <div class="card">
        <div class="card-body card-outline card-danger">
          <div class="form-group">
            <label for="exampleInputEmail1">NIK Karyawan</label>
            <input type="text" name="nik" class="form-control" >
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Karyawan</label>
            <input type="text" name="nama" class="form-control"  >
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Jabatan Karyawan</label>
            <input type="text" name="jabatan" class="form-control">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" name="username" class="form-control">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input type="password" name="password" class="form-control">
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" id="submitktg" class="btn btn-info float-right"><div class="fas fa-plus"></div> Tambah Karyawan</button>
        </div>
      </div>
    </div>
  </div>
</form>
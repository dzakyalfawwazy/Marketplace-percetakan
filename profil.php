<?php include 'template/header.php'; ?>
<?php
if(isset($_SESSION['status'])=='userok')
{}
else  echo "<script>window.alert('Anda harus login dulu untuk melanjutkan'); window.location.href='login.php'</script>";
$query=mysqli_fetch_array(mysqli_query($con,"select * from tb_user,tb_pelanggan where tb_user.id_pelanggan=tb_pelanggan.id_pelanggan  and tb_user.id_pelanggan='$_SESSION[id_pelanggan]'"));
if(isset($_POST['edit'])){
    $query=$con->query("UPDATE `tb_user` SET `nama_user`='$_POST[nama_user]',`password`='$_POST[password]' WHERE `id_user`='$_POST[id_user]'");
    $query1=$con->query("UPDATE `tb_pelanggan` SET `nama_plg`='$_POST[nama_plg]',`jenkel`='$_POST[jenkel]',`tgl_lahir`='$_POST[tgl_lahir]',`email`='$_POST[email]',`nohp`='$_POST[nohp]',`kodepos`='$_POST[kodepos]',`alamat`='$_POST[alamat]' WHERE `id_pelanggan`='$_POST[id_pelanggan]'");
    echo "<script>window.alert('Profil Berhasil Diubah');window.location.href='profil.php'</script>";
}

?>

<div class="header-empty-space"></div>

<div class="empty-space col-xs-b35 col-md-b70"></div>


<div class="container">
    <div class="panel panel-success">
        <div class="panel-heading">
            <div class="h2">Profil </div></div>
            <div class="panel-body">
                <?php if(isset($_GET['aksi'])=='edit'){?>
                    <form method="post">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="empty-space col-xs-b35 col-md-b70"></div>
                                <table class="table table-striped">
                                  <tr>
                                    <td>Nama Akun</td>
                                    <td>:</td>
                                    <td>
                                        <input type="hidden" readonly name="id_user" class="form-control" value="<?= $query['id_user'] ?>">
                                        <input type="text" name="nama_user" class="form-control" value="<?= $query['nama_user'] ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td>:</td>
                                    <td><input type="text" name="password" class="form-control" value="<?=$query['password'];?>"></td>
                              </tr>
                          </table>

                          <div class="text-center">
                            <button type="submit" name="edit" class="btn btn-warning">Update</button>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="simple-article size-3">
                            <table class="table table-striped" cellspacing="10px">
                              <tr>
                                <td>ID Pelanggan</td>
                                <td>:</td>
                                <td><input type="text" name="id_pelanggan" readonly class="form-control" value="<?= $query['id_pelanggan'] ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Pelanggan</td>
                                <td>:</td>
                                <td><input type="text" name="nama_plg" class="form-control" value="<?= $query['nama_plg'] ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td><input type="text" name="jenkel" class="form-control" value="<?= $query['jenkel'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>:</td>
                                <td><input type="date" name="tgl_lahir" class="form-control" value="<?= date('Y-m-d',strtotime($query['tgl_lahir'])) ?>"></td>
                            </tr>
                            <tr>
                                <td>E-Mail</td>
                                <td>:</td>
                                <td><input type="text" name="email" class="form-control" value="<?= $query['email'] ?>"></td>
                            </tr>
                            <tr>
                                <td>No. Hp</td>
                                <td>:</td>
                                <td><input type="text" name="nohp" class="form-control" value="<?= $query['nohp'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Kode Pos</td>
                                <td>:</td>
                                <td><input type="text" name="kodepos" class="form-control" value="<?= $query['kodepos'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td><textarea name="alamat" class="form-control"><?= $query['alamat'] ?></textarea></td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
        </form>
    <?php } else{
        ?>
        <div class="row">
            <div class="col-sm-5">
                <div class="empty-space col-xs-b35 col-md-b70"></div>
                <table class="table table-striped">
                  <tr>
                    <td>Nama Akun</td>
                    <td>:</td>
                    <td><?= $query['nama_user'] ?></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>:</td>
                    <td><?php 
                    $jkar=strlen($query['password']); 
                    $skar=substr($query['password'],0,1);
                    echo $skar;
                    for ($i=strlen($skar); $i <$jkar ; $i++) { 
                      echo '*';
                  }
                  ?></td>
              </tr>
          </table>

          <div class="text-center">
            <a href="?aksi=edit" onclick="return confirm('Apakah anda yakin mengubah?')" class="btn btn-warning">Edit</a>
        </div>
    </div>
    <div class="col-sm-7">
        <div class="simple-article size-3">
            <table class="table table-striped">
              <tr>
                <td>Nama Pelanggan</td>
                <td>:</td>
                <td><?= $query['nama_plg'] ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><?= $query['jenkel'] ?></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td><?= date('d M Y',strtotime($query['tgl_lahir'])) ?></td>
            </tr>
            <tr>
                <td>E-Mail</td>
                <td>:</td>
                <td><?= $query['email'] ?></td>
            </tr>
            <tr>
                <td>No. Hp</td>
                <td>:</td>
                <td><?= $query['nohp'] ?></td>
            </tr>
            <tr>
                <td>Kode Pos</td>
                <td>:</td>
                <td><?= $query['kodepos'] ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?= $query['alamat'] ?></td>
            </tr>
            <tr>
                <td>Tanggal Daftar</td>
                <td>:</td>
                <td><?= date('d M Y',strtotime($query['tgl_daftar'])) ?></td>
            </tr>
        </table>
    </div>

</div>
</div>
<?php } ?>
</div>
</div>
</div>

<div class="empty-space col-xs-b35 col-md-b70"></div>

<!-- FOOTER -->
<?php include 'template/footer.php'; ?>
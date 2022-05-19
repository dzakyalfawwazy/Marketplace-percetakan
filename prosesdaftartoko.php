 <?php include'konfig.php';
 
 $y=date('Y');
 $m=date('m');
 $d=date('d');
 $h=date('h');
 $i=date('i');
 $s=date('s');
 $id="PT-".$y."".$m."".$d."".$h."".$i."".$s;
 $ekstensi_diperbolehkan = array('png','jpg','jpeg');
 $nama = $_FILES['imagess']['name'];
 $x = explode('.', $nama);
 $ekstensi = strtolower(end($x));
 $ukuran = $_FILES['imagess']['size'];
 $file_tmp = $_FILES['imagess']['tmp_name'];  
 $temp = explode(".", $_FILES["imagess"]["name"]);
 $nama_baru = round(microtime(true)) . '.' . end($temp);

 $q2=mysqli_query($con,"insert into tb_toko values('".$id."','".$_POST['nama_plg']."','".$_POST['email']."', '".$_POST['nohp']."','".$_POST['kodepos']."','".$_POST['alamat']."', now(),'".$nama_baru."','".$_POST['latitude']."','".$_POST['longitude']."')");

if($q2){
 $q=mysqli_query($con,"insert into tb_user values(NULL, '".$_POST['nama_user']."','".$_POST['password']."', 'toko', 'unconfirmed', '".$id."')");
echo "<script> window.alert('Akun sebagai toko berhasil didaftarkan, harap menunggu konfirmasi dari Admin'); window.location= 'index.php';</script>";
  move_uploaded_file($file_tmp, 'upload/toko/'.$nama_baru);
}

 ?>
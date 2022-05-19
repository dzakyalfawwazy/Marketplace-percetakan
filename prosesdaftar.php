 <?php include'konfig.php';
 if(isset($_POST['daftar']))
{
    $y=date('Y');
    $m=date('m');
    $d=date('d');
    $h=date('h');
    $i=date('i');
    $s=date('s');
    $id="C-".$y."".$m."".$d."".$h."".$i."".$s;
    $q=$con->query("insert into tb_user values('','$_POST[username]','$_POST[password]','user','unconfirmed','$id')");
   $q2=$con->query("insert into tb_pelanggan values('$id','$_POST[namapelanggan]','$_POST[jenkel]','$_POST[tgl_lahir]','$_POST[email]','$_POST[nohp]','$_POST[kodepos]','$_POST[alamat]',now())");
    echo "<script>window.alert('Terima kasih sudah daftar, Silahkan login untuk melanjutkan'); window.location.href='index.php'</script>";
}
    ?>
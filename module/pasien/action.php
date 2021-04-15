<?php 
include '../../config/koneksi.php';
include '../../config/upload.php';
$user   = $_SESSION['id_user'];
$now    = date('Y-m-d H:i:s');
$table  = 'pasien';
$module = $_GET['module'];
$act    = $_GET['act'];
if($act == 'create'){
    $sql="INSERT INTO ".$table." (nama, tel, email, tempatlahir, tanggallahir, alamat)
    VALUES ('".$_POST['nama']."', '".$_POST['tel']."', '".$_POST['email']."','".$_POST['tempatlahir']."', '".$_POST['tanggallahir']."', '".$_POST['alamat']."')";
    $query = mysqli_query($conn,$sql);
    // $sql   =  "INSERT INTO user (nama, username, password, level) VALUES ('".$_POST['nama_pegawai']."', '".mysqli_insert_id($conn)."', '".md5($_POST['NIP'])."','user')";
    // $query = mysqli_query($conn,$sql);
    $_SESSION['flash']['class']='alert alert-success';
    $_SESSION['flash']['label']='Penambahan '.$_GET['module'].' Berhasil';
    $_SESSION['flash']['icon']='fa fa-check';
    // print_r($sql);exit;
    header('Location: ../../media.php?module='.$module);
}else if($act == 'edit'){
    $sql="UPDATE ".$table." SET 
    nama = '".$_POST['nama']."', 
    tel = '".$_POST['tel']."', 
    email = '".$_POST['email']."',
    alamat = '".$_POST['alamat']."', 
    tempatlahir = '".$_POST['tempatlahir']."', 
    tanggallahir = '".$_POST['tanggallahir']."' 
    WHERE id = '".$_POST['id']."'";
    // print_r($sql);exit;
    $query = mysqli_query($conn, $sql);
    $_SESSION['flash']['class']='alert alert-warning';
    $_SESSION['flash']['label']='Pengubahan '.$_GET['module'].' Berhasil';
    $_SESSION['flash']['icon']='fa fa-edit';
    header('Location: ../../media.php?module='.$module);


}else if($act == 'delete'){
    $query = mysqli_query($conn, "DELETE FROM ".$table." WHERE id = '".$_GET['id']."'");
    $_SESSION['flash']['class']='alert alert-danger';
    $_SESSION['flash']['label']='Penghapusan '.$_GET['module'].' Berhasil';
    $_SESSION['flash']['icon']='fa fa-trash';
    header('Location: ../../media.php?module='.$module);
}
?>
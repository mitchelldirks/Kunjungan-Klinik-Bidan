<?php 
include '../../config/koneksi.php';
include '../../config/upload.php';
$user   = $_SESSION['id_user'];
$now    = date('Y-m-d H:i:s');
$table  = 'kunjungan';
$module = $_GET['module'];
$act    = $_GET['act'];
if($act == 'create'){
    $sql="INSERT INTO ".$table." (tanggal, dokter, pasien, biaya, diagnosa, deskripsi)
    VALUES ('".$_POST['tanggal']."', '".$_POST['id_dokter']."', '".$_POST['id_pasien']."','".$_POST['biaya']."','".$_POST['diagnosa']."', '".$_POST['deskripsi']."')";
    $query = mysqli_query($conn,$sql);
    $_SESSION['flash']['class']='alert alert-success';
    $_SESSION['flash']['label']='Penambahan '.$_GET['module'].' Berhasil';
    $_SESSION['flash']['icon']='fa fa-check';
    // print_r($sql);exit;
    header('Location: ../../media.php?module='.$module);
}elseif($act == 'tambah_detail'){
    $sql="INSERT INTO resep (id_kunjungan, id_obat, dosis) VALUES ('".$_POST['id_kunjungan']."', '".$_POST['id_obat']."', '".$_POST['dosis']."')";
    $query = mysqli_query($conn,$sql);
    $_SESSION['flash']['class']='alert alert-success';
    $_SESSION['flash']['label']='Penambahan '.$_GET['module'].' Berhasil';
    $_SESSION['flash']['icon']='fa fa-check';
    // print_r($sql);exit;
    header('Location: ../../media.php?module='.$module.'&act=detail&id='.$_POST['id_kunjungan']);
}else if($act == 'edit'){
    $sql="UPDATE ".$table." SET 
    tanggal = '".$_POST['tanggal']."', 
    dokter = '".$_POST['id_dokter']."', 
    pasien = '".$_POST['id_pasien']."',
    biaya = '".$_POST['biaya']."', 
    diagnosa = '".$_POST['diagnosa']."', 
    deskripsi = '".$_POST['deskripsi']."'
    WHERE id = '".$_POST['id']."'";
    // print_r($sql);exit;
    $query = mysqli_query($conn, $sql);
    $_SESSION['flash']['class']='alert alert-warning';
    $_SESSION['flash']['label']='Pengubahan '.$_GET['module'].' Berhasil';
    $_SESSION['flash']['icon']='fa fa-edit';
    header('Location: ../../media.php?module='.$module);


}else if($act == 'delete'){
    $query = mysqli_query($conn, "DELETE FROM ".$table." WHERE id = '".$_GET['id']."'");
    $query = mysqli_query($conn, "DELETE FROM resep WHERE id_kunjungan = '".$_GET['id']."'");
    $_SESSION['flash']['class']='alert alert-danger';
    $_SESSION['flash']['label']='Penghapusan '.$_GET['module'].' Berhasil';
    $_SESSION['flash']['icon']='fa fa-trash';
    header('Location: ../../media.php?module='.$module);
}else if($act == 'delete_detail'){
    $query = mysqli_query($conn, "DELETE FROM resep WHERE id_kunjungan = '".$_GET['id']."'");
    $_SESSION['flash']['class']='alert alert-danger';
    $_SESSION['flash']['label']='Penghapusan Resep Berhasil';
    $_SESSION['flash']['icon']='fa fa-trash';
    header('Location: ../../media.php?module='.$module.'&act=detail&id='.$_GET['detail']);
}
?>
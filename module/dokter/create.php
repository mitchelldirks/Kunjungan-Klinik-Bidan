<?php 
$aksi   = "module/".$_GET['module']."/action.php";
$edit=mysqli_fetch_array(mysqli_query($conn,"SELECT * from pasien where id='$_GET[id]'"));
?>
<div class="col-md-12">
  <div class="card">
    <div class="card-header card-header-primary">

      <h4 class="card-title"><?php echo strtoupper($_GET['act']) ?> <?php echo ucwords($_GET['module']) ?></h4>
      <p class="card-category">Pengisian yang belum disimpan akan hilang</p>
    </div>
    <div class="card-body">
      <form action="<?php echo $aksi."?module=".$_GET['module']."&act=".$_GET['act'] ?>" method="POST">
        <div class="row">


          <div class="col-md-12">
            <div class="form-group">
              <label class="bmd-label-floating">Nama</label>
              <input type="text" class="form-control" name="nama">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="bmd-label-floating">Tempat Lahir</label>
              <input type="text" class="form-control" name="tempatlahir">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="bmd-label-floating">Tanggal Lahir</label>
              <input type="date" class="form-control" max="<?php echo date('Y-m-d'); ?>" name="tanggallahir">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="bmd-label-floating">Telpon</label>
              <input type="tel" class="form-control" name="tel">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="bmd-label-floating">Email</label>
              <input type="email" class="form-control" name="email">
            </div>
          </div>

          <div class="col-md-12">
            <div class="form-group">
              <label class="bmd-label-floating">Spesialisasi</label>
              <input type="text" class="form-control" name="spesialisasi">
            </div>
          </div>

        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Alamat</label>
              <div class="form-group">
                <label class="bmd-label-floating">Masukan Alamat Lengkap Dokter.</label>
                <textarea class="form-control" name="alamat" rows="5"></textarea>
              </div>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary pull-right">Save Profile</button>
        <div class="clearfix"></div>
      </form>
    </div>
  </div>
</div>
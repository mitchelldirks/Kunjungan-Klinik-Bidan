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
              <label class="bmd-label-floating">Nama Obat</label>
              <input type="text" class="form-control" name="nama_obat">
            </div>
          </div>

          <div class="col-md-12">
            <div class="form-group">
              <label class="bmd-label-floating">Berat (gram)</label>
              <input type="text" class="form-control" name="berat">
            </div>
          </div>

          <div class="col-md-12">
            <div class="form-group">
              <label class="bmd-label-floating">Jenis Obat</label>
              <input type="text" class="form-control" name="jenis_obat">
            </div>
          </div>


        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Deskripsi</label>
              <div class="form-group">
                <label class="bmd-label-floating">Keterangan Obat.</label>
                <textarea class="form-control" name="deskripsi" rows="5"></textarea>
              </div>
            </div>
          </div>
        </div>

        <button type="submit" class="btn btn-primary pull-right">Save Data</button>
        <div class="clearfix"></div>
      </form>
    </div>
  </div>
</div>
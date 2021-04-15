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
        <input type="hidden" name="id_kunjungan" value="<?php echo $_GET['id'] ?>">
        <div class="col-md-12 col-sm-12">
          <div class="form-group">
            <label class="bmd-label-floating">Obat</label>
            <select name="id_obat" class="form-control">
              <?php $select=mysqli_query($conn,"SELECT * from obat where id not in (SELECT id_obat from resep where id_kunjungan = '$_GET[id]') order by nama_obat"); ?>
              <?php foreach ($select as $s): ?>
                <option value="<?php echo $s['id'] ?>"><?php echo ucwords($s['nama_obat']) ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
        <div class="col-md-12 col-sm-12">
          <div class="form-group">
            <label class="bmd-label-floating">Dosis perhari <span class="text-muted"> *misal 3 x perhari</span></label>
            <input type="number" class="form-control" min="1" name="dosis">
          </div>
        </div>


      </div>
      <button type="submit" class="btn btn-primary pull-right">Save</button>
      <div class="clearfix"></div>
    </form>
  </div>
</div>
</div>
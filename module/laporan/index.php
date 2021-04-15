<?php 
$aksi   = "module/".$_GET['module']."/action.php";
?>
<div class="col-md-12">
  <div class="card">
    <div class="card-header card-header-primary">
      <h4 class="card-title">Filter Laporan</h4>
      <p class="card-category">Laporan Data Pasien Kunjungan</p>
    </div>
    <div class="card-body">
      <form method="GET">
        <input type="hidden" name="module" value="<?php echo $_GET['module'] ?>">
        <input type="hidden" name="act" value="filter">
        <div class="row">

          <div class="col-md-6">
            <div class="form-group">
              <label class="bmd-label-floating">Sejak</label>
              <input type="date" class="form-control" max="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-01'); ?>" name="sejak"
              required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="bmd-label-floating">Hingga</label>
              <input type="date" class="form-control" max="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d'); ?>" name="hingga"
              required>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-search"></i> Cari</button>
        <div class="clearfix"></div>
      </form>
    </div>
  </div>
</div>
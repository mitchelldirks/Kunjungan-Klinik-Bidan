<?php 
$edit=mysqli_fetch_array(mysqli_query($conn,"SELECT * from dokter where id='$_GET[id]'"));
?>
<div class="col-md-12">
  <div class="card">
    <div class="card-header card-header-primary">

      <h4 class="card-title"><?php echo strtoupper($_GET['act']) ?> <?php echo ucwords($_GET['module']) ?></h4>
      <p class="card-category">Detail <?php echo $_GET['module'] ?></p>
    </div>
    <div class="card-body">
     <div class="row">


      <div class="col-md-12">
        <div class="form-group">
          <label class="bmd-label-floating">Nama</label>
          <input disabled type="text" class="form-control" name="nama" value="<?php echo $edit['nama'] ?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="bmd-label-floating">Tempat Lahir</label>
          <input disabled type="text" class="form-control" name="tempatlahir" value="<?php echo $edit['tempatlahir'] ?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="bmd-label-floating">Tanggal Lahir</label>
          <input disabled type="date" class="form-control" max="<?php echo date('Y-m-d'); ?>" name="tanggallahir" value="<?php echo $edit['tanggallahir'] ?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="bmd-label-floating">Telpon</label>
          <input disabled type="tel" class="form-control" name="tel" value="<?php echo $edit['tel'] ?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="bmd-label-floating">Email</label>
          <input disabled type="email" class="form-control" name="email" value="<?php echo $edit['email'] ?>">
        </div>
      </div>


    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Alamat</label>
          <div class="form-group">
            <label class="bmd-label-floating">Alamat Lengkap Dokter.</label>
            <textarea class="form-control" rows="5" disabled><?php echo $edit['alamat'] ?></textarea>
          </div>
        </div>
      </div>
    </div>
    <!-- <button type="submit" class="btn btn-primary pull-right">Update Profile</button> -->
    <div class="clearfix"></div>
  </form>
</div>
</div>
</div>
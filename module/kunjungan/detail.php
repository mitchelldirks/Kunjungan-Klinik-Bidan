<?php 
$aksi   = "module/".$_GET['module']."/action.php";
$edit=mysqli_fetch_array(mysqli_query($conn,"SELECT * from kunjungan where id='$_GET[id]'"));
?>
<div class="col-md-12">
  <div class="card">
    <div class="card-header card-header-primary">
      <span class="float-right"><a class="btn btn-secondary" target="_blank" href="module/<?php echo $_GET['module'] ?>/print.php?id=<?php echo $edit['id'] ?>"><i class="fa fa-print"></i></a></span>
      <h4 class="card-title"><?php echo strtoupper($_GET['act']) ?> <?php echo ucwords($_GET['module']) ?></h4>
      <p class="card-category">Detail kunjugan</p>
    </div>
    <div class="card-body">
     <div class="row">
      <div class="col-md-3 col-sm-12">
        <div class="form-group">
          <label class="bmd-label-floating">Tanggal Kunjungan</label>
          <input disabled type="date" class="form-control" max="<?php echo date('Y-m-d'); ?>" value="<?php echo $edit['tanggal'] ?>">
        </div>
      </div>
      <div class="col-md-3 col-sm-12">
        <div class="form-group">
          <label class="bmd-label-floating">Pasien</label>
          <?php $select=mysqli_fetch_array(mysqli_query($conn,"SELECT * from pasien where id = '$edit[pasien]'")); ?>
          <input disabled type="text" class="form-control" value="<?php echo $select['nama'] ?>">        </div>
        </div>
        <div class="col-md-3 col-sm-12">
          <div class="form-group">
            <label class="bmd-label-floating">Dokter</label>
            <?php $select=mysqli_fetch_array(mysqli_query($conn,"SELECT * from dokter where id = '$edit[dokter]'")); ?>
            <input disabled type="text" class="form-control" value="<?php echo $select['nama'] ?>">
          </div>
        </div>
        <div class="col-md-3 col-sm-12">
          <div class="form-group">
            <label class="bmd-label-floating">Biaya</label>
            <input disabled type="text" class="form-control" value="Rp. <?php echo number_format($edit['biaya']) ?>">
          </div>
        </div>
        <?php if (strlen($edit['diagnosa']) == 0): ?>
          <div class="col-md-12">
            <a class="btn btn-primary" href="?module=<?php echo $_GET['module'] ?>&act=edit&id=<?php echo $_GET['id'] ?>&diagnosa">Masukan Diagnosa</a>
          </div>
        <?php endif ?>
        <div class="col-md-12">
          <div class="form-group">
            <label class="bmd-label-floating">Diagnosa</label>
            <input disabled type="text" class="form-control" value="<?php echo $edit['diagnosa'] ?>" title="Ubah diagnosa di menu edit">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label>Deskripsi</label>
            <div class="form-group">
              <label class="bmd-label-floating">Deskripsi Keluhan dan diagnosa.</label>
              <textarea disabled class="form-control" rows="5" title="Ubah diagnosa di menu edit"><?php echo $edit['deskripsi'] ?></textarea>
            </div>
          </div>
        </div>
      </div>
      <!-- <button type="submit" class="btn btn-primary pull-right">Update Profile</button> -->
      <div class="clearfix"></div>
      <?php if (strlen($edit['diagnosa']) > 0): ?>
        <div class="row">
          <div class="col-md-12">
            <span class="float-right">
              <a class="btn btn-primary" href="?module=<?php echo $_GET['module'] ?>&act=tambah_detail&id=<?php echo $_GET['id'] ?>">Tambah Obat</a>
              
            </span>
            <h4>Resep Dokter</h4>
            <div class="table-responsive">
             <table class="table">
              <thead class=" text-primary">
                <th>#</th>
                <th>Obat</th>
                <th>Dosis Takar</th>
                <th></th>
              </thead>
              <tbody>
                <?php 
                $no=1;
                $query=mysqli_query($conn,"SELECT * from resep where id_kunjungan = '$_GET[id]' order by id ");
                foreach ($query as $row): 
                  $obat=mysqli_fetch_array(mysqli_query($conn,"SELECT * from obat where id = '$row[id_obat]'"));
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $obat['nama_obat'] ?></td>
                    <td><?php echo $row['dosis'] ?> kali sehari</td>
                    <td>
                      <span class="float-right">
                        <a class="btn btn-danger btn-xs" onclick="return confirm('Hapus data?')" href="<?php echo $aksi ?>?module=<?php echo $_GET['module'] ?>&act=delete_detail&detail=<?php echo $_GET['id'] ?>&id=<?php echo $row['id']; ?>">
                          <i class="fa fa-trash"></i>
                        </a>
                      </span>
                    </td>
                  </tr>
                  <?php 
                endforeach
                ?>
              </tbody>
              <tfoot>
                <tr><td colspan="4">Pack obat yang disarankan: <?php echo mysqli_num_rows($query); ?></td></tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    <?php endif ?>
  </div>
</div>
</div>
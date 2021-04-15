
<div class="col-lg-3 col-md-6 col-sm-6">
  <div class="card card-stats">
    <div class="card-header card-header-warning card-header-icon">
      <div class="card-icon">
        <i class="material-icons">content_paste</i>
      </div>
      <p class="card-category">Kunjungan</p>
      <h3 class="card-title"><?php echo mysqli_num_rows(mysqli_query($conn,"SELECT * from kunjungan")); ?>
    </h3>
  </div>
  <div class="card-footer">
    <div class="stats">
      <i class="material-icons text-danger">info</i>
      <!-- <a href="javascript:;">Get More Space...</a> -->
      Kunjungan Hari ini 
    </div>
    <span class="pull-right"><?php echo mysqli_num_rows(mysqli_query($conn,"SELECT * from kunjungan where tanggal = '".date('Y-m-d')."'")); ?></span>
  </div>
</div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6">
  <div class="card card-stats">
    <div class="card-header card-header-success card-header-icon">
      <div class="card-icon">
        <i class="material-icons">person</i>
      </div>
      <p class="card-category">Pasien</p>
      <h3 class="card-title"><?php echo mysqli_num_rows(mysqli_query($conn,"SELECT * from pasien")); ?>

    </div>
    <div class="card-footer">
      <div class="stats">
        <i class="material-icons text-success">info</i>
        <!-- <a href="javascript:;">Get More Space...</a> -->
        Kunjungan Pasien Hari ini 
      </div>
      <span class="pull-right"><?php echo mysqli_num_rows(mysqli_query($conn,"SELECT distinct pasien from kunjungan where tanggal = '".date('Y-m-d')."'")); ?></span>
    </div>
  </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6">
  <div class="card card-stats">
    <div class="card-header card-header-danger card-header-icon">
      <div class="card-icon">
        <i class="material-icons">health_and_safety</i>
      </div>
      <p class="card-category">Dokter</p>
      <h3 class="card-title"><?php echo mysqli_num_rows(mysqli_query($conn,"SELECT * from dokter")); ?>

    </div>
    <div class="card-footer">
      <div class="stats">
        <i class="material-icons text-danger">info</i>
        <!-- <a href="javascript:;">Get More Space...</a> -->
        Dokter Aktif Hari ini 
      </div>
      <span class="pull-right"><?php echo mysqli_num_rows(mysqli_query($conn,"SELECT distinct dokter from kunjungan where tanggal = '".date('Y-m-d')."'")); ?></span>
    </div>
  </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6">
  <div class="card card-stats">
    <div class="card-header card-header-info card-header-icon">
      <div class="card-icon">
        <i class="material-icons">bubble_chart</i>
      </div>
      <p class="card-category">Obat</p>
      <h3 class="card-title"><?php echo mysqli_num_rows(mysqli_query($conn,"SELECT * from obat")); ?>

    </div>
    <div class="card-footer">
      <div class="stats">
        <i class="material-icons text-info">info</i>
        <!-- <a href="javascript:;">Get More Space...</a> -->
        Obat Dikeluarkan Hari ini 
      </div>
      <span class="pull-right"><?php echo mysqli_num_rows(mysqli_query($conn,"SELECT distinct id_obat from resep where reg_date like '".date('Y-m-d')."%'")); ?></span>
    </div>
  </div>
</div>

<div class="col-lg-12 col-md-12">
  <div class="card">
    <div class="card-header card-header-primary">
      <h4 class="card-title">Kunjungan hari ini</h4>
      <p class="card-category"><?php echo dateIndonesian(date('Y-m-d')) ?></p>
    </div>
    <div class="card-body table-responsive">

     <table class="table">
      <thead class=" text-primary">
        <th>#</th>
        <th>Kode Transaksi</th>
        <th>Tanggal</th>
        <th>Pasien</th>
        <th>Dokter</th>
      </thead>
      <tbody>
        <?php 
        $no=1;
        $query=mysqli_query($conn,"SELECT * from kunjungan where tanggal = '".date('Y-m-d')."' order by id desc");
        foreach ($query as $row): 
          $pasien=mysqli_fetch_array(mysqli_query($conn,"SELECT * from pasien where id = '$row[pasien]'"));
          $dokter=mysqli_fetch_array(mysqli_query($conn,"SELECT * from dokter where id = '$row[dokter]'"));
          $tail=100000+$row['id'];
          ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td>
              <a href="?module=<?php echo $_GET['module'] ?>&act=detail&id=<?php echo $row['id'] ?>">
                <?php echo "K".date_format(date_create($row['tanggal']),"Ymd")."-".$tail; ?>
              </a>
            </td>
            <td><?php echo dateIndonesian($row['tanggal']);?></td>
            <td>
              <strong>
                <?php echo ucwords($pasien['nama']); ?>
              </strong>
              <br>
              <?php echo date('Y')-date_format(date_create($pasien['tanggallahir']),"Y")." tahun"; ?>
            </td>
            <td>
              <strong>
                <?php echo ucwords($dokter['nama']); ?>
              </strong>
              <br>
              <?php echo $dokter['spesialisasi'] ?>
            </td>
          </tr>
          <?php 
        endforeach
        ?>
      </tbody>
    </table>
  </div>
</div>
</div>
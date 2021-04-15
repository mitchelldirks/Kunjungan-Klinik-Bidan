<?php 
$aksi   = "module/".$_GET['module']."/action.php";
?>
<div class="col-md-12">
  <div class="card">
    <div class="card-header card-header-primary">
      <span class="float-right"><a class="btn btn-secondary" href="?module=<?php echo $_GET['module'] ?>&act=create"><i class="fa fa-plus"></i></a></span>
      <h4 class="card-title "><?php echo ucwords($_GET['module']) ?></h4>
      <p class="card-category"> Tabel dengan data <?php echo $_GET['module'] ?></p>
    </div>
    <div class="card-body">
      <div class="p-2">
        <?php 
        if (isset($_SESSION['flash'])): ?>
          <div class="<?php echo $_SESSION['flash']['class']; ?> mt-3 mb-3"> 
            <i class="<?php echo $_SESSION['flash']['icon'] ?>"></i> <?php echo $_SESSION['flash']['label']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
          </div>
        <?php endif ?>
      </div>
      <div class="table-responsive">
        <table class="table">
          <thead class=" text-primary">
            <th>#</th>
            <th>Kode Transaksi</th>
            <th>Tanggal</th>
            <th>Pasien</th>
            <th>Dokter</th>
            <th></th>
          </thead>
          <tbody>
            <?php 
            $no=1;
            $query=mysqli_query($conn,"SELECT * from kunjungan order by id desc");
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
                <td>
                  <span class="float-right">
                    <a class="btn btn-primary btn-xs" href="?module=<?php echo $_GET['module'] ?>&act=edit&id=<?php echo $row['id']; ?>"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-danger btn-xs" onclick="return confirm('Hapus data?')" href="<?php echo $aksi ?>?module=<?php echo $_GET['module'] ?>&act=delete&id=<?php echo $row['id']; ?>"><i class="fa fa-trash"></i></a>
                  </span>
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
</div>
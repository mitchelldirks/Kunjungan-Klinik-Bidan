<?php 
$aksi   = "module/".$_GET['module']."/action.php";
?>
<div class="col-md-12">
  <div class="card">
    <div class="card-header card-header-primary">
      <span class="float-right"><a class="btn btn-secondary" target="_blank" href="module/<?php echo $_GET['module'] ?>/print.php?sejak=<?php echo $_GET['sejak'] ?>&hingga=<?php echo $_GET['hingga'] ?>"><i class="fa fa-print"></i></a></span>

      <h4 class="card-title "><?php echo ucwords($_GET['module']) ?></h4>
      <p class="card-category"> Tabel dengan data <?php echo $_GET['module'] ?></p>
    </div>
    <div class="card-body">

      <div class="table-responsive">
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
            $query=mysqli_query($conn,"SELECT * from kunjungan where tanggal >= '".$_GET['sejak']."' and tanggal <= '".$_GET['hingga']."' order by id desc");
            foreach ($query as $row): 
              $pasien=mysqli_fetch_array(mysqli_query($conn,"SELECT * from pasien where id = '$row[pasien]'"));
              $dokter=mysqli_fetch_array(mysqli_query($conn,"SELECT * from dokter where id = '$row[dokter]'"));
              $tail=100000+$row['id'];
              ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td>
                  <a href="?module=kunjungan&act=detail&id=<?php echo $row['id'] ?>">
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
</div>
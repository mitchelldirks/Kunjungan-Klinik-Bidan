  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="../../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <link href="../../assets/demo/demo.css" rel="stylesheet" />
  <?php 
  include '../../config/koneksi.php';
  $id=$_GET['id'];
  $detail 	=mysqli_fetch_array(mysqli_query($conn,"SELECT * from kunjungan where id = '".$_GET['id']."'"));
  $pasien=mysqli_fetch_array(mysqli_query($conn,"SELECT * from pasien where id = '".$detail['pasien']."'"));
  $dokter=mysqli_fetch_array(mysqli_query($conn,"SELECT * from dokter where id = '".$detail['dokter']."'"));
  ?>
  <title>Bukti Kunjugan <?php echo $detail['tanggal'] ?> - <?php echo $pasien['nama'] ?></title>
  <div class="col-md-12 row">
  	<div class="col-md-6">
  	</div>
  	<div class="col-md-6 text-right">
  		<h3>Bidan Neneng</h3>
  		<!-- <p>Perumnas 1 Jln Rajawali 5 No 7 RT 08 RW 02<br>Kel Kayuringin Jaya Kec Bekasi Selatan<br> Kota Bekasi 17144</p> -->
      <p>Perumnas 1, Jl. Rajawali V No.7, RT.005/RW.023,<br>Kayuringin Jaya, Kec. Bekasi Selatan,<br>Kota Bekasi, Jawa Barat 17144</p>
      
      <p>(021) 8868381</p>
    </div>
  </div>
  <div class="col-md-12">
  	<div class="card">
  		<div class="card-header card-header-primary text-center">
  			<h4 class="card-title text-primary">
  				Bukti Kunjugan <?php echo dateIndonesian($_GET['sejak']) ?> - <?php echo dateIndonesian($_GET['hingga']) ?>
  			</h4>
  			<p class="card-category">
  				<!-- <?php echo strtoupper($_GET['act']) ?> <?php echo ucwords($_GET['module']) ?> -->
  			</p>
  		</div>
  		<div class="card-body">
  			
        <!-- <button type="submit" class="btn btn-primary pull-right">Update Profile</button> -->
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12">
            <!-- <h4>Daftar Kunjungan</h4> -->
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>#</th>
                  <th>Kode Transaksi</th>
                  <th>Tanggal</th>
                  <th>Pasien</th>
                  <th>Dokter</th>
                  <th>Biaya</th>
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
                        <!-- <a href="?module=kunjungan&act=detail&id=<?php echo $row['id'] ?>"> -->
                          <?php echo "K".date_format(date_create($row['tanggal']),"Ymd")."-".$tail; ?>
                          <!-- </a> -->
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
                        <td><?php echo 'Rp. '.number_format($row['biaya']); ?></td>
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
      </div>
    </div>
    <script type="text/javascript">window.print()</script>
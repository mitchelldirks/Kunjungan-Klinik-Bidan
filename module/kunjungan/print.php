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
  				Bukti Kunjugan <?php echo dateIndonesian($detail['tanggal']) ?> - <?php echo $pasien['nama'] ?> dengan <?php echo $dokter['nama'] ?>
  			</h4>
  			<p class="card-category">
  				<!-- <?php echo strtoupper($_GET['act']) ?> <?php echo ucwords($_GET['module']) ?> -->
  			</p>
  		</div>
  		<div class="card-body">
  			<div class="row">
  				<div class="col-md-6 col-xs-12 row">
  					<div class="col-md-12 col-sm-12">
  						<div class="form-group">
  							<label class="bmd-label-floating">Tanggal Kunjungan</label>
  							<input disabled type="text" class="form-control" max="<?php echo date('Y-m-d'); ?>" value="<?php echo dateIndonesian($detail['tanggal']) ?>">
  						</div>
  					</div>
  					<div class="col-md-12 col-sm-12">
  						<div class="form-group">
  							<label class="bmd-label-floating">Pasien</label>
  							<?php $select=mysqli_fetch_array(mysqli_query($conn,"SELECT * from pasien where id = '$detail[pasien]'")); ?>
  							<input disabled type="text" class="form-control" value="<?php echo $select['nama'] ?>">        </div>
  						</div>
  						<div class="col-md-12 col-sm-12">
  							<div class="form-group">
  								<label class="bmd-label-floating">Dokter</label>
  								<?php $select=mysqli_fetch_array(mysqli_query($conn,"SELECT * from dokter where id = '$detail[dokter]'")); ?>
  								<input disabled type="text" class="form-control" value="<?php echo $select['nama'] ?>">
  							</div>
  						</div>
  					</div>
  					<div class="col-md-6 col-xs-12 row">
  						<div class="col-md-12 col-sm-12">
  							<div class="jumbotron jumbotron-fluid bg-transparent">
  								<div class="container">
  									<p class="lead">Biaya Pelayanan Pasien Bidan Neneng.</p>
  									<h1 class="display-5 text-primary"><b>Rp. <?php echo number_format($detail['biaya']) ?></b></h1>
  								</div>
  							</div>
  						</div>
  					</div>
  					<div class="col-md-12">
  						<div class="form-group">
  							<label class="bmd-label-floating">Diagnosa</label>
  							<input disabled type="text" class="form-control" value="<?php echo $detail['diagnosa'] ?>" title="Ubah diagnosa di menu edit">
  						</div>
  					</div>
  				</div>
  				<div class="row">
  					<div class="col-md-12">
  						<div class="form-group">
  							<label>Deskripsi</label>
  							<div class="form-group">
  								<label class="bmd-label-floating">Deskripsi Keluhan dan diagnosa.</label>
  								<br>
  								<?php echo $detail['deskripsi'] ?>
  								<input disabled type="text" class="form-control" title="Ubah diagnosa di menu edit">

  							</div>
  						</div>
  					</div>
  				</div>
  				<!-- <button type="submit" class="btn btn-primary pull-right">Update Profile</button> -->
  				<div class="clearfix"></div>
  				<?php if (strlen($detail['diagnosa']) > 0): ?>
  					<div class="row">
  						<div class="col-md-12">
  							<h4>Resep Dokter</h4>
  							<div class="table-responsive">
  								<table class="table">
  									<thead class=" text-primary">
  										<th>#</th>
  										<th>Obat</th>
  										<th>Dosis Takar</th>
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
  											</tr>
  											<?php 
  										endforeach
  										?>
  									</tbody>
  									<tfoot>
  										<tr><td colspan="3">Pack obat yang disarankan: <?php echo mysqli_num_rows($query); ?></td></tr>
  									</tfoot>
  								</table>
  							</div>
  						</div>
  					</div>
  				<?php endif ?>
  			</div>
  		</div>
  	</div>
  	<script type="text/javascript">window.print()</script>
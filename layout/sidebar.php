<div class="sidebar" data-color="purple" data-background-color="white" data-image="assets/img/sidebar-1.jpg">
  <div class="logo">
    <a href="?" class="simple-text logo-normal">
      Bidan
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item <?php if (!@$_GET['module']){echo 'active';} ?>">
        <a class="nav-link" href="?">
          <i class="material-icons">dashboard</i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item <?php if (@$_GET['module']=='kunjungan'){echo 'active';} ?>">
        <a class="nav-link" href="?module=kunjungan">
          <i class="material-icons">content_paste</i>
          <p>Kunjungan</p>
        </a>
      </li>
      <li class="nav-item <?php if (@$_GET['module']=='pasien'){echo 'active';} ?>">
        <a class="nav-link" href="?module=pasien">
          <i class="material-icons">person</i>
          <p>Pasien</p>
        </a>
      </li>
      <li class="nav-item <?php if (@$_GET['module']=='obat'){echo 'active';} ?>">
        <a class="nav-link" href="?module=obat">
          <i class="material-icons">bubble_chart</i>
          <p>Obat</p>
        </a>
      </li>
      <li class="nav-item <?php if (@$_GET['module']=='dokter'){echo 'active';} ?>">
        <a class="nav-link" href="?module=dokter">
          <i class="material-icons">health_and_safety</i>
          <p>Dokter</p>
        </a>
      </li>
      <li class="nav-item <?php if (@$_GET['module']=='laporan'){echo 'active';} ?>">
        <a class="nav-link" href="?module=laporan">
          <i class="material-icons">storage</i>
          <p>Laporan Kunjungan</p>
        </a>
      </li>
    </ul>
  </div>
</div>
<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('home') ?>">
       
        <div class="sidebar-brand-text mx-3">Administrator King18 </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active':'' ?>">
        <a class="nav-link" href="<?php echo site_url('home') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Data Perusahaan
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?php echo $this->uri->segment(2) == 'produk' ? 'active': '' ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-boxes"></i>
          <span>Produk</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Produk</h6>
            <a class="collapse-item" href="<?php echo site_url('admin/Produk') ?>">Data Produk</a>
            <!-- <a class="collapse-item" href="<?php echo site_url('admin/Produk/tambah') ?>">Tambah Produk</a> -->
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-dolly-flatbed"></i>
          <span>Produksi</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Produksi:</h6>
            <a class="collapse-item" href="<?php echo site_url('admin/Produksi') ?>">Data Produksi</a>
            <a class="collapse-item" href="<?php echo site_url('admin/Prediksi') ?>">Prediksi Produksi</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities1" aria-expanded="true" aria-controls="collapseUtilities1">
          <i class="fas fa-money-check-alt"></i>
          <span>Keuangan</span>
        </a>
        <div id="collapseUtilities1" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Keuangan:</h6>
            <a class="collapse-item" href="#">Pemasukan</a>
            <a class="collapse-item" href="#">Pengeluaran</a>
            <a class="collapse-item" href="#">Penghasilan</a>
          </div>
        </div>
      </li>

       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2" aria-expanded="true" aria-controls="collapseUtilities2">
          <i class="fas fa-people-carry"></i>
          <span>Sales</span>
        </a>
        <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Sales:</h6>
            <a class="collapse-item" href="<?php echo site_url('admin/Sales') ?>">Data Sales</a>
            <a class="collapse-item" href="<?php echo site_url('admin/Riwayat_s') ?>">Riyawat Sales</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities4" aria-expanded="true" aria-controls="collapseUtilities4">
         <i class="fas fa-dumpster"></i>
          <span>Toko</span>
        </a>
        <div id="collapseUtilities4" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Toko:</h6>
            <a class="collapse-item" href="<?php echo site_url('admin/Toko') ?>">Data Toko</a>
            
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Divider -->

      <!-- Heading -->
      <div class="sidebar-heading">
        Laporan Perusahaan
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Laporan</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Laporan Penjualan:</h6>
            <a class="collapse-item" href="#">Penjualan</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Laporan Keuangan:</h6>
            <a class="collapse-item" href="#">Pemasukan</a>
            <a class="collapse-item" href="#">Pengeluaran</a>
          </div>
        </div>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
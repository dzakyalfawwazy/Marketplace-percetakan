
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar text-sm sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link d-flex bg-danger">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><?= $datanamatoko['nilai'] ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Administrator</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar nav-flat flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          <li class="nav-header">DATA PRODUK</li>
          <li class="nav-item">
                <a href="index.php?hal=dataproduk" class="nav-link">
                  <i class="fas fa-table nav-icon"></i>
                  <p>Produk</p>
                </a>
              </li>
          
              <li class="nav-item">
                <a href="index.php?hal=datadetailproduk" class="nav-link">
                  <i class="fas fa-table nav-icon"></i>
                  <p>Detail Produk</p>
                </a>
              </li>
          <li class="nav-item">
            <a href="#" class="nav-link has-treeview">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Kategori
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?hal=tambahkategori" class="nav-link">
                  <i class="fas fa-plus-square nav-icon"></i>
                  <p>Tambah Kategori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?hal=datakategori" class="nav-link">
                  <i class="fas fa-table nav-icon"></i>
                  <p>Data Kategori</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">DATA TRANSAKSI</li>
          <li class="nav-item">
            <a href="#" class="nav-link has-treeview">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Penjualan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?hal=datapenjualanharian" class="nav-link">
                  <i class="fas fa-plus-square nav-icon"></i>
                  <p>Data Penjualan Harian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?hal=datapenjualanbulanan" class="nav-link">
                  <i class="fas fa-table nav-icon"></i>
                  <p>Data Penjualan Bulanan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?hal=datapenjualantahunan" class="nav-link">
                  <i class="fas fa-table nav-icon"></i>
                  <p>Data Penjualan Tahunan</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-header">DATA PELANGGAN</li>
          <li class="nav-item">
            <a href="index.php?hal=datapelanggan" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Data Diri
                <span class="badge badge-sm badge-danger right">Biodata</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link has-treeview">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Akun
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?hal=konfirmasiakun" class="nav-link">
                  <i class="fas fa-plus-square nav-icon"></i>
                  <p>Belum Konfirmasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?hal=dataakun" class="nav-link">
                  <i class="fas fa-plus-square nav-icon"></i>
                  <p>Data Akun</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">DATA TOKO</li>
          <li class="nav-item">
            <a href="index.php?hal=datatoko" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Data Toko
                <span class="badge badge-sm badge-info right">Terdaftar</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link has-treeview">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Akun Toko
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?hal=konfirmasiakuntoko" class="nav-link">
                  <i class="fas fa-plus-square nav-icon"></i>
                  <p>Belum Konfirmasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?hal=dataakuntoko" class="nav-link">
                  <i class="fas fa-plus-square nav-icon"></i>
                  <p>Data Akun toko</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">DATA WEBSITE</li>
          <li class="nav-item">
            <a href="index.php?hal=datawebsite" class="nav-link">
              <i class="nav-icon fas fa-store"></i>
              <p>
                Data Website
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?hal=datapengelola" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Data Pengelola
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
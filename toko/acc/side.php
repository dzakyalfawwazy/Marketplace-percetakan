
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
        <img src="../upload/toko/<?= $htoko['foto'] ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= $htoko['nama_toko'] ?></a>
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
          <li class="nav-header">DATA toko</li>
          <li class="nav-item">
            <a href="index.php?hal=detailtoko&id=<?= $_SESSION['id_toko'] ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Data toko
                <span class="badge badge-sm badge-info right">Profil</span>
              </p>
            </a>
          </li> 
          <li class="nav-header">DATA PRODUK</li>
          <li class="nav-item">
            <a href="#" class="nav-link has-treeview">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Produk
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?hal=tambahproduk" class="nav-link">
                  <i class="fas fa-plus-square nav-icon"></i>
                  <p>Produk Baru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?hal=dataproduk" class="nav-link">
                  <i class="fas fa-table nav-icon"></i>
                  <p>Data Produk</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link has-treeview">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Detail Produk
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?hal=tambahdetailproduk" class="nav-link">
                  <i class="fas fa-plus-square nav-icon"></i>
                  <p>Form Detail Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?hal=datadetailproduk" class="nav-link">
                  <i class="fas fa-table nav-icon"></i>
                  <p>Data Detail Produk</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="index.php?hal=datakategori" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Kategori
              </p>
            </a>
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
          <li class="nav-item">
            <a href="#" class="nav-link has-treeview">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Transaksi
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-warning right">Status</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?hal=konfirmasitransaksi" class="nav-link">
                  <i class="fas fa-plus-square nav-icon"></i>
                  <p>Belum Konfirmasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?hal=prosestransaksi" class="nav-link">
                  <i class="fas fa-plus-square nav-icon"></i>
                  <p>Proses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?hal=berhasiltransaksi" class="nav-link">
                  <i class="fas fa-table nav-icon"></i>
                  <p>Berhasil</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?hal=gagaltransaksi" class="nav-link">
                  <i class="fas fa-table nav-icon"></i>
                  <p>Gagal</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">DATA KARYAWAN</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Data Karyawan
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-sm badge-danger right">Biodata</span>

              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?hal=tambahkaryawan" class="nav-link">
                  <i class="fas fa-plus-square nav-icon"></i>
                  <p>Tambah Karyawan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?hal=datakaryawan" class="nav-link">
                  <i class="fas fa-plus-square nav-icon"></i>
                  <p>Data Karyawan</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
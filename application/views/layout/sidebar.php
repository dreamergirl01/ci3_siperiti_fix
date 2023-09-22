<body>

  <script src="<?= base_url('assets/modules/jquery.min.js') ?>"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="<?= base_url('assets/images/' . $_SESSION['gambar_profil']) ?>" class="rounded-circle mr-1">
              <div class="d-sm-none d-lg-inline-block"> <?= $_SESSION['nama'] ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="<?= base_url('profil/index') ?>" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?= base_url('login/logout') ?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Siperiti</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a>St</a>
          </div>
          <?php if ($_SESSION['level'] == 'super admin') { ?>
            <ul class="sidebar-menu">
              <li><a class="nav-link" href="<?= base_url('dashboard/index') ?> "><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
              <li class="menu-header">Starter</li>
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Barang</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= base_url('barang/index') ?>">Data Barang</a></li>
                  <li><a class="nav-link" href="<?= base_url('barangMasuk/index') ?>">Barang Masuk</a></li>
                  <li><a class="nav-link" href="<?= base_url('barangKeluar/index') ?>">Barang Keluar</a></li>
                </ul>
              </li>
              <li><a class="nav-link" href="<?= base_url('detail/index') ?>"><i class="fas fa-pencil-ruler"></i> <span>Detail</span></a></li>
              <li><a class="nav-link" href="<?= base_url('transaksi/index') ?>"><i class="fas fa-pencil-ruler"></i> <span>Transaksi</span></a></li>
              <li><a class="nav-link" href="<?= base_url('user/index') ?>"><i class="fas fa-pencil-ruler"></i> <span>User</span></a></li>
            </ul>
          <?php } elseif ($_SESSION['level'] == 'admin') { ?>
            <ul class="sidebar-menu">
              <li><a class="nav-link" href="<?= base_url('dashboard/index') ?> "><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
              <li class="menu-header">Starter</li>
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Data Master</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= base_url('jenisBarang/index') ?>">Jenis Barang</a></li>
                  <li><a class="nav-link" href="<?= base_url('kondisi/index') ?>">Kondisi Barang</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Barang</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= base_url('barang/index') ?>">Data Barang</a></li>
                  <li><a class="nav-link" href="<?= base_url('barangMasuk/index') ?>">Barang Masuk</a></li>
                  <li><a class="nav-link" href="<?= base_url('barangKeluar/index') ?>">Barang Keluar</a></li>
                </ul>
              </li>
              <li><a class="nav-link" href="<?= base_url('detail/index') ?>"><i class="far fa-square"></i> <span>Detail</span></a></li>
              <li><a class="nav-link" href="<?= base_url('stokBarang/index') ?>"><i class="far fa-square"></i> <span>Stok Barang</span></a></li>
              <li><a class="nav-link" href="<?= base_url('transaksi/index') ?>"><i class="fas fa-pencil-ruler"></i> <span>Transaksi</span></a></li>
              <li><a class="nav-link" href="<?= base_url('user/index') ?>"><i class="fas fa-pencil-ruler"></i> <span>User</span></a></li>
            </ul>
          <?php } elseif ($_SESSION['level'] == 'client') { ?>
            <ul class="sidebar-menu">
              <li><a class="nav-link" href="<?= base_url('dashboard/index') ?> "><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
              <li class="menu-header">Starter</li>
              <li><a class="nav-link" href="<?= base_url('barang/index') ?>"><i class="fas fa-columns"></i><span>Data Barang</span></a></li>
              <li><a class="nav-link" href="<?= base_url('stokBarang/index') ?>"><i class="far fa-square"></i> <span>Stok Barang</span></a></li>
              <li><a class="nav-link" href="<?= base_url('transaksi/index') ?>"><i class="fas fa-pencil-ruler"></i> <span>Transaksi</span></a></li>
            </ul>
          <?php } ?>
        </aside>
      </div>
    </div>
  </div>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo $url_site; ?>index.php" class="brand-link">
      <img src="<?php echo $url_site; ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y
    os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo $url_site; ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Marlon Avila</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->

      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>  -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo $url_site; ?>index.php" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Nuevo Préstamo
              </p>
            </a>
          </li>
          <li class="nav-header">Collection Process</li>
          <li class="nav-item">
            <a href="<?php echo $url_site; ?>cobranza/" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                Cobranza
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $url_site; ?>reporte/" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Reporte
              </p>
            </a>
          </li>
          <li class="nav-header">Management</li>
          <li class="nav-item">
            <a href="<?php echo $url_site; ?>historial/" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Historial
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $url_site; ?>utilidades/" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Utilidades
              </p>
            </a>
          </li>
        </ul>
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?php echo $url_site; ?>login.php" class="nav-link" style="margin-top: 16.5rem;">
              <i class="nav-icon fa fa-power-off text-danger"></i>
              <p class="text">Cerrar Sesión</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Control Sidebar -->
  <!-- <aside class="control-sidebar control-sidebar-dark">
  </aside> -->
  <!-- /.control-sidebar -->

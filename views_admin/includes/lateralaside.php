<!-- Brand Logo -->
<a href="index.php" class="brand-link">
  <img src="../imgs/logo.JPG"
       alt="AdminLTE Logo"
       class="brand-image img-circle elevation-3"
       style="opacity: .8">
  <span class="brand-text font-weight-light">Sistema <b>Inventario</b></span>
</a>

<!-- Sidebar -->
<div class="sidebar ">
  <!-- Sidebar user (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="../imgs/usuarios/user.png" class="img-circle elevation-2" alt="Usuario">
    </div>
    <div class="info">
      <a href="#" class="d-block">Usuario Nombre</a>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

      <!-- MENU MEDICINAS -->
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link ">
          <i class="fas fa-user"></i> 
          <p>
            Usuarios
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="usuarios_crear.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Crear usuario</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="usuarios_listados.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Listado</p>
            </a>
          </li>
        </ul>
      </li> 

      <!-- MENU CON ENFERMOS -->
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link ">
          <i class="fas fa-dice-d6"></i>
          <p>
            Productos
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Crear producto</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Listado</p>
            </a>
          </li>
        </ul>
      </li> 

       <!-- MENU CON ENFERMOS -->
       <li class="nav-item has-treeview">
        <a href="#" class="nav-link ">
          <i class="fas fa-clipboard-list"></i>
          <p>
            Control de Inventario
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="reportar_salida.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Reportar salida</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="reportar_entrada.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Reportar entrada</p>
            </a>
          </li>
        </ul>
      </li> 

  

    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
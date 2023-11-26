<!DOCTYPE html>
<html>
<head>
	<title>Eliminar usuario</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../templates/AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../templates/AdminLTE-3.0.5/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../templates/AdminLTE-3.0.5/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="sidebar-collapse sidebar-mini">

<?php include "includes/config.php"; ?>

<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand <?php echo $headerStyle; ?>">
    <?php 
      include "includes/header.php";
    ?>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar <?php echo $lateralStyle; ?> elevation-4">
    <?php 
    include "includes/lateralaside.php";
     ?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Eliminar Usuario!</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Eliminar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">

      <div class="row">
        
<!-- COLUMNA DE FORMULARIO  -->
        <div class="col-md-6"><!-- columna de contenido -->
          
          
            <!-- /.card-header -->
            <div class="card">
            <div class="card-header bg-indigo">
              <h3 class="card-title">Confirmar Eliminación</h3>
            </div>

            <!-- Para controles de formularios siempre usar etiqueta FORM -->
            <form role="form" name="frm_prods" id="frm_prods" method="POST" enctype="multipart/form-data">
              
              <div class="card-body">
                 <div id="contenido"></div>
              </div>

              <div class="card-footer">
                <button id="btn_eliminar" class="btn btn-success">Aceptar</button>
                <a href="usuarios_listados.php" class="btn btn-default">Cancelar</a>
              </div>

              <input type="hidden" name="txt_codprod" id="txt_codprod" value="">

            </form> <!-- /.fin Form -->

          </div>

      </div>


    </section>


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <?php 
      include "includes/footer.php";
     ?>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



  <script src="../env/enviroment.js"></script>
  <script src="../scripts/sweetalert/sweetalert.min.js"></script>
  <script src="../scripts/sweetalert/funciones.js"></script>
  <script src="../scripts/users/eliminar_users.js"></script>

  <?php include 'includes/footer_principal.php'; ?>

</body>
</html>
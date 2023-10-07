<?php 
  include "../controllers/controller_consultas_backend.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
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
            <h1>Productos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Listado</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

<?php
  $objDB = new ExtraerDatos();

  $prods = array();
  $prods = $objDB->listadoProductos();


?>

    <section class="content">

      <div class="row">
         <!-- COLUMNA DE TABLA DE DATOS  -->
        <div class="col-md-12"><!--  -->

          <div class="card">
              <div class="card-header bg-indigo">
                <h3 class="card-title">Datos en Tabla</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <?php if($prods){ ?>

                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">REF</th>
                      <th>NOMBRE</th>
                      <th>CANTIDAD</th>
                      <th>VALOR COMERCIAL</th>
                      <th>EDAD</th>
                      <th>FOTO</th>
                      <th style="width: 40px">Accion</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                    <?php 
                    //RECORRIDO DE ELEMENTOS DE FORMA REPETITIVA
                    foreach ($prods as $rows) {
                                          
                    ?>
                    <tr>
                      <td><?php echo $rows["referencia"]; ?></td>
                      <td><?php echo $rows["nombre"]; ?></td>
                      <td><?php echo $rows["cantidad"]; ?></td>
                      <td><?php echo $rows["valorcomercial"]; ?></td>  
                      <td>GUETTE</td>
                      <td><img src="../<?php echo $rows['foto']; ?>" width="50" ></td>
                      <td>
                        
                        <a href="productos_editar.php?cp=<?php echo $rows['cod']; ?>" class="bnt btn-xs btn-info"><i class="fa fa-edit"></i></a>
                        <a href="productos_eliminar.php?cp=<?php echo $rows['cod']; ?>" class="bnt btn-xs btn-danger"><i class="fa fa-trash"></i></a>

                      </td>
                    </tr>  
                    <?php 
                    }//FIN CICLO REPETITIVO DE DATOS
                    ?>                  
                  </tbody>

                </table>
                <?php 
              }else{
                echo "<div class='alert alert-secondary'>
                      No hay datos de productos. Registre uno<br>
                      <a href='productos_crear.php' class='btn btn-info' >Registro</a> 
                      </div>
                      ";
              }
                 ?>

              </div>
              <!-- /.card-body -->
            </div>

        </div><!-- Fin contenido TABLA DE DATO -->
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




<!-- jQuery -->
<script src="../templates/AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../templates/AdminLTE-3.0.5/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../templates/AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="../templates/AdminLTE-3.0.5/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- AdminLTE App -->
<script src="../templates/AdminLTE-3.0.5/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../templates/AdminLTE-3.0.5/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../templates/AdminLTE-3.0.5/dist/js/demo.js"></script>

</body>
</html>

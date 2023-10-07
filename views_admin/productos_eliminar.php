<?php   
  require ("../models/models_admin.php");
  include "../controllers/controller_consultas_backend_editodel.php";  
  date_default_timezone_set("America/Bogota");
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
            <h1>Eliminar Producto</h1>
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

    <!-- Main content -->

<?php 

if(isset($_GET["cp"])){//URL PERFECTA

  $objDBC = new ExtraerDatos();

  $producto = array();
  $producto = $objDBC->productoPorId($_GET["cp"]);

  if($producto){ //VERIFICA QUE LA INFORMACION EXISTE

?>

    <section class="content">

      <div class="row">
        
<!-- COLUMNA DE FORMULARIO  -->
        <div class="col-md-6"><!-- columna de contenido -->
          
          
            <!-- /.card-header -->
            <div class="card">
            <div class="card-header bg-indigo">
              <h3 class="card-title">Confirmar Eliminación </h3>
            </div>
            <!-- Para controles de formularios siempre usar etiqueta FORM -->

            <?php 
            if(isset($_POST["txt_codprod"])){//verificar la existencia de envio de datos

              $codp = $_POST["txt_codprod"];              

              $objDBO = new DBConfig();
              $objDBO->config();
              $objDBO->conexion();

              $ejecucion = $objDBO->Operaciones("DELETE FROM productos 
                                                 WHERE cod=$codp ");

              if($ejecucion){ // Todo se ejecuto correctamente
                echo "<div class='alert alert-success'>
                         Producto ha sido Eliminado correctamente<br>                         
                      </div>
                      <a href='productos_listados.php' class='btn btn-default'>Ver Listado </a>";

              }else{ // Algo paso mal
                echo "<div class='alert alert-danger'>
                         Ha ocurrido un error inexperado
                      </div>";
              }

              $objDBO->close();


            }else{
            ?>


            <form role="form" name="frm_prods" id="frm_prods" method="POST" action="productos_eliminar.php?cp=<?php echo $_GET['cp']; ?>" enctype="multipart/form-data">
              
              <div class="card-body">
                  Usted va a eliminar el producto con nombre <b><?php echo $producto[0]['nombre']; ?></b><br>
                  Presione <b>Aceptar</b> para eliminar. <br><br>

                  <b>Importante</b>. Una vez eliminado no podra recuperarse.
              </div>

              <div class="card-footer">
                <button type="submit" id="btn_actualizar" class="btn btn-success">Aceptar</button>
                <a href="productos_listados.php" class="btn btn-default">Cancelar</a>
              </div>

              <input type="hidden" name="txt_codprod" id="txt_codprod" value="<?php echo $producto[0]['cod']; ?>">

            </form> <!-- /.fin Form -->

            <?php 
            }
            ?>

          </div>

      </div>


    </section>

  <?php 
  }else{//en caso la URL tiene un valor incorrecto
    echo "<div class='alert alert-danger'>
              <b>Acceso Denegado</b><br>
              Información no existe en base de datos
          </div>";
  }

}else{//en caso que URL haya sido alterada
  echo "<div class='alert alert-danger'>
            <b>Acceso Denegado</b><br>
            Usted esta accediendo de forma incorrecta
        </div>";
}
?>


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
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
            <h1>Estructuración y Controles</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Guia codigo</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- GUIA COMPONENTE CARD PARA AGRUPAR CONTENIDO -->
      <div class="row"><!-- fila contenedora -->
        <div class="col-md-12"> <!-- fin columna de contenido -->
        
          <div class="card">
            <div class="card-header bg-indigo">
              <h3 class="card-title">Titulo del bloque </h3>
            </div>
            <!-- /.card-header -->
            
            <!-- Para controles de formularios siempre usar etiqueta FORM -->
            <div class="card-body">
              Cotenido
            </div>  <!-- /.fin card-body -->
            
            <div class="card-footer">
              Información al final del bloque
            </div>

          </div>
        
        </div> <!-- ./ fin col -->
      </div><!-- ./ fin row -->


      <!-- CONTROLES DE FORMULARIO Y TABLA -->
      <div class="row"><!-- fila contenedora -->

        <!-- COLUMNA DE FORMULARIO  -->
        <div class="col-md-6"><!-- columna de contenido -->
          
          
            <!-- /.card-header -->
            <div class="card">
            <div class="card-header bg-indigo">
              <h3 class="card-title">Formulario de Datos </h3>
            </div>
            <!-- Para controles de formularios siempre usar etiqueta FORM -->
            <form role="form">
              <div class="card-body">

                <div class="row">

                  <!-- Control Inputbox ejemplo -->
                  <div class="col-md-12 col-sm-12 col-12">
                    <div class="form-group">
                      <label for="txtNombre">Nombre (Inputbox)</label>
                      <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="Nombre">
                    </div> 
                  </div>  

                  <!-- Control de Lista Desplegable -->
                  <div class="col-md-12 col-sm-12 col-12">
                    <div class="form-group">
                      <label>Tipo de Documento (Select)</label>
                      <select class="form-control" name="lstTipoc" id="lstTipoc">
                        <option value="0">Seleccionar...</option>
                        <option value="1">Cedula</option>
                        <option value="2">Tarjeta Identidad</option>
                        <option value="3">Cedula extranjeria</option>                    
                        <option value="4">Otro</option>                    
                      </select>
                    </div> 
                  </div>

                  <!-- Control FileUpload ejemplo -->                
                  <div class="col-md-12 col-sm-12 col-12">
                    <div class="form-group">
                      <label for="txtFile">Subir Archivos (File)</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="txtFile" name="txtFile">
                          <label class="custom-file-label" for="txtFile">Seleccionar</label>
                        </div>                    
                      </div>
                    </div>
                  </div>

                  <!-- Control CheckBox ejemplo -->
                  <div class="col-md-12 col-sm-12 col-12">
                    <div class="form-group">
                      <label >Dispositivos Tecnologicos (Checkbox)</label>
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="chkDisp1" name="chkDisp1" >
                        <label for="chkDisp1" class="custom-control-label">Portatil / PC Escritorio</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="chkDisp2" name="chkDisp2" >
                        <label for="chkDisp2" class="custom-control-label">Tablets / Smartphone</label>
                      </div>                                    
                    </div>
                  </div>

                  <!-- Control RadioButton ejemplo -->
                  <div class="col-md-12 col-sm-12 col-12">                    
                    <div class="form-group">
                      <label>Sexo (Radio button)</label>
                      <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="rdbSexo1" name="rdbSexo">
                        <label for="rdbSexo1" class="custom-control-label">Hombre</label>
                      </div>
                      <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="rdbSexo2" name="rdbSexo">
                        <label for="rdbSexo2" class="custom-control-label">Mujer</label>
                      </div>
                    </div>
                  </div>   

                  <div class="col-md-12 col-sm-12 col-12">                    
                    <div class="form-group">
                      <label>Coloque una Descripción (Textarea)</label>
                      <textarea class="form-control" rows="3"  placeholder="Describa ..." name="txtDesc" id="txtDesc"></textarea>
                    </div>  
                  </div>

                </div>  <!-- /.fin row -->   
                
              </div>  <!-- /.fin card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-success">Enviar</button>
                <button type="reset" class="btn btn-default">Limpiar</button>
              </div>

            </form> <!-- /.fin Form -->

          </div>

        </div><!-- Fin contenido formulario -->

        <!-- COLUMNA DE TABLA DE DATOS  -->
        <div class="col-md-6"><!--  -->

          <div class="card">
              <div class="card-header bg-indigo">
                <h3 class="card-title">Datos en Tabla</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Texto</th>
                      <th>Progreso</th>
                      <th style="width: 40px">Nivel</th>
                      <th style="width: 40px">Accion</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                    <?php 
                    //RECORRIDO DE ELEMENTOS DE FORMA REPETITIVA
                    for ($i=0; $i < 10; $i++) {                                           
                    ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td>Cualquer Texto <?php echo $i; ?></td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-danger">55%</span></td>
                      <td><a href="#" class="bnt btn-xs btn-danger"><i class="fa fa-trash"></i></a></td>
                    </tr>  
                    <?php 
                    }//FIN CICLO REPETITIVO DE DATOS
                    ?>                  
                  </tbody>

                </table>
              </div>
              <!-- /.card-body -->
            </div>

        </div><!-- Fin contenido TABLA DE DATO -->

      </div>

      <!-- DATOS ESTADISTICOS -->
      <div class="row"><!-- fila contenedora -->
        
        <!-- COLUMNA DE DATOS GRAFICOS  -->
        <div class="col-md-3"><!-- columna de contenido -->
          <div class="small-box bg-secondary">
            <div class="inner">
              <h3>1500<sup style="font-size: 20px">%</sup></h3>

              <p>Elemento</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>            
          </div>
        </div>

        <!-- COLUMNA DE DATOS GRAFICOS  -->
        <div class="col-md-3"><!-- columna de contenido -->
          <div class="small-box bg-secondary">
            <div class="inner">
              <h3>256<sup style="font-size: 20px">%</sup></h3>

              <p>Elemento</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>            
          </div>
        </div>

        <!-- COLUMNA DE DATOS GRAFICOS  -->
        <div class="col-md-3"><!-- columna de contenido -->
          <div class="small-box bg-secondary">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Elemento</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>            
          </div>
        </div>

        <!-- COLUMNA DE DATOS GRAFICOS  -->
        <div class="col-md-3"><!-- columna de contenido -->
          <div class="small-box bg-secondary">
            <div class="inner">
              <h3>80<sup style="font-size: 20px">%</sup></h3>

              <p>Elemento</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>            
          </div>
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
<!DOCTYPE html>
<html>

<head>
    <title>Crear usuario</title>
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
                            <h1>Creacion de Usuario</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Crear Usuario</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- fmruklario de registro de mascotas --->
                <div class="container-fluid">
                    <div class="row">

                        <!-- COLUMNA DE FORMULARIO  -->
                        <div class="col-md-6">
                            <!-- columna de contenido -->


                            <!-- /.card-header -->
                            <div class="card">
                                <div class="card-header bg-indigo">
                                    <h3 class="card-title">¡Crear usuario!</h3>
                                    </h3>
                                </div>
                                <!-- Para controles de formularios siempre usar etiqueta FORM -->
                                <form role="form" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">

                                        <div class="row">

                                            <!-- Control Inputbox ejemplo -->
                                            <div class="col-md-12 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label for="txtUser">Usuario</label>
                                                    <input type="text" class="form-control" id="txtUser" name="txtUser"
                                                        placeholder="Digite usuario...">
                                                </div>
                                            </div>

                                            <!-- Control Inputbox ced -->
                                            <div class="col-md-12 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label for="txtContraseña">Contraseña</label>
                                                    <input type="text" class="form-control" id="txtContraseña"
                                                        name="txtContraseña" placeholder="Digite su contraseña">
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label>Selecciona un rol</label>
                                                    <select class="form-control" id="rol">
                                                        <option value="1">Administrador</option>
                                                        <option value="2">Administrador Usuarios</option>
                                                        <option value="3">Administrador Productos</option>
                                                        <option value="4">Administrador Control Inventario</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Control FileUpload ejemplo -->
                                            <div class="col-md-12 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label for="txtFile">Subir Archivos (File)</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="txtFile"
                                                                name="txtFile">
                                                            <label class="custom-file-label"
                                                                for="txtFile">Seleccionar</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- /.fin row -->

                                    </div> <!-- /.fin card-body -->

                                    <div class="card-footer">
                                        <button id="btn_guardar" class="btn btn-success">Enviar</button>
                                        <button type="reset" class="btn btn-default">Limpiar</button>
                                    </div>

                                </form> <!-- /.fin Form -->

                            </div>

                        </div><!-- Fin contenido formulario -->

                        <div class="col-md-3 col-sm-6 col-12">
                            <img src="../imgs/crear_usuario/user.jpg" width="500px" height="580px" alt="">
                        </div>


                    </div>
                </div>
                <!-- fin registro de mascotas -->



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
    <script src="../scripts/users/crear_users.js"></script>

    <?php include 'includes/footer_principal.php'; ?>

</body>

</html>
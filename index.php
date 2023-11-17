<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="rgb(16, 199, 83)">
    <title>Login</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Theme style -->
    <link rel="stylesheet" href="templates/AdminLTE-3.0.5/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" href="styles/auth.css">
    <!-- <link rel="icon" href="imgs/logos/Artboard 8@1080x-100.jpg"> -->
</head>
<!-- y de esta manera ↑ con la pagina de iniciar ↓ sesion o registrarse -->

<body>

    <div class="login">
        <div class="login-box">
            <div class="login-logo">
                <!-- <a href="#"><b>Ven</b>tas</a> -->
            </div>

            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg"></p>
                    <div id="login"></div>

                    <form id="loginform" method="POST">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Correo" id="user" name="user"
                                maxlength="32">

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Contraseña" id="pass" name="pass"
                                maxlength="32">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-4">
                                <button id="btnverificar" class="btn btn-primary btn-block">INGRESAR</button>
                            </div><br>

                            <!-- /.col -->
                        </div>
                    </form>

                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        <!-- /.login-box -->

    </div>

    <script src="env/enviroment.js"></script>
    <script src="scripts/sweetalert/sweetalert.min.js"></script>
    <script src="scripts/sweetalert/funciones.js"></script>
    <script src="scripts/auth/login.js"></script>

    <!-- jQuery -->
    <script src="templates/AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="templates/AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="templates/AdminLTE-3.0.5/dist/js/adminlte.min.js"></script>

</body>

</html>
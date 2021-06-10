<?php if(isset($_SESSION["user_id_fa"])){ header("location: home");} ?>
<head>
    <style>
        .login-page, .register-page {
            background: #3c8dbc;
        }
        .login-logo a, .register-logo a {
            color: #fffefe;
        }
    </style>
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><?php echo APP_NAME ?></a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body" style="border-radius: 3px;border-top: 3.5px solid #00c0ef;box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1);">
            <?php if(isset($_SESSION['data'])){ ?>
                <div class="alert alert-<?php echo $_SESSION['data']['alert']; ?> fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong><?php echo $_SESSION['data']['notice']; ?></strong> <?php echo $_SESSION['data']['msg']; ?>
                </div>
            <?php 
                    unset($_SESSION['data']);//elimino la variable de sesion
                } 
            ?>
            <p class="login-box-msg">Iniciar Sesión</p>
            <form action="./?action=login" method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Correo Electrónico" name="email" id="email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Contraseña" name="password" id="password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <!-- <div class="col-xs-12">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> Recordar mis datos.
                            </label>
                        </div>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar Sesion</button>
                    </div><!-- /.col -->
                </div>
          
            </form>
        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.2.3 -->
    <script src="res/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="res/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="res/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>
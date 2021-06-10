<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <base href="<?php echo APP_URL ?>">
        <link rel="icon" type="image/png" href="res/images/favicon.png" />
        <title><?php echo APP_NAME ?></title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="res/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="res/font-awesome/css/font-awesome.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="res/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="res/dist/css/skins/_all-skins.min.css">
        <!-- Pace style -->
        <link rel="stylesheet" href="res/plugins/pace/pace.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="res/plugins/iCheck/square/blue.css">


        <!-- SELECT2 -->
        <link rel="stylesheet" href="res/plugins/select2/select2.css">



        <!-- jQuery 2.2.3 -->
        <script src="res/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="res/bootstrap/js/bootstrap.min.js"></script>
        <!-- PACE -->
        <script src="res/plugins/pace/pace.min.js"></script>
        <!-- SlimScroll -->
        <script src="res/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="res/plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="res/dist/js/app.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="res/dist/js/demo.js"></script>

        <!-- SELECT2 -->
        <script src="res/plugins/select2/select2.js"></script>

        <style>
            @media print{
              .oculto-impresion, .oculto-impresion *{
                display: none !important;
              }
            }
        </style>
    </head>

    <?php if(isset($_SESSION["user_id_fa"])):?>
    <?php $user= UserData::getById($_SESSION["user_id_fa"]); ?>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper"><!-- Site wrapper -->
            <header class="main-header">
                <a href="#" class="logo"><!-- Logo -->
                    <!-- <span class="logo-mini"><b><?php echo APP_NAME ?></b></span> -->
                    <span class="logo-mini"><b>Abi</b>SOFT</span>
                    <span class="logo-lg"><b><?php echo APP_NAME ?></b> </span>
                    <!-- <span class="logo-lg">Framework<b></b> Amabi</span> -->
                </a>
                <nav class="navbar navbar-static-top">
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">




                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="res/images/users/<?php echo $user->profile_pic ?>" class="user-image" alt="User Image">
                                    <span class="hidden-xs"><?php echo $user->name." ".$user->lastname; ?></span>
                                </a>
                                <?php
                                    $created_at=$user->created_at;
                                    list($date)=explode(" ",$created_at);
                                    list($Y,$m,$d)=explode("-",$date);
                                    $date=$d."/".$m."/".$Y;
                                ?>
                                <ul class="dropdown-menu">
                                    <li class="user-header"><!-- User image -->
                                        <img src="res/images/users/<?php echo $user->profile_pic ?>" class="img-circle" alt="User Image">
                                        <p><?php echo $user->name." ".$user->lastname; ?><small>Miembro desde: <?php echo $date; ?></small></p>
                                    </li>
                                    
                                    <li class="user-footer"><!-- Menu Footer-->
                                        <div class="pull-left">
                                            <a href="profile" class="btn btn-default btn-flat">Perfil</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="./?action=logout" class="btn btn-default btn-flat">Salir</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="main-sidebar"><!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <div class="user-panel"><!-- Sidebar user panel -->
                        <div class="pull-left image">
                          <img src="res/images/users/<?php echo $user->profile_pic ?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                          <p><?php echo $user->name." ".$user->lastname; ?></p>
                          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="header">Menu de Navegación</li>
                        <li class="<?php if($_GET['view']=="home"){echo"active";} ?>">
                            <a href="home">
                                <i class="fa fa-home"></i> <span>Inicio</span>
                            </a>
                        </li>

                        <li class="<?php if((@$_GET['view']=="proveedor" and @$_GET['type']=="index") or (@$_GET['view']=="proveedor" and @$_GET['type']=="create") or (@$_GET['view']=="proveedor" and @$_GET['type']=="edit") or (@$_GET['view']=="proveedor" and @$_GET['type']=="show")) {echo"active";}  ?>">    
                            <a href="proveedor/index">
                                <i class="fa fa-users"></i> <span>Proveedor</span>
                            </a>
                        </li>
                        <li class="<?php if((@$_GET['view']=="producto" and @$_GET['type']=="index") or (@$_GET['view']=="producto" and @$_GET['type']=="create") or (@$_GET['view']=="producto" and @$_GET['type']=="edit") or (@$_GET['view']=="producto" and @$_GET['type']=="show")) {echo"active";}  ?>">    
                            <a href="producto/index">
                                <i class="fa fa-th"></i> <span>Producto</span>
                            </a>
                        </li>


                         <li class="<?php if((@$_GET['view']=="proveedor_producto" and @$_GET['type']=="index") or (@$_GET['view']=="proveedor_producto" and @$_GET['type']=="create") or (@$_GET['view']=="proveedor_producto" and @$_GET['type']=="edit") or (@$_GET['view']=="proveedor_producto" and @$_GET['type']=="show")) {echo"active";}  ?>">    
                            <a href="proveedor_producto/index">
                                <i class="fa fa-th-list"></i> <span>Productos por proveedor</span>
                            </a>
                        </li>


                        <li class="<?php if((@$_GET['view']=="contenedor" and @$_GET['type']=="index") or (@$_GET['view']=="contenedor" and @$_GET['type']=="create") or (@$_GET['view']=="contenedor" and @$_GET['type']=="edit") or (@$_GET['view']=="contenedor" and @$_GET['type']=="show")) {echo"active";}  ?>">    
                            <a href="contenedor/index">
                                <i class="fa fa-list-alt"></i> <span>Contenedor</span>
                            </a>
                        </li>

                        <li class="<?php if((@$_GET['view']=="envio" and @$_GET['type']=="index") or (@$_GET['view']=="envio" and @$_GET['type']=="create") or (@$_GET['view']=="envio" and @$_GET['type']=="edit") or (@$_GET['view']=="envio" and @$_GET['type']=="show")) {echo"active";}  ?>">    
                            <a href="envio/index">
                                <i class="fa fa-share-square"></i> <span>Envio</span>
                            </a>
                        </li>

                        

                        
                        
                        <?php if($user->type==1):?>
                        <li class="<?php if((@$_GET['view']=="user" and @$_GET['type']=="index") or (@$_GET['view']=="user" and @$_GET['type']=="create") or (@$_GET['view']=="user" and @$_GET['type']=="edit") or (@$_GET['view']=="user" and @$_GET['type']=="show")) {echo"active";}  ?>">    
                            <a href="user/index">
                                <i class="fa fa-users"></i> <span>Usuarios</span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <li class="<?php if(isset($_GET['view']) and $_GET['view']=='profile' ){echo "active";}?>">
                            <a href="profile"><i class="fa fa-user"></i> <span>Mi cuenta</span></a>
                        </li>
                        <li class="header">Más</li>
                       
                        <li class="<?php if($_GET['view']=="help"){echo "active";} ?>">
                            <a href="help">
                                <i class="fa fa-exclamation-circle"></i> <span>Ayuda</span>
                            </a>
                        </li>
                        
                    </ul>
                </section>
            </aside><!-- /.sidebar -->
            <?php endif; ?>
                <!-- =============================================== -->
                <?php 
                    if (isset($_SESSION["user_id_fa"])) {
                        View::load("home");
                    }else{
                        View::load("index");
                    }
                ?>
                <!-- =============================================== -->
            <?php if(isset($_SESSION["user_id_fa"])):?>
            <footer class="main-footer oculto-impresion">
                <div class="pull-right hidden-xs">
                    <b>Versión</b> <?php echo VERSION ?>
                </div>
                <strong>Copyright &copy; 2017-<?php echo date('Y')?> <a href="http://abisoftgt.net" target="_blank"> Abisoft - GT</a></strong> Todos los derechos reservados.
            </footer>
        </div><!-- ./wrapper -->
        <script type="text/javascript">
            // To make Pace works on Ajax calls
            $(document).ajaxStart(function() { Pace.restart(); });

            $('.select2').select2({}); //init select2
        </script>
    </body>
    <?php endif; ?>
</html>
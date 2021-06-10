<?php 
    // si el usuario no esta logeado
    if(!isset($_SESSION["user_id_fa"])){ Core::redir("./");}
    $user= UserData::getById($_SESSION["user_id_fa"]);
    // si el id  del usuario no existe.
    if($user==null){ Core::redir("./");}
?>
<div class="content-wrapper"><!-- Content Wrapper. Contains page content -->
    <section class="content"><!-- Main content -->
        <div class="box box-primary"><!-- Default box -->
            <div class="box-header with-border">
                <h3 class="box-title">Inicio</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimizar">
                        <i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Cerrar">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">

<?php 
    $ProveedorHome = ProveedorData::getAll();
    $ProductoHome = ProductoData::getAll();
    $EnvioHome = EnvioData::getAll();
    $UserHome = UserData::getAll();
?>

                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-aqua"><i class="fa fa-usd"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Proveedores</span>
                                <span class="info-box-number"><?php echo count($ProveedorHome);  ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-green"><i class="fa fa-credit-card"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Productos</span>
                                <span class="info-box-number"><?php echo count($ProductoHome);  ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-yellow"><i class="fa fa-usd"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Envios</span>
                                <span class="info-box-number"><?php echo count($EnvioHome);?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-red"><i class="fa fa-credit-card"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Usuarios</span>
                                <span class="info-box-number"><?php echo count($UserHome);?></span>
                            </div>
                        </div>
                    </div>
                </div>


<!-- 
                <div class="row">
                    <div class="col-xs-12 text-center">
                     
                        <h2>
                            <?php 
                                //uso de la clase HelperData
                                $name_user = HelperData::getId("user","name,lastname","iduser",$_SESSION['user_id_fa']); 
                                echo $name_user->name," ",$name_user->lastname;
                            ?>
                        </h2>
                        <p>Esta es una funcion de demostracion en la que se puede apreciar el login del usuario.</p>
                    </div>
                </div> -->
                <div class="ajax-content">
                
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
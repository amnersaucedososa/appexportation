<?php 
    if(!isset($_SESSION["user_id_fa"])){ Core::redir("./");}
    $user_session= UserData::getById($_SESSION["user_id_fa"]);
    // si el id  del usuario no existe.
    if($user_session==null){ Core::redir("./");}
?>
<?php 
    $producto = ProductoData::getById(intval($_GET["id"]));
    if($producto==null){ Core::redir("producto/index");}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">        
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h1 class="box-title">Editar Producto</h1>
                        <div class="box-tools pull-right"></div>
                    </div>
                    <div class="panel-body">
                        <?php if(isset($_SESSION['data'])){ ?>
                            <div class="alert alert-<?php echo $_SESSION['data']['alert']; ?> fade in">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong><?php echo $_SESSION['data']['notice']; ?></strong> <?php echo $_SESSION['data']['msg']; ?>
                            </div>
                        <?php 
                                unset($_SESSION['data']);//elimino la variable de sesion
                            } 
                        ?>
                        <form role="form" action="./?action=producto&type=update&id=<?php echo $producto->idproducto;?>" method="POST">
                            

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Nombre:</label>
                                <input value="<?php echo $producto->nombre ?>" type="text" class="form-control" name="nombre" id="nombre" required>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>SKU:</label>
                                <input value="<?php echo $producto->sku ?>" type="text" class="form-control" name="sku" id="sku" required>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Presentacion:</label>
                                <input value="<?php echo $producto->presentacion ?>" type="text" class="form-control" name="presentacion" id="presentacion" required>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Volumen:</label>
                                <input value="<?php echo $producto->volumen ?>" type="text" class="form-control" name="volumen" id="volumen" required>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Unidades por caja:</label>
                                <input value="<?php echo $producto->unidades_caja ?>" type="text" class="form-control" name="unidades_caja" id="unidades_caja" required>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Foto:</label>
                                <input type="file" class="form-control" name="fotografia" id="fotografia">
                            </div>



                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Actualizar</button>
                                <a href="producto/index" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i> Cancelar</a>
                          </div>
                        </form>
                    </div>
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
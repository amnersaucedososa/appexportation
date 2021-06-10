<?php 
    if(!isset($_SESSION["user_id_fa"])){ Core::redir("./");}
    $user= UserData::getById($_SESSION["user_id_fa"]);
    // si el id  del usuario no existe.
    if($user==null){ Core::redir("./");}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">        
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h1 class="box-title">Agregar Producto por proveedor</h1>
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
                        <form role="form" action="./?action=proveedor_producto&type=store" method="POST">
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Producto:</label>
                                
                                <select name="idproducto" id="idproducto" class="form-control select2" required="">
                                    <?php 
                                    $productos = ProductoData::getAll();
                                    foreach ($productos as $producto) {
                                    ?>
                                        <option value="<?php echo $producto->idproducto ?>"><?php echo $producto->nombre ?></option>
                                    <?php  } ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Proveedor:</label>
                                <select name="idproveedor" id="idproveedor" class="form-control select2" required="">
                                    <?php 
                                    $proveedores = ProveedorData::getAll();
                                    foreach ($proveedores as $proveedor) {
                                    ?>
                                        <option value="<?php echo $proveedor->idproveedor ?>"><?php echo $proveedor->nombre ?></option>
                                    <?php  } ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Precio:</label>
                                <input type="number" class="form-control" name="precio" id="precio" required>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Comentario:</label>
                                <textarea class="form-control" name="comentario" id="comentario" ></textarea>
                            </div>



                            

                            
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Guardar</button>
                                <a href="proveedor_producto/index" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i> Cancelar</a>
                          </div>
                        </form>
                    </div>
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
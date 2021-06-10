<?php 
    if(!isset($_SESSION["user_id_fa"])){ Core::redir("./");}
    $user_session= UserData::getById($_SESSION["user_id_fa"]);
    // si el id  del usuario no existe.
    if($user_session==null){ Core::redir("./");}
?>
<?php 
    $envio = EnvioData::getById(intval($_GET["id"]));
    if($envio==null){ Core::redir("envio/index");}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">        
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h1 class="box-title">Editar Envio</h1>
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
                        <form role="form" action="./?action=envio&type=update&id=<?php echo $envio->idenvio;?>" method="POST">
                            
                              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Contenedor:</label>
                                
                                <select name="idcontenedor" id="idcontenedor" class="form-control select2" required="">
                                    <?php 
                                    $contenedores = ContenedorData::getAll();
                                    foreach ($contenedores as $item) {
                                    ?>
                                        <option <?php if($envio->idcontenedor==$item->idcontenedor){echo"selected";} ?> value="<?php echo $item->idcontenedor ?>"><?php echo $item->nombre ?></option>
                                    <?php  } ?>
                                </select>
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Destino:</label>
                                <input value="<?php echo $envio->destino ?>" type="text" class="form-control" name="destino" id="destino"  required="">
                            </div>
                           
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Fecha de entrega:</label>
                                <input value="<?php echo $envio->fecha_entrega ?>" type="date" class="form-control" name="fecha_entrega" id="fecha_entrega"  required="">
                            </div>

                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Actualizar</button>
                                <a href="envio/index" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i> Cancelar</a>
                          </div>
                        </form>
                    </div>
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php 
    if(!isset($_SESSION["user_id_fa"])){ Core::redir("./");}
    $user_session= UserData::getById($_SESSION["user_id_fa"]);
    // si el id  del usuario no existe.
    if($user_session==null){ Core::redir("./");}
?>
<?php 
    $contenedor = ContenedorData::getById(intval($_GET["id"]));
    if($contenedor==null){ Core::redir("contenedor/index");}
?>

<head>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
</head>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">        
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h1 class="box-title">Editar Contenedor</h1>
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
                        <form role="form" action="./?action=contenedor&type=update&id=<?php echo $contenedor->id;?>" method="POST">
                            
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Producto:</label>
                                
                                <select name="idproducto" id="idproducto" class="form-control select2" required="">
                                    <?php 
                                    $productos = ProductoData::getAll();
                                    foreach ($productos as $producto) {
                                    ?>
                                        <option <?php if($contenedor->idproducto==$producto->idproducto){echo "selected";} ?> value="<?php echo $producto->idproducto ?>"><?php echo $producto->nombre ?></option>
                                    <?php  } ?>
                                </select>
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Cantidad de producto:</label>
                                <input value="<?php echo $contenedor->cantidad_producto ?>" type="number" class="form-control" name="cantidad_producto" id="cantidad_producto" required>
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Fecha Arribo:</label>
                                <input value="<?php echo $contenedor->fecha_arrivo ?>" type="date" class="form-control" name="fecha_arrivo" id="fecha_arrivo" required>
                            </div>
<div class="row"></div>
<div class="row">
    <div class="col-md-6">
        <!-- search input box -->
        <div class="form-group input-group">
            <input value="<?php echo $contenedor->lugar_salida ?>" type="text" id="search_location_salida" name="lugar_salida" class="form-control" placeholder="Buscar Ubicación">
            <div class="input-group-btn">
                <button class="btn btn-default get_map_salida" type="submit">
                    Buscar
                </button>
            </div>
        </div>
        <!-- display google map -->
        <div id="geomap_salida" style="width: 100%; height: 400px;"></div>
        <input value="<?php echo $contenedor->lugar_salida_lat ?>" type="hidden" class="lugar_salida_lat" size="30" id="lugar_salida_lat" name="lugar_salida_lat">
        <input value="<?php echo $contenedor->lugar_salida_long ?>" type="hidden" class="lugar_salida_long" size="30" id="lugar_salida_long" name="lugar_salida_long">
    </div>



    <div class="col-md-6">
        <!-- search input box -->
        <div class="form-group input-group">
            <input value="<?php echo $contenedor->lugar_destino ?>" type="text" id="search_location_entrada" name="lugar_entrada" class="form-control" placeholder="Buscar Ubicación">
            <div class="input-group-btn">
                <button class="btn btn-default get_map_entrada" type="submit">
                    Buscar
                </button>
            </div>
        </div>
        <!-- display google map -->
        <div id="geomap_entrada" style="width: 100%; height: 400px;"></div>
        <input value="<?php echo $contenedor->lugar_destino_lat ?>" type="hidden" class="lugar_entrada_lat" size="30" id="lugar_entrada_lat" name="lugar_entrada_lat">
        <input value="<?php echo $contenedor->lugar_destino_long ?>" type="hidden" class="lugar_entrada_long" size="30" id="lugar_entrada_long" name="lugar_entrada_long">
    </div>
        
    

   
   
</div>

<div class="row"></div>
<br>
<br>


                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Actualizar</button>
                                <a href="contenedor/index" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i> Cancelar</a>
                          </div>
                        </form>
                    </div>
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAX6wD6FcmE4ZEFB2gEVka9qNkdsA4eqeg"></script>


<script src="res/js/localizacion.js">

</script>
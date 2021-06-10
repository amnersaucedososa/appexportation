<?php 
    if(!isset($_SESSION["user_id_fa"])){ Core::redir("./");}
    $user_sesion= UserData::getById($_SESSION["user_id_fa"]);
    // si el id  del usuario no existe.
    if($user_sesion==null){ Core::redir("./");}
?>
<?php $contenedor = ContenedorData::getById(intval($_GET["id"]));?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">        
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h1 class="box-title">Datos del contenedor</h1>
                        <div class="box-tools pull-right"></div>
                    </div>
                    <!-- /.box-header -->
                    <div class="panel-body">
                        <form role="form" method="POST">
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Nombre:</label>
                                <input type="text" class="form-control" name="name" id="name"  placeholder="Nombre" value="<?php echo $contenedor->nombre;?>" readonly>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Fecha Arribo:</label>
                                <input type="date" class="form-control" name="lastname" id="lastname"  placeholder="Apellido" value="<?php echo $contenedor->fecha_arrivo;?>" readonly>
                            </div>

                             <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Lugar salida:</label>
                                <input type="text" class="form-control" name="lastname" id="lastname"  placeholder="Apellido" value="<?php echo $contenedor->lugar_salida;?>" readonly>
                            </div>
                             <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Lugar de destino:</label>
                                <input type="text" class="form-control" name="lastname" id="lastname"  placeholder="Apellido" value="<?php echo $contenedor->lugar_destino;?>" readonly>
                            </div>


                            <div class="row">
                                

<div id="resultados" class='col-md-12' style="margin-top:4px">
<!-- Carga los datos ajax -->
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table table-bordered table-striped table-sm">
            <thead>
                <tr class="bg-success">
                    <th>Producto</th>
            
                    <th>Cantidad</th>
              
                </tr>
            </thead>

            <tbody>
                <?php 

                $DetalleContenedorData = DetalleContenedorData::getAllBy("idcontenedor",intval($_GET["id"]));
                        foreach ($DetalleContenedorData as $item) {
                           
                        ?>
                <tr>
                    <td><?php echo $item->getProducto()->nombre ?></td>
                    <td><?php echo $item->cantidad_producto ?></td>
                </tr>
                <?php  } ?>
            </tbody>
        </table>

    </div>
</div>

                            </div>

                            
                            
                            
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 oculto-impresion">
                                <a href="envio/index" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> Regresar</a>
                                <a href="envio/show/<?php echo $_GET['id'] ?>#"  onclick="print();"  class="btn btn-success"><i class="fa fa-print"></i> Imprimir</a>
                            </div>
                        </form>
                    </div>
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php 
    if(!isset($_SESSION["user_id_fa"])){ Core::redir("./");}
    $user= UserData::getById($_SESSION["user_id_fa"]);
    // si el id  del usuario no existe.
    if($user==null){ Core::redir("./");}
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
                        <h1 class="box-title">Agregar Contenedor</h1>
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
                        <form role="form" action="./?action=contenedor&type=store" method="POST">

                           <!--  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
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
                                <label>Cantidad de producto:</label>
                                <input type="number" class="form-control" name="cantidad_producto" id="cantidad_producto" required>
                            </div> -->
<h3>1. Datos basicos : </h3>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Nombre o alias:</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" required="">
                            </div> 
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Fecha Arribo:</label>
                                <input type="date" class="form-control" name="fecha_arrivo" id="fecha_arrivo" required="">
                            </div>
<div class="row"></div>

<h3>2. Elegi las ubicaciones exactas:</h3>
<div class="row">
    <div class="col-md-6">
        <h5>Ubicacion de salida:</h5>
        <!-- search input box -->
        <div class="form-group input-group">
            <input type="text" id="search_location_salida" name="lugar_salida" class="form-control" placeholder="Buscar Ubicación">
            <div class="input-group-btn">
                <button class="btn btn-default get_map_salida" type="submit">
                    Buscar
                </button>
            </div>
        </div>
        <!-- display google map -->
        <div id="geomap_salida" style="width: 100%; height: 400px;"></div>
        <input type="hidden" class="lugar_salida_lat" size="30" id="lugar_salida_lat" name="lugar_salida_lat">
        <input type="hidden" class="lugar_salida_long" size="30" id="lugar_salida_long" name="lugar_salida_long">
    </div>



    <div class="col-md-6">
        <h5>Ubicacion de destino:</h5>
        <!-- search input box -->
        <div class="form-group input-group">
            <input type="text" id="search_location_entrada" name="lugar_entrada" class="form-control" placeholder="Buscar Ubicación">
            <div class="input-group-btn">
                <button class="btn btn-default get_map_entrada" type="submit">
                    Buscar
                </button>
            </div>
        </div>
        <!-- display google map -->
        <div id="geomap_entrada" style="width: 100%; height: 400px;"></div>
        <input type="hidden" class="lugar_entrada_lat" size="30" id="lugar_entrada_lat" name="lugar_entrada_lat">
        <input type="hidden" class="lugar_entrada_long" size="30" id="lugar_entrada_long" name="lugar_entrada_long">
    </div>
        
    

   
   
</div>

<div class="row"></div>
<br>
<br>

<h3>3. Elige los productos: </h3>
<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <label>Producto:</label>
    <select class="form-control select2" name="idproducto" id="idproducto" >
        <option disabled selected>--Seleccione producto --</option>
        <?php $paquetes = ProductoData::getAll(); ?>
        <?php foreach ($paquetes as $item) : ?>
            <option value="<?php echo $item->idproducto ?>" ><?php echo $item->nombre ?></option>
        <?php endforeach ?>
    </select>
</div>

<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <label>Cantidad</label>
    <input type="number" class="form-control " name="cantidad" id="cantidad">
    <div class="error"></div>
</div>                          
<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <br>
    <button type="button" class="btn bg-yellow" id="agregaritem">Agregar</button>
</div>



<div id="resultados" class='col-md-12' style="margin-top:4px">
<!-- Carga los datos ajax -->
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table table-bordered table-striped table-sm">
            <thead>
                <tr class="bg-success">
                    <th>Eliminar</th>
                    <th>Producto</th>
            
                    <th>Cantidad</th>
              
                </tr>
            </thead>

            <tbody>
            </tbody>
        </table>

    </div>
</div>



                            
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Guardar</button>
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


<script>

    $(document).ready(function() {



        $("#agregaritem").on("click", function(ev) {                        
            ev.preventDefault();
            agregar();

        });
    });



    var cont = 0;
    total = parseFloat($("#precioservicio").val());
    subtotal = [];
    // $("#guardar").hide();

    function agregar() {
        idproducto = $("#idproducto").val();
        // precio_prod = $("#idprod option:selected").data("precio");       
        producto = $("#idproducto option:selected").text();
        cantidad = $("#cantidad").val();
        // precio = $("#precio").val();
        impuesto = 0;

        if (idproducto != "" && cantidad != "" && cantidad > 0 ) {
          
            var fila = '<tr class="selected" id="fila' + cont+'"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont + ');"><i class="fa fa-times fa-2x"></i></button></td> <td><input type="hidden" name="idproducto[]" value="' + idproducto + '">' + producto + '</td>   <td> <span>'+cantidad+'</span><input type="hidden" name="cantidad[]" value="' + cantidad + '"> </td> </tr>';                       
            cont++;         
            limpiar();
            totales();
            // evaluar();
            $('#detalles').append(fila);
            
        } else {
            alert("Rellene todos los campos del detalle de la compra, revise los datos del producto");
            
        }
    }
    function totales() {
        // total_impuesto = total * impuesto / 100;
        // total_pagar = total + total_impuesto;
        total_pagar = total;
        // $("#total_impuesto").html("USD$ " + total_impuesto.toFixed(2));  
        $("#total_pagar_html").html("USD$ " + total_pagar.toFixed(2));
        $("#total_pagar").val(total_pagar.toFixed(2));
    }
    function limpiar() {
        $("#idproducto").val("0");
        $("#cantidad").val("");
        $("#precio").val("");
        $("#idcliente").val("");
    }



    function evaluar() {

        if (total > 0) {

            $("#guardar").show();

        } else {

            $("#guardar").hide();
        }
    }

    function eliminar(index) {
        total = total - subtotal[index];        
        total_pagar_html = total;
        $("#total").html("USD$" + total);       
        $("#total_pagar_html").html("USD$" + total_pagar_html);
        $("#total_pagar").val(total_pagar_html.toFixed(2));
        $("#fila" + index).remove();
    }

</script>
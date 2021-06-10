<?php 
    if(!isset($_SESSION["user_id_fa"])){ Core::redir("./");}
    $user= UserData::getById($_SESSION["user_id_fa"]);
    // si el id  del usuario no existe.
    if($user==null){ Core::redir("./");}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Envios</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row oculto-impresion">
            <div class="form-group">
            
                <div class="col-md-4">
                    <span>Busca por fecha de envio</span>
                    <div class="input-group input-group-sm">
                        <input type="date" class="form-control" placeholder="Nombre" name="q" id='q' onkeyup="load(1);">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat" onclick='load(1);'><i class='fa fa-search'></i> Go!</button>
                        </span>
                    </div>
                </div>


                <div class="col-xs-1">
                    <div id="loader" class="text-center"></div>
                </div>
                <!-- <div class="col-md-offset-10"> -->
                <div class=" pull-right">
					<a class="btn btn-primary" href="envio/create"><i class='fa fa-plus'></i> Nuevo</a>
                    <a href="envio/create#"  onclick="print();"  class="btn btn-success"><i class="fa fa-print"></i> Imprimir</a>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            Mostrar <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li class='active' onclick='per_page(15);' id='15'><a href="envio/index#">15</a></li>
                            <li  onclick='per_page(25);' id='25'><a href="envio/index#">25</a></li>
                            <li onclick='per_page(50);' id='50'><a href="envio/index#">50</a></li>
                            <li onclick='per_page(100);' id='100'><a href="envio/index#">100</a></li>
                            <li onclick='per_page(1000000);' id='1000000'><a href="envio/index#">Todos</a></li>
                        </ul>
                    </div>
                    <input type='hidden' id='per_page' value='15'>
                </div>
            </div>
            <!-- <div class="col-xs-3"></div> -->
        </div>
        <br>
        <div id="resultados_ajax"></div><!-- Resultados Ajax -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Historial de Envios</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimizar"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Cerrar"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <div class="outer_div"></div><!-- Datos ajax Final --> 
            </div>
            <!-- /.box-body -->
        </div><!-- /.box -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
    $(function() {
        load(1);
    });
    function load(page){
            var query=$("#q").val();
            var per_page=$("#per_page").val();
            var parametros = {"page":page,'query':query,'per_page':per_page};
            //$.get("./?action=loadexpenses",parametros,function(data){
            $.get({
                url:"./?action=envio&type=index",
                data:parametros,
                beforeSend: function(data){
                    $("#loader").html("<img src='res/images/ajax-loader.gif'>");
                },
                //console.log(data);
                success:function(data){
                    $(".outer_div").html(data);
                    $("#loader").html("");
                }

            });
    }
    function per_page(valor){
        $("#per_page").val(valor);
        load(1);
        $('.dropdown-menu li' ).removeClass( "active" );
        $("#"+valor).addClass( "active" );
    }
</script>
<script>
    function eliminar(id){
        if(confirm('Esta acción  eliminará de forma permanente el registro \n\n Desea continuar?')){
            var page=1;
            var query=$("#q").val();
            var per_page=$("#per_page").val();
            var parametros = {"page":page,"query":query,"per_page":per_page,"id":id};
            
            $.get({
                // method: "GET",
                url:'./?action=envio&type=index',
                data: parametros,
                beforeSend: function(objeto){
                $("#loader").html("<img src='res/images/ajax-loader.gif'>");
              },
                success:function(data){
                    $(".outer_div").html(data).fadeIn('slow');
                    $("#loader").html("");
                    window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove();});}, 5000);
                }
            })
        }
    }
</script>
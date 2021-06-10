<?php 
    if(!isset($_SESSION["user_id_fa"])){ Core::redir("./");}
    $user_sesion= UserData::getById($_SESSION["user_id_fa"]);
    // si el id  del usuario no existe.
    if($user_sesion==null){ Core::redir("./");}
?>
<?php $user = UserData::getById(intval($_GET["id"]));?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">        
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h1 class="box-title">Datos del Usuario</h1>
                        <div class="box-tools pull-right"></div>
                    </div>
                    <!-- /.box-header -->
                    <div class="panel-body">
                        <form role="form" method="POST">
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Nombre:</label>
                                <input type="text" class="form-control" name="name" id="name"  placeholder="Nombre" value="<?php echo $user->name;?>" readonly>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Apellido:</label>
                                <input type="text" class="form-control" name="lastname" id="lastname"  placeholder="Apellido" value="<?php echo $user->lastname;?>" readonly>
                            </div>
                            
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Correo Electrónico:</label>
                                <input type="email" class="form-control" name="email" id="email"  placeholder="Correo Electrónico" value="<?php echo $user->email;?>" readonly>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Tipo Usuario:</label>
                                <select class="form-control" name="type" id="type" disabled required>
                                    <option <?php if($user->type==1){echo "selected";} ?> value="1">Administrador</option>
                                    <option <?php if($user->type==2){echo "selected";} ?> value="2">Digitador</option>
                                </select>
                            </div>
                            
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <a href="user/index" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> Regresar</a>
                            </div>
                        </form>
                    </div>
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
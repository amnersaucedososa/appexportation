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
                        <h1 class="box-title">Agregar Usuario</h1>
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
                        <form role="form" action="./?action=user&type=store" method="POST">
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Nombre:</label>
                                <input type="text" class="form-control" name="name" id="name"  placeholder="Nombre" required>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Apellido:</label>
                                <input type="text" class="form-control" name="lastname" id="lastname"  placeholder="Apellido" required>
                            </div>
                            
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Correo Electrónico:</label>
                                <input type="email" class="form-control" name="email" id="email"  placeholder="Correo Electrónico" required>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Tipo Usuario:</label>
                                <select class="form-control" name="type" id="type" required>
                                    <option value="1">Administrador</option>
                                    <option value="2">Digitador</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Contraseña:</label>
                                <input type="password" class="form-control" name="password" id="password"  placeholder="Contraseña" required>
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Guardar</button>
                                <a href="user/index" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i> Cancelar</a>
                          </div>
                        </form>
                    </div>
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
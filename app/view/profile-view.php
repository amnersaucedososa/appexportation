<?php 
    /*-------------------------
    Autor: Amner Saucedo Sosa
    Web: www.abisoftgt.net
    E-Mail: waptoing7@gmail.com
    ---------------------------*/
if(isset($_SESSION["user_id_fa"])):

    $user_data=UserData::getById($_SESSION["user_id_fa"]);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Perfil
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Perfil</li>
      </ol>
    </section>
        <!-- Main content -->
        <section class="content">
            <div class="row"><!-- .row -->
            <!-- <div class="col-md-1"></div> -->
                <div class="col-md-4">
                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                        <div id="load_img">
                            <img class="img-responsive" width="100%" src="res/images/users/<?php echo $user_data->profile_pic ?>" alt="Image User">
                            </div>
                            <h3 class="profile-username text-center"><?php echo $user_data->name;?></h3>
                            <p class="text-muted text-center mail-text"><?php echo $user_data->email;?></p>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                    <br>
                </div> 
                <!-- <div class="col-md-1"></div> -->
                <div class="col-md-8">
                    <div id="result"></div>
                    <div class="box box-primary"><!-- general form elements -->
                        <div class="box-header with-border">
                            <h3 class="box-title">Datos Personales: </h3>
                        </div> <!-- /.box-header -->
                        <form role="form" method="post" name="upd" id="upd"><!-- form start -->
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Nombre:</label>
                                    <input name="name" type="text" class="form-control" id="name" value="<?php echo $user_data->name;?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Apellido:</label>
                                    <input name="lastname" type="text" class="form-control" id="lastname" value="<?php echo $user_data->lastname;?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Correo electrónico:</label>
                                    <input name="email" type="text" class="form-control" id="email" value="<?php echo $user_data->email;?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Contraseña:</label>
                                    <input name="password" type="password" class="form-control" id="password" value="">
                                </div>
                                <div class="form-group">
                                    <label for="imagefile">Imagen de perfil:</label>
                                    <input name="imagefile" type="file" class="form-control" id="imagefile" onchange="upload_image(<?php echo $_SESSION['user_id_fa']; ?>);">
                                </div>                  
                            </div><!-- /.box-body -->
                            <div class="box-footer text-right">
                                <button name="token" id="upd_data" type="submit" class="btn btn-success">Actualizar Datos</button>
                            </div>
                        </form>
                    </div><!-- /.box -->
                </div>
                <!-- <div class="col-md-1"></div> -->
            </div><!-- /.row -->
        </section>
    </div><!-- /.content -->
<?php //include "res/resources/js.php"; ?>
<script>
    function upload_image(id_user){
        $("#load_img").text('Cargando...');
        var inputFileImage = document.getElementById("imagefile");
        var file = inputFileImage.files[0];
        var data = new FormData();
        data.append('imagefile',file);
        data.append('id',id_user);

        $.ajax({
            type: "POST",             // Type of request to be send, called as method
            url: "./?action=updimage",        // Url to which the request is send
            data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,        // To send DOMDocument or non processed data file it is set to false
            success: function(data)   // A function to be called if request succeeds
            {
                $("#load_img").html(data);
                
            }
        });
    }
</script>
<script>
    $( "#upd" ).submit(function( event ) {
        $('#upd_data').attr("disabled", true);
      
        var parametros = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "./?action=updprofile",
            data: parametros,
             beforeSend: function(objeto){
                $("#result").html("Mensaje: Cargando...");
              },
            success: function(datos){
            $("#result").html(datos);
            $('#upd_data').attr("disabled", false);
            window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();});}, 2000);
            }
        });
        event.preventDefault();
    })
</script>
<?php else: Core::redir("./"); endif;?> 
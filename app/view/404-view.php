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
		<h1>404 Error!</h1>
		<ol class="breadcrumb">
			<li><a href="home"><i class="fa fa-home"></i> Home</a></li>
			<li class="active">404 Error</li>
		</ol>
	</section>
	<section class="content"><!-- Main content -->
		<div class="error-page">
			<h2 class="headline text-yellow"> 404</h2>
			<div class="error-content">
				<br>
				<h3><i class="fa fa-warning text-yellow"></i> Oops! Página no encontrada.</h3>
				<p>
					La página que solicitaste no fue encontrada.
					por favor retorna al menu principal haciendo click <a href="home">Aqui</a> o usa la barra lateral izquierda!
				</p>
			</div><!-- /.error-content -->
		</div><!-- /.error-page -->
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
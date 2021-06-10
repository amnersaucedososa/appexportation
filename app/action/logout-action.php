<?php 
	if(isset($_SESSION["user_id_fa"])){
		unset($_SESSION["user_id_fa"]);
		//session_destroy();
		Core::redir("index");
		Core::alert('success','¡Bien hecho!','Has sido desconectado.');
	}
?>
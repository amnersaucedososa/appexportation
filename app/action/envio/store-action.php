<?php
	if(isset($_SESSION["user_id_fa"])){
		if(count($_POST)>0){
			$envio = new EnvioData();
			$envio->destino = Database::cleanChain($_POST["destino"]);
			$envio->fecha_entrega = Database::cleanChain($_POST["fecha_entrega"]);
			$envio->idcontenedor = Database::cleanChain($_POST["idcontenedor"]);
			$envio->user_id = $_SESSION["user_id_fa"];
			$envio->add();
			Core::alert('success','¡Bien hecho!','Envio agregado exitosamente!');
			Core::redir("envio/create");
		}
	}
?>
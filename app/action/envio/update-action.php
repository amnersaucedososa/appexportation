<?php
	if(isset($_SESSION["user_id_fa"])){
		if(count($_POST)>0){
			$envio = EnvioData::getById($id);
			$envio->destino = Database::cleanChain($_POST["destino"]);
			$envio->fecha_entrega = Database::cleanChain($_POST["fecha_entrega"]);
			$envio->idcontenedor = Database::cleanChain($_POST["idcontenedor"]);

			$envio->update();

			Core::alert('success','¡Bien hecho!','Envio actualizado con exitó!');
			Core::redir("envio/edit/$id");
		}
	}
?>
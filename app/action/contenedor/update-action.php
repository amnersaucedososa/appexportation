<?php
	if(isset($_SESSION["user_id_fa"])){
		if(count($_POST)>0){
			$contenedor = ContenedorData::getById($id);
			$contenedor->nombre = Database::cleanChain($_POST["nombre"]);
			$contenedor->idproducto = Database::cleanChain($_POST["idproducto"]);
			$contenedor->cantidad_producto = Database::cleanChain($_POST["cantidad_producto"]);
			$contenedor->fecha_arrivo = Database::cleanChain($_POST["fecha_arrivo"]);
			$contenedor->lugar_salida = Database::cleanChain($_POST["lugar_salida"]);
			$contenedor->lugar_salida_lat = Database::cleanChain($_POST["lugar_salida_lat"]);
			$contenedor->lugar_salida_long = Database::cleanChain($_POST["lugar_salida_long"]);
			$contenedor->lugar_destino = Database::cleanChain($_POST["lugar_entrada"]);
			$contenedor->lugar_destino_lat = Database::cleanChain($_POST["lugar_entrada_lat"]);
			$contenedor->lugar_destino_long = Database::cleanChain($_POST["lugar_entrada_long"]);
			$contenedor->update();
			Core::alert('success','¡Bien hecho!','Contenedor actualizado con exitó!');
			Core::redir("contenedor/edit/$id");
		}
	}
?>
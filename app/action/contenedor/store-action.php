<?php
	if(isset($_SESSION["user_id_fa"])){
		if(count($_POST)>0){
			$contenedor = new ContenedorData();
			$contenedor->nombre = Database::cleanChain($_POST["nombre"]);
			$contenedor->fecha_arrivo = Database::cleanChain($_POST["fecha_arrivo"]);
			$contenedor->lugar_salida = Database::cleanChain($_POST["lugar_salida"]);
			$contenedor->lugar_salida_lat = Database::cleanChain($_POST["lugar_salida_lat"]);
			$contenedor->lugar_salida_long = Database::cleanChain($_POST["lugar_salida_long"]);
			$contenedor->lugar_destino = Database::cleanChain($_POST["lugar_entrada"]);
			$contenedor->lugar_destino_lat = Database::cleanChain($_POST["lugar_entrada_lat"]);
			$contenedor->lugar_destino_long = Database::cleanChain($_POST["lugar_entrada_long"]);
			$contenedor->user_id = $_SESSION["user_id_fa"];
			$contenedor->add();

			$UltimoPago = ContenedorData::lastById();
			$otherserv = new DetalleContenedorData();			
			$otherserv->idcontenedor = $UltimoPago->last;	

			$productos = count($_POST['idproducto']);
			if($_POST['idproducto'][0]!="" ){
				for ($i=0; $i < $productos; $i++) { 
					 $otherserv->idproducto =  $_POST['idproducto'][$i];		
					 $otherserv->cantidad_producto =  $_POST['cantidad'][$i];					 
					$otherserv->add();	
				}
			}


			Core::alert('success','¡Bien hecho!','Contenedor agregado exitosamente!');
			Core::redir("contenedor/create");
		}
	}
?>
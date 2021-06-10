<?php
	if(isset($_SESSION["user_id_fa"])){
		if(count($_POST)>0){
			$producto = ProductoData::getById($id);
			$producto->nombre = Database::cleanChain($_POST["nombre"]);
			$producto->sku = Database::cleanChain($_POST["sku"]);
			$producto->presentacion = Database::cleanChain($_POST["presentacion"]);
			$producto->volumen = Database::cleanChain($_POST["volumen"]);
			$producto->unidades_caja = Database::cleanChain($_POST["unidades_caja"]);


			$handle = new Upload($_FILES["fotografia"]);
			if ($handle->uploaded) {
			 	$handle->Process("res/storage/productos/");
			 	if ($handle->processed) {
			 		$producto->fotografia=$handle->file_dst_name;
			 	} else {
			 		echo 'Error: ' . $handle->error;
			 	}
			} else {
			 	echo 'Error: ' . $handle->error;
			}
			 unset($handle);

			$producto->update();
			
			Core::alert('success','¡Bien hecho!','Producto actualizado con exitó!');
			Core::redir("producto/edit/$id");
		}
	}
?>
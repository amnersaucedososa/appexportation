<?php
	if(isset($_SESSION["user_id_fa"])){
		if(count($_POST)>0){
			$proveedor = ProveedorData::getById($id);
			$proveedor->nombre = Database::cleanChain($_POST["nombre"]);
			$proveedor->telefono = Database::cleanChain($_POST["telefono"]);
			$proveedor->correo = Database::cleanChain($_POST["correo"]);
			$proveedor->direccion = Database::cleanChain($_POST["direccion"]);
			$proveedor->update();
			Core::alert('success','¡Bien hecho!','Proveedor actualizado con exitó!');
			Core::redir("proveedor/edit/$id");
		}
	}
?>
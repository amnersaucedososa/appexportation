<?php
	if(isset($_SESSION["user_id_fa"])){
		if(count($_POST)>0){
			$proveedor = new ProveedorData();
			$proveedor->nombre = Database::cleanChain($_POST["nombre"]);
			$proveedor->telefono = Database::cleanChain($_POST["telefono"]);
			$proveedor->correo = Database::cleanChain($_POST["correo"]);
			$proveedor->direccion = Database::cleanChain($_POST["direccion"]);
			$proveedor->user_id = $_SESSION["user_id_fa"];
			$proveedor->add();
			Core::alert('success','¡Bien hecho!','Proveedor agregado exitosamente!');
			Core::redir("proveedor/create");
		}
	}
?>
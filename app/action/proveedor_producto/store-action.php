<?php
	if(isset($_SESSION["user_id_fa"])){
		if(count($_POST)>0){
			$proveedor_producto = new ProveedorProductoData();
			$proveedor_producto->idproducto = Database::cleanChain($_POST["idproducto"]);
			$proveedor_producto->idproveedor = Database::cleanChain($_POST["idproveedor"]);
			$proveedor_producto->precio = Database::cleanChain($_POST["precio"]);
			$proveedor_producto->comentario = Database::cleanChain($_POST["comentario"]);
			$proveedor_producto->user_id =$_SESSION["user_id_fa"];

			$proveedor_producto->add();
			Core::alert('success','¡Bien hecho!','El precio de producto por proveedor se agrego exitosamente!');
			Core::redir("proveedor_producto/create");
		}
	}
?>
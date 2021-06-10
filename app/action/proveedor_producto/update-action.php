<?php
	if(isset($_SESSION["user_id_fa"])){
		if(count($_POST)>0){
			$proveedor_producto = ProveedorProductoData::getById($id);
			$proveedor_producto->idproducto = Database::cleanChain($_POST["idproducto"]);
			$proveedor_producto->idproveedor = Database::cleanChain($_POST["idproveedor"]);
			$proveedor_producto->precio = Database::cleanChain($_POST["precio"]);
			$proveedor_producto->comentario = Database::cleanChain($_POST["comentario"]);
			$proveedor_producto->update();
			Core::alert('success','¡Bien hecho!','El precio de producto por proveedor se actualizo exitosamente!');
			Core::redir("proveedor_producto/edit/$id");
		}
	}
?>
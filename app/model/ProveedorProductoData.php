<?php
class ProveedorProductoData {
	public static $tablename = "proveedor_producto";

	// public function ProveedorProductoData(){
	public function __construct(){
		$this->idproducto = "";
		$this->idproveedor = "";
		$this->precio = "";
		$this->comentario = "";
		$this->user_id = "";
		$this->created_at = "NOW()";
		
	}

	public function getProducto(){ return ProductoData::getById($this->idproducto);}
	public function getProveedor(){ return ProveedorData::getById($this->idproveedor);}


	public function add(){
		$sql = "insert into proveedor_producto (idproducto,idproveedor,precio,comentario,user_id,created_at) ";
		$sql .= "value (\"$this->idproducto\",\"$this->idproveedor\",\"$this->precio\",\"$this->comentario\",\"$this->user_id\",$this->created_at)";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where idproveedor_producto=$this->idproveedor_producto";
		return Executor::doit($sql);
	}

	public static function delBy($k,$v){
		$sql = "delete from ".self::$tablename." where $k=\"$v\"";
		Executor::doit($sql);
	}

	public function update(){
		$sql = "update ".self::$tablename." set 
		idproducto=\"$this->idproducto\",
		idproveedor=\"$this->idproveedor\",
		precio=\"$this->precio\",
		comentario=\"$this->comentario\"
		 where idproveedor_producto=$this->idproveedor_producto";
		Executor::doit($sql);
	}

	public function updateById($k,$v){
		$sql = "update ".self::$tablename." set $k=\"$v\" where idproveedor_producto=$this->idproveedor_producto";
		Executor::doit($sql);
	}

	public static function getById($idproveedor_producto){
		 $sql = "select * from ".self::$tablename." where idproveedor_producto=$idproveedor_producto";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProveedorProductoData());
	}

	public static function getBy($k,$v){
		$sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProveedorProductoData());
	}

	public static function getAll(){
		 $sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProveedorProductoData());
	}

	public static function getAllBy($k,$v){
		 $sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProveedorProductoData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProveedorProductoData());
	}


	public static function countQuery($where){
		$sql = "SELECT count(*) AS numrows FROM ".self::$tablename." where ".$where;
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProveedorProductoData());
	}

	public static function query($sWhere, $offset,$per_page){
		$sql = "SELECT * FROM ".self::$tablename." where ".$sWhere." LIMIT $offset,$per_page";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProveedorProductoData());
	}


}

?>
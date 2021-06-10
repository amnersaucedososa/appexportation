<?php
class DetalleContenedorData {
	public static $tablename = "detalle_contenedor";

	// public function DetalleContenedorData(){
	public function __construct(){
		$this->idproducto  = "";
		$this->cantidad_producto = "";
		$this->idcontenedor = "";
	}

	public function getProducto(){ return ProductoData::getById($this->idproducto);}


	public function add(){
		$sql = "insert into detalle_contenedor (idproducto ,cantidad_producto,idcontenedor) ";
		$sql .= "value (\"$this->idproducto \",\"$this->cantidad_producto\",\"$this->idcontenedor\")";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id_ruta=$this->id_ruta";
		return Executor::doit($sql);
	}

	public static function delBy($k,$v){
		$sql = "delete from ".self::$tablename." where $k=\"$v\"";
		Executor::doit($sql);
	}

	public function update(){
		$sql = "update ".self::$tablename." set idproducto =\"$this->idproducto \",cantidad_producto =\"$this->cantidad_producto \",idcontenedor =\"$this->idcontenedor \" where id_ruta=$this->id_ruta";
		Executor::doit($sql);
	}

	public function updateById($k,$v){
		$sql = "update ".self::$tablename." set $k=\"$v\" where id_ruta=$this->id_ruta";
		Executor::doit($sql);
	}

	public static function getById($id_ruta){
		 $sql = "select * from ".self::$tablename." where id_ruta=$id_ruta";
		$query = Executor::doit($sql);
		return Model::one($query[0],new DetalleContenedorData());
	}

	public static function getBy($k,$v){
		$sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new DetalleContenedorData());
	}

	public static function getAll(){
		 $sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new DetalleContenedorData());
	}

	public static function getAllBy($k,$v){
		 $sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new DetalleContenedorData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new DetalleContenedorData());
	}


	public static function countQuery($where){
		$sql = "SELECT count(*) AS numrows FROM ".self::$tablename." where ".$where;
		$query = Executor::doit($sql);
		return Model::one($query[0],new DetalleContenedorData());
	}

	public static function query($sWhere, $offset,$per_page){
		$sql = "SELECT * FROM ".self::$tablename." where ".$sWhere." LIMIT $offset,$per_page";
		$query = Executor::doit($sql);
		return Model::many($query[0],new DetalleContenedorData());
	}


}

?>
<?php
class ProductoData {
	public static $tablename = "producto";

	// public function ProductoData(){
	public function __construct(){
		$this->nombre = "";
		$this->sku = "";
		$this->presentacion = "";
		$this->volumen = "";
		$this->unidades_caja = "";
		$this->fotografia = "";
		$this->user_id = "";
		$this->created_at = "NOW()";

	}

	public function add(){
		$sql = "insert into producto (nombre,sku,presentacion,volumen,unidades_caja,fotografia,user_id,created_at) ";
		$sql .= "value (\"$this->nombre\",\"$this->sku\",\"$this->presentacion\",\"$this->volumen\",\"$this->unidades_caja\",\"$this->fotografia\",\"$this->user_id\",$this->created_at)";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where idproducto=$this->idproducto";
		return Executor::doit($sql);
	}

	public static function delBy($k,$v){
		$sql = "delete from ".self::$tablename." where $k=\"$v\"";
		Executor::doit($sql);
	}

	public function update(){
		$sql = "update ".self::$tablename." set 
		nombre=\"$this->nombre\",
		sku=\"$this->sku\",
		presentacion=\"$this->presentacion\",
		volumen=\"$this->volumen\",
		unidades_caja=\"$this->unidades_caja\",
		fotografia=\"$this->fotografia\"
		 where idproducto=$this->idproducto";
		Executor::doit($sql);
	}

	public function updateById($k,$v){
		$sql = "update ".self::$tablename." set $k=\"$v\" where idproducto=$this->idproducto";
		Executor::doit($sql);
	}

	public static function getById($idproducto){
		 $sql = "select * from ".self::$tablename." where idproducto=$idproducto";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProductoData());
	}

	public static function getBy($k,$v){
		$sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProductoData());
	}

	public static function getAll(){
		 $sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductoData());
	}

	public static function getAllBy($k,$v){
		 $sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductoData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductoData());
	}


	public static function countQuery($where){
		$sql = "SELECT count(*) AS numrows FROM ".self::$tablename." where ".$where;
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProductoData());
	}

	public static function query($sWhere, $offset,$per_page){
		$sql = "SELECT * FROM ".self::$tablename." where ".$sWhere." LIMIT $offset,$per_page";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductoData());
	}


}

?>
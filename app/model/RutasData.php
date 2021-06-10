<?php
class RutasData {
	public static $tablename = "rutas";

	// public function RutasData(){
	public function __construct(){
		$this->nombre = "";
		$this->fechaCaptura = "NOW()";
	}

	public function add(){
		$sql = "insert into rutas (nombre,fechaCaptura) ";
		$sql .= "value (\"$this->nombre\",$this->fechaCaptura)";
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
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\" where id_ruta=$this->id_ruta";
		Executor::doit($sql);
	}

	public function updateById($k,$v){
		$sql = "update ".self::$tablename." set $k=\"$v\" where id_ruta=$this->id_ruta";
		Executor::doit($sql);
	}

	public static function getById($id_ruta){
		 $sql = "select * from ".self::$tablename." where id_ruta=$id_ruta";
		$query = Executor::doit($sql);
		return Model::one($query[0],new RutasData());
	}

	public static function getBy($k,$v){
		$sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new RutasData());
	}

	public static function getAll(){
		 $sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new RutasData());
	}

	public static function getAllBy($k,$v){
		 $sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new RutasData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new RutasData());
	}


	public static function countQuery($where){
		$sql = "SELECT count(*) AS numrows FROM ".self::$tablename." where ".$where;
		$query = Executor::doit($sql);
		return Model::one($query[0],new RutasData());
	}

	public static function query($sWhere, $offset,$per_page){
		$sql = "SELECT * FROM ".self::$tablename." where ".$sWhere." LIMIT $offset,$per_page";
		$query = Executor::doit($sql);
		return Model::many($query[0],new RutasData());
	}


}

?>
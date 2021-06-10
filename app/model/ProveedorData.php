<?php
class ProveedorData {
	public static $tablename = "proveedor";

	// public function ProveedorData(){
	public function __construct(){
		$this->nombre = "";
		$this->telefono = "";
		$this->correo = "";
		$this->direccion = "";
		$this->user_id = "";
		$this->created_at = "NOW()";
	
	}

	public function add(){
		$sql = "insert into proveedor (nombre,telefono,correo,direccion,user_id,created_at) ";
		$sql .= "value (\"$this->nombre\",\"$this->telefono\",\"$this->correo\",\"$this->direccion\",\"$this->user_id\",$this->created_at)";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where idproveedor=$this->idproveedor";
		return Executor::doit($sql);
	}

	public static function delBy($k,$v){
		$sql = "delete from ".self::$tablename." where $k=\"$v\"";
		Executor::doit($sql);
	}

	public function update(){
		$sql = "update ".self::$tablename." set 
		nombre=\"$this->nombre\",
		telefono=\"$this->telefono\",
		correo=\"$this->correo\",
		direccion=\"$this->direccion\"
		 where idproveedor=$this->idproveedor";
		Executor::doit($sql);
	}

	public function updateById($k,$v){
		$sql = "update ".self::$tablename." set $k=\"$v\" where idproveedor=$this->idproveedor";
		Executor::doit($sql);
	}

	public static function getById($idproveedor){
		 $sql = "select * from ".self::$tablename." where idproveedor=$idproveedor";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProveedorData());
	}

	public static function getBy($k,$v){
		$sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProveedorData());
	}

	public static function getAll(){
		 $sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProveedorData());
	}

	public static function getAllBy($k,$v){
		 $sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProveedorData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProveedorData());
	}


	public static function countQuery($where){
		$sql = "SELECT count(*) AS numrows FROM ".self::$tablename." where ".$where;
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProveedorData());
	}

	public static function query($sWhere, $offset,$per_page){
		$sql = "SELECT * FROM ".self::$tablename." where ".$sWhere." LIMIT $offset,$per_page";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProveedorData());
	}


}

?>
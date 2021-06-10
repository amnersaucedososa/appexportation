<?php
class EnvioData {
	public static $tablename = "envio";

	// public function EnvioData(){
	public function __construct(){
		$this->destino = "";
		$this->fecha_entrega = "";
		$this->idcontenedor = "";
		$this->user_id = "";
		$this->created_at = "NOW()";
	}


	public function getContenedor(){ return ContenedorData::getById($this->idcontenedor);}

	public function add(){
		$sql = "insert into envio (destino,fecha_entrega,idcontenedor,user_id,created_at) ";
		$sql .= "value (\"$this->destino\",\"$this->fecha_entrega\",\"$this->idcontenedor\",\"$this->user_id\",$this->created_at)";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where idenvio=$this->idenvio";
		return Executor::doit($sql);
	}

	public static function delBy($k,$v){
		$sql = "delete from ".self::$tablename." where $k=\"$v\"";
		Executor::doit($sql);
	}

	public function update(){
		$sql = "update ".self::$tablename." set 
		destino=\"$this->destino\",
		fecha_entrega=\"$this->fecha_entrega\",
		idcontenedor=\"$this->idcontenedor\"
		 where idenvio=$this->idenvio";
		Executor::doit($sql);
	}

	public function updateById($k,$v){
		$sql = "update ".self::$tablename." set $k=\"$v\" where idenvio=$this->idenvio";
		Executor::doit($sql);
	}

	public static function getById($idenvio){
		 $sql = "select * from ".self::$tablename." where idenvio=$idenvio";
		$query = Executor::doit($sql);
		return Model::one($query[0],new EnvioData());
	}

	public static function getBy($k,$v){
		$sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new EnvioData());
	}

	public static function getAll(){
		 $sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new EnvioData());
	}

	public static function getAllBy($k,$v){
		 $sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new EnvioData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new EnvioData());
	}


	public static function countQuery($where){
		$sql = "SELECT count(*) AS numrows FROM ".self::$tablename." where ".$where;
		$query = Executor::doit($sql);
		return Model::one($query[0],new EnvioData());
	}

	public static function query($sWhere, $offset,$per_page){
		$sql = "SELECT * FROM ".self::$tablename." where ".$sWhere." LIMIT $offset,$per_page";
		$query = Executor::doit($sql);
		return Model::many($query[0],new EnvioData());
	}


}

?>
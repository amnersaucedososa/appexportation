<?php
class ContenedorData {
	public static $tablename = "contenedor";

	// public function ContenedorData(){
	public function __construct(){
		
		$this->nombre = "";
		$this->fecha_arrivo = "";
		$this->lugar_salida = "";
		$this->lugar_salida_lat = "";
		$this->lugar_salida_long = "";
		$this->lugar_destino = "";
		$this->lugar_destino_lat = "";
		$this->lugar_destino_long = "";
		$this->user_id = "";
		$this->created_at = "NOW()";
	}

	public function getProducto(){ return ProductoData::getById($this->idproducto);}

	public function add(){
		$sql = "insert into contenedor (nombre,fecha_arrivo,lugar_salida,lugar_salida_lat,lugar_salida_long,lugar_destino,lugar_destino_lat,lugar_destino_long,user_id,created_at) ";
		$sql .= "value (\"$this->nombre\",\"$this->fecha_arrivo\",\"$this->lugar_salida\",\"$this->lugar_salida_lat\",\"$this->lugar_salida_long\",\"$this->lugar_destino\",\"$this->lugar_destino_lat\",\"$this->lugar_destino_long\",\"$this->user_id\",$this->created_at)";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where idcontenedor =$this->idcontenedor ";
		return Executor::doit($sql);
	}

	public static function delBy($k,$v){
		$sql = "delete from ".self::$tablename." where $k=\"$v\"";
		Executor::doit($sql);
	}

	public function update(){
		$sql = "update ".self::$tablename." set 
		nombre=\"$this->nombre\",
		fecha_arrivo=\"$this->fecha_arrivo\",
		lugar_salida=\"$this->lugar_salida\",
		lugar_salida_lat=\"$this->lugar_salida_lat\",
		lugar_salida_long=\"$this->lugar_salida_long\",
		lugar_destino=\"$this->lugar_destino\",
		lugar_destino_lat=\"$this->lugar_destino_lat\",
		lugar_destino_long=\"$this->lugar_destino_long\"

		 where idcontenedor =$this->idcontenedor ";
		Executor::doit($sql);
	}

	public function updateById($k,$v){
		$sql = "update ".self::$tablename." set $k=\"$v\" where idcontenedor =$this->idcontenedor ";
		Executor::doit($sql);
	}

	public static function getById($idcontenedor ){
		 $sql = "select * from ".self::$tablename." where idcontenedor =$idcontenedor ";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ContenedorData());
	}

	public static function getBy($k,$v){
		$sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ContenedorData());
	}


	public static function lastById(){
		 $sql = "select LAST_INSERT_ID(idcontenedor) as last from ".self::$tablename." order by idcontenedor desc limit 0,1 ";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ContenedorData());
	}

	public static function getAll(){
		 $sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ContenedorData());
	}

	public static function getAllBy($k,$v){
		 $sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ContenedorData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ContenedorData());
	}


	public static function countQuery($where){
		$sql = "SELECT count(*) AS numrows FROM ".self::$tablename." where ".$where;
		$query = Executor::doit($sql);
		return Model::one($query[0],new ContenedorData());
	}

	public static function query($sWhere, $offset,$per_page){
		$sql = "SELECT * FROM ".self::$tablename." where ".$sWhere." LIMIT $offset,$per_page";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ContenedorData());
	}


}

?>
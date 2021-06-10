<?php
class HelperData {
	// public function HelperData(){
	public function __construct(){
		$this->table = "";
		$this->row = "";
		$this->condition = "";
		$this->equal = "";
	}
	public static function getId($table,$row,$condition,$equal){
		$sql = "select $row from $table where $condition='$equal' limit 0,1";
		$query = Executor::doit($sql);
		return Model::one($query[0],new HelperData());
	}
}

?>
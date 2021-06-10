<?php
	class Database {

		public static $db;
		public static $con;

		function Database(){
			$this->user=DB_USERNAME;
			$this->pass=DB_PASSWORD;
			$this->host=DB_HOST;
			$this->ddbb=DB_DATABASE;
		}

		function connect(){
			$con = new mysqli($this->host,$this->user,$this->pass,$this->ddbb);
			if($con){
				//echo "conectado con exito";
				return $con;
			}
		}

		public static function getCon(){
			if(self::$con==null && self::$db==null){
				self::$db = new Database();
				self::$con = self::$db->connect();
			}
			return self::$con;
		}

		public static function cleanChain($str){
			$con = Database::getCon();
			$str = mysqli_real_escape_string($con,trim($str));
			return htmlspecialchars($str);
		}
		
	}
	//echo Database::cleanChain("amnersaucedososa");
?>

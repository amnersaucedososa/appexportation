<?php
	class Bootload {

		public static function load($view){
			if(!isset($_GET['view'])){
				include "modules/".Module::$module."/boot/".$view."/boot-default.php";
			}else{
				if(self::isValid()){
					$fullpath = "modules/".Module::$module."/boot/".$_GET['view']."/boot-default.php";
					include $fullpath;				
				}else{
					self::Error("<b>404 NOT FOUND</b> Boot <b>".$_GET['view']."</b> folder  !!");
				}

			}
		}
		
		public static function isValid(){
			$valid=false;
			if(file_exists($file = "modules/".Module::$module."/boot/".$_GET['view']."/boot-default.php")){
				$valid = true;
			}
			return $valid;
		}

		public static function Error($message){
			print $message;
		}

	}
?>
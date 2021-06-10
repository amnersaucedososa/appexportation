<?php
	class Action {
		
		public static function load($action){
			if(!isset($_GET['action'])){
				include "app/action/".$action."-action.php";
			}else{
				if(Action::isValid()){
					include "app/action/".$_GET['action']."-action.php";				
				}else{
					Action::Error("<b>404 </b> ".$_GET['action']." ARCHIVO NO ENCONTRADO");
				}
			}
		}

		public static function isValid(){
			$valid=false;
			if(file_exists($file = "app/action/".$_GET['action']."-action.php")){
				$valid = true;
			}
			return $valid;
		}

		public static function Error($message){
			print $message;
		}

		public function execute($action,$params){
			$fullpath =  "app/action/".$action."-action.php";
			if(file_exists($fullpath)){
				include $fullpath;
			}else{
				assert("wtf");
			}
		}

	}
?>
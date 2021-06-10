<?php
	class Core {

		public static $debug_sql = false;

		public static function includeCSS(){
			$path = "res/css/";
			$handle=opendir($path);
			if($handle){
				while (false !== ($entry = readdir($handle)))  {
					if($entry!="." && $entry!=".."){
						$fullpath = $path.$entry;
					if(!is_dir($fullpath)){
							echo "<link rel='stylesheet' type='text/css' href='".$fullpath."' />";

						}
					}
				}
			closedir($handle);
			}

		}

		public static function redir($url){
			echo "<script>window.location='".$url."';</script>";
		}

		public static function alert($alert,$notice,$msg){
			$_SESSION['data']=array('alert'=>$alert,'notice'=>$notice, 'msg'=>$msg);
		}

		/*public static function alert($txt){
			echo "<script>alert('".$txt."');</script>";
		}*/

		public static function includeJS(){
			$path = "res/js/";
			$handle=opendir($path);
			if($handle){
				while (false !== ($entry = readdir($handle)))  {
					if($entry!="." && $entry!=".."){
						$fullpath = $path.$entry;
					if(!is_dir($fullpath)){
							echo "<script type='text/javascript' src='".$fullpath."'></script>";

						}
					}
				}
			closedir($handle);
			}

		}

	}
?>
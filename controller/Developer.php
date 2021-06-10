<?php 
	/**
	*  Clase para desarrolladores
	*  Creado Por: Amner Saucedo Sosa
	*/
	class Developer
	{
		public function Developer(){

		}

		public static function htaccess(){
			$content = "<IfModule mod_rewrite.c> \n\tRewriteEngine on \n \n";
			if($file = fopen(".htaccess", 'a+')){
			    fwrite($file, $content);
			    fclose($file);
			}

			Developer::showFiles("app/view/");

			$content = "\n\n\t#Error 404 \n\tErrorDocument 404 ".APP_URL."404 \n\n\tOptions All -Indexes\n</IfModule>\n#File Protected\n<files controller/Database.php>\n\torder allow,deny\n\tdeny from all\n</files>";
			if($file = fopen(".htaccess", 'a+')){
			    fwrite($file, $content);
			    fclose($file);
			}
		}

		//esta funcion es usada por: Developer::htaccess()
		public static function showFiles($path){
			$dir = opendir($path);
				$files = array();
				while ($current = readdir($dir)) {
					if ($current != "." && $current != "..") {
						if (is_dir($path.$current)) {
							//showFiles($path.$current.'/');
							Developer::showFiles($path.$current.'/');
						}else{
							if(@preg_match(".*\.php", $path.$current)){
								$files[] = $current;
								//echo $current;
							}else{
								$files[] = $current;
							//	echo $path.$current."<br>";
							}
						}
					}
				}

				for ($i=0; $i<count($files) ; $i++) {
					//nombre de los archivos
					$exp = explode("-view", $files[$i]);
					//echo $exp[0]."<br>"; //create

					//ruta completa de la vista
					$explode_folder = explode("app/view/", $path);
					//echo $explode_folder[1].$exp[0]."<br>"; //category/create

					//nombre la vista
					$explode=explode("/", $path);
					//echo $explode[2]."<br>"; //category

				//condicion para los que no tengan la variable id	
				if ($explode_folder[1]!="" && $exp[0]!="delete" && $exp[0]!="edit" && $exp[0]!="show") {
					$content = "\t".'RewriteRule ^'.$explode_folder[1].$exp[0].'$ index.php?view='.$explode[2].'&type='.$exp[0].' [L]'."\n";
					if($file = fopen(".htaccess", 'a+')){
					    fwrite($file, $content);
					    fclose($file);
					}
				//condicion para los que tengas la variable id		
				}elseif($explode_folder[1]!="" && $exp[0]!="create" && $exp[0]!="index") {
					$content = "\t".'RewriteRule ^'.$explode_folder[1].$exp[0].'/(.*)$ index.php?view='.$explode[2].'&type='.$exp[0].'&id=$1 [L]'."\n";
					if($file = fopen(".htaccess", 'a+')){
					    fwrite($file, $content);
					    fclose($file);
					}
				}else{
					//echo $exp[0]."<br>"; //create
					$content = "\t".'RewriteRule ^'.$exp[0].'$ index.php?view='.$exp[0].' [L]'."\n";
					if($file = fopen(".htaccess", 'a+')){
					    fwrite($file, $content);
					    fclose($file);
					}
				}
			}
		}
	}

	//si esta en modo desarrollo añado todas las librerias necesarias.
	if (DEVELOPER==true) {
		if(file_exists(".htaccess")){ 
			if($file = fopen(".htaccess", 'w')){
			    fwrite($file, "");
			    fclose($file);
			}
			Developer::htaccess();
		}else{
			if($file = fopen(".htaccess", 'w')){
			    fwrite($file, "");
			    fclose($file);
			}
		}
	}
	if(DEBUG==true){
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
	}else{
		error_reporting(0);
	}
?>
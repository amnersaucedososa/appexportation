<?php
	/**
		* Creador: Amner Saucedo Sosa
		* Sitio web: http://abisoftgt.net
		* E-Mail: waptoing7@gmail.com
	**/

	#PHP_VERSION
	if (version_compare(PHP_VERSION, '5.6.15', '<')) {
	    exit("<title>Error!</title>
	    	<h3>Parece que tenemos problemas!</h3>
	    		Lo sentimos, El sistema no se ejecuta en una versión de PHP menor que <strong style='color:red'>5.6.15.</strong><br>
				Si tienes duda contactame: <strong>waptoing7@gmail.com</strong><br>
				o visita mi sitio web: <a href='http://abisoftgt.net' target='_blank'>http://abisoftgt.net</a><br><br>
				<span><strong>Autor:</strong> Amner Saucedo Sosa</span><br>
				<span><strong>Creador del framework:</strong> Amabi</span><br>
				<span><strong>Fundador y Seo de: </strong><a href='http://abisoftgt.net' target='_blank'>abisoftgt.net</a></span>
	    	");
	}

	include "autoload.php";
	ob_start();
	session_start();

	#Zona Horaria
	date_default_timezone_set(TIMEZONE);

	//si quieres que se muestre las consultas SQL debes decomentar la siguiente linea
	Core::$debug_sql = false;

	$lb = new Lb();
	$lb->start();
?>
<?php  
	/**
		* Creador: Amner Saucedo Sosa
		* Sitio web: http://abisoftgt.net
		* E-Mail: waptoing7@gmail.com
	**/

	define("APP_NAME", "PRUEBA 2021");
	define("APP_URL", "http://192.168.1.87/all/appexportation/");

	#Zona Horaria
	define("TIMEZONE", "America/Guatemala");

	#Database
	define("DB_CONNECTION", "mysql");
	define("DB_HOST", "127.0.0.1");   //[REQUERIDO]
	define("DB_PORT", "3306");
	define("DB_DATABASE", "appexportation");   //[REQUERIDO]
	define("DB_USERNAME", "root");    //[REQUERIDO]  
	define("DB_PASSWORD", "");        //[REQUERIDO]

	#Configuración del servidor SMTP
	define("USER_SMTP", "");
	define("PASSWORD_SMTP", "");
	define("FROM_NAME_SMTP", "Abisoft - GT");
	define("HOST_SMTP", "");
	define("PORT_SMTP", 0);

	#Versión
	define("VERSION", "1.0", true);

 	/*
 		*CONFIGURACIÓN PARA DESARROLLADORES
	*/
		 	#Quieres utilizar las funciones de desarrollador?
		 	#TRUE = SI
		 	#FALSE = NO
			define("DEVELOPER", false);

			#true si queremos mostrar errores!
			#false si "NO" queremos mostrar errores!
			define("DEBUG", false);
	/*
		*FIN DE LA CONFIGURACIÓN DE DESARROLLADORES
	*/
?>
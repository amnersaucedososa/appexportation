<?php
	date_default_timezone_set(TIMEZONE);
	$dia = date("w");
	switch($dia){
	   case 0:
	      	$dia="Domingo";
	    	break;
	    case 1:
	      	$dia="Lunes";
	      	break;
		case 2:
	      	$dia="Martes";
	      	break;
		case 3:
	      	$dia="Mi&eacute;rcoles";
		  	break;
		case 4:
	      	$dia="Jueves";
		  	break;
		case 5:
	      	$dia="Viernes";
		  	break;
		case 6:
	      	$dia="S&aacute;bado";
		  	break;
	}  

	$mes = date("n");
	switch($mes){
		case 1:
	      	$mes="Enero";
	      	break;
		case 2:
	      	$mes="Febrero";
	      	break;
		case 3:
	      	$mes="Marzo";
	      	break;
		case 4:
	      	$mes="Abril";
		  	break;
		case 5:
	      	$mes="Mayo";
		  	break;
		case 6:
	      	$mes="Junio";
		  	break;
		case 7:
	      	$mes="Julio";
		  	break;
		case 8:
	      	$mes="Agosto";
		  	break;
		case 9:
	      	$mes="Septiembre";
		  	break;
		case 10:
	      	$mes="Octubre";
		  	break;
		case 11:
	      	$mes="Noviembre";
		  	break;
		case 12:
	      	$mes="Diciembre";
		  	break;
	}

	$anio = date("Y");
	$numdia = date(" j");
	$F = $dia.$numdia. " de " .$mes. " de " .$anio;
	$hor = date("h");
	$hora = date("$hor:i:s a");
?>
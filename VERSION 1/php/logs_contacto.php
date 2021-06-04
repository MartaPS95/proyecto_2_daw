<!--En este archivo generaremos archivos que contienen registro de incidencias generadas por usuarios, el archivo contiene un bloque de lineas con la siguiente estructura:
	ID Incidencia(aleatorio y no repetible)
	Nombre completo de usuario
	correo de usuario
	Hora de apertura de la incidencia en formato español
-->
<?php
	//Variables que contienen los datos
	$nombre = $_REQUEST['nom_usu_contacto'];
	$correo = $_REQUEST['email_usu_contacto'];
	$consulta = $_REQUEST['consulta_contacto'];
	//Generamos un archivo de texto de lectura y append,
	$log_contacto = fopen("logs/log_contacto.dat", "a") or die("Error al crear el log");
	//Añadimos cada línea
	fputs($log_contacto, $nombre);
	fputs($log_contacto, "\n");
	fputs($log_contacto, $correo);
	fputs($log_contacto, "\n\n");
	fputs($log_contacto, $consulta);
	fputs($log_contacto, "\n");
	$fecha = date("d/m/Y");
	fputs($log_contacto,$fecha);
	fputs($log_contacto,"  ");
	$hora = date("H:i:s");
	fputs($log_contacto,$hora);
	fputs($log_contacto, "\n\n");
	fclose($log_contacto);
	echo "<script type = text/javascript>alert(\"Se ha enviado su consulta correctamente.\");window.location.replace(\"../contacto.php\");</script>";
	//echo "<script type = text/javascript>alert(\"Incidencia XXXX guardada\");</script>";
?>
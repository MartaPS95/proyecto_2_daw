<!--En este archivo se configurará la conexión a la base de datos y será requerido a todos los archivos que la usen-->
<?php
	//Establecemos la conexión a la base de datos "Educalegre" [MODO PRUEBAS]
	$con = mysqli_connect("localhost", "root", "", "educalegre") or die("ERROR: No se ha podido conectar con la base de datos");
	$con->set_charset("utf8");	//Solución a los problemas con acentos y caracteres especiales
?>
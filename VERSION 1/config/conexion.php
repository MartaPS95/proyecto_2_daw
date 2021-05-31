<?php
	//Establecemos la conexión a la base de datos "Educalegre" [MODO PRUEBAS -- educalegre_pruebas.sql]
	$con = mysqli_connect("localhost", "root", "", "educalegre_pruebas") or die("ERROR: No se ha podido conectar con la base de datos");
	$con->set_charset("utf8");	//Solución a los problemas con acentos y caracteres especiales.
?>
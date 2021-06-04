<!--En este archivo generaremos archivos que contienen registro de incidencias generadas por usuarios, el archivo contiene un bloque de lineas con la siguiente estructura:
	ID Incidencia(aleatorio y no repetible)
	Nombre completo de usuario
	correo de usuario
	Hora de apertura de la incidencia en formato español
-->
<?php
	function generarIdIncidencia($tipo_contacto)
	{
		$cars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$id = "";
		if($tipo_contacto == "tipo_contacto_soporte")
			$id .= "SEA";	#//iglas Soporte EducAlegre
		else if($tipo_contacto == "tipo_contacto_admin")
			$id .= "AEA"; 	//siglas Administración EducAlegre
		for($c=0;$c<=9;$c++)
		{
			// Obtener la posición aleatoriamente de uno de los 62 caracteres anteriores.
			$car = rand(0,35);
			$id .= $cars[$car];
		}
		return $id;
	}
	function buscarIncidencia($id_inc)
	{
		$encontrado = false;
		//Abrimos el archivo y leemos
		$ids = fopen("logs/registros_incidencias.dat", "r") or die("Error al abrir el log");
		while(!feof($ids))
		{
			$linea = fgets($ids);
			if($linea == $id_inc)
				$encontrado = true;
		}
		return $encontrado;
	}
	//Variables que contienen los datos
	$destino = $_REQUEST['tipo_contacto'];
	$nombreCompleto = $_REQUEST['nom_usu_contacto'] . " " . $_REQUEST['ape1_contacto'] . " " . $_REQUEST['ape2_contacto'];
	$correo = $_POST['email_usu_contacto'];
	$id_inc = generarIdIncidencia($destino);
	//Generamos un archivo de texto de lectura y append,
	$reg = 0;
	$log_incidencia = fopen("logs/log_incidencias.dat", "a") or die("Error al crear el log");
	$registro_ids = fopen("logs/registros_incidencias.dat", "a") or die("Error al crear archivo");
	//Añadimos cada línea
	fputs($log_incidencia, $id_inc);
	fputs($log_incidencia, "\n");
	if(!buscarIncidencia($id_inc))
		fputs($registro_ids, $id_inc);
	fputs($registro_ids, "\n");
	fputs($log_incidencia, $nombreCompleto);
	fputs($log_incidencia, "\n");
	fputs($log_incidencia, $correo);
	fputs($log_incidencia, "\n");
	$fecha = date("d/m/Y");
	fputs($log_incidencia,$fecha);
	fputs($log_incidencia,"  ");
	$hora = date("H:i:s");
	fputs($log_incidencia,$hora);
	fputs($log_incidencia, "\n\n");
	$reg++;
	fclose($log_incidencia);
	echo "<script type = text/javascript>alert(\"Incidencia " . $id_inc . " guardada\");window.location.replace(\"../contacto.php\");</script>";
?>
<?php
	session_start();
	//Obtenemos los datos de registro:
	$nombre = $_POST['nombre_reg'];
	$apellidos = $_POST['ape_reg'];
	$correo = $_POST['correo_reg'];
	$username = $_POST['nom_usu_reg'];
	$tipo_usu = $_POST['tipo_usu_section_reg'];
	//Si se ha pulsado el botón de acceso (no se han comprobado datos aún)
	//Sólo prueba de acceso a esta página
	if(@$_POST['alta_user_reg'] == "Darse de alta")
	{
		//Establecemos la conexión a la base de datos "Educalegre" [MODO PRUEBAS]
		$con = mysqli_connect("localhost", "root", "", "educalegre_pruebas") or die("ERROR: No se ha podido conectar con la base de datos");
		$con->set_charset("utf8");	//Solución a los problemas con acentos y caracteres especiales.
		//En caso de que el tipo de usuario sea alumno
		if($tipo_usu == "tipo_usu_alumno_reg")
		{
			$total_alums = mysqli_num_rows(mysqli_query($con, "SELECT * FROM alumnos"));
			$query = "INSERT INTO alumnos (nombre, apellidos, correo, username) VALUES(\"" . $nombre . "\", \"" . $apellidos . "\", \"" . $correo . "\", \"" . $username . "\")";
			echo "<br>DATOS DE ALUMNO:<br>";
			echo "NOMBRE: " . $nombre . "<br>";
			echo "APELLIDOS: " . $apellidos . "<br>";
			echo "CORREO: " . $correo . "<br>";
			echo "USERNAME: " . $username . "<br>";
			echo "Total registros alumnos: " . ($total_alums+1) . "<br>";
		}
		else
		{
			$total_profs = mysqli_num_rows(mysqli_query($con, "SELECT * FROM profesores"));
			$query = "INSERT INTO profesores (nombre, apellidos, correo, username) VALUES(" . $id_prof . "\"" . $nombre . "\", \"" . $apellidos . "\", \"" . $correo . "\", \"" . $username . "\")";
			echo "DATOS DE PROFESOR:<br>";
			echo "NOMBRE: " . $nombre . "<br>";
			echo "APELLIDOS: " . $apellidos . "<br>";
			echo "CORREO: " . $correo . "<br>";
			echo "USERNAME: " . $username . "<br>";
			echo "Total registros profesores: " . ($total_profs+1) . "<br>";
		}
		mysqli_query($con, $query) or die("ERROR: La query no está bien escrita.");
		mysqli_close($con);	//Cerramos la conexión
	}
	
	echo "<a href = ../index.php>Volver al inicio</a>";
?>
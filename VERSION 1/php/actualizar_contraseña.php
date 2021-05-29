<!--
En esta sección se permite el cambio de contraseña del usuario en caso de no recordarla
	Se buscará al usuario en la base de datos y si es localizado se permite el cambio, es decir, 
	query de búsqueda por username y correo y query de actualización de contraseña
-->
<?php

	function actualizarPass($nueva_pass, $correo, $tabla, $con)
	{
		$query = "UPDATE " . $tabla . " SET contraseña = SHA1(\"" . $nueva_pass . "\") WHERE email = \"" . $correo . "\"";
		mysqli_query($con, $query) or die("ERROR: La query \"Actualizar pass\" no está bien escrita.");
	}

	function obtenerTabla($tipo_usu)
	{
		if($tipo_usu == "tipo_alumno")
			return "alumnos";
		else if($tipo_usu == "tipo_profesor")
			return "profesores";
	}

	session_start();

	$tipo_usu = $_POST['tipo_usu_cambio_pass'];
	$tabla = obtenerTabla($tipo_usu);
	$correo = $_POST['correo_usu'];
	$contraseña = $_POST['new_pass'];

	require("conexion_mysql.php");
	$query = "SELECT email FROM " . $tabla . " WHERE email = \"" . $correo . "\"";
	$resultado = mysqli_query($con, $query) or die("ERROR: Hay un problema en la query buscarCorreo.");
	$filas=mysqli_num_rows($resultado);
	
	if($filas > 0){
		echo "Contraseña actualizada";
		actualizarPass($contraseña, $correo, $tabla, $con);
	}
	else 
		echo "ERROR actualizar contraseña";
		//header("Location:../index.php");
	mysqli_free_result($resultado);
	mysqli_close($con);	//Cerramos la conexión
?>
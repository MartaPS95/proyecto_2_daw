<!--
En esta sección se permite el cambio de contraseña del usuario en caso de no recordarla
	Se buscará al usuario en la base de datos y si es localizado se permite el cambio, es decir, 
	query de búsqueda por username y correo y query de actualización de contraseña
	DESDE INDEX
-->
<?php
	include_once '../config/conexion.php';
	//session_start();

	$tipo_usu = $_POST['tipo_usu_cambio_pass'];
	$tabla = obtenerTablaLogin($tipo_usu);
	$correo = $_POST['correo_usu'];
	$contraseña = $_POST['new_pass'];

	$query = "SELECT email FROM " . $tabla . " WHERE email = \"" . $correo . "\"";
	$resultado = mysqli_query($con, $query) or die("ERROR: Hay un problema en la query buscarCorreo." . mysqli_error($con));
	$filas=mysqli_num_rows($resultado);
	
	if($filas > 0){
		actualizarPass($contraseña, $correo, $tabla, $con);
		echo "<script type = text/javascript>window.location.replace(\"../index.php\");";
		echo "alert(\"Contraseña actualizada correctamente\")</script>";
	}
	else 
		echo "ERROR actualizar contraseña";
		echo "<script type = text/javascript>window.location.replace(\"actualizar_contraseña.php\");";
		echo "alert(\"Tu usuario no existe, vuelve a introducirlo\")</script>";
	mysqli_free_result($resultado);
	mysqli_close($con);	//Cerramos la conexión
?>
<!--
	Se codifica el acceso de usuario mediante php, tendrá en cuenta que el usuario introducido será correcto, al igual que
	la contraseña, es decir, buscará nuestro usuario y contraseña en la base de datos, comprobará que los campos están 
	rellenados debidamente. En caso de que se hayan los datos y el tipo de usuario correspondan a la información de nuestra
	base de datos genera una sesión, que dependerá igualmente de ese tipo de usuario: así tendremos profesores.php y alumnos.php
	Pruebas de acceso de usuarios a la base de datos:
	Se están utilizando por el momento usuarios de prueba:
	alumno.prueba
	profesor.prueba
-->
<?php
	function obtenerTabla($tipo_usu)
	{
		if($tipo_usu == "tipo_usu_alumno")
			return "alumnos";
		else if($tipo_usu == "tipo_usu_profesor")
			return "profesores";
	}

	function obtenerNombreUser($email, $conexion, $tabla)
	{
		$query = "SELECT nombre FROM " . $tabla . " WHERE email = \"" . $email . "\"";
		$busqueda = mysqli_query($conexion, $query) or die("ERROR: Hay un problema en la query obtenerNombreUser.");
		while($reg = mysqli_fetch_array($busqueda))	
			$nombre = $reg['nombre'];
		return $nombre;
	}
	function obtenerApellidosUser($email, $conexion, $tabla)
	{
		$query = "SELECT apellido, segundoApellido FROM " . $tabla . " WHERE email = \"" . $email . "\"";
		$busqueda = mysqli_query($conexion, $query) or die("ERROR: Hay un problema en la query obtenerApellidosUser.");
		while($reg = mysqli_fetch_array($busqueda))	
			$apellidos = $reg['apellido'] . " " . $reg['segundoApellido'];
		return $apellidos;
	}

	session_start();

	$tipo_usu = $_POST['tipo_usu_section_index'];
	$tabla = obtenerTabla($tipo_usu);
	$email = $_POST['correo_usu_acceso'];
	$contraseña = $_POST['usu_pass'];

	require("conexion_mysql.php");
	$query = "SELECT email, contraseña FROM " . $tabla . " WHERE email = \"" . $email . "\" AND contraseña = SHA1(\"" . $contraseña . "\")";
	$resultado = mysqli_query($con, $query) or die("ERROR: Hay un problema en la query buscarCorreo.");
	$filas=mysqli_num_rows($resultado);
	
	if($filas > 0){
		//echo "ACCESO";
		$_SESSION['nombre'] = obtenerNombreUser($email, $con, $tabla);
		$_SESSION['apellidos'] = obtenerApellidosUser($email, $con, $tabla);
		header("Location:../" . $tabla . ".php");
	}
	else 
		//echo "ERROR";
		header("Location:../index.php");
	mysqli_free_result($resultado);
	mysqli_close($con);	//Cerramos la conexión
?>
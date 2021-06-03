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
	session_start();
	include_once('lib.php');
	include_once('conexion.php');
	
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
		$nombre = obtenerNombreUser($email, $con, $tabla);
		$apellidos = obtenerApellidosUser($email, $con, $tabla);
		$_SESSION['nombre_completo'] = $nombre . " " . $apellidos;
		header("Location:../" . $tabla . ".php");
	}
	else 
		//echo "ERROR";
		header("Location:../index.php");
	mysqli_free_result($resultado);
	mysqli_close($con);	//Cerramos la conexión
?>
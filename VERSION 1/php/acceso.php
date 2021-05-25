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
	/***Declaracion de las funciones***/
	//Buscar en la bd correo y verificar su existencia, ya que ninguno se puede repetir
	function validarDatos($email, $pass, $conexion, $tabla)
	{
		$query = "SELECT email FROM " . $tabla . " WHERE email = \"" . $email . "\" AND contraseña = SHA1(\"" . $pass . "\")";
		$busqueda = mysqli_query($conexion, $query) or die("ERROR: Hay un problema en la query buscarCorreo.");
		while($reg = mysqli_fetch_array($busqueda))	
			return true;
		return false;
	}
	//Obtener nombre y apellidos de usuario para el inicio de sesión
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
		$query = "SELECT apellido, segApellido FROM " . $tabla . " WHERE email = \"" . $email . "\"";
		$busqueda = mysqli_query($conexion, $query) or die("ERROR: Hay un problema en la query obtenerApellidosUser.");
		while($reg = mysqli_fetch_array($busqueda))	
			$apellidos = $reg['apellido'] . " " . $reg['segApellido'];
		return $apellidos;
	}
	//Determinar que los campos del formulario no estén vacíos
	function noVacio($email, $pass)
	{
		if(strlen($email) != 0 && strlen($pass) != 0)
			return true;
		else return false;
	}
	//Obtener la tabla en la que se va a realizar el alta de la información de usuario (alumno o profesor)
	function obtenerTabla($tipo_usu)
	{
		if($tipo_usu == "tipo_usu_alumno")
			return "alumnos";
		else if($tipo_usu == "tipo_usu_profesor")
			return "profesores";
	}
	//Obtenemos los datos de registro:
	$tipo_usu = $_POST['tipo_usu_section_index'];
	$tabla = obtenerTabla($tipo_usu);
	$email = $_POST['correo_usu_acceso'];
	$contraseña = $_POST['usu_pass'];
	//Establecemos la conexión a la base de datos "Educalegre" [MODO PRUEBAS -- educalegre_pruebas.sql]
	$con = mysqli_connect("localhost", "root", "", "educalegre_pruebas") or die("ERROR: No se ha podido conectar con la base de datos");
	$con->set_charset("utf8");	//Solución a los problemas con acentos y caracteres especiales.
	//Si no ha encontrado un usuario y correo existentes y la contraseña ha sido confirmada correctamente, damos de alta
	/*Se comprueba que no se repite el usuario y que se ha introducido una contraseña funcional*/
	//Una vez el usuario a pulsado el botón de acceso y todos los campos se hayan rellenado:
	if(@$_POST['acceso_user_index'] == "Acceder")
	{
		//Query de busqueda del usuario en nuestra tabla (determinada por el tipo de usuario seleccionado en el formulario)
		if(validarDatos($email, $contraseña, $con, $tabla))
		{
			/*Una vez guardados los datos de sesión nos vamos a la página de usuario que corresponda 
			[Se han comentado los mensajes de prueba]*/
			$_SESSION['nombre'] = obtenerNombreUser($email, $con, $tabla);
			$_SESSION['apellidos'] = obtenerApellidosUser($email, $con, $tabla);	
			header("Location:../" . $tabla . ".php");
		}
		else
		{
			header("Location:../index.php");
		}
	}
	
	mysqli_close($con);	//Cerramos la conexión
?>
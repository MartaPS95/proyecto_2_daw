<!--
	Pruebas de acceso de usuarios a la base de datos:
	Se están utilizando por el momento usuarios de prueba:
	alumno.prueba
	profesor.prueba
-->
<?php
	session_start();
	//Declaracion de las funciones
	//Buscar en la bd username y correo y verificar su existencia, ya que ninguno se puede repetir
	function buscarUsername($username, $conexion, $tabla)
	{
		$query = "SELECT username FROM " . $tabla . " WHERE username = \"" . $username . "\"";
		$busqueda = mysqli_query($conexion, $query) or die("ERROR: Hay un problema en la query.");
		while($reg = mysqli_fetch_array($busqueda))	
			return true;
		return false;
	}
	function noVacio($username, $pass)
	{
		if(strlen($username) != 0 && strlen($pass) != 0)
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
	$username = $_POST['usu_acceso'];
	$contraseña = $_POST['usu_pass'];
	//Establecemos la conexión a la base de datos "Educalegre" [MODO PRUEBAS]
	$con = mysqli_connect("localhost", "root", "", "educalegre_pruebas") or die("ERROR: No se ha podido conectar con la base de datos");
	$con->set_charset("utf8");	//Solución a los problemas con acentos y caracteres especiales.
	//Si no ha encontrado un usuario y correo existentes y la contraseña ha sido confirmada correctamente, damos de alta
	/*Se comprueba que no se repite el usuario y que se ha introducido una contraseña funcional*/
	//Sólo prueba de acceso a esta página
	if(@$_POST['acceso_user_index'] == "Acceder" && noVacio($username, $contraseña))
	{
		if(buscarUsername($username, $con, $tabla))
			echo "ACCESO";
		else
			echo "USUARIO NO ENCONTRADO";	//Error al no existir el usuario en la base de datos
	}
	else
		echo "CAMPOS VACIOS";	//Informar de este error en una ventana

	mysqli_close($con);	//Cerramos la conexión
?>
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
	//Buscar en la bd username y correo y verificar su existencia, ya que ninguno se puede repetir
	function buscarUsername($username, $conexion, $tabla)
	{
		$query = "SELECT username FROM " . $tabla . " WHERE username = \"" . $username . "\"";
		$busqueda = mysqli_query($conexion, $query) or die("ERROR: Hay un problema en la query.");
		while($reg = mysqli_fetch_array($busqueda))	
			return true;
		return false;
	}
	//Obtener nombre y apellidos de usuario para el inicio de sesión
	function obtenerNombreUser($username, $conexion, $tabla)
	{
		$query = "SELECT nombre FROM " . $tabla . " WHERE username = \"" . $username . "\"";
		$busqueda = mysqli_query($conexion, $query) or die("ERROR: Hay un problema en la query.");
		while($reg = mysqli_fetch_array($busqueda))	
			$nombre = $reg['nombre'];
		return $nombre;
	}
	function obtenerApellidosUser($username, $conexion, $tabla)
	{
		$query = "SELECT apellidos FROM " . $tabla . " WHERE username = \"" . $username . "\"";
		$busqueda = mysqli_query($conexion, $query) or die("ERROR: Hay un problema en la query.");
		while($reg = mysqli_fetch_array($busqueda))	
			$apellidos = $reg['apellidos'];
		return $apellidos;
	}
	//Determinar que los campos del formulario no estén vacíos
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
	//Establecemos la conexión a la base de datos "Educalegre" [MODO PRUEBAS -- educalegre_pruebas.sql]
	$con = mysqli_connect("localhost", "root", "", "educalegre_pruebas") or die("ERROR: No se ha podido conectar con la base de datos");
	$con->set_charset("utf8");	//Solución a los problemas con acentos y caracteres especiales.
	//Si no ha encontrado un usuario y correo existentes y la contraseña ha sido confirmada correctamente, damos de alta
	/*Se comprueba que no se repite el usuario y que se ha introducido una contraseña funcional*/
	//Una vez el usuario a pulsado el botón de acceso y todos los campos se hayan rellenado:
	if(@$_POST['acceso_user_index'] == "Acceder" && noVacio($username, $contraseña))
	{
		//Query de busqueda del usuario en nuestra tabla (determinada por el tipo de usuario seleccionado en el formulario)
		if(buscarUsername($username, $con, $tabla))
		{
			/*Una vez guardados los datos de sesión nos vamos a la página de usuario que corresponda 
			[Se han comentado los mensajes de prueba]*/
			//echo "ACCESO";	//Mensaje prueba acceso correcto
			$_SESSION['nombre'] = obtenerNombreUser($username, $con, $tabla);
			$_SESSION['apellidos'] = obtenerApellidosUser($username, $con, $tabla);	
			//echo $_SESSION['nombre'] . "<br>" . $_SESSION['apellidos'];
			//echo "<a href = ../" . $tabla . ".php>Ir a sesion</a>";
			
			/*echo "<form acton = prueba_sesion.php method = POST";
			echo "<input type = hidden name = nom_hid value = " . $_SESSION['nombre'] . ">";
			echo "<input type = hidden name = ape_hid value = " . $_SESSION['apellidos'] . ">";
			echo "</form>";*/
			header("Location:../" . $tabla . ".php");
		}
		/*
		else
			echo "USUARIO NO ENCONTRADO";	//Mensaje prueba acceso error*/
	}
	  //En caso de que el usuario no haya ingresado campos muestra error [En pruebas de nav]
	else
	{
	//Imaginemos que el usuario vuelve a la página de sesión después de haber cerrado, podríamos volver a login o mostrar un error de que no hay sesión.
		header("Location:prueba_sesion.php");
	}
	//Si ha accedido pero los campos están en blanco informa de un error
	/*else
		echo "CAMPOS VACIOS";	//Mensaje prueba acceso error*/
	
	mysqli_close($con);	//Cerramos la conexión
?>
<!--
	Se añaden alumnos y profesores de prueba, tener en cuenta:
	- Si el usuario existe informar de error al dar de alta [query_search]
	- Si no, continuamos y lo añadimos
-->
<!--Aplicar validaciones a futuro o bien un plugin de validación de bulma-->
<?php
	session_start();
	//Declaracion de las funciones
	//Determinar si la contraseña ingresada es correcta en la comparativa a su confirmación
	function confirmarContraseña($contra_ini, $contra_conf)
	{
		if(($contra_ini == $contra_conf) && (strlen($contra_ini) != 0) && (strlen($contra_conf) != 0))	
			return true;
		else return false;
	}
	//Buscar en la bd username y correo y verificar su existencia, ya que ninguno se puede repetir
	function buscarUsername($username, $email, $conexion, $tabla)
	{
		$query = "SELECT username FROM " . $tabla . " WHERE username = \"" . $username . "\" OR correo = \"" . $email . "\"";
		$busqueda = mysqli_query($conexion, $query) or die("ERROR: Hay un problema en la query.");
		while($reg = mysqli_fetch_array($busqueda))	
			return true;
		return false;
	}
	function noVacio($nom, $ape, $correo, $username)
	{
		if(strlen($nom) != 0 && strlen($ape) != 0 && strlen($correo) != 0 && strlen($username) != 0)
			return true;
		else return false;
	}
	//Dar de alta la información del usuario en la base de datos
	function insertarUser($nom, $ape, $email, $username, $pass, $tabla, $con)
	{
		$query = "INSERT INTO " . $tabla . "(nombre, apellidos, correo, username, contraseña) VALUES(\"" . $nom . "\", \"" . $ape . "\", \"" . $email . "\", \"" . $username . "\",SHA1(\"" . $pass . "\"))";
		mysqli_query($con, $query) or die("ERROR: La query no está bien escrita.");
	}
	//Obtener la tabla en la que se va a realizar el alta de la información de usuario (alumno o profesor)
	function obtenerTabla($tipo_usu)
	{
		if($tipo_usu == "tipo_usu_alumno_reg")
			return "alumnos";
		else if($tipo_usu == "tipo_usu_profesor_reg")
			return "profesores";
	}
	//Obtenemos los datos de registro:
	$tipo_usu = $_POST['tipo_usu_section_reg'];
	$tabla = obtenerTabla($tipo_usu);
	$nombre = $_POST['nombre_reg'];
	$apellidos = $_POST['ape_reg'];
	$correo = $_POST['correo_reg'];
	$username = $_POST['nom_usu_reg'];
	$contra = $_POST['pass_reg'];
	$contra_confirm = $_POST['pass_reg_confirm'];
	//Establecemos la conexión a la base de datos "Educalegre" [MODO PRUEBAS]
	$con = mysqli_connect("localhost", "root", "", "educalegre_pruebas") or die("ERROR: No se ha podido conectar con la base de datos");
	$con->set_charset("utf8");	//Solución a los problemas con acentos y caracteres especiales.
	//Si no ha encontrado un usuario y correo existentes y la contraseña ha sido confirmada correctamente, damos de alta
	/*Se comprueba que no se repite el usuario y que se ha introducido una contraseña funcional*/
	//Sólo prueba de alta a esta página
	if(@$_POST['alta_user_reg'] == "Darse de alta" && noVacio($nombre, $apellidos, $correo, $username))
	{
		if(!buscarUsername($username, $correo, $con, $tabla) && confirmarContraseña($contra, $contra_confirm))
		{
			$contraseña = $_POST['pass_reg'];
			insertarUser($nombre, $apellidos, $correo, $username, $contraseña, $tabla, $con);
			echo "USUARIO DADO DE ALTA";
		}
		else
			echo "ERROR EN ALTA";	//Mostraremos una ventana indicándonos el error de que el usuario ya existe
	}
	else
		echo "CAMPOS VACIOS";	//Mostraremos una ventana indicando el error, o aplicaremos validaciones de bulma
	mysqli_close($con);	//Cerramos la conexión
?>
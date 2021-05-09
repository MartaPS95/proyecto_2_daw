<!--
En esta sección se permite el cambio de contraseña del usuario en caso de no recordarla
	Se buscará al usuario en la base de datos y si es localizado se permite el cambio, es decir, 
	query de búsqueda por username y correo y query de actualización de contraseña
-->
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
		$busqueda = mysqli_query($conexion, $query) or die("ERROR: Hay un problema en la query\"buscarUsername\".");
		while($reg = mysqli_fetch_array($busqueda))	
			return true;
		return false;
	}
	//Función que determina si la contraseña ingresada ya era la de la base de datos o no
	function contraseñaAntigua($pass, $conexion, $tabla)
	{
		$query = "SELECT contraseña FROM " . $tabla . " WHERE contraseña = \"" . $pass . "\"";
		$busqueda = mysqli_query($conexion, $query) or die("ERROR: Hay un problema en la query \"contraseña antigua\".");
		while($reg = mysqli_fetch_array($busqueda))	
			return true;
		return false;
	}
	//Comprobar que se ha introducido información en username y correo
	function noVacio($correo, $username)
	{
		if(strlen($correo) != 0 && strlen($username) != 0)
			return true;
		else return false;
	}
	//Dar de alta la información del usuario en la base de datos
	function actualizarPass($nueva_pass, $username, $correo, $tabla, $con)
	{
		$query = "UPDATE " . $tabla . " SET contraseña = SHA1(\"" . $nueva_pass . "\") WHERE username = \"" . $username . "\" AND correo = \"" . $correo . "\"";
		mysqli_query($con, $query) or die("ERROR: La query \"Actualizar pass\" no está bien escrita.");
	}
	//Obtener la tabla en la que se va a realizar el alta de la información de usuario (alumno o profesor)
	function obtenerTabla($tipo_usu)
	{
		if($tipo_usu == "tipo_alumno")
			return "alumnos";
		else if($tipo_usu == "tipo_profesor")
			return "profesores";
	}
	//Obtenemos los datos de registro:
	$tipo_usu = $_POST['tipo_usu_cambio_pass'];
	$tabla = obtenerTabla($tipo_usu);
	$correo = $_POST['correo_usu'];
	$username = $_POST['nombre_usu'];
	$contra = $_POST['new_pass'];
	$contra_confirm = $_POST['new_pass_confirm'];
	//Establecemos la conexión a la base de datos "Educalegre" [MODO PRUEBAS]
	$con = mysqli_connect("localhost", "root", "", "educalegre_pruebas") or die("ERROR: No se ha podido conectar con la base de datos");
	$con->set_charset("utf8");	//Solución a los problemas con acentos y caracteres especiales.
	//Si no ha encontrado un usuario y correo existentes y la contraseña ha sido confirmada correctamente, damos de alta
	/*Se comprueba que no se repite el usuario y que se ha introducido una contraseña funcional*/
	//Sólo prueba de alta a esta página
	if(@$_POST['cambiar_pass'] == "Cambiar contraseña" && noVacio($correo, $username))
	{
		if(buscarUsername($username, $correo, $con, $tabla) && confirmarContraseña($contra, $contra_confirm))
		{
			$nueva_contraseña = $_POST['new_pass'];
			actualizarPass($nueva_contraseña, $username, $correo, $tabla, $con);
			echo "CONTRASEÑA ACTUALIZADA";
		}
		else
			echo "ERROR EN ACTUALIZACIÓN";	//Mostraremos una ventana indicándonos el error de que el usuario ya existe
	}
	else
		echo "CAMPOS VACIOS";	//Mostraremos una ventana indicando el error, o aplicaremos validaciones de bulma
	mysqli_close($con);	//Cerramos la conexión
?>
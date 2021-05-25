<!--
	Se añaden alumnos y profesores de prueba, tener en cuenta:
	- Si el usuario existe informar de error al dar de alta [query_search]
	- Si no, continuamos y lo añadimos
-->
<?php
	session_start();
	//Declaracion de las funciones
	//Buscar en la bd username y correo y verificar su existencia, ya que ninguno se puede repetir
	function buscarCorreo($email, $conexion, $tabla)
	{
		$query = "SELECT email FROM " . $tabla . " WHERE email = \"" . $email . "\"";
		$busqueda = mysqli_query($conexion, $query) or die("ERROR: Hay un problema en la query buscarCorreo.");
		while($reg = mysqli_fetch_array($busqueda))	
			return true;
		return false;
	}
	//Dar de alta la información del usuario en la base de datos
	function insertarUser($nom, $ape1, $ape2, $dni, $pass, $email, $tel, $tabla, $con)
	{
		$query = "INSERT INTO " . $tabla . "(nombre, apellido, segApellido, dni, contraseña, email, telefono) VALUES(\"" . $nom . "\", \"" . $ape1 . "\", \"" . $ape2 . "\", \"" . $dni . "\", SHA1(\"" . $pass . "\"), \"" . $email . "\", \"" . $tel . "\")";
		mysqli_query($con, $query) or die("ERROR: La query no está bien escrita insertarUser.");
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
	$ape1 = $_POST['ape1_reg'];
	$ape2 = $_POST['ape2_reg'];
	$dni = $_POST['dni_reg'];
	$correo = $_POST['correo_reg'];
	$tel = $_POST['tel_reg'];
	$contra = $_POST['pass_reg'];
	$contra_confirm = $_POST['pass_reg_confirm'];
	//Establecemos la conexión a la base de datos "Educalegre" [MODO PRUEBAS]
	$con = mysqli_connect("localhost", "root", "", "educalegre_pruebas") or die("ERROR: No se ha podido conectar con la base de datos");
	$con->set_charset("utf8");	//Solución a los problemas con acentos y caracteres especiales.
	//Si no ha encontrado un usuario y correo existentes y la contraseña ha sido confirmada correctamente, damos de alta
	/*Se comprueba que no se repite el usuario y que se ha introducido una contraseña funcional*/
	//Sólo prueba de alta a esta página
	if(@$_POST['alta_user_reg'] == "Darse de alta")
	{
		if(!buscarCorreo($correo, $con, $tabla))
		{
			$contraseña = $_POST['pass_reg'];
			insertarUser($nombre, $ape1, $ape2, $dni, $contraseña, $correo, $tel , $tabla, $con);
			//echo "USUARIO DADO DE ALTA";
			header("Location:../index.php");
		}
		else
			//header("Location:../registro.php");
			echo "ERROR EN ALTA";	//Mostraremos una ventana indicándonos el error de que el usuario ya existe
	}
	else
		header("Location:../registro.php");
	/*else
		echo "CAMPOS VACIOS";	//Mostraremos una ventana indicando el error, o aplicaremos validaciones de bulma*/
	mysqli_close($con);	//Cerramos la conexión
?>
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
	include('config/conexion.php');
	session_start();

	function obtenerTabla($tipo_usu)
	{
		if($tipo_usu == "tipo_usu_alumno")
			return "alumnos";
		else if($tipo_usu == "tipo_usu_profesor")
			return "profesores";
	}

	

	if(isset($_POST['correo_usu_acceso.php']) && !empty($_POST['correo_usu_acceso.php']) && isset($_POST['usu_pass']) && !empty($_POST['usu_pass']))
	{
		$tipo_usu = $_POST['tipo_usu_section_index'];
		$tabla = obtenerTabla($tipo_usu);
		$correo = $_POST['correo_usu_acceso'];
		$contraseña = $_POST['usu_pass'];

		$query = "SELECT FROM " . $tabla . " WHERE email = \"" . $correo . "\" AND contraseña = SHA1(\"" . $contraseña . "\")";

		$res = mysqli_query($con, $query);

		if(mysqli_num_rows($res) > 0)
		{
			echo json_encode(array('success'=> 1));
		}
		else
		{
			echo json_encode(array('success'=> 0));
		}
	}
?>
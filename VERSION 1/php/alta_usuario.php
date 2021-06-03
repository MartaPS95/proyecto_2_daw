<!--
	Se añaden alumnos y profesores de prueba, tener en cuenta:
	- Si el usuario existe informar de error al dar de alta [query_search]
	- Si no, continuamos y lo añadimos
-->
<?php
	session_start();
	include_once('lib.php');
	include_once('conexion.php');
	//Declaracion de las funciones
	//Determinar si la contraseña ingresada es correcta en la comparativa a su confirmación
	
	//Obtenemos los datos de registro:
	$tipo_usu = $_POST['tipo_usu_section_reg'];
	$tabla = obtenerTabla($tipo_usu);
	$id_user = obtenerIdUser($tipo_usu);
	$nombre = $_POST['nombre_reg'];
	$ape1 = $_POST['ape1_reg'];
	$ape2 = $_POST['ape2_reg'];
	$dni = $_POST['dni_reg'];
	$correo = $_POST['correo_reg'];
	$tel = $_POST['tel_reg'];
	$contraseña = $_POST['pass_reg'];

	//Hay que realizar la busqueda en ambas tablas, ya que todos los usuarios cuentan
	$query = "SELECT email, dni, telefono FROM alumno WHERE email = \"" . $correo . "\" OR dni = \"" . $dni . "\" OR telefono = \"" . $tel . "\" UNION SELECT email, dni, telefono FROM profesor WHERE email = \"" . $correo . "\" OR dni = \"" . $dni . "\" OR telefono = \"" . $tel . "\"";
	//echo $query;
	$resultado = mysqli_query($con, $query) or die("ERROR: Hay un problema en la query buscarCorreo.");
	$filas=mysqli_num_rows($resultado);
	if($filas==0){
		//echo "ALTA CORRECTA";

		//insertarUser($id_user, $nombre, $ape1, $ape2, $dni, $contraseña, $correo, $tel , $tabla, $con);
		//echo "<script>alert(\"Usuario dado de alta\");</script>";
		echo "<script type = text/javascript>window.location.replace(\"../registro.php\");";
		//echo "alert(\"Alta correcta\")</script>";
		//header("Location:../index.php");
	}
	else
	{
		//echo "<script>alert(\"Error de alta, el usuario ya existe\");</script>";
		echo "<script type = text/javascript>window.location.replace(\"../registro.php\");";
		echo "alert(\"Error: el usuario ya existe\")</script>";
		//header("Location:../registro.php");
	}
	mysqli_close($con);	//Cerramos la conexión
?>
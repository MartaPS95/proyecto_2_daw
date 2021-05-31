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
	$nombre = $_POST['nombre_reg'];
	$ape1 = $_POST['ape1_reg'];
	$ape2 = $_POST['ape2_reg'];
	$dni = $_POST['dni_reg'];
	$correo = $_POST['correo_reg'];
	$tel = $_POST['tel_reg'];
	$contra = $_POST['pass_reg'];
	$contra_confirm = $_POST['pass_reg_confirm'];
	//Establecemos la conexión a la base de datos "Educalegre" [MODO PRUEBAS]
	//Solución a los problemas con acentos y caracteres especiales.
	//Si no ha encontrado un usuario y correo existentes y la contraseña ha sido confirmada correctamente, damos de alta
	/*Se comprueba que no se repite el usuario y que se ha introducido una contraseña funcional*/
	//Sólo prueba de alta a esta página
	if(@$_POST['alta_user_reg'] == "Darse de alta" && noVacio($nombre, $ape1, $ape2, $correo, $dni, $tel))
	{
		if(!buscarCorreo($correo, $con, $tabla) && confirmarContraseña($contra, $contra_confirm))
		{
			$contraseña = $_POST['pass_reg'];
			insertarUser($nombre, $ape1, $ape2, $dni, $contraseña, $correo, $tel , $tabla, $con);
			echo "USUARIO DADO DE ALTA";
		}
		else
			echo "ERROR EN ALTA";	//Mostraremos una ventana indicándonos el error de que el usuario ya existe
	}
	else
		echo "CAMPOS VACIOS";	//Mostraremos una ventana indicando el error, o aplicaremos validaciones de bulma
	mysqli_close($con);	//Cerramos la conexión
?>
<?php
	$tipo_usu = $_POST['tipo_usu_section_index'];
	//Si se ha pulsado el botón de acceso (no se han comprobado datos aún)
	//Sólo prueba de acceso a esta página
	if(@$_POST['acceso_user_index'] == "Acceder")
	{
		//En caso de que el tipo de usuario sea alumno
		if($tipo_usu == "tipo_usu_alumno")
			//A posteriori en lugar de un echo, esto será un alert de javascript indicando que el usuario ha sido dado de alta en la BBDD correspondiente.
			echo "Hola alumno";
		else
			echo "Hola profesor";
	}
	
	echo "<a href = ../index.php>Volver al inicio</a>";
?>
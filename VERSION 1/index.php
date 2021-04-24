<!--MARTA PARRA SÁEZ
	EDUCALEGRE V1.0
	Versión inicial de nuestra aplicación de aula virtual.
	Página INDEX (INICIO)
!-->

<html>
	<!--Añadir los meta los estandares el language y cosas necesarias para un aspecto más profesional-->
	<head>
		<title>Inicio - Educalegre</title>
		<!--<style></style>-->
	</head>
	<body background = "red">
		<!--Inclusión de archivos en la carpeta "secciones"-->
		<?php include 'secciones/header.html';?>
		<?php include 'secciones/nav.html';?>
		<!--Inclusión de archivos en la carpeta "secciones"-->
		<section>
			<div>
				<form align = "center">
					<div border = "1">
						Tipo de usuario
						<select name = "tipo_usu_section_index">
							<option value = "tipo_usu_alumno">Alumno</option>
							<option value = "tipo_usu_alumno">Profesor</option>
						</select><br>
						Nombre usuario: <input type = "text" name = "usu_acceso" placeholder = "nombre de usuario"/><br>
						Contraseña: <input type = "pass_acceso" name = "" placeholder = "contraseña"/><br>
						<input type = "submit" name = "acceso_user_index" value = "Acceder"/>
						<input type = "reset" name = "reseteo_datos_index" value = "Borrar"/><br>
						<a href = "#">¿Has olvidado tu usuario o contraseña?</a><br><!--Enlace sin destino-->
						<a href = "registro.php">¿Eres nuevo? Registrate aquí</a><br>
					</div>
				</form>
			</div>
		</section>
		<!--Inclusión de archivos en la carpeta "secciones"-->
		<?php include 'secciones/footer.html';?>
	</body>
</html>
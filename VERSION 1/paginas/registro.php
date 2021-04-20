<!--MARTA PARRA SÁEZ
	EDUCALEGRE V1.0
	Versión inicial de nuestra aplicación de aula virtual.
	Página REGISTRO
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
		<section>
			<div>
				<form align = "center">
					<div border = "1">
						Tipo de usuario
						<select name = "tipo_usu_section_index">
							<option value = "tipo_usu_alumno_reg">Alumno</option>
							<option value = "tipo_usu_profesor_reg">Profesor</option>
						</select><br>
						Nombre: <input type = "text" name = "usu_reg"/><br>
						Apellidos: <input type = "text" name = "pass_reg"/><br>
						Nombre usuario: <input type = "text" name = "nom_usu_reg" placeholder = "nombre.apellidos@educalegre.com"/><br>
						Contraseña: <input type = "password" name = "pass_usu_reg" placeholder = "contraseña"/><br>
						Confirmar contraseña: <input type = "password" name = "pass_usu_reg_confir" placeholder = "contraseña"/><br>
						E-mail: <input type = "email" name = "email_usu_reg" placeholder = "usuario@gmail.com"/></br>
						<input type = "checkbox" name = "terms_usu_reg">Terminos y condiciones</input></br>
						<a href = "#">Leer terminos y condiciones de uso</a></br><!--Enlace sin destino-->
						<input type = "submit" name = "verifica_user_reg" value = "Verificar"/>	<!--Este boton valida toda la información-->
						<input type = "submit" name = "alta_user_reg" value = "Darse de alta"/>
						<input type = "reset" name = "reseteo_datos_reg" value = "Borrar"/><br>
					</div>
				</form>
			</div>
		</section>
		<!--Ancla provisional de regreso-->
		<a href = "index.php">Ir a la página de inicio</a>
		<!--Inclusión de archivos en la carpeta "secciones"-->
		<?php include 'secciones/footer.html';?>
	</body>
</html>
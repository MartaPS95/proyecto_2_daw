<!--MARTA PARRA SÁEZ
	EDUCALEGRE V1.0
	Versión inicial de nuestra aplicación de aula virtual.
	Página INDEX (INICIO)
!-->
<?php 
	$title = 'Educalegre Version Alpha';
	include 'secciones/header.php';
	include 'secciones/nav.html';
?>
	<body>
		<main>
			<section>	
				<h1 class="title is-1">Bienvenido a Educalegre</h1>			
				<form id = "forms" class="form_login" action = "php/acceso.php" method = "POST">
					<div class="field">
						<label class="label">Tipo de usuario</label>
						<div class="control">
							<div class="select is-rounded">
								<select name = "tipo_usu_section_index">
								<option value = "tipo_usu_alumno">Alumno</option>
								<option value = "tipo_usu_profesor">Profesor</option>
								</select>
							</div>
						</div>
					</div>
					<div class = "field">
						<label class = "label">Nombre usuario</label> 
						<input class = "input" type = "text" name = "usu_acceso" placeholder = "nombre de usuario"/><br>
					</div>
					<div class = "field">
						<label class = "label">Contraseña</label> 
						<input class = "input" type = "password" name = "usu_pass" placeholder = "contraseña"><br>
					</div>
					<div class = "field is-grouped">
						<input class = "button is-link" type = "submit" name = "acceso_user_index" value = "Acceder"/>
						<input class = "button is-link is-light" type = "reset" name = "reseteo_datos_index" value = "Borrar"/><br>
					</div>
					<a href = "#">¿Has olvidado tu usuario o contraseña?</a><br><!--Enlace sin destino-->
				</form>
			</section>
		</main>
		<!--Inclusión de archivos en la carpeta "secciones"-->
		<?php include 'secciones/footer.php';?>
	</body>
</html>
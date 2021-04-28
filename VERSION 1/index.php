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
				<div>
					<h1 class="title is-1">Bienvenido a Educalegre</h1>			
					<form class="form" action = "php/acceso.php" method = "POST">
						<div border = "1">
							Tipo de usuario
							<select name = "tipo_usu_section_index">
								<option value = "tipo_usu_alumno">Alumno</option>
								<option value = "tipo_usu_profesor">Profesor</option>
							</select><br>
							Nombre usuario: <input type = "text" name = "usu_acceso" placeholder = "nombre de usuario"/><br>
							Contraseña: <input type = "password" name = "usu_pass" placeholder = "contraseña"/><br>
							<input type = "submit" name = "acceso_user_index" value = "Acceder"/>
							<input type = "reset" name = "reseteo_datos_index" value = "Borrar"/><br>
							<a href = "#">¿Has olvidado tu usuario o contraseña?</a><br><!--Enlace sin destino-->
						</div>
					</form>
				</div>
			</section>
		</main>
		<!--Inclusión de archivos en la carpeta "secciones"-->
		<?php include 'secciones/footer.php';?>
	</body>
</html>
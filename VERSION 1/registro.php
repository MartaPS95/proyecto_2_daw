<!--MARTA PARRA SÁEZ
	EDUCALEGRE V1.0
	Versión inicial de nuestra aplicación de aula virtual.
	Página REGISTRO
	Modificaciones 26/04/2021 [Marta PS]
		-- Añadir action y method al formulario --: alta en bbdd con php INSERT
		-- Boton verificar --: validar con Js.
!-->
<?php 
$title = 'Educalegre Registro';
include 'secciones/header.php';
include 'secciones/nav.html';
?>
<!--Inclusión de archivos en la carpeta "secciones"-->
<main>
	<section>
		<h1 class="title is-1">Bienvenido a Educalegre</h1>
		<!--Añadimos la acción de formulario para verificar y dar de alta al usuario-->
		<!--Verificar con javascript y una ventana, dar de alta con php insertando en una base de datos-->
			<form class="form_reg" action = "php/alta_usuario.php" method = "POST">
				<div class="columns">
					<div class="column is-half">	<!--Primer mitad-->
						<div class="field">
							<label class="label">Tipo de usuario</label>
							<div class="control">
								<div class="select is-rounded">
									<select name="tipo_usu_section_reg">
										<option value = "tipo_usu_alumno_reg">Alumno</option>
										<option value = "tipo_usu_profesor_reg">Profesor</option>
									</select>
								</div>
							</div>
						</div>
						<div class = "field">
							<label class = "label">Nombre</label> 
							<input class = "input" type = "text" name = "nombre_reg" placeholder = "Tu nombre"/><br>
						</div>
						<div class = "field">
							<label class = "label">Apellidos</label> 
							<input class = "input" type = "text" name = "ape_reg" placeholder = "Tus apellidos"><br>
						</div>
						<div class = "field">
							<label class = "label">Correo</label> 
							<input class = "input" type = "email" name = "nom_usu_reg" placeholder = "usuario@gmail.com"/><br>
						</div>
					</div>
					<div class="column">	<!--Segunda mitad-->
						<div class = "field">
							<label class = "label">Nombre usuario</label> 
							<input class = "input" type = "text" name = "nom_usu_reg" placeholder = "nombre de usuario"/><br>
						</div>
						<div class = "field">
							<label class = "label">Contraseña</label> 
							<input class = "input" type = "password" name = "pass_reg" placeholder = "contraseña"><br>
						</div>
						<div class = "field">
							<label class = "label">Confirmar contraseña</label> 
							<input class = "input" type = "password" name = "pass_reg_confirm" placeholder = "contraseña"><br>
						</div>
						<div class="field">
							<div class="control">
								<label class="checkbox">
									<input type="checkbox">He aceptado los <a href="#">Términos y condiciones de uso</a>
								</label>
							</div>
						</div>
						<div class = "field is-grouped">
							<input class = "button is-link" type = "submit" name = "alta_user_reg" value = "Darse de alta"/>
							<input class = "button is-link is-light" type = "reset" name = "reseteo_datos_reg" value = "Borrar"/><br>
						</div>
					</div>
			</form>
		</div>
	</section>
</main>
	<!--Inclusión de archivos en la carpeta "secciones"-->
	<?php include 'secciones/footer.php';?>
	</body>
</html>
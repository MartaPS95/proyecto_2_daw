<!--MARTA PARRA SÁEZ
	Página REGISTRO (registro.php)
	Esta página aplica un formulario de registro de usuario. En este caso nos solicita tipo de usuario, nombre, apellidos, correo
	username, contraseña y confirmación de la misma, un checkbox de aceptación de terminos y condiciones de uso. Finalmente nuestro
	submit de alta que nos llevará a comprobar la información y registrar nuestro usuario en la base de datos si todo funciona como
	es debido.
!-->
<?php 
//Mostrar contenido de header y nav2
$title = 'Educalegre Registro';
include 'secciones/header.php';
include 'secciones/nav.html';
?>
<!--Etiqueta definida con bulma que establece el fondo de imagen de nuestra web, ubicado en estilos.css-->
<main>
	<section>
		<h1 class="title is-1">Bienvenido a Educalegre</h1>
		<!--Añadimos la acción de formulario para verificar y dar de alta al usuario-->
		<!--Verificar con javascript y una ventana, dar de alta con php insertando en una base de datos-->
		<form id="form_reg" class="box is-fluid" action="php/alta_usuario.php" method="POST">
			<div class="field">
				<label class="label">Tipo de usuario</label>
				<div class="control">
					<div class="select is-rounded">
						<select name="tipo_usu_section_reg">
							<option value="tipo_usu_alumno_reg">Alumno</option>
							<option value="tipo_usu_profesor_reg">Profesor</option>
						</select>
					</div>
				</div>
			</div>
			<div class="columns is-mobile">
				<!--Modificador in-mobile para que las columnas se muestren bien en móviles-->
				<div class="column is-half">
					<!--Primer mitad-->

					<div class="field">
						<label for="nombre_reg" class="label">Nombre</label>
						<input class="input" type="text" name="nombre_reg" id="nombre_reg" placeholder="Tu nombre" /><br>
					</div>
					<div class="field">
						<label for="ape1_reg" class="label">Primer apellido</label>
						<input class="input" type="text" name="ape1_reg" id="ape1_reg" placeholder="Tu primer apellido"><br>
					</div>
					<div class="field">
						<label for="ape2_reg" class="label">Segundo apellido</label>
						<input class="input" type="text" name="ape2_reg" id="ape2_reg" placeholder="Tu segundo apellido"><br>
					</div>
				
					<div class="field">
						<label for="pass_reg" class="label">Contraseña</label>
						<div class="control has-icons-right">
							<input class="input" type="password" name="pass_reg" id="pass_reg" placeholder="Contraseña">
							<span class="icon is-small is-right">
								<i class="fas fa-key"></i>
							</span>
						</div>
					</div>
				</div>
				<div class="column is-half">
					<!--Segunda mitad-->
					<div class="field">
						<label class="label">DNI</label>
						<div class="control has-icons-right">
							<input class="input" type="text" name="dni_reg" placeholder="DNI/NIE" />
							<span class="icon is-small is-right">
								<i class="fas fa-envelope"></i>
							</span>
						</div>
					</div>
				
					<div class="field">
						<label class="label">Correo</label>
						<div class="control has-icons-right">
							<input class="input" type="email" name="correo_reg" placeholder="usuario@educalegre.com" />
							<span class="icon is-small is-right">
								<i class="fas fa-envelope"></i>
							</span>
						</div>
					</div>
					<div class="field">
						<label class="label">Teléfono</label>
						<div class="control has-icons-right">
							<input class="input" type="text" name="tel_reg" placeholder="Fijo/móvil" />
							<span class="icon is-small is-right">
								<i class="fas fa-phone"></i>
							</span>
						</div>
					</div>
					<div class="field">
						<label for="pass_reg_confirm" class="label">Confirmar contraseña</label>
						<div class="control has-icons-right">
							<input class="input" type="password" name="pass_reg_confirm" id="pass_reg_confirm" placeholder="Contraseña">
							<span class="icon is-small is-right">
								<i class="fas fa-key"></i>
							</span>
						</div>
					</div>
				
				</div>
			</div>
			<div class="field">
						<div class="control">
							<label class="checkbox">
								<input type="checkbox">&nbsp;He aceptado los <a href="#">Términos y condiciones de
									uso</a>
							</label>
						</div>
					</div>
					<div class="field is-grouped">
						<input class="button is-link" type="submit" name="alta_user_reg" value="Darse de alta" />
						<input class="button is-link is-light" type="reset" name="reseteo_datos_reg" value="Borrar" /><br>
					</div>
		</form>
	</section>
</main>
<?php 
		//Mostrar contenido de footer
		include 'secciones/footer.php';
	?>
</body>

</html>
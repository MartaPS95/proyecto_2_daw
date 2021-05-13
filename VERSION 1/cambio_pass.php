<!--
	En caso de que nuestro usuario olvide la contraseña acceder a un enlace que
	le llevará a esta página donde se le pedirán unos datos para proceder al cambio
	de su contraseña [EN PRUEBAS, no es el objetivo inicial de esta página, ya que hay que tener
	en cuenta el olvido de un usuario]
-->
<?php
	$title = 'Cambio de contraseña';
	include 'secciones/header.php';
	include 'secciones/nav.html';
?>
	<body>
		<main>
			<section>	
				<h1 class="title is-1">Cambio de contraseña</h1>	
				<form id = "forms" class="form_pass_change" action = "php/actualizar_contraseña.php" method = "POST">
					<div class="field">
						<label class="label">Tipo de usuario</label>
						<div class="control">
							<div class="select is-rounded">
								<select name = "tipo_usu_cambio_pass">
								<option value = "tipo_alumno">Alumno</option>
								<option value = "tipo_profesor">Profesor</option>
								</select>
							</div>
						</div>
					</div>
					<div class = "field">
						<label class = "label">Nombre de usuario</label> 
						<input class = "input" type = "text" name = "nombre_usu" placeholder = "nombre de usuario"/><br>
					</div>
					<div class = "field">
						<label class = "label">Correo</label> 
						<input class = "input" type = "text" name = "correo_usu" placeholder = "usuario@educalegre.com"><br>
					</div>
					<div class = "field">
							<label class = "label"> Nueva contraseña</label> 
							<input class = "input" type = "password" name = "new_pass" placeholder = "contraseña"><br>
						</div>
						<div class = "field">
							<label class = "label">Confirmar contraseña</label> 
							<input class = "input" type = "password" name = "new_pass_confirm" placeholder = "contraseña"><br>
						</div>
					<div class = "field is-grouped">
						<!--Añadir un text area o mostrarlo después de escribir comentario de usuario cliente-->
						<input class = "button is-link" type = "submit" name = "cambiar_pass" value = "Cambiar contraseña">
						<input class = "button is-link is-light" type = "reset" name = "borrar_datos" value = "Borrar">
					</div>
				</form>
			</section>
		</main>
		<?php include 'secciones/footer.php';?>
	</body>
</html>
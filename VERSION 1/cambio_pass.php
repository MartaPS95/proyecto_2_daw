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
	<body class = "body">
		<main>
			<section>	
				<h1 class="title is-1">Cambio de contraseña</h1>	
				<form id = "form_pass_change" class="box" action = "php/actualizar_contraseña.php" method = "POST">
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
						<label class = "label">Correo</label> 
						<div class = "control has-icons-right">	
						<input id = "inputEmail" class = "input" type = "email" name = "correo_usu" placeholder = "usuario@educalegre.com" required>
						<span class="icon is-small is-right">
	                		<i id = "iconEmail" class="fas fa-envelope"></i>
	            		</span>
						</div>
					</div>
					<div class = "field">
						<label class = "label"> Nueva contraseña</label> 
						<div class = "control has-icons-right">	
							<input id = "inputPassIni" class = "input" type = "password" name = "new_pass" placeholder = "contraseña" required>
							<span class="icon is-small is-right">
		                		<i id = "iconPassIni" class="fas fa-key"></i>
		            		</span>
						</div>
					</div>
					<div class = "field">
						<label class = "label">Confirmar contraseña</label> 
						<div class = "control has-icons-right">	
						<input id = "inputPassConfirm" class = "input" type = "password" name = "new_pass_confirm" placeholder = "contraseña" required>
						<span class="icon is-small is-right">
	                		<i id = "iconPassConfirm" class="fas fa-key"></i>
	            		</span>
						</div>
					</div>
					<div class = "field is-grouped">
						<!--Añadir un text area o mostrarlo después de escribir comentario de usuario cliente-->
						<input class = "button is-link" type = "submit" name = "cambiar_pass" value = "Cambiar contraseña">
						&nbsp;&nbsp;&nbsp;
						<input class = "button is-link is-light" type = "reset" name = "borrar_datos" value = "Borrar">
					</div>
				</form>
			</section>
		</main>
		<?php include 'secciones/footer.php';?>
		<script src="js/validacion_cambio_contraseña.js" type="text/javascript" charset="utf-8"></script>
	</body>
</html>
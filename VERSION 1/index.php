<!--MARTA PARRA SÁEZ
	Página INICIO (index.php)
	Esta es la primera página que nos aparecerá por defecto al entrar a la web, nos muestra el menú de opciones y botones de registro y login
	en la sección de header y nav. A continuación se estructura el <section> con un mensaje de bienvenida y un formulario de acceso (login) 
	donde se pedirá a elegir tipo de usuario (alumno o profesor), username y contraseña, el submit "Acceder" comprobará si los datos existen
	en una base de datos y procederá en consecuencia. Además tenemos un ancla en caso de que el usuario no recuerde su propio username o bien
	su contraseña, llevándonos [EN PRUEBAS(a un formulario de cambio de contraseña o a mostrar en una ventana el usuario y contraseña asociados
	a su correo). Y por último el footer que mostrará la fecha actual.
!-->
<?php 
	//Mostrar contenido de header y nav
	$title = 'Educalegre Version Alpha';
	include 'secciones/header.php';
	include 'secciones/nav.html';
?>
	<body>
		<!--Etiqueta definida con bulma que establece el fondo de imagen de nuestra web, ubicado en estilos.css-->
		<main>
			<section class = "section">	
				<h1 class="title is-1">Bienvenido a Educalegre</h1>			
				<!--Formulario de login-->
				<form id = "form_login" class="box" action = "php/acceso.php" method = "POST">
					<div class="field">
						<!--Selección del usuario que somos: profesor o alumno-->
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
					<!--Campos a rellenar: username y contraseña-->
					<div class = "field">
						<label class = "label">Correo de usuario</label> 
						<div class = "control has-icons-right">
							<input class = "input" type = "text" name = "correo_usu_acceso" placeholder = "correo@educalegre.com"/>
							<span class="icon is-small is-right">
		                		<i class="fas fa-envelope"></i>
		            		</span>
						</div>
					</div>
					<div class = "field">
						<label class = "label">Contraseña</label> 
						<div class = "control has-icons-right">
							<input class = "input" type = "password" name = "usu_pass" placeholder = "contraseña">
							<span class="icon is-small is-right">
		                		<i class="fas fa-key"></i>
		            		</span>
						</div>
					</div>
					<div class = "field is-grouped">
						<!--Se aplica un submit que nos lleva a acceso.php donde se verificará la información-->
						<input class = "button is-link" type = "submit" name = "acceso_user_index" value = "Acceder"/>
						&nbsp;&nbsp;&nbsp;
						<input class = "button is-link is-light" type = "reset" name = "reseteo_datos_index" value = "Borrar"/><br>
					</div>
					<!--Permite al usuario gestionar su contraseña o usuario mediante un formulario al que nos lleva el link cambio_pass[EN PRUEBAS]-->
					<a href = "cambio_pass.php">¿Has olvidado tu contraseña?</a><br><!--Enlace sin destino-->
				</form>
			</section>
		</main>
		<?php 
			//Mostrar contenido de footer
			include 'secciones/footer.php';
		?>
	</body>
</html>
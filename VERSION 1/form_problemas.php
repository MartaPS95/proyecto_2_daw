<!--MARTA PARRA SÁEZ
	EDUCALEGRE V1.0
	Versión inicial de nuestra aplicación de aula virtual.
	FORMULARIO DE INFORME DE PROBLEMAS
	Suponiendo que el usuario del tipo que sea vea que algo no funciona bien en la web, podrá generar una "incidencia" para informar
	a soporte, que es el grupo de personas que se encarga del mantenimiento de la misma.
!-->
<?php 
	//Mostrar contenido de header y nav
	$title = 'Informar de un problema';
	include 'secciones/header.php';
	include 'secciones/nav.html';
?>
	<body class = "body">
		<main>
			<section>	
				<h1 class="title is-1">INFORME DE UN PROBLEMA</h1>			
				<form id = "form_issues" class="box" action = "mantenimiento.php" method = "POST">
					<div class = "field">
						<label class = "label">Contactar con</label>
						<div class = "control">
							<div class = "select is-rounded">
								<select name = "tipo_contacto">
									<option value = "tipo_contacto_soporte">Soporte(soporteweb@educalegre.com)</option>
									<option value = "tipo_contacto_admin">Administrador(adminweb@educalegre.com)</option>
								</select>
							</div>
						</div>
					</div>
					<div class = "field">
						<label class = "label">Nombre</label>
						<input class = "input" type = "text" name = "nom_usu_contacto" placeholder = "Tu nombre"></br>
					</div>
					<div class = "field">
						<label class = "label">Primer apellido</label>
						<input class = "input" type = "text" name = "ape1_contacto" placeholder = "Primer apellido"></br>
					</div>
					<div class = "field">
						<label class = "label">Segundo apellido</label>
						<input class = "input" type = "text" name = "ape2_contacto" placeholder = "Segundo apellido"></br>
					</div>
					<div class = "field">
						<label class = "label">Correo</label>
							<div class = "control has-icons-right">	
							<input class = "input" type = "text" name = "email_usu_contacto" placeholder = "correo@educalegre.com">
							<span class="icon is-small is-right">
		                		<i class="fas fa-envelope"></i>
		            		</span>
						</div>
					</div>
					<div class = "field is-grouped">
						<!--Añadir un text area o mostrarlo después de escribir comentario de usuario cliente-->
						<input class = "button is-link" type = "submit" name = "enviar_comentario" value = "Iniciar consulta">
						&nbsp;&nbsp;&nbsp;
						<input class = "button is-link is-light" type = "reset" name = "borrar_info_contacto" value = "Borrar">
					</div>
				</form>
			</section>
		</main>
		<?php include 'secciones/footer.php';?>
	</body>
</html>
<!--MARTA PARRA SÁEZ
	EDUCALEGRE V1.0
	Versión inicial de nuestra aplicación de aula virtual.
	FORMULARIO DE CONTACTO
	En este formulario se da la posibilidad a los usuarios de realizar cualquier tipo de consulta, en principio iría dirigido al 
	equipo de desarrollo, que resolverá cualquier duda en el manejo de la página [En pruebas]. Para realizar la consulta se pide
	nombre, correo y un comentario donde exprese el usuario sus dudas, no se pide un username ya que la página esta abierta a la 
	posibilidad de que cualquiera pueda entrar, por ejemplo, mientras no tenga un usuario registrado.
!-->
<?php 
	//Mostrar contenido de header y nav
	$title = 'Formulario de contacto';
	include 'secciones/header.php';
	include 'secciones/nav.html';
?>
	<body>
		<!--Etiqueta definida con bulma que establece el fondo de imagen de nuestra web, ubicado en estilos.css-->
		<main>
			<section>	
				<h1 class="title is-1">Contacto online</h1>			
				<form id = "forms" class="form_contact">
					<div class = "field">
						<label class = "label">Nombre</label>
						<input class = "input" type = "text" name = "nom_usu_contacto"></br>
					</div>
					<div class = "field">
						<label class = "label">Correo</label>
						<input class = "input" type = "text" name = "email_usu_contacto"></br>
					</div>
					<div>
						<!--En este textarea el usuario podrá escribir su consulta-->
						<label class = "label">Consulta</label>
						<textarea class="textarea" placeholder="Escriba aquí su consulta"></textarea>
					</div>
					<div class = "field">
						<!--Teléfono de contacto [IMAGINARIO]-->
						<label class = "label">Teléfono de contacto: 11111-11111</label>
					</div>
					<div class = "field is-grouped">
						<input class = "button is-link" type = "submit" name = "enviar_comentario" value = "Iniciar consulta">
						<input class = "button is-link is-light" type = "reset" name = "borrar_info_contacto" value = "Borrar">
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
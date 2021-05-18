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
				<form id = "form_contact" class="box">
					<div class="field">
						<label class="label" for="name">Nombre</label>
						<div class="control has-icons-right">
				            <input class="input needs-validation inputNameField" type="text" name="nom_usu_contacto" placeholder="Tu nombre" value="" id='inputName' />
					    </div>
					</div>
					<div class = "field">
						<label class = "label">Correo</label>
						<div class="control has-icons-right">
							<input class = "input needs-validation inputEmailField" type = "text" name = "email_usu_contacto" id='inputEmailField'>
							<span class="icon is-small is-right">
				                <i class="fas fa-envelope"></i>
				            </span>
				        </div>
				        <p id="emailActionHint" class="help is-danger nezobrazovat">Introduce una dirección de correo válida</p>
					</div>
					<div>
						<!--En este textarea el usuario podrá escribir su consulta-->
						<label class = "label">Consulta</label>
						<textarea class="textarea" placeholder="Escriba aquí su consulta"></textarea>
					</div>
					<div class = "field">
						<!--Teléfono de contacto [IMAGINARIO]-->
						<span class = "icon is-large is-left">
        					<i class = "fas fa-phone"></i>
        				</span>
        				111 111 111 
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
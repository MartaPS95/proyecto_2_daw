<!--MARTA PARRA SÁEZ
	EDUCALEGRE V1.0
	Versión inicial de nuestra aplicación de aula virtual.
	Página INDEX (INICIO)
!-->
<?php 
	$title = 'Formulario de contacto';
	include 'secciones/header.php';
	include 'secciones/nav.html';
?>
	<body>
		<main>
			<section>	
				<h1 class="title is-1">Contacto online</h1>			
				<form class="form_contact">
					<div class = "field">
						<label class = "label">Nombre</label>
						<input class = "input" type = "text" name = "nom_usu_contacto"></br>
					</div>
					<div class = "field">
						<label class = "label">Correo</label>
						<input class = "input" type = "text" name = "email_usu_contacto"></br>
					</div>
					<div>
						<label class = "label">Consulta</label>
						<textarea class="textarea" placeholder="Escriba aquí su consulta"></textarea>
					</div>
					<div class = "field">
						<label class = "label">Teléfono de contacto: 11111-11111</label>
					</div>
					<div class = "field is-grouped">
						<!--Añadir un text area o mostrarlo después de escribir comentario de usuario cliente-->
						<input class = "button is-link" type = "submit" name = "enviar_comentario" value = "Iniciar consulta">
						<input class = "button is-link is-light" type = "reset" name = "borrar_info_contacto" value = "Borrar">
					</div>
				</form>
			</section>
		</main>
		<?php include 'secciones/footer.php';?>
	</body>
</html>
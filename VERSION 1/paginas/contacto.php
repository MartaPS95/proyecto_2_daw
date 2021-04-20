<!--
	MARTA PARRA SÁEZ
	Aquí se podría hacer un pop up o una ventana en una nueva pestaña
	Asegurarnos de volver a la última página que estabamos
-->
<html>
	<head>
		<title>Formulario de contacto</title>
	</head>
	<body>
		<form>
			<p>Contacto online</p>
			Nombre: <input type = "text" name = "nom_usu_contacto"></br>
			Correo: <input type = "text" name = "email_usu_contacto"></br> <!--O pornerlo de tipo email para validación-->
			Contactar con
				<select name = "tipo_contacto">
					<option value = "tipo_contacto_soporte">Soporte</option>
					<option value = "tipo_contacto_consulta">Consultas</option>
					<option value = "tipo_contacto_admin">Administrador</option>
				</select><br>
			<p>Teléfono de contacto: 11111-11111</p><!--Incluir icono de teléfono-->
			<!--Añadir un text area o mostrarlo después de escribir comentario de usuario cliente-->
			<input type = "submit" name = "enviar_comentario" value = "Iniciar consulta">
			<input type = "reset" name = "borrar_info_contacto" value = "Borrar"></br>
			<a href = "index.php">Volver a inicio</a><!--Provisional-->
		</form>
	</body>
</html>
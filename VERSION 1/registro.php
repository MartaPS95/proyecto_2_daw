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
			<form class="form" action = "php/alta_usuario.php" method = "POST">
				<div border = "1">
					Tipo de usuario
					<select name="tipo_usu_section_reg">
						<option value="tipo_usu_alumno_reg">Alumno</option>
						<option value="tipo_usu_profesor_reg">Profesor</option>
					</select><br>
					Nombre: <input type="text" name="usu_reg" /><br>
					Apellidos: <input type="text" name="pass_reg" /><br>
					Nombre usuario: <input type="text" name="nom_usu_reg" placeholder="nombre.apellidos@educalegre.com" /><br>
					Contraseña: <input type="password" name="pass_usu_reg" placeholder="contraseña" /><br>
					Confirmar contraseña: <input type="password" name="pass_usu_reg_confir" placeholder="contraseña" /><br>
					E-mail: <input type="email" name="email_usu_reg" placeholder="usuario@gmail.com" /></br>
					<input type="checkbox" name="terms_usu_reg">Terminos y condiciones</input></br>
					<a href="#">Leer terminos y condiciones de uso</a></br>
					<input type="submit" name="alta_user_reg" value="Darse de alta" />
					<input type="reset" name="reseteo_datos_reg" value="Borrar" /><br>
				</div>
			</form>
		</div>
	</section>
</main>
	<!--Inclusión de archivos en la carpeta "secciones"-->
	<?php include 'secciones/footer.php';?>
	</body>
</html>
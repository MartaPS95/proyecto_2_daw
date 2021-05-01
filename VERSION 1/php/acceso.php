<?php
	$title = 'Educalegre Version Alpha';
	include '../secciones/header.php';
	include '../secciones/nav_usuarios.html';
	$tipo_usu = $_POST['tipo_usu_section_index'];
	//Si se ha pulsado el botón de acceso (no se han comprobado datos aún)
	//Sólo prueba de acceso a esta página
	if(@$_POST['acceso_user_index'] == "Acceder")
	{
?>
	<body>
		<main>
			<section>	
<?php 	if($tipo_usu == "tipo_usu_alumno")	echo "Hola alumno";
	 	else echo "Hola profesor";
?>
			</section>
		</main>
<?php
	}
	include '../secciones/footer.php';
?>
	</body>
</html>
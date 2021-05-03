<?php
	$_SESSION['nom_usu'] = $_POST['usu_acceso'];//Guardamos en una variable de sesión el nombre del usuario(sea alumno o profesor)
	$title = 'Educalegre Acceso';
	$tipo_usu = $_POST['tipo_usu_section_index'];
	//Si se ha pulsado el botón de acceso (no se han comprobado datos aún)
	//Sólo prueba de acceso a esta página
	if(@$_POST['acceso_user_index'] == "Acceder")
	{
?>
	<body>
		<main>
			<section>	
<?php 	if($tipo_usu == "tipo_usu_alumno")
		{
			//Nos manda directamente a alumnos.php (aun no se tiene en cuenta si lo ha localicado en la bbdd)
			$_SESSION['nom_alum'] = $_SESSION['nom_usu']; 
			Header("Location:../alumnos.php"); 
	 	}
	 	if($tipo_usu == "tipo_usu_profesor") 
	 	{
	 		$_SESSION['nom_prof'] = $_SESSION['nom_usu']; 
	 		Header("Location:../profesores.php");
	 	}
?>
			</section>
		</main>
<?php
	}
	include '../secciones/footer.php';
?>
	</body>
</html>
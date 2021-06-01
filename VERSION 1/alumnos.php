<!--MARTA PARRA SÁEZ
	EDUCALEGRE V1.0
	Versión inicial de nuestra aplicación de aula virtual.
	Página INDEX (INICIO)
!-->
<?php
	$title = 'Educalegre Alumnos';
	include 'secciones/header.php';

	include 'secciones/nav_usuarios.php';
?>
	<body class = "body">
		<main>
			<section class = "section">
				<?php
					include 'secciones/aside_alumno.php';
					?>

					<div class = "container is-fluid">
						<div class="container is-fluid is-max-desktop">
							<div class="notification is-primary is-link">
								Bienvenido <strong><?php echo $nombre . " " . $apellidos;?></strong>
							</div>
						</div>
					</div>

			</section>
		</main>
		<?php include 'secciones/footer.php';?>
	</body>
</html>

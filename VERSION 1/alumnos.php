<!--MARTA PARRA SÁEZ
	EDUCALEGRE V1.0
	Versión inicial de nuestra aplicación de aula virtual.
	Página INDEX (INICIO)
!-->
<?php 
	$title = 'Educalegre Alumnos';
	//Header para la página de alumnos
	include 'secciones/header.php';
	include 'secciones/nav_usuarios.php';
?>	
		<div class="logged">
			<aside>
				<ul>
					<li>Inicio</li>
					<li>Calendario</li>
					<li>Tareas</li>
					<li>Examenes</li>
				</ul>
			</aside>
			<main>
				<section class = "section">
					<div class = "box is-fluid">
						<div class = "container is-fluid">
							<div class="container is-fluid is-max-desktop">
								<div class="notification is-primary is-link">
									Bienvenido <strong><?php echo $nombre . " " . $apellidos;?></strong>
								</div>
								<div class="notification is-primary is-link">
									This container is <strong>centered</strong> on desktop and larger viewports.
								</div>
								<div class="notification is-primary is-link">
									This container is <strong>centered</strong> on desktop and larger viewports.
								</div>
							</div>
						</div>
					</div>
				</section>
			</main>
		</div>
		<?php include 'secciones/footer.php';?>
	</body>
</html>
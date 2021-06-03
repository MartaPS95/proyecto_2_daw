<!--MARTA PARRA SÁEZ
	EDUCALEGRE V1.0
	Versión inicial de nuestra aplicación de aula virtual.
	Página INDEX (INICIO)
!-->
<?php
$title = 'Educalegre Profesores';
	//Header para la página de alumnos
	include 'secciones/header.php';
	include 'secciones/nav_usuarios.php';
	$nombre = $_SESSION['nombre'];
    $apellidos = $_SESSION['apellidos'];
		$email = $_SESSION['email'];
		$usuario = $_SESSION['nombre'].' '.$_SESSION['apellidos'];

		if(isset($_REQUEST['e'])){
		  $tabla='clase';
		  $con=mysqli_connect("localhost","root","","educalegre_pruebas") or die("Problemas con la conexión a la base de datos");
		  $query = "DELETE FROM ".$tabla." WHERE idclase=" .$_REQUEST['e'];
		  $ejecutar= mysqli_query ($con, $query) or die ("Problema con query");
		}
?>
	<body class = "body">
		<main>
			<section class = "section">
				<?php
	        include 'secciones/aside_profesor.php';
	        ?>
					<div class = "container is-fluid">
						<h1>	Bienvenido <strong><?php echo $nombre . " " . $apellidos;?></strong></h1>

							<div class="notification ">
								<?php
								$tabla='clase';
								$con2=mysqli_connect("localhost","root","","educalegre_pruebas") or die("Problemas con la conexión a la base de datos");
								$query2 = "SELECT * FROM " .$tabla. " WHERE usuario='". $email ."'";
								$clases= mysqli_query ($con2, $query2) or die ("Problema con query");

											echo "<HTML><TABLE Border=10 CellPadding=5 style='margin-left: auto; margin-right: auto; font-size:22px' class = 'table is-bordered'><TR>";

											echo "<th bgcolor=Green>NOMBRE</th><th bgcolor=Red>CLAVE</th><th bgcolor=lightblue>ELIMINAR LA CLASE</th><th bgcolor=darkorange>PLANIFICACIÓN</th></TR>";

										$vezes = 0;
										while($renglon = mysqli_fetch_row($clases))
										{

											echo"<tr>";

											echo "<td align='center' >".$renglon[1]."</td>";
											echo "<td align='center'>".$renglon[2]."</td>";
											echo "<td align='center'><a class='button is-link is-outlined' href='crearclase.php?e=".$renglon[0]."'>Eliminar</a></td>";
											echo "<td align='center'><a class='button is-link is-outlined' href='planificacion.php?clave=".$renglon[2]."'>Ver</a></td>";

											echo"</tr>";
											$vezes++;

									}
									if ($vezes == 0)
												echo "<td colspan='3' align='center'> No existe ningún registro en la tabla </td>";

								?>
						</table>
							</div>


						</div>
						</div>
					</div>

			</section>
		</main>
		<?php include 'secciones/footer.php';?>
	</body>
</html>

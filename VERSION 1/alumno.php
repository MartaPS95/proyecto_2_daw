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
	//Incluimos la configuración de la base de datos
	include_once 'config/conexion.php';
	include_once 'php/lib.php';
	if(isset($_REQUEST['e']))
	{
		$tabla2="misclases";
		$con2=mysqli_connect("localhost","root","","educalegre_pruebas") or die("Problemas con la conexión a la base de datos");
		$query3 = "DELETE FROM ".$tabla2." WHERE id=" .$_REQUEST['e'];
		$ejecutar= mysqli_query ($con2, $query3) or die ("Problema con query");
	}
?>	
	<body class = "body">
		<div class="logged">
			<?php include 'secciones/aside_alumno.php'?>
			<main>
				<section class = "section">
					<div class = "box is-fluid">
						<h1>Bienvenido <strong><?php echo $nombre_completo;?></strong></h1>
						<div class="container is-fluid is-max-desktop">
							<?php
								$tabla='clase';
								$tabla2='misclases';
								//$con3=mysqli_connect("localhost","root","","educalegre_pruebas") or die("Problemas con la conexión a la base de datos");
								$query4 = "SELECT " . $tabla. ".nombre,". $tabla2 .".id, " . $tabla. ".clave FROM " . $tabla. ", " . $tabla2 . " WHERE clase.clave=misclases.clave AND misclases.usuario='". $email ."'";
								$clases2= mysqli_query ($con, $query4) or die ("Problema con query");

								echo "<HTML><TABLE Border=10 CellPadding=5 style='margin-left: auto; margin-right: auto; font-size:22px' class = 'table is-bordered'><TR>";
								echo "<th bgcolor=Green>NOMBRE</th><th bgcolor=lightblue>ELIMINAR LA CLASE</th><th bgcolor=darkorange>ACTIVIDADES</th></TR>";

								$vezes = 0;
								while($renglon = mysqli_fetch_row($clases2))
								{

									echo"<tr>";

									echo "<td align='center'>".$renglon[0]."</td>";

									echo "<td align='center'><a class='button is-link is-outlined' href='unirseclase.php?e=".$renglon[1]."'>Eliminar</a></td>";
									echo "<td align='center'><a class='button is-link is-outlined' href='verplanificacion.php?clave=".$renglon[2]."'>Ver</a></td>";

									echo"</tr>";
									$vezes++;

								}
								if ($vezes == 0)
									echo "<td colspan='3' align='center'> No existe ningún registro en la tabla </td>";
									echo"</table>";
								?>
						</div>
					</div>
				</section>
			</main>
		</div>
		<?php include 'secciones/footer.php';?>
	</body>
</html>
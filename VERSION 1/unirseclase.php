<?php
	$title = 'Educalegre Alumnos';
	//Header para la página de alumnos
	//include ('profesores.php');
	include 'secciones/header.php';
	include 'secciones/nav_usuarios.php';
	include_once 'config/conexion.php';
	/*
	$nombre = @$_SESSION['nombre'];
	$apellidos = @$_SESSION['apellidos'];
	$email = @$_SESSION['email'];
	$usuario = @$_SESSION['nombre'] . ' ' . @$_SESSION['apellidos'];*/
	if(isset($_REQUEST['submit']))
	{
		if(isset($_REQUEST['clave']))
		{
			$tabla="clase";
			$tabla2="misclases";
			$clave=$_REQUEST['clave'];
			//$n=mysqli_num_rows(mysqli_query());
			//$con=mysqli_connect("localhost","root","","educalegre_pruebas") or die("Problemas con la conexión a la base de datos");
			$query = "SELECT * FROM ". $tabla ." WHERE clave=\"" . $_REQUEST['clave'] . "\"";
			$a=mysqli_query($con, $query) or die ("Problema con query");
			$n=mysqli_num_rows($a);
			if($n>0)
			{
				$querycomprueba = "SELECT * FROM ". $tabla2 ." WHERE clave=\"" . $_REQUEST['clave'] . "\" AND usuario=\"" . $email . "\"";
				$ac=mysqli_query($con, $querycomprueba) or die ("Problema con query");
				$nc=mysqli_num_rows($ac);
				if($nc==0)
				{
					$query2 = "INSERT INTO ". $tabla2 ."(usuario ,clave) VALUES(\"" . $email . "\", \"" . $clave . "\")";
					$a=mysqli_query($con, $query2) or die ("Problema con query");
				}
				else
					echo "<script> alert('Ya te uniste a esa clase'); </script>";
			}
			else
				echo "<script> alert('La clase no existe'); </script>";
		}
	}
	if(isset($_REQUEST['e']))
	{
		$tabla2="misclases";
		//$con2=mysqli_connect("localhost","root","","educalegre_pruebas") or die("Problemas con la conexión a la base de datos");
		$query3 = "DELETE FROM ".$tabla2." WHERE id=" .$_REQUEST['e'];
		$ejecutar= mysqli_query ($con, $query3) or die ("Problema con query");
	}
?>
	<body class = "body">
		<div class = "logged">
			<?php include 'secciones/aside_alumno.php';?>
			<main>
				<section class = "section">
						<div class = "container is-fluid" >
							<h1><strong>Mis Clases</strong></h1>
							<div class="notification">
								<form action="unirseclase.php" method="POST">
									<div class="control">
										<input type="text" class="input" name="clave" placeholder="Clave de la Clase" required>
										<input type="hidden" name="tabla" value="clase">
									</div><br>
									<div class="control">
										<input type="submit" name ="submit" class="button is-success" value="unirse">
									</div>
								</form>
								<hr>
								<?php
									$tabla='clase';
									$tabla2='misclases';
									//$con3=mysqli_connect("localhost","root","","educalegre_pruebas") or die("Problemas con la conexión a la base de datos");
									$query4 = "SELECT " . $tabla. ".nombre,". $tabla2 .".id, " . $tabla. ".clave FROM " . $tabla. ", " . $tabla2 . " WHERE clase.clave=misclases.clave AND misclases.usuario='". $email ."'";
									$clases2= mysqli_query ($con, $query4) or die ("Problema con query");
									echo "<HTML><TABLE Border=10 CellPadding=5 style='margin-left: auto; margin-right: auto; font-size:22px' class = 'table is-bordered'><TR>";
									echo "<th bgcolor=Green>NOMBRE</th><th bgcolor=lightblue>ELIMINAR LA CLASE</th><th bgcolor=darkorange>PLANIFICACIÓN</th></TR>";
									$vezes = 0;
									while($renglon = mysqli_fetch_row($clases2))
									{
										echo"<tr>";
										echo "<td align='center'>".$renglon[0]."</td>";
										echo "<td align='center'><a class='button is-danger is-outlined' href='unirseclase.php?e=".$renglon[1]."'>Eliminar</a></td>";
										echo "<td align='center'><a class='button is-link is-outlined' href='verplanificacion.php?clave=".$renglon[2]."'>Ver</a></td>";
										echo"</tr>";
										$vezes++;
									}
									if ($vezes == 0)
										echo "<tr><td colspan='3' align='center'> No existe ningún registro en la tabla </td></tr>";
								?>
								</table>
								<br>
								<a class="button is-link" href='alumno.php'>Volver</a>
							</div>
						</div>
					</div>
				</section>
			</main>
		</div>
		<?php include 'secciones/footer.php';?>
	</body>
</html>

<!--MARTA PARRA SÁEZ
	EDUCALEGRE V1.0
	Versión inicial de nuestra aplicación de aula virtual.
	Esta página muestra la sesión de un profesor, las variables de sesión se incluyen en el archivo nav_usuarios.php
	Las conexiones se realizan a una base de datos "Educalegre.sql" y se adaptan los estilos para el sidebar y los
	accesos de links a los archivos correspondientes. LAS CORRECCIONES VIENEN DESCRITAS EN COMENTARIOS
!-->
<?php
	$title = 'Educalegre Profesores';
	//Header para la página de alumnos
	include 'secciones/header.php';
	include 'secciones/nav_usuarios.php';
	//Incluimos la conexión a la base de datos "Educalegre"
	include 'config/conexion.php';
	/*TODOS ESTOS DATOS ESTÁN INCLUIDOS Y GUARDADOS EN NAV USUARIOS*/
	/*$nombre = $_SESSION['nombre'];
    $apellidos = $_SESSION['apellidos'];
		$email = $_SESSION['email'];
		$usuario = $_SESSION['nombre'].' '.$_SESSION['apellidos'];*/

		if(isset($_REQUEST['e'])){
		  $tabla='clase';
		  /*CONEXIÓN YA CONFIGURADA EN CONFIG/conexion.php*/
		  //$con=mysqli_connect("localhost","root","","educalegre_pruebas") or die("Problemas con la conexión a la base de datos");
		  $query = "DELETE FROM ".$tabla." WHERE id_clase=" .$_REQUEST['e'];
		  $ejecutar= mysqli_query ($con, $query) or die ("Problema con query");
		}
?>
<!--Correcciones de estilos en el sidebar y en las conexiones de bases de datos y en los links a archivos-->
	<body class = "body">
		<!--Añadir clase logged para el sidebar-->
		<div class = "logged">
			<?php include 'secciones/aside_profesor.php';?>
			<main>
				<section class = "section">
					<div class = "container is-fluid">
						<!--La variable $nombre_completo se asocia a la variable de sesion $_SESSION['nombre_completo'] en nav_usuarios.php-->
						<h1>Bienvenido <strong><?php echo $nombre_completo;?></strong></h1>
						<div class="notification ">
							<?php
								$tabla='clase';
								//$con2=mysqli_connect("localhost","root","","educalegre_pruebas") or die("Problemas con la conexión a la base de datos");
								$query2 = "SELECT * FROM " .$tabla. " WHERE usuario='". $email ."'";
								/*Corrección de conexión a base de datos*/
								$clases= mysqli_query ($con, $query2) or die ("Problema con query");
								//Mostrar una tabla con los registros y de clases creadas por el profesor
								echo "<HTML><TABLE Border=10 CellPadding=5 style='margin-left: auto; margin-right: auto; font-size:22px' class = 'table is-bordered'><TR>";
								echo "<th bgcolor=Green>NOMBRE</th><th bgcolor=Red>CLAVE</th><th bgcolor=lightblue>ELIMINAR LA CLASE</th><th bgcolor=darkorange>PLANIFICACIÓN</th></TR>";
								$vezes = 0;
								while($renglon = mysqli_fetch_row($clases))
								{
									echo"<tr>";
									echo "<td align='center' >".$renglon[1]."</td>";
									echo "<td align='center'>".$renglon[2]."</td>";
									//Correción para acceder al archivo profesor.php
									echo "<td align='center'><a class='button is-danger is-outlined' href='profesor.php?e=".$renglon[0]."'>Eliminar</a></td>";
									echo "<td align='center'><a class='button is-link is-outlined' href='planificacion.php?clave=".$renglon[2]."'>Ver</a></td>";
									echo"</tr>";
									$vezes++;
								}
								if ($vezes == 0)
									echo "<tr><td colspan='3' align='center'> No existe ningún registro en la tabla </td></tr>";
								echo "</table>";	//Cierre de tabla dinámico
							?>
						</div>
					</div>
				</section>
			</main>
		</div>
		<?php include 'secciones/footer.php';?>
	</body>
</html>

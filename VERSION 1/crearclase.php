<?php
$title = 'Educalegre Profesores';

	//Header para la página de alumnos
  //include ('profesores.php');
	include 'secciones/header.php';
	include 'secciones/nav_usuarios.php';
	$nombre = $_SESSION['nombre'];
  $apellidos = $_SESSION['apellidos'];
  $email = $_SESSION['email'];
  $usuario = $_SESSION['nombre'].' '.$_SESSION['apellidos'];
  if(isset($_REQUEST['submit'])){
  if(isset($_REQUEST['clase'])){
    $tabla=$_REQUEST['tabla'];
    $n=$_REQUEST['clase'];

    $str="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    $cad="";
    for($i=0;$i<11;$i++){
      $cad .= substr($str,rand(0,62),1);
    }
    $con=mysqli_connect("localhost","root","","educalegre_pruebas") or die("Problemas con la conexión a la base de datos");
    $query = "INSERT INTO ". $tabla ."(nombre, clave, usuario) VALUES(\"" . $n . "\", \"" . $cad . "\", \"" . $email . "\")";
		mysqli_query ($con, $query) or die ("Problema con query");
  }
}
if(isset($_REQUEST['e'])){
  $tabla='clase';
  $con=mysqli_connect("localhost","root","","educalegre_pruebas") or die("Problemas con la conexión a la base de datos");
  $query = "DELETE FROM ".$tabla." WHERE idclase=" .$_REQUEST['e'];
  $ejecutar= mysqli_query ($con, $query) or die ("Problema con query");
}
?>
<!DOCTYPE html>
<html lang='es'>
<body class = "body">
  <main>
    <section class = "section">
			<?php
				include 'secciones/aside_profesor.php';
				?>

        <div class = "container is-fluid">
					  <h1>Gestión de clases</h1>
          <div class="notification">
      <form action="crearclase.php" method="POST">
         <div class="control">
          <input type="text" class="input" name="clase"placeholder="Nombre de la Clase" required>
          <input type="hidden" name="tabla" value="clase">
        </div><br>
        <div class="control">
          <input type="submit" name ="submit" class="button is-success" value="Crear">
          </div>
          </form>
          <hr>

              <?php
              $tabla='clase';
              $con2=mysqli_connect("localhost","root","","educalegre_pruebas") or die("Problemas con la conexión a la base de datos");
              $query2 = "SELECT * FROM " .$tabla. " WHERE usuario='". $email ."'";
              $clases= mysqli_query ($con2, $query2) or die ("Problema con query");

										echo "<HTML><TABLE Border=10 CellPadding=5><TR>";

										echo "<th bgcolor=Green>NOMBRE</th><th bgcolor=Red>CLAVE</th><th bgcolor=lightblue>ELIMINAR LA CLASE</th><th bgcolor=darkorange>PLANIFICACIÓN</th></TR>";

								  $vezes = 0;
								  while($renglon = mysqli_fetch_row($clases))
								  {

								    echo"<tr>";

								    echo "<td>".$renglon[1]."</td>";
								    echo "<td>".$renglon[2]."</td>";
								    echo "<td><a href='crearclase.php?e=".$renglon[0]."'>Eliminar</a></td>";
										echo "<td><a href='planificacion.php?clave=".$renglon[2]."'>Ver</a></td>";

								    echo"</tr>";
								    $vezes++;

								}
								if ($vezes == 0)
											echo "<td colspan='3'> No existe ningún registro en la tabla </td>";

              ?>
          </table>
          <br>
          <a class="button is-link" href='profesores.php'>Volver</a>
        </div>

</div>
  </div>

    </section>
  </main>
  <?php include 'secciones/footer.php';?>
</body>
</html>

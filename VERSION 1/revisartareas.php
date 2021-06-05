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
  $tabla="planificacion";
  $con=mysqli_connect("localhost","root","","educalegre_pruebas") or die("Problemas con la conexión a la base de datos");

if(isset($_REQUEST['e'])){
  $queryelimina = "DELETE FROM ".$tabla." WHERE id=" .$_REQUEST['e'];
  $ejecutar= mysqli_query ($con, $queryelimina) or die ("Problema con query");
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
					  <h1><strong>Revisar Entregas</strong></h1>
					<div class="notification">


          <?php


           $queryplan = "SELECT * FROM ". $tabla ." WHERE usuario=\"" . $email . "\"";
           $consulta=mysqli_query($con, $queryplan) or die ("Problema con query");
           $filas=mysqli_num_rows($consulta);



						$vezes = 0;
						while($renglon = mysqli_fetch_array($consulta))
						{

						echo "<br>";
						echo " <div class='box is-fluid'>";
						echo "<h1 style='text-align: left;'><strong>".$renglon['titulo']."</strong></h1>";
						echo "<strong><p>Descripción: ".$renglon['texto']."</p></strong>";
						echo "<p>Fecha de publicación: ".$renglon['fecha']."</p>";
						echo "<p style='color: red;'>Fecha final de entrega: ".$renglon['fechaentrega']."</p>";
						echo "<hr>";
						echo "<a class='button is-primary' href='verentregas.php?tarea=".$renglon['id']."'>Revisar entregas</a>&nbsp;&nbsp;";
						echo "<a class='button is-danger' href='revisartareas.php?e=".$renglon['id']."'>Eliminar tarea</a>";
						echo "</div>";

						$vezes++;

						}
						if ($vezes == 0)
						  echo "<h1> No existe ningún registro </h1>";

						          ?>

											<br><a class="button is-link" href='profesores.php'>Volver</a>
        </div>


</div>

    </section>
  </main>
  <?php include 'secciones/footer.php';?>
</body>
</html>

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
  $tabla="entregas";
  $con=mysqli_connect("localhost","root","","educalegre_pruebas") or die("Problemas con la conexión a la base de datos");
	//$query = "SELECT * FROM ".$tabla." WHERE usuario=\"" . $email . "\"";
	//$ejecutarquery= mysqli_query ($con, $query) or die ("Problema con query");

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
    		include 'secciones/aside_alumno.php';
    		?>

        <div class = "container is-fluid">
          <h1><strong>Mis Entregas</strong></h1>
          <div class="notification">
          <?php


           $queryplan = "SELECT * FROM ".$tabla." WHERE usuario=\"" . $email . "\"";
           $ejecutar=mysqli_query($con, $queryplan) or die ("Problema con query");
           $nc=mysqli_num_rows($ejecutar);


$vezes = 0;
while($renglon = mysqli_fetch_array($ejecutar))
{
// desplegando en celda de tabla html
echo " <div class='box is-fluid'>";

echo "<strong><p>Texto: ".$renglon['texto']."</p></strong><br>";
echo "<strong><p>Archivo: ".$renglon['archivo']."</p></strong><br>";
echo "<p>La fecha de entrega ha sido: ".$renglon['fecha']."</p><br>";
if($renglon['nota']!=null){
		echo "<strong><p style='color: darkorange;'>Tu calificación para esta tarea es: ".$renglon['nota']."</p></strong><br>";
}else{
	echo "<strong><p style='color: darkorange;'>Tu tarea todavía no ha sido evaluada</p></strong><br>";
}
echo "<a class='button is-primary' href='archivosentregas/".$renglon['id'].$renglon['archivo']."'>Descargar</a>&nbsp;&nbsp;";
echo "<a href='misentregas.php?e=".$renglon['id']."' class='button is-danger'>Eliminar</a>";
echo "</div>";
echo "<hr>";

$vezes++;
}
if ($vezes == 0)
  echo "<h1> No existe ningún registro </h1>";

          ?>
<a class="button is-link" href='alumnos.php'>Volver</a>

        </div>

</div>

    </section>
  </main>
  <?php include 'secciones/footer.php';?>
</body>
</html>

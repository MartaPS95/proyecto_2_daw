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
  if(isset($_REQUEST['clave']) && !empty($_REQUEST['clave'])){
    $_SESSION['clave']=$_REQUEST['clave'];
    $clave=$_SESSION['clave'];
  }
  if(isset($_REQUEST['submit']) && !isset($_REQUEST['modificar'])) {

    $titulo=$_REQUEST['titulo'];
    $texto=$_REQUEST['texto'];
    $fecha=$_REQUEST['fecha'];
    $query = "INSERT INTO ". $tabla ."(usuario, clave, titulo, texto, fechaentrega) VALUES(\"" . $email . "\", \"" . $_SESSION['clave'] . "\", \"" . $titulo . "\", \"" . $texto . "\", \"" . $fecha . "\")";
    mysqli_query ($con, $query) or die ("Problema con query");
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
          <h1><strong>Actividades</strong></h1>
          <div class="notification">

          <?php


           $queryplan = "SELECT * FROM ". $tabla ." WHERE clave=\"" . $_SESSION['clave'] . "\" ORDER BY fechaentrega ASC";
           $ac=mysqli_query($con, $queryplan) or die ("Problema con query");
           $nc=mysqli_num_rows($ac);


$vezes = 0;
while($renglon = mysqli_fetch_array($ac))
{
// desplegando en celda de tabla html
echo " <div class='box is-fluid'>";
echo "<br>";
echo "<h1 style='text-align: left;'><strong>".$renglon['titulo']."</strong></h1>";
echo "<p><strong>Descripción: ".$renglon['texto']."</strong></p><br>";
echo "<p>Fecha de publicación: ".$renglon['fecha']."</p>";
echo "<p style='color: red;'>Fecha final de entrega: ".$renglon['fechaentrega']."</p><br>";
echo "<p><a class='button is-primary' href='realizarentrega.php?tarea=".$renglon['id']."'>Realizar Entrega</a></p>";
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

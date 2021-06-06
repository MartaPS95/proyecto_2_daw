<?php
$title = 'Educalegre Profesores';

  //Header para la página de alumnos
  //include ('profesores.php');
  include 'secciones/header.php';
  include 'secciones/nav_usuarios.php';
  /*$nombre = $_SESSION['nombre'];
  $apellidos = $_SESSION['apellidos'];
  $email = $_SESSION['email'];
  $usuario = $_SESSION['nombre'].' '.$_SESSION['apellidos'];*/
  $tabla="entregas";
  $tabla2="alumno";
  $con=mysqli_connect("localhost","root","","educalegre") or die("Problemas con la conexión a la base de datos");
  //$query = "SELECT * FROM ".$tabla." WHERE usuario=\"" . $email . "\"";
  //$ejecutarquery= mysqli_query ($con, $query) or die ("Problema con query");
if(isset($_REQUEST['tarea'])){
  $_SESSION['idtarea']=$_REQUEST['tarea'];
}
if(isset($_REQUEST['e'])){

  $queryelimina = "DELETE FROM ".$tabla." WHERE id=" .$_REQUEST['e'];
  $ejecutar= mysqli_query ($con, $queryelimina) or die ("Problema con query");

}
//Se eliminan los !empty para poder mostrar los datos
if(isset($_REQUEST['idtareanota']) && isset($_REQUEST['nota'])){

  $query = "UPDATE ".$tabla." SET nota=\"" . $_REQUEST['nota'] . "\"  WHERE id=".$_REQUEST['idtareanota'];
  $ejecutar= mysqli_query ($con, $query) or die ("Problema con query");
  //echo $query;
}


?>

<body class = "body">
  <div class = "logged">
     <?php
        include 'secciones/aside_profesor.php';
        ?>
  <main>
    <section class = "section">
     

        <div class = "container is-fluid">
          <h1><strong>Entregas</strong></h1>
          <div class="notification">
          <?php


        /*   $queryplan = "SELECT * FROM ".$tabla." WHERE idplanificacion=" . $_SESSION['idtarea'];
           $ejecutar=mysqli_query($con, $queryplan) or die ("Problema con query");
           $nc=mysqli_num_rows($ejecutar);*/

           $querynombre = "SELECT * FROM ".$tabla.", ".$tabla2." WHERE alumno.email=entregas.usuario AND idplanificacion=" . $_SESSION['idtarea'];
           $ejecutarnombre=mysqli_query($con, $querynombre) or die ("Problema con query");
$vezes = 0;
while($renglon = mysqli_fetch_array($ejecutarnombre))
{

// desplegando en celda de tabla html
echo " <div class='box is-fluid'>";

echo "<strong><p>Tarea entegada por: ".$renglon['nombre']. " ".$renglon['apellido']." ".$renglon['segundoApellido']."</p></strong>";

echo "<p>Texto: ".$renglon['texto']."</p>";
echo "<p>Archivo: ".$renglon['archivo']."</p>";
//echo "<p>La fecha de entrega ha sido: ".$renglon['fecha']."</p>";
echo "<strong><p>Selecciona nota:</p></strong>";
if($renglon['nota']!=null){
  echo "<strong><p style='color: darkorange;'>Esta tarea ya ha sido calificada con un ".$renglon['nota']."</p></strong>";
}
echo "<a class='button is-danger is-outlined' href='verentregas.php?idtareanota=".$renglon['id']."&nota=0'>0</a>";
echo "<a class='button is-danger is-outlined' href='verentregas.php?idtareanota=".$renglon['id']."&nota=1'>1</a>";
echo "<a class='button is-danger is-outlined' href='verentregas.php?idtareanota=".$renglon['id']."&nota=2'>2</a>";
echo "<a class='button is-danger is-outlined' href='verentregas.php?idtareanota=".$renglon['id']."&nota=3'>3</a>";
echo "<a class='button is-danger is-outlined' href='verentregas.php?idtareanota=".$renglon['id']."&nota=4'>4</a>";
echo "<a class='button is-danger is-outlined' href='verentregas.php?idtareanota=".$renglon['id']."&nota=5'>5</a>";
echo "<a class='button is-danger is-outlined' href='verentregas.php?idtareanota=".$renglon['id']."&nota=6'>6</a>";
echo "<a class='button is-danger is-outlined' href='verentregas.php?idtareanota=".$renglon['id']."&nota=7'>7</a>";
echo "<a class='button is-danger is-outlined' href='verentregas.php?idtareanota=".$renglon['id']."&nota=8'>8</a>";
echo "<a class='button is-danger is-outlined' href='verentregas.php?idtareanota=".$renglon['id']."&nota=9'>9</a>";
echo "<a class='button is-danger is-outlined' href='verentregas.php?idtareanota=".$renglon['id']."&nota=10'>10</a><br>";

echo "<br>";
echo "<a class='button is-primary' href='archivosentregas/".$renglon['id'].$renglon['archivo']."'>Descargar archivo</a><br>";


//echo "<a href='misentregas.php?e=".$renglon['id']."' class='button is-danger'>Eliminar</a>";


$vezes++;
}
if ($vezes == 0)
  echo "<h1> No existe ningún registro </h1>";

          ?>


        </div>
<a class="button is-link" href='revisartareas.php'>Volver</a>
</div>

    </section>
  </main>
  <?php include 'secciones/footer.php';?>
</div>
</body>
</html>

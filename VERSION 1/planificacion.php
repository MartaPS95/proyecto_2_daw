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
if(isset($_REQUEST['modificar'])) {

  $titulo=$_REQUEST['titulo'];
  $texto=$_REQUEST['texto'];
  $fecha=$_REQUEST['fecha'];
  $query = "UPDATE ". $tabla ." SET titulo=\"" . $titulo . "\", texto=\"" . $texto . "\", fechaentrega=\"" . $fecha . "\" WHERE id=" . $_REQUEST['modificar'];
  mysqli_query ($con, $query) or die ("Problema con query");
}
if(isset($_REQUEST['e'])){
  $tabla='planificacion';

  $queryelimina = "DELETE FROM ".$tabla." WHERE id=" .$_REQUEST['e'];
  $ejecutar= mysqli_query ($con, $queryelimina) or die ("Problema con query");

}
if(isset($_REQUEST['m'])){
  $tabla='planificacion';

  $querymodif = "SELECT * FROM ".$tabla." WHERE id=" .$_REQUEST['m'];
  $ejecutar2= mysqli_query ($con, $querymodif) or die ("Problema con query");
  $renglon = mysqli_fetch_array($ejecutar2);

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
					<div class="notification">
            <h1>Nueva Actividad</h1>

          <div class="box is-fluid">
      <form action="planificacion.php" method="POST">
         <div class="column is-half">
          <input type="text" class="input is-info" name="titulo"
          <?php if(isset($_REQUEST['m'])){echo "value='" .$renglon['titulo']. "'";} ?>
           placeholder="Titulo" required><br><br>
          <textarea class="textarea is-primary" name="texto" id=""  rows="12" placeholder="Introduce el texto" required><?php if(isset($_REQUEST['m'])){echo $renglon['texto'];} ?>
          </textarea><br>
            <input type="date" class="input is-info" name="fecha"
            <?php if(isset($_REQUEST['m'])){echo "value='" .$renglon['fechaentrega']. "'";} ?>
            placeholder="Fecha" required>

        </div><br>
          <?php if(isset($_REQUEST['m'])){echo "<input type='hidden' name='modificar' value='".$_REQUEST['m']."'>";} ?>
        <div class="control">
          <input type="submit" name ="submit" class="button is-success"
          <?php if(isset($_REQUEST['m'])){echo "value='Guardar'";}else{echo "value='Crear'";} ?>>

          <a class="button is-link" href='crearclase.php'>Volver</a>
          </div>
          </form>

          <?php


           $queryplan = "SELECT * FROM ". $tabla ." WHERE clave=\"" . $_SESSION['clave'] . "\" AND usuario=\"" . $email . "\" ORDER BY fechaentrega ASC";
           $ac=mysqli_query($con, $queryplan) or die ("Problema con query");
           $nc=mysqli_num_rows($ac);



						$vezes = 0;
						while($renglon = mysqli_fetch_array($ac))
						{
				
						echo "<br>";
						echo "<h1 style='text-align: left;'>".$renglon['titulo']."</h1>";
						echo "<p>".$renglon['texto']."</p>";
						echo "<p>Fecha de publicación: ".$renglon['fecha']."</p>";
						echo "<p>Fecha final de entrega: ".$renglon['fechaentrega']."</p>";
						echo "<hr>";
						//  echo "<td>".$renglon[2]."</td>";
						echo "<a class='button is-primary' href='planificacion.php?e=".$renglon['id']."'>Eliminar</a>&nbsp&nbsp<a class='button is-primary' href='planificacion.php?m=".$renglon['id']."'>Modificar</a>";


						$vezes++;

						}
						if ($vezes == 0)
						  echo "<h1> No existe ningún registro </h1>";

						          ?>


        </div>
  </div>
</div>

    </section>
  </main>
  <?php include 'secciones/footer.php';?>
</body>
</html>

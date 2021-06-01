<?php

	$nombre = $_SESSION['nombre'];
    $apellidos = $_SESSION['apellidos'];
		$email = $_SESSION['email'];
		$usuario = $_SESSION['nombre'].' '.$_SESSION['apellidos'];
		$tabla="planificacion";
	  $con=mysqli_connect("localhost","root","","educalegre_pruebas") or die("Problemas con la conexión a la base de datos");

?>

<div class="columns">


<div class="column is-one-fifth" style="background: white; position: static;">

  <aside class="menu">
    <p class="menu-label">
      General
    </p>
    <ul class="menu-list">
      <li>  <a  href='profesores.php'>Principal</a></li>

    </ul>
    <p class="menu-label">
     Planificación
    </p>
    <ul class="menu-list">
        <li>  <a  href='crearclase.php'>Organizar clases</a></li>
        <li>  <a  href='documentacion.php'>Documentación</a></li>
    </ul>
    

  </aside>

</div>

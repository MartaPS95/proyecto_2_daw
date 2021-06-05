<?php
  //Ponemos @ para omitir warnings y mostrar la página estructurada pese a haber fallado la sesión
  $nombre = @$_SESSION['nombre'];
  $apellidos = @$_SESSION['apellidos'];
  $email = @$_SESSION['email'];
  $usuario = @$_SESSION['nombre'].' '.@$_SESSION['apellidos'];
  $tabla="planificacion";
  $con=mysqli_connect("localhost","root","","educalegre_pruebas") or die("Problemas con la conexión a la base de datos");

?>
<aside class="menu" id = "aside_style">
  <p class="menu-label">General</p>
  <ul class="menu-list">
    <li><a href='profesor.php'>Principal</a></li>
  </ul>
  <p class="menu-label">Planificación</p>
  <ul class="menu-list">
    <li><a  href='crearclase.php'>Organizar clases</a></li>
    <li><a  href='documentacion.php'>Documentación</a></li>
  </ul>
</aside>


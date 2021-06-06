<?php
  $title = 'Educalegre Profesores';

	//Header para la página de alumnos
  //include ('profesores.php');
	include 'secciones/header.php';
	include 'secciones/nav_usuarios.php';
  include 'config/conexion.php';
  /*
	$nombre = $_SESSION['nombre'];
  $apellidos = $_SESSION['apellidos'];
  $email = $_SESSION['email'];
  $usuario = $_SESSION['nombre'].' '.$_SESSION['apellidos'];*/
  //CORRECIONES DE SANGRADO DE CODIGO
  if(isset($_REQUEST['submit']))
  {
    if(isset($_REQUEST['clase']))
    {
      $tabla=$_REQUEST['tabla'];
      $n=$_REQUEST['clase'];
      $str="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
      $cad="";
      for($i=0;$i<11;$i++)
        $cad .= substr($str,rand(0,62),1);
      //$con=mysqli_connect("localhost","root","","educalegre") or die("Problemas con la conexión a la base de datos");
      $query = "INSERT INTO ". $tabla ."(nombre, clave, usuario) VALUES(\"" . $n . "\", \"" . $cad . "\", \"" . $email . "\")";
  		mysqli_query ($con, $query) or die ("Problema con query");
    }
}
  if(isset($_REQUEST['e']))
  {
    $tabla='clase';
    //$con=mysqli_connect("localhost","root","","educalegre") or die("Problemas con la conexión a la base de datos");
    $query = "DELETE FROM ".$tabla." WHERE id_clase=" .$_REQUEST['e'];
    $ejecutar= mysqli_query ($con, $query) or die ("Problema con query");
  }
?>

  <body class = "body">
    <div class = "logged">
      <?php include 'secciones/aside_profesor.php';?>
      <main>
        <section class = "section">
          <div class = "container is-fluid">
            <h1><strong>Gestión de clases</strong></h1>
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
                //$con2=mysqli_connect("localhost","root","","educalegre") or die("Problemas con la conexión a la base de datos");
                $query2 = "SELECT * FROM " .$tabla. " WHERE usuario='". $email ."'";
                $clases= mysqli_query ($con, $query2) or die ("Problema con query");
                //Tabla de registros de clases creadas por el profesor
                echo "<HTML><TABLE Border=10 CellPadding=5 style='margin-left: auto; margin-right: auto; font-size:22px' class = 'table is-bordered'><TR>";
                echo "<th bgcolor=Green>NOMBRE</th><th bgcolor=Red>CLAVE</th><th bgcolor=lightblue>ELIMINAR LA CLASE</th><th bgcolor=darkorange>PLANIFICACIÓN</th></TR>";
                $vezes = 0;
                while($renglon = mysqli_fetch_row($clases))
                {
                  echo"<tr>";
                  echo "<td align='center'>".$renglon[1]."</td>";
                  echo "<td align='center'>".$renglon[2]."</td>";
                  echo "<td align='center'><a class='button is-danger is-outlined' href='crearclase.php?e=".$renglon[0]."'>Eliminar</a></td>";
                  echo "<td align='center'><a class='button is-link is-outlined' href='planificacion.php?clave=".$renglon[2]."'>Ver</a></td>";
                  echo"</tr>";
                  $vezes++;
                }
                if ($vezes == 0)
                  echo "<td colspan='3' align='center'> No existe ningún registro en la tabla </td>";
                echo "</table>";  //aplicar cierre de tabla de forma dinámica
              ?>
              <br>
              <a class="button is-link" href='profesor.php'>Volver</a>
              </div>
            </div>
          </div>
        </section>
      </main>
    <?php include 'secciones/footer.php';?>
    </div>
  </body>
</html>

<?php
$title = 'Educalegre Alumnos';
	//Header para la página de alumnos
	include 'secciones/header.php';
	include 'secciones/nav_usuarios.php';
	$nombre = @$_SESSION['nombre'];
    $apellidos = @$_SESSION['apellidos'];
		$email = @$_SESSION['email'];
		$usuario = @$_SESSION['nombre'].' '.@$_SESSION['apellidos'];
$tabla="archivos";
$con=mysqli_connect("localhost","root","","educalegre_pruebas") or die("Problemas con la conexión a la base de datos");


    $query2 = "SELECT * FROM " .$tabla;

    $archivos=mysqli_query ($con, $query2) or die ("Problema con query");
    $numeroArchivos=mysqli_num_rows($archivos);

    ?>
  <body class = "body">
    <div class = "logged">
      <?php include 'secciones/aside_alumno.php';?>
      <main>
        <section class = "section">
          <div class = "container is-fluid">
            <h1><strong>Documentación</strong></h1>
            <div class="container is-fluid">
              <div class="notification">
              <?php
                echo "<TABLE Border=10 CellPadding=5 style='margin-left: auto; margin-right: auto; font-size:22px' class = 'table is-bordered'><TR>";
                echo "<th bgcolor=Green>NOMBRE</th><th bgcolor=Red>TIPO</th><th bgcolor=lightblue>TAMAÑO</th><th bgcolor=darkorange>DESCARGAR</th></TR>";
                if($numeroArchivos>0)
                {
                  $vezes = 0;
                  while($renglon = mysqli_fetch_array($archivos))
                  {
                    echo"<tr>";
                    echo "<td align='center'>".$renglon['nombre']."</td>";
                    echo "<td align='center'>".$renglon['tipo']."</td>";
                    echo "<td align='center'>".($renglon['tamano']/1024)."KB</td>";
                    echo "<td align='center'><a class='button is-link is-outlined' href='archivosprofesor/".$renglon['nombre']."'>Descargar</a></td>";
                    echo"</tr>";
                    $vezes++;
                  }
                  if ($vezes == 0)
                    echo "<tr><td colspan='5'> No existe ningún registro en la tabla </td></tr>";
                }
                else
                    echo "<tr><td colspan='5' align='center'> No existe ningún registro en la tabla </td></tr>";
              ?>
              </table>
              <br><br>
              <a class="button is-link" href='alumno.php'>Volver</a>
              </div>
            </div>
          </div>
        </section>
      </main>
    </div>
    <?php include 'secciones/footer.php';?>
  </body>
</html>

<!--En este apartado el profesor sube la documentación que desee para sus alumnos y se guarda en la base de datos
    además de mostrar un registro en una tabla que se actualizará y permitirá descargar el archivo o eliminarlo-->
<?php
  $title = 'Educalegre Profesores';
  //Header para la página de alumnos
  include 'secciones/header.php';
  include 'secciones/nav_usuarios.php';
  /*Incluir la base de datos desde el archivo de configuración*/
  include_once 'config/conexion.php';
  /*
  $nombre = @$_SESSION['nombre'];
  $apellidos = @$_SESSION['apellidos'];
  $email = @$_SESSION['email'];
  $usuario = @$_SESSION['nombre'].' '.@$_SESSION['apellidos'];*/
  $tabla="archivos";
  //$con=mysqli_connect("localhost","root","","educalegre_pruebas") or die("Problemas con la conexión a la base de datos");
  if(isset($_REQUEST['subir']) && !empty($_REQUEST['subir']))
  {
    $nombreArchivo=$_FILES['archivo']['name'];
    $tipo=$_FILES['archivo']['type'];
    $tamaño=$_FILES['archivo']['size'];

    $query = "INSERT INTO ". $tabla ." (nombre, tipo, tamano, usuario) VALUES (\"" . $nombreArchivo . "\", \"" . $tipo . "\",\"" . $tamaño . "\", \"" . $email . "\")";
    mysqli_query ($con, $query) or die ("Problema con query");
    move_uploaded_file($_FILES['archivo']['tmp_name'],"archivosprofesor/".$nombreArchivo);
  }
  if(isset($_REQUEST['e']))
  {
    $query3 = "DELETE FROM ".$tabla." WHERE id=" .$_REQUEST['e'];
    mysqli_query ($con, $query3) or die ("Problema con query");
  }
  $query2 = "SELECT * FROM " .$tabla;
  $archivos=mysqli_query ($con, $query2) or die ("Problema con query");
  $numeroArchivos=mysqli_num_rows($archivos);
?>
  <body class = "body">
    <div class = "logged">
      <?php include 'secciones/aside_profesor.php';?>
      <main>
        <section class = "section">
          <div class = "container is-fluid">
            <div class="container is-fluid is-max-desktop">
              <h1><strong>Subir Documentación</strong></h1>
              <div class="notification">
                  <form action="documentacion.php" enctype="multipart/form-data" method="post">
                    <div class = "field is-grouped">
                      <div class="file">
                        <label class="file-label">
                          <input class="file-input" type="file" name="archivo" required>
                          <span class="file-cta">
                            <span class="file-icon">
                              <i class="fas fa-upload"></i>
                            </span>
                            <span class="file-label">
                              Selecciona archivo
                            </span>
                          </span>
                        </label>
                      </div>
                      &nbsp;&nbsp;&nbsp;
                      <input type="hidden" name="subir" value="ok">
                      <input type="submit" class='button is-primary' value="Subir archivo">
                    </div><br>
                  </form>
              <?php
                echo "<TABLE Border=10 CellPadding=5 style='margin-left: auto; margin-right: auto; font-size:18px' class = 'table is-bordered'><TR>";

                echo "<th bgcolor=Green>NOMBRE</th><th bgcolor=Red>TIPO</th><th bgcolor=lightblue>TAMAÑO</th><th bgcolor=darkorange>DESCARGAR</th><th bgcolor=pink>ELIMINAR</th></TR>";

                if($numeroArchivos>0){
                  $vezes = 0;
                while($renglon = mysqli_fetch_array($archivos))
                {

                  echo"<tr>";

                  echo "<td align='center'>".$renglon['nombre']."</td>";
                  echo "<td align='center'>".$renglon['tipo']."</td>";
                  echo "<td align='center'>".($renglon['tamano']/1024)."KB</td>";
                  echo "<td align='center'><a class='button is-link is-outlined' href='archivosprofesor/".$renglon['nombre']."'>Descargar</a></td>";
                  echo "<td align='center'><a class='button is-danger is-outlined' href='documentacion.php?e=".$renglon['id']."'>Eliminar</a></td>";

                  echo"</tr>";
                  $vezes++;

                }
                if ($vezes == 0)
                  echo "<td colspan='5' align='center'> No existe ningún registro en la tabla </td>";

                }else{
                  echo "<td colspan='5 align='center'> No existe ningún registro en la tabla </td>";
                }
              ?>
              </table>
              <br><br>
              <a class="button is-link" href='profesor.php'>Volver</a>
              </div>
            </div>
          </div>
        </section>
      </main>
    </div>
    <?php include 'secciones/footer.php';?>
  </body>
</html>

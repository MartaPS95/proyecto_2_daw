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
  $tabla="planificacion";
  $tabla2="entregas";
  //$con=mysqli_connect("localhost","root","","educalegre_pruebas") or die("Problemas con la conexión a la base de datos");
  if(isset($_REQUEST['tarea'])){
    $_SESSION['tarea']=$_REQUEST['tarea'];
    $clave=$_SESSION['clave'];
    $tarea=$_SESSION['tarea'];
  }
  if(isset($_REQUEST['e'])){

    $query = "DELETE FROM ".$tabla2." WHERE id=" .$_REQUEST['e'];
    $ejecutar= mysqli_query ($con, $query) or die ("Problema con query");

  }
  if(isset($_REQUEST['subir']) && !empty($_REQUEST['subir'])){

    $nombreArchivo=$_FILES['archivo']['name'];
    $texto=$_REQUEST['texto'];
    $tabla2="entregas";
    $query2 = "INSERT INTO ". $tabla2 ." (texto, usuario, clave, archivo, idplanificacion) VALUES (\"" . $texto . "\", \"" . $email . "\",\"" . $_SESSION['clave'] . "\", \"" . $nombreArchivo . "\", \"" . $_SESSION['tarea'] . "\")";
    $consulta=mysqli_query ($con, $query2) or die ("Problema con query");
    $rs = "SELECT @@identity AS id";
    $cons=mysqli_query ($con, $rs) or die ("Problema con query");
    if ($row = mysqli_fetch_row($cons)) {
    $id = trim($row[0]);
    }
    move_uploaded_file($_FILES['archivo']['tmp_name'], "archivosentregas/".$id.$nombreArchivo);
  }

  $query = "SELECT * FROM ".$tabla." WHERE id=" .$_SESSION['tarea'];
  $tareas= mysqli_query ($con, $query) or die ("Problema con query");
  $renglon = mysqli_fetch_array($tareas);
  $filas=mysqli_num_rows($tareas);

  $query = "SELECT * FROM ".$tabla2." WHERE idplanificacion='". $_SESSION['tarea'] ."' AND clave='". $_SESSION['clave'] ."' AND usuario='". $email ."'";
  $entregas= mysqli_query ($con, $query) or die ("Problema con query");
  $renglon2 = mysqli_fetch_array($entregas);
  $filas2=mysqli_num_rows($entregas);
?>
  <body class = "body">
    <main>
      <div class = "logged">
      <?php include 'secciones/aside_alumno.php';?>
      <section class = "section">
          <div class = "container is-fluid">
					  <h1><strong>Nueva Entrega</strong></h1>
  					<div class="notification">
              <?php
                if($filas2==0)
                {
                  echo "<h1><strong>Título: ". $renglon['titulo'] ."</strong></h1>";
              ?>
              <form action="realizarentrega.php" method="POST" enctype="multipart/form-data">
                 <div class="column is-half">
                  <label for="texto">Escribir comentario:</label><br>
                  <textarea class="textarea is-primary" name="texto" id=""  rows="12" placeholder="Introduce el texto" required><?php if(isset($_REQUEST['m'])){echo $renglon['texto'];} ?>
                  </textarea><br>
                  <div class = "field is-grouped">
                    <div class="file">
                      <label class="file-label">
                        <input class="file-input" type="file" name="archivo" required>
                        <span class="file-cta">
                          <span class="file-icon">
                            <i class="fas fa-upload"></i>
                          </span>
                          <span class="file-label">
                            Examinar
                          </span>
                        </span>
                      </label>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <input type="hidden" name="subir" value="ok">
                    <input type="submit" class='button is-primary' value="Subir archivo">
                  </div>
                    <a class="button is-link" href='verplanificacion.php?clave=<?php echo $_SESSION['clave']?>'>Volver</a>
                </div><br>
              </form>
                <?php
                }
                else
                {
                  echo "<h1><strong> La tarea ha sido entregada </strong> </h1>";
        					echo " <div class='box is-fluid'>";
                  echo "<strong><p>Texto: ".$renglon2['texto']."</p></strong><br>";
                  echo "<strong><p>Archivo: ".$renglon2['archivo']."</p></strong><br>";
                  echo "<p>La fecha de entrega ha sido: ".$renglon2['fecha']."</p><br>";
                  echo "<a class='button is-primary' href='archivosentregas/".$renglon2['id'].$renglon2['archivo']."'>Descargar</a>&nbsp;&nbsp;";
                  echo "<a href='realizarentrega.php?e=".$renglon2['id']."' class='button is-danger'>Eliminar</a>";
        					echo "</div><br>";
                  echo "<a class='button is-link' href='verplanificacion.php?clave=".$renglon2['clave']."'>Volver</a>";
                }
                ?>
            </div>
          </div>
        </section>
      </div>
    </main>
    <?php include 'secciones/footer.php';?>
  </body>
</html>

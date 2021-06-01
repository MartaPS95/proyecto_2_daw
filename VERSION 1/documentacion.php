<?php
$title = 'Educalegre Profesores';
	//Header para la página de alumnos
	include 'secciones/header.php';
	include 'secciones/nav_usuarios.php';
	$nombre = $_SESSION['nombre'];
    $apellidos = $_SESSION['apellidos'];
		$email = $_SESSION['email'];
		$usuario = $_SESSION['nombre'].' '.$_SESSION['apellidos'];
$tabla="archivos";
$con=mysqli_connect("localhost","root","","educalegre_pruebas") or die("Problemas con la conexión a la base de datos");
    if(isset($_REQUEST['subir']) && !empty($_REQUEST['subir'])){

      $nombreArchivo=$_FILES['archivo']['name'];
      $tipo=$_FILES['archivo']['type'];
      $tamaño=$_FILES['archivo']['size'];

      $query = "INSERT INTO ". $tabla ." (nombre, tipo, tamano, usuario) VALUES (\"" . $nombreArchivo . "\", \"" . $tipo . "\",\"" . $tamaño . "\", \"" . $email . "\")";
      mysqli_query ($con, $query) or die ("Problema con query");
      move_uploaded_file($_FILES['archivo']['tmp_name'],"archivosprofesor/".$nombreArchivo);
    }
    if(isset($_REQUEST['e'])){
      $query3 = "DELETE FROM ".$tabla." WHERE id=" .$_REQUEST['e'];
      mysqli_query ($con, $query3) or die ("Problema con query");

    }
    $query2 = "SELECT * FROM " .$tabla;

    $archivos=mysqli_query ($con, $query2) or die ("Problema con query");
    $numeroArchivos=mysqli_num_rows($archivos);

    ?>
    	<body class = "body">
    		<main>
    			<section class = "section">
    				<?php
    	        include 'secciones/aside_profesor.php';
    	        ?>

    					<div class = "container is-fluid">

    						<div class="container is-fluid is-max-desktop">
                    <div class="notification">
                      <h1>Subir Documentación</h1>
                    <form action="documentacion.php" enctype="multipart/form-data" method="post">
                      <label for="archivo">Subir archivo</label><br>

                      <input type="file" name="archivo" required><br><br>
                      <input type="hidden" name="subir" value="ok">
                      <input type="submit" class='button is-primary' value="Subir archivo">

                    </form>
                    <br><br>

                      <?php
                      echo "<HTML><TABLE Border=10 CellPadding=5><TR>";
              
                      echo "<th bgcolor=Green>NOMBRE</th><th bgcolor=Red>TIPO</th><th bgcolor=lightblue>TAMAÑO</th><th bgcolor=darkorange>DESCARGAR</th><th bgcolor=pink>ELIMINAR</th></TR>";

                      if($numeroArchivos>0){
                      $vezes = 0;
                      while($renglon = mysqli_fetch_array($archivos))
                      {

                        echo"<tr>";

                        echo "<td>".$renglon['nombre']."</td>";
                        echo "<td>".$renglon['tipo']."</td>";
                        echo "<td>".($renglon['tamano']/1024)."KB</td>";
                    		echo "<td><a href='archivosprofesor/".$renglon['nombre']."'>Descargar</a></td>";
                        echo "<td><a href='documentacion.php?e=".$renglon['id']."'>Eliminar</a></td>";

                        echo"</tr>";
                        $vezes++;

                    }
                    if ($vezes == 0)
                    			echo "<td colspan='5'> No existe ningún registro en la tabla </td>";

                    }else{
                      	echo "<td colspan='5'> No existe ningún registro en la tabla </td>";
                    }
              	        ?>
                    </table>
                    <br><br>
                    <a class="button is-link" href='profesores.php'>Volver</a>
    						</div>
    						</div>
</div>

    			</section>
    		</main>
    		<?php include 'secciones/footer.php';?>
    	</body>
    </html>

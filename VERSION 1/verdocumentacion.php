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

  
    $query2 = "SELECT * FROM " .$tabla;

    $archivos=mysqli_query ($con, $query2) or die ("Problema con query");
    $numeroArchivos=mysqli_num_rows($archivos);

    ?>
    	<body class = "body">
    		<main>
    			<section class = "section">
    				<?php
    	        include 'secciones/aside_alumno.php';
    	        ?>

    					<div class = "container is-fluid">

    						<div class="container is-fluid is-max-desktop">
                    <div class="notification">
                      <h1>Ver Documentación</h1>

                    <br><br>

                      <?php
                      echo "<HTML><TABLE Border=10 CellPadding=5><TR>";

                      echo "<th bgcolor=Green>NOMBRE</th><th bgcolor=Red>TIPO</th><th bgcolor=lightblue>TAMAÑO</th><th bgcolor=darkorange>DESCARGAR</th></TR>";

                      if($numeroArchivos>0){
                      $vezes = 0;
                      while($renglon = mysqli_fetch_array($archivos))
                      {

                        echo"<tr>";

                        echo "<td>".$renglon['nombre']."</td>";
                        echo "<td>".$renglon['tipo']."</td>";
                        echo "<td>".($renglon['tamano']/1024)."KB</td>";
                    		echo "<td><a href='archivosprofesor/".$renglon['nombre']."'>Descargar</a></td>";


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
                    <a class="button is-link" href='alumnos.php'>Volver</a>
    						</div>
    						</div>
</div>

    			</section>
    		</main>
    		<?php include 'secciones/footer.php';?>
    	</body>
    </html>

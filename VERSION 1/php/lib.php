<?php
//Dar de alta la información del usuario en la base de datos
function insertarUser($id_user,$nom, $ape1, $ape2, $dni, $pass, $email, $tel, $tabla, $con)
{
    /*
    $num_id = numeroFilasTabla($tabla, $con)
    $query = "INSERT INTO " . $tabla . "(" . $id_user . ",nombre, apellido, segundoApellido, dni, contraseña, email, telefono) VALUES(\"" . $nom . "\", \"" . $ape1 . "\", \"" . $ape2 . "\", \"" . $dni . "\", SHA1(\"" . $pass . "\"), \"" . $email . "\", \"" . $tel . "\")";
    echo $query;
    mysqli_query($con, $query) or die("ERROR: La query no está bien escrita insertarUser.");
*/
}

function numeroFilasTabla($tabla, $con)
{
    $query = "SELECT * FROM " . $tabla;
    $num_filas = mysqli_query($con, $query) or die("ERROR: La query no está bien escrita numeroFilasTabla."); 
    return mysqli_num_rows($num_filas);
}

//Obtener la tabla en la que se va a realizar el alta de la información de usuario (alumno o profesor)
function obtenerTabla($tipo_usu)
{
    if($tipo_usu == "tipo_usu_alumno_reg")
        return "alumno";
    else if($tipo_usu == "tipo_usu_profesor_reg")
        return "profesor";
}

function obtenerIdUser($tipo_usu)
{
    if($tipo_usu == "tipo_usu_alumno_reg")
        return "idAlumno";
    else if($tipo_usu == "tipo_usu_profesor_reg")
        return "idProfesor";
}


//Funciones asociadas a acceso.php
//Obtener el nombre del usuario
function obtenerNombreUser($email, $conexion, $tabla)
{
    $query = "SELECT nombre FROM " . $tabla . " WHERE email = \"" . $email . "\"";
    $busqueda = mysqli_query($conexion, $query) or die("ERROR: Hay un problema en la query obtenerNombreUser.");
    while($reg = mysqli_fetch_array($busqueda)) 
        $nombre = $reg['nombre'];
    return $nombre;
}
//Obtener los apellidos del usuario
function obtenerApellidosUser($email, $conexion, $tabla)
{
    $query = "SELECT apellido, segundoApellido FROM " . $tabla . " WHERE email = \"" . $email . "\"";
    $busqueda = mysqli_query($conexion, $query) or die("ERROR: Hay un problema en la query obtenerApellidosUser.");
    while($reg = mysqli_fetch_array($busqueda)) 
        $apellidos = $reg['apellido'] . " " . $reg['segundoApellido'];
    return $apellidos;
}

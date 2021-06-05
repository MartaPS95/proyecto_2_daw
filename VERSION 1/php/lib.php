<?php
//FUNCIONES PARA MANEJO DE REGISTRO DE USUARIOS
//Dar de alta la información del usuario en la base de datos
function insertarUser($nom, $ape1, $ape2, $dni, $pass, $email, $tel, $tabla, $con)
{
    if($tabla == "alumno")
    {
        $num_id = numeroFilasTabla($tabla, $con) + 1;
        $query = "INSERT into alumno (idAlumno,nombre, apellido, segundoApellido, dni, telefono, email, contraseña, Grupo_idGrupos) VALUES (" . $num_id . ",\"" . $nom . "\",\"" . $ape1 . "\",\"" . $ape2 . "\",\"" . $dni . "\",\"" . $tel . "\",\"" . $email . "\", SHA1(\"" . $pass . "\"), 1111)";
        //echo $query;
        mysqli_query($con, $query) or die("La query no está bien escrita insertarUser.ERROR: " . mysqli_error($con));
    }
    else if($tabla == "profesor")
    {
        $num_id = numeroFilasTabla($tabla, $con) + 1;
        //Creamos un id de grupo hardcodeado provisionalmente
        $query = "INSERT INTO profesor (idProfesor, nombre, apellido, segundoApellido, dni, contraseña, email, telefono) VALUES(" . $num_id . ",\"" . $nom . "\", \"" . $ape1 . "\", \"" . $ape2 . "\", \"" . $dni . "\", SHA1(\"" . $pass . "\"), \"" . $email . "\", \"" . $tel . "\")";
        //echo $query;
        mysqli_query($con, $query) or die("La query no está bien escrita insertarUser. ERROR: " . mysqli_error($con));
    }
}
//Obtener el numero de filas de la tabla escogida para obtener el numero de id que debe seguir en orden al anterior registro
function numeroFilasTabla($tabla, $con)
{
    $query = "SELECT * FROM " . $tabla;
    $num_filas = mysqli_query($con, $query) or die("ERROR: La query no está bien escrita numeroFilasTabla."); 
    return mysqli_num_rows($num_filas);
}

//Obtener la tabla en la que se va a realizar el alta de la información de usuario (alumno o profesor)
function obtenerTabla($tipo_usu)
{
    if($tipo_usu == "tipo_usu_alumno_reg" || $tipo_usu == "tipo_usu_alumno")
        return "alumno";
    else if($tipo_usu == "tipo_usu_profesor_reg" || $tipo_usu == "tipo_usu_profesor")
        return "profesor";
}

//FUNCIONES PARA MANEJO DE ACCESO DE USUARIOS
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

//FUNCIONES PARA MANEJO DE CAMBIO DE CONTRASEÑA
function actualizarPass($nueva_pass, $correo, $tabla, $con)
    {
        $query = "UPDATE " . $tabla . " SET contraseña = SHA1(\"" . $nueva_pass . "\") WHERE email = \"" . $correo . "\"";
        mysqli_query($con, $query) or die("ERROR: La query \"Actualizar pass\" no está bien escrita.");
    }
//Cambio de contraseña(desde index)
function obtenerTablaLogin($tipo_usu)
{
    if($tipo_usu == "tipo_alumno")
        return "alumno";
    else if($tipo_usu == "tipo_profesor")
        return "profesor";
}
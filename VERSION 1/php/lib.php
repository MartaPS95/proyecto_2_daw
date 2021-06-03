<?php
function confirmarContraseña($contra_ini, $contra_conf)
{
    if(($contra_ini == $contra_conf) && (strlen($contra_ini) != 0) && (strlen($contra_conf) != 0))	
        return true;
    else return false;
}
//Buscar en la bd username y correo y verificar su existencia, ya que ninguno se puede repetir
function buscarCorreo($email, $conexion, $tabla)
{
    $query = "SELECT email FROM " . $tabla . " WHERE email = \"" . $email . "\"";
    echo $query;
    $busqueda = mysqli_query($conexion, $query) or die("ERROR: Hay un problema en la query buscarCorreo.");
    while($reg = mysqli_fetch_array($busqueda))	
        return true;
    return false;
}
function noVacio($nom, $ape1, $ape2, $email, $dni, $tel)
{
    if(strlen($nom) != 0 && strlen($ape1) != 0 && strlen($ape2) != 0 && strlen($email) != 0 && strlen($dni) != 0 && strlen($tel) != 0)
        return true;
    else return false;
}
//Dar de alta la información del usuario en la base de datos
function insertarUser($nom, $ape1, $ape2, $dni, $pass, $email, $tel, $tabla, $con)
{
    $query = "INSERT INTO " . $tabla . "(nombre, apellido, segundoApellido, dni, contraseña, email, telefono) VALUES(\"" . $nom . "\", \"" . $ape1 . "\", \"" . $ape2 . "\", \"" . $dni . "\", SHA1(\"" . $pass . "\"), \"" . $email . "\", \"" . $tel . "\")";
    echo $query;
    mysqli_query($con, $query) or die("ERROR: La query no está bien escrita insertarUser.");
}
//Obtener la tabla en la que se va a realizar el alta de la información de usuario (alumno o profesor)
function obtenerTabla($tipo_usu)
{
    if($tipo_usu == "tipo_usu_alumno_reg")
        return "alumnos";
    else if($tipo_usu == "tipo_usu_profesor_reg")
        return "profesor";
}
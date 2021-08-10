<?php

$identificacion = isset($_POST["identificacion"]) ? $_POST["identificacion"] : '';
$nombre_completo = isset($_POST["nombre_completo"]) ? $_POST["nombre_completo"] : '';
$usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : '';
$clave = isset($_POST["clave"]) ? $_POST["clave"] : '';

// En caso que no envien datos
if (strlen($identificacion) == 0) {
    echo "No ingresó identifiación";
    return;
}

if (strlen($nombre_completo) == 0) {
    echo "No ingresó nombre completo";
    return;
}

if (strlen($usuario) == 0) {
    echo "No ingresó usuario";
    return;
}

if (strlen($clave) == 0) {
    echo "No clave";
    return;
}


// Insertar en la base de datos.

$host_bd = "localhost";
$usuario_bd = "root";
$contrasena_bd = "";

$mysqli = new mysqli($host_bd, $usuario_bd, $contrasena_bd, "adsi");
$insert  = "insert into usuarios (identificacion, nombre, usuario, clave) values ('" . $identificacion . "','" . $nombre_completo . "','" . $usuario . "','" . $clave . "')";
$registroInsertado = $mysqli->query($insert);

$mensaje = "El usuario se ha creado correctamente.";
$linkVolver = "menu_crud_usuarios.php";
$textoVoler = "Volver al menú.";

if (!$registroInsertado) {
    $mensaje = "Ocurrió un problema creando el usuario, por favor intente de nuevo.";
    $linkVolver = "vista_creacion.php";
    $textoVoler = "Volver.";
}
?>
<strong><?php echo $mensaje ?></strong>
<a href="<?php echo $linkVolver ?>"><?php echo $textoVoler ?></a>
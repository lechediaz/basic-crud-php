<?php
include_once("variables-bd.php");

// Recibir los valores de los parámetros desde petición POST.

$identificacion = isset($_POST["identificacion"]) ? $_POST["identificacion"] : '';
$nombre_completo = isset($_POST["nombre_completo"]) ? $_POST["nombre_completo"] : '';
$usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : '';
$clave = isset($_POST["clave"]) ? $_POST["clave"] : '';

// Validar que los parámetros tengan valores.

$paramsValidos = true;
$mensaje = "";

if (strlen($identificacion) == 0) {
    $mensaje = "No ingresó identificación";
    $paramsValidos = false;
}

if (strlen($nombre_completo) == 0) {
    $mensaje = "No ingresó nombre completo";
    $paramsValidos = false;
}

if (strlen($usuario) == 0) {
    $mensaje = "No ingresó usuario";
    $paramsValidos = false;
}

if (strlen($clave) == 0) {
    $mensaje = "No ingresó clave";
    $paramsValidos = false;
}

$linkVolver = "vista_creacion.php";
$textoVoler = "Volver.";

if ($paramsValidos) {
    // Insertar en la base de datos.

    $mysqli = new mysqli($host_bd, $usuario_bd, $contrasena_bd, "adsi");

    $insert  = "insert into usuarios (identificacion, nombre, usuario, clave) values ('" . $identificacion . "','" . $nombre_completo . "','" . $usuario . "','" . $clave . "')";

    if ($mysqli->query($insert)) {
        $mensaje = "El usuario se ha creado correctamente.";
        $linkVolver = "index.php";
        $textoVoler = "Volver al menú.";
    } else {
        $mensaje = "Ocurrió un problema creando el usuario, por favor intente de nuevo.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles.css" rel="stylesheet">
    <title><?php echo $mensaje ?></title>
</head>

<body>
    <div class="bloque-basico">
        <p class="mensaje">
            <em><?php echo $mensaje ?></em> <a href="<?php echo $linkVolver ?>"><?php echo $textoVoler ?></a>
        </p>
    </div>
</body>

</html>
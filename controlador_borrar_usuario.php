<?php
include_once("variables-bd.php");

// Recibir los valores de los parámetros desde petición GET.

$usuario = isset($_GET["usuario"]) ? $_GET["usuario"] : '';

// Validar que los parámetros tengan valores.

$paramsValidos = true;
$mensaje = "";

if (strlen($usuario) == 0) {
    $mensaje = "No ingresó usuario";
    $paramsValidos = false;
}

if ($paramsValidos) {
    // Comprobar si el usuario existe en la base de datos.

    $mysqli = new mysqli($host_bd, $usuario_bd, $contrasena_bd, "adsi");

    $consulta  = "select count(1) cantidad from usuarios where usuario = '" . $usuario . "'";

    if ($resultado = $mysqli->query($consulta)) {
        if ($fila = $resultado->fetch_assoc()) {

            if ($fila["cantidad"] > 0) {
                // Eliminar usuario en la base de datos.

                $delete  = "delete from usuarios where usuario = '" . $usuario . "'";

                if ($mysqli->query($delete)) {
                    $mensaje = "El usuario se ha eliminado correctamente.";
                } else {
                    $mensaje = "No se pudo realizar la eliminación del usuario, por favor intente de nuevo.";
                }
            } else {
                $mensaje = "No existe este usuario.";
            }
        }
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
            <em><?php echo $mensaje ?></em> <a href="index.php">Volver al menú.</a>
        </p>
    </div>
</body>

</html>
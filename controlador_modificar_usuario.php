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

$consulta  = "select count(1) cantidad from usuarios where identificacion = '" . $identificacion . "'";
$usuarioExiste = false;

$mensaje = "El usuario se ha modificado correctamente.";
$linkVolver = "menu_crud_usuarios.php";
$textoVoler = "Volver al menú.";

if ($resultado = $mysqli->query($consulta)) {
    if ($fila = $resultado->fetch_assoc()) {
        $usuarioExiste = $fila["cantidad"] > 0;

        if ($usuarioExiste) {
            $insert  = "update usuarios set nombre = '" . $nombre_completo . "', usuario = '" . $usuario . "', clave = '" . $clave . "' where identificacion = '" . $identificacion . "'";
            $registroModificado = $mysqli->query($insert);

            if (!$registroModificado) {
                $mensaje = "No se pudo realizar la modificación del usuario, por favor intente de nuevo.";
                $linkVolver = "vista_modificacion.php";
                $textoVoler = "Volver.";
            }
        } else {
            $mensaje = "No existe un usuario con esta identiciación.";
            $linkVolver = "vista_modificacion.php";
            $textoVoler = "Volver.";
        }
    }
}
?>
<strong><?php echo $mensaje ?></strong>
<a href="<?php echo $linkVolver ?>"><?php echo $textoVoler ?></a>
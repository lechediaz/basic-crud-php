<?php

$identificacion = isset($_POST["identificacion"]) ? $_POST["identificacion"] : '';

// En caso que no envien datos
if (strlen($identificacion) == 0) {
    echo "No ingresó identifiación";
    return;
}

// Insertar en la base de datos.

$host_bd = "localhost";
$usuario_bd = "root";
$contrasena_bd = "";

$mysqli = new mysqli($host_bd, $usuario_bd, $contrasena_bd, "adsi");

$consulta  = "select count(1) cantidad from usuarios where identificacion = '" . $identificacion . "'";
$usuarioExiste = false;

$mensaje = "El usuario se ha eliminado correctamente.";
$linkVolver = "menu_crud_usuarios.php";
$textoVoler = "Volver al menú.";

if ($resultado = $mysqli->query($consulta)) {
    if ($fila = $resultado->fetch_assoc()) {
        $usuarioExiste = $fila["cantidad"] > 0;

        if ($usuarioExiste) {
            $delete  = "delete from usuarios where identificacion = '" . $identificacion . "'";
            $registroEliminado = $mysqli->query($delete);

            if (!$registroEliminado) {
                $mensaje = "No se pudo realizar la eliminación del usuario, por favor intente de nuevo.";
                $linkVolver = "vista_borrado.php";
                $textoVoler = "Volver.";
            }
        } else {
            $mensaje = "No existe un usuario con esta identiciación.";
            $linkVolver = "vista_borrado.php";
            $textoVoler = "Volver.";
        }
    }
}
?>
<strong><?php echo $mensaje ?></strong>
<a href="<?php echo $linkVolver ?>"><?php echo $textoVoler ?></a>
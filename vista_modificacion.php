<?php
include_once("variables-bd.php");

// Recibir los valores de los parámetros desde petición GET.

$usuario = isset($_GET["usuario"]) ? $_GET["usuario"] : '';

// Validar que los parámetros tengan valores.

$paramsValidos = true;
$mensaje = "";

if (strlen($usuario) == 0) {
    $mensaje =  "No ingresó usuario";
    $paramsValidos = false;
}

$infoUsuario = null;

// Connsultar información del usuario en la base de datos.

if ($paramsValidos) {
    $mysqli = new mysqli($host_bd, $usuario_bd, $contrasena_bd, "adsi");

    $consulta  = "select identificacion, nombre, usuario, clave from usuarios where usuario = '" . $usuario . "'";

    if ($resultado = $mysqli->query($consulta)) {
        $infoUsuario = $resultado->fetch_assoc();

        if (!$infoUsuario) {
            $mensaje =  "No se encontró el usuario '" . $usuario .  "'.";
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
    <?php if ($infoUsuario) : ?>
        <form class="bloque-basico" method="POST" action="controlador_modificar_usuario.php">
            <h2>Modificar Usuario '<?php echo $infoUsuario["usuario"] ?>'</h2>
            <div class="input-group">
                <label for="identificacion">Identificación</label>
                <input name="identificacion" placeholder="Ingrese su identificación" required type="text" value="<?php echo $infoUsuario["identificacion"] ?>">
            </div>
            <div class="input-group">
                <label for="nombre_completo">Nombre Completo</label>
                <input name="nombre_completo" placeholder="Ingrese su nombre completo" required type="text" value="<?php echo $infoUsuario["nombre"] ?>">
            </div>
            <div class="input-group">
                <label for="clave">Clave</label>
                <input name="clave" placeholder="Ingrese su clave" required type="password" value="<?php echo $infoUsuario["clave"] ?>">
            </div>
            <input hidden name="usuario" placeholder="Ingrese su nombre de usuario" required type="text" value="<?php echo $infoUsuario["usuario"] ?>">
            <input type="submit" value="Procesar">
        </form>
    <?php else : ?>
        <div class="bloque-basico">
            <p class="mensaje">
                <em><?php echo $mensaje ?></em> <a href="index.php">Volver al menú.</a>
            </p>
        </div>
    <?php endif; ?>
</body>

</html>
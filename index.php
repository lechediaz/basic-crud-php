<?php
include_once("variables-bd.php");

$mysqli = new mysqli($host_bd, $usuario_bd, $contrasena_bd, "adsi");

$consulta  = "select identificacion, nombre, usuario, clave from usuarios order by nombre";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles.css" rel="stylesheet">
    <title>Gestión de Usuarios</title>
</head>

<body>
    <div class="bloque-basico">
        <h1>Gestión de Usuarios</h1>
        <a class="boton-crear" href="vista_creacion.php">Crear Usuario</a>

        <table>
            <thead>
                <tr>
                    <th>Identificación</th>
                    <th>Nombre Completo</th>
                    <th>Nombre Usuario</th>
                    <th>Clave <a href="#about-claves">*</a></th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($resultado = $mysqli->query($consulta)) {
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<tr>" .
                            "<td>" . $fila["identificacion"] . "</td>" .
                            "<td>" . $fila["nombre"] . "</td>" .
                            "<td>" . $fila["usuario"] . "</td>" .
                            "<td>" . $fila["clave"] . "</td>" .
                            "<td>" .
                            "<a href=\"vista_modificacion.php?usuario=" . $fila["usuario"] . "\">Modificar</a>" .
                            " | " .
                            "<a href=\"controlador_borrar_usuario.php?usuario=" . $fila["usuario"] . "\">Borrar</a>" .
                            "</td>" .
                            "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>

        <div class="notas">
            <p id="about-claves">* Las claves jamás deberían estar expuestas, se muestran con fines educativos.</p>
        </div>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles.css" rel="stylesheet">
    <title>Crear Usuario</title>
</head>

<body>
    <form class="bloque-basico" method="POST" action="controlador_crear_usuario.php">
        <h2>Crear Usuario</h2>
        <div class="input-group">
            <label for="identificacion">Identificación</label>
            <input id="identificacion" name="identificacion" placeholder="Ingrese su identificación" required type="text">
        </div>
        <div class="input-group">
            <label for="nombre_completo">Nombre Completo</label>
            <input id="nombre_completo" name="nombre_completo" placeholder="Ingrese su nombre completo" required type="text">
        </div>
        <div class="input-group">
            <label for="usuario">Usuario</label>
            <input id="usuario" name="usuario" placeholder="Ingrese su nombre de usuario" required type="text">
        </div>
        <div class="input-group">
            <label for="clave">Clave</label>
            <input id="clave" name="clave" placeholder="Ingrese su clave" required type="password">
        </div>
        <input type="submit" value="Procesar">
    </form>
</body>

</html>
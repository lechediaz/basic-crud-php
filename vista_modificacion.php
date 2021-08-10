<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles.css" rel="stylesheet">
    <title>Modificar Usuario</title>
</head>

<body>
    <h2>Modificar Usuario</h2>
    <form method="POST" action="controlador_modificar_usuario.php">
        <div>
            <label for="identificacion">Identificación</label>
            <input name="identificacion" placeholder="Ingrese su identificación" required type="text">
        </div>
        <div>
            <label for="nombre_completo">Nombre Completo</label>
            <input name="nombre_completo" placeholder="Ingrese su nombre completo" required type="text">
        </div>
        <div>
            <label for="usuario">Usuario</label>
            <input name="usuario" placeholder="Ingrese su nombre de usuario" required type="text">
        </div>
        <div>
            <label for="clave">Clave</label>
            <input name="clave" placeholder="Ingrese su clave" required type="password">
        </div>
        <input type="submit" value="Procesar">
    </form>
</body>

</html>
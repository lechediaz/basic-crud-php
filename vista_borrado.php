<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles.css" rel="stylesheet">
    <title>Borrar Usuario</title>
</head>

<body>
    <h2>Borrar Usuario</h2>
    <form method="POST" action="controlador_borrar_usuario.php">
        <div>
            <label for="identificacion">Identificación</label>
            <input name="identificacion" placeholder="Ingrese su identificación" required type="text">
        </div>
        <input type="submit" value="Procesar">
    </form>
</body>

</html>
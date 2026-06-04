<?php require_once 'config/config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE_BUSINESS; ?></title>
<link rel="stylesheet" href="/control-de-cobros/public/css/login.css"</head>
<body>
    <form action="validar.php" method="POST">
        <label for="user">Usuario</label>
        <input id="user" name="usuario" type="text" required>

        <label for="pass">Contraseña</label>
        <input id="pass" name="clave" type="password" required>

        <button type="submit">iniciar sesion</button>
        <button type="submit" formaction="index.php?url=auth/login">volver</button>

    </form>
</body>
</html>
<?php require_once 'config/config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE_BUSINESS; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/login.css?v=<?php echo time(); ?>">
</head>
<body>
    <video autoplay muted loop id="video-fondo">
        <source src="public/video/video.mp4" type="video/mp4">
    </video>

    <div class="login-container">
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="font-size: 0.85rem;">
                Usuario o contraseña incorrectos.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <form action="index.php?url=auth/login" method="POST">
            <h2 class="text-white text-center mb-4">Agua SAC</h2>
            
            <label>Usuario:</label>
            <input type="text" name="nombre_usuario" placeholder="Ingrese su usuario" required>

            <label>Contraseña:</label>
            <input type="password" name="clave" placeholder="********" required>

            <button type="submit">Ingresar</button>
            <a href="index.php?url=inicio" class="btn-back">Atrás</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agua SAC- Sistema de Gestión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="public/css/landing.css">
    <link rel="stylesheet" href="public/css/video.css">
</head>
<body>

   <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="#">Agua SAC</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item"><a class="nav-link active" href="#inicio">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="#beneficios">Beneficios</a></li>
                <a class="btn btn-primary btn-sm ms-2 text-white px-3" href="index.php?url=auth/login">
                <i class="fa-solid fa-right-to-bracket"></i> Iniciar Sesión </a>   
            </ul>
        </div>
    </div>
</nav>

<section id="inicio" class="hero-section text-center text-lg-start">
    <video autoplay muted loop playsinline class="video-fondo">
        <source src="public/video/video.mp4" type="video/mp4">
        Tu navegador no soporta video.
    </video>

    <div class="overlay"></div>

    <div class="container position-relative" style="z-index: 2;">
        <div class="row align-items-center g-4 g-lg-5">
            <div class="col-12 col-lg-7 text-center text-lg-start">
                <h1 class="display-4 fw-bold mb-3 text-white hero-title">Gestión integral de tu servicio de agua potable.</h1>
                <p class="lead mb-4 hero-subtitle" style="color: #cbd5e1;">Accede a tu consumo, descarga tus recibos y realiza pagos de forma rápida y segura desde nuestra plataforma digital. Estamos comprometidos con la transparencia y la comodidad en tu servicio.</p>
                <div class="d-flex flex-wrap justify-content-center justify-content-lg-start gap-2">
                    <a href="#beneficios" class="btn btn-outline-light btn-lg px-4">Saber Más</a>
                </div>
            </div>
            <div class="col-12 col-lg-5 text-center hero-icon-container">
                <i class="fa-solid fa-laptop-code text-primary opacity-75"></i>
            </div>
        </div>
    </div>
</section>

    <section id="beneficios" class="py-5 bg-white">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Gestiona tu suministro de agua con total transparencia</h2>
                <p class="text-muted">Gestiona tu suministro de agua con total transparencia</p>
            </div>
            <div class="row g-4">
                <div class="col-12 col-md-4">
                    <div class="card h-100 p-4 feature-card text-center">
                        <div class="icon-box"><i class="fa-solid fa-users"></i></div>
                        <h4 class="fw-bold">Tu información, siempre disponible</h4>
                        <p class="text-muted m-0">Consulta tu historial de consumo, actualiza tus datos de contacto y revisa el estado de tu cuenta de forma clara, ordenada y segura en todo momento.</p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card h-100 p-4 feature-card text-center">
                        <div class="icon-box"><i class="fa-solid fa-file-invoice-dollar"></i></div>
                        <h4 class="fw-bold">Recibos al Instante</h4>
                        <p class="text-muted m-0">Genera y descarga tus estados de cuenta o recibos detallados. Visualiza tus periodos de consumo, montos pendientes y fechas de vencimiento con un solo clic.</p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card h-100 p-4 feature-card text-center">
                        <div class="icon-box"><i class="fa-solid fa-chart-pie"></i></div>
                        <h4 class="fw-bold">Conéctate desde donde estés</h4>
                        <p class="text-muted m-0">Accede a nuestra plataforma desde tu computadora, tablet o teléfono inteligente. Gestiona tu servicio de agua potable con la misma facilidad, sin importar dónde te encuentres.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-4 text-center">
        <div class="container">
            <p class="m-0">&copy; 2026 Agua SAC.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="public/js/Home.js"></script>
</body>
</html>
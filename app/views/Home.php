<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agua SAC- Sistema de Gestión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="public/css/landing.css">
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
                <li class="nav-item"><a class="btn btn-primary btn-sm ms-2 text-white px-3" href="login.php"><i class="fa-solid fa-right-to-bracket"></i> Iniciar Sesión</a></li>
            </ul>
        </div>
    </div>
</nav>

    <section id="inicio" class="hero-section text-center text-md-start">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-md-7">
                    <h1 class="display-4 fw-bold mb-3">Automatiza tus Cobros y Control de Clientes</h1>
                    <p class="lead mb-4" style="color: #cbd5e1;">La plataforma inteligente diseñada para optimizar tus recibos, organizar tu base de datos y elevar la administración de tu negocio al siguiente nivel.</p>
                    <a href="#registro" class="btn btn-primary btn-lg px-4 me-2 shadow">Empezar Gratis</a>
                    <a href="#beneficios" class="btn btn-outline-light btn-lg px-4">Saber Más</a>
                </div>
                <div class="col-md-5 text-center">
                    <i class="fa-solid fa-laptop-code text-primary opacity-75" style="font-size: 10rem;"></i>
                </div>
            </div>
        </div>
    </section>

    <section id="beneficios" class="py-5 bg-white">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Características Principales</h2>
                <p class="text-muted">Todo lo necesario para gestionar tu negocio en un solo lugar de forma responsiva.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 p-4 feature-card text-center">
                        <div class="icon-box"><i class="fa-solid fa-users"></i></div>
                        <h4 class="fw-bold">Control de Clientes</h4>
                        <p class="text-muted m-0">Registra, edita y visualiza tu base de datos organizada correctement de forma limpia y transparente.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 p-4 feature-card text-center">
                        <div class="icon-box"><i class="fa-solid fa-file-invoice-dollar"></i></div>
                        <h4 class="fw-bold">Recibos al Instante</h4>
                        <p class="text-muted m-0">Genera las lista de cobros, organizados por periodos, montos totales y estados de pago en un clic.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 p-4 feature-card text-center">
                        <div class="icon-box"><i class="fa-solid fa-chart-pie"></i></div>
                        <h4 class="fw-bold">Acceso Multiplataforma</h4>
                        <p class="text-muted m-0">Accede de manera óptima desde computadoras, tablets o teléfonos inteligentes.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="registro" class="py-5 bg-light">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow p-4 p-md-5 border-0 rounded-4">
                    <h3 class="fw-bold text-center mb-2">Crea tu Cuenta</h3>
                    <p class="text-muted text-center mb-4">Ingresa tus datos para acceder a la demostración.</p>
                    
                    <form id="landingForm">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nombre de Usuario</label>
                            <input type="text" id="regNombre" class="form-control" placeholder="Ej. Nombre de usuario" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">contraseña</label>
                            <input type="password" id="regPassword" class="form-control" placeholder="Ingresa una  contraseña" required>
                        </div>
                        <button type="submit" id="btnRegistro" class="btn btn-primary w-100 py-2.5 fw-bold mt-2"> Registrarme
                        </button>
                    </form>
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
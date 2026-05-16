<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<link rel="stylesheet" href="../../public/css/dashboard.css">

<div class="sidebar-moderno d-flex flex-column shadow" id="menuLateral">
    <div class="p-4 text-center border-bottom border-secondary border-opacity-25">
        <h4 class="fw-bold text-white m-0">AGUA SAC PANEL</h4>
    </div>
    <ul class="nav flex-column mt-3 flex-grow-1">
        <li class="nav-item">
            <a class="nav-link" href="/control-de-cobros/index.php"><i class="fa-solid fa-house"></i> Ver Landing</a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link active" href="/control-de-cobros/index.php?url=clientes"><i class="fa-solid fa-users"></i> Clientes</a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="/control-de-cobros/index.php?url=recibos"><i class="fa-solid fa-file-invoice-dollar"></i> Recibos</a>
        </li>
    </ul>
</div>
<div class="d-lg-none position-fixed top-0 start-0 m-3" style="z-index: 1100;">
    <button class="btn btn-dark shadow-sm" id="toggleMenuBtn">
        <i class="fa-solid fa-bars"></i>
    </button>
</div>

<script>
    document.getElementById('toggleMenuBtn').addEventListener('click', function() {
        document.getElementById('menuLateral').classList.toggle('mostrar-movil');
    });
</script>
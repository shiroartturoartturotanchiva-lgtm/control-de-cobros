<?php include BASE_PATH . '/app/views/layout/header.php'; ?>
<?php include BASE_PATH . '/app/views/layout/sidebar-dashboard.php'; ?>

<link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/clientes.css?v=<?php echo time(); ?>">

<main class="main-clientes">
    <div class="container-fluid">
        
        <div class="clientes-header">
            <h2 class="clientes-title">
                <i class="fa-solid fa-users"></i> Listado de Clientes
            </h2>
            <button class="btn-nuevo-cliente">
                <i class="fa-solid fa-user-plus"></i> Nuevo Cliente
            </button>
        </div>

        <div class="clientes-card">
            <div class="table-responsive-custom">
                <table class="tabla-clientes">
                    <thead>
                        <tr>
                            <th style="border-top-left-radius: 5px; border-bottom-left-radius: 5px;">ID</th>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Fecha Registro</th>
                            <th style="text-align: center; border-top-right-radius: 5px; border-bottom-right-radius: 5px;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($clientes)): ?>
                            <?php foreach ($clientes as $c): ?>
                            <tr>
                                <td class="celda-id"><?php echo $c['id_cliente']; ?></td>
                                <td class="celda-dni"><?php echo $c['dni']; ?></td>
                                <td class="celda-nombre"><?php echo $c['nombre']; ?></td>
                                <td class="celda-direccion">
                                    <?php echo $c['direccion'] ?? '<span class="celda-vacia">Sin dirección</span>'; ?>
                                </td>
                                <td class="celda-fecha"><?php echo date('d/m/Y', strtotime($c['fecha_registro'])); ?></td>
                                <td class="celda-acciones">
                                    <button class="btn-editar" title="Editar">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                    <button class="btn-eliminar" title="Eliminar">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" style="padding: 30px; text-align: center;" class="celda-vacia">
                                    No hay clientes registrados en el sistema.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</main>

<?php include BASE_PATH . '/app/views/layout/footer.php'; ?>
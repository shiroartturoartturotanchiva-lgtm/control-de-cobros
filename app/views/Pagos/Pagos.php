<?php include BASE_PATH . '/views/layout/header.php'; ?>
<?php include BASE_PATH . '/views/layout/sidebar-dashboard.php'; ?>
<link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/pagos.css?v=<?php echo time(); ?>">

<main class="main-pagos">
    <div class="container-fluid">
        <div class="pagos-header">
            <h2 class="pagos-title">
                <i class="fa-solid fa-money-bill-transfer"></i> Listado de Pagos
            </h2>
            <button class="btn-nuevo-pago">
                <i class="fa-solid fa-plus"></i> Nuevo Pago
            </button>
        </div>

        <div class="pagos-card">
            <div class="table-responsive-custom">
                <table class="tabla-pagos">
                    <thead>
                        <tr>
                            <th>ID Pago</th>
                            <th>ID Recibo</th>
                            <th>Cliente</th>
                            <th>DNI</th>
                            <th>Fecha Pago</th>
                            <th>Monto</th>
                            <th style="text-align: center;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($pagos)): ?>
                            <?php foreach ($pagos as $p): ?>
                                <tr>
                                    <td class="celda-id"><?php echo htmlspecialchars($p['id_pago'] ?? '0'); ?></td>
                                    <td class="celda-id-recibo"><?php echo htmlspecialchars($p['id_recibo'] ?? '0'); ?></td>
                                    <td class="celda-cliente"><?php echo htmlspecialchars($p['nombre'] ?? 'Cliente Desconocido'); ?></td>
                                    <td class="celda-dni"><?php echo htmlspecialchars($p['dni'] ?? '0'); ?></td>
                                    <td class="celda-fecha"><?php echo isset($p['fecha_pago']) ? date('d/m/Y', strtotime($p['fecha_pago'])) : 'N/A'; ?></td>
                                    <td class="celda-monto">s/ <?php echo number_format($p['monto'] ?? 0, 2); ?></td>
                                    <td class="celda-acciones">
                                        <button class="btn-editar" title="Editar"><i class="fa-solid fa-pen"></i></button>
                                        <button class="btn-eliminar" title="Eliminar"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?> 
                            <tr>
                                <td colspan="7" style="padding: 30px; text-align: center;" class="celda-vacia">
                                    No hay pagos registrados en el sistema.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php include_once BASE_PATH . '/views/layout/footer.php'; ?>
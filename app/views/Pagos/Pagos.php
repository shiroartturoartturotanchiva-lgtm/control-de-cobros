<?php include BASE_PATH . '/views/layout/header.php'; ?>
<?php include BASE_PATH . '/views/layout/sidebar-dashboard.php'; ?>
<link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/pagos.css?v=<?php echo time(); ?>">

<main class="main-pagos">
    <div class="container-fluid">
        <div class="pagos-header">
            <h2 class="pagos-title">
                <i class="fa-solid fa-money-bill-transfer"></i> Listado de Pagos
            </h2>
            <?php if (isset($_GET['status']) && $_GET['status'] === 'saved'): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>¡Excelente!</strong> El pago se registró con éxito y el recibo pasó a estado 'Pagado'.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNuevoPago">
    <i class="fa-solid fa-plus"></i> Nuevo Pago
</button>
        </div>

        <div class="pagos-card">
            <div class="table-responsive">
                <table class="tabla-pagos">
                    <thead>
                        <tr>
                        
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
                          <?php foreach ($pagos as $pago): ?>
<tr>
    <td><?php echo $pago['id_recibo']; ?></td>
    
    <td><?php echo $pago['cliente_nombre']; ?></td>
    <td><?php echo $pago['cliente_dni']; ?></td>
    
    <td><?php echo date('d/m/Y', strtotime($pago['fecha_pago'])); ?></td>
    <td>s/ <?php echo number_format($pago['monto'], 2); ?></td>
    <td>
        <a href="index.php?url=pagos&action=eliminar&id=<?php echo $pago['id_pago']; ?>" 
           class="btn btn-danger btn-sm" 
           onclick="return confirm('¿Estás seguro de que deseas eliminar este pago del historial?');">
            <i class="fa-solid fa-trash"></i>
        </a>
    </td>
</tr>
<?php endforeach; ?>
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
<div class="modal fade" id="modalNuevoPago" tabindex="-1" aria-labelledby="modalNuevoPagoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalNuevoPagoLabel">Registrar Pago de Agua</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="index.php?url=pagos&action=guardar" method="POST">
        <div class="modal-body">
          
          <div class="mb-3">
            <label for="id_recibo" class="form-label">Seleccionar Recibo Pendiente</label>
            <select class="form-select" name="id_recibo" id="id_recibo" required>
                <option value="">-- Seleccione un recibo --</option>
                <?php if(!empty($recibosPendientes)): ?>
                    <?php foreach($recibosPendientes as $recibo): ?>
                        <option value="<?php echo $recibo['id_recibo']; ?>">
                            Recibo Nº <?php echo $recibo['id_recibo']; ?> - <?php echo $recibo['cliente_nombre']; ?> (<?php echo $recibo['mes_periodo']; ?>) - S/ <?php echo $recibo['monto_total']; ?>
                        </option>
                    <?php endforeach; ?>
                <?php else: ?>
                    <option value="" disabled>No hay recibos pendientes de pago</option>
                <?php endif; ?>
            </select>
          </div>

          <div class="mb-3">
            <label for="metodo_pago" class="form-label">Método de Pago</label>
            <select class="form-select" name="metodo_pago" id="metodo_pago" required>
                <option value="Efectivo">Efectivo</option>
                <option value="Yape">Yape</option>
                <option value="Plin">Plin</option>
                <option value="Transferencia">Transferencia Bancaria</option>
            </select>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-success">Confirmar Pago</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php include_once BASE_PATH . '/views/layout/footer.php'; ?>

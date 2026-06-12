<?php include dirname(__DIR__) . '/layout/header.php'; ?>
<?php include dirname(__DIR__) . '/layout/sidebar-dashboard.php'; ?>

<link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/recibos.css?v=<?php echo time(); ?>">

<div class="contenedor-principal-recibos">
    
    <?php if (isset($_GET['status']) && $_GET['status'] === 'created'): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-bottom: 20px;">
            <strong>¡Éxito!</strong> El nuevo recibo se ha generado correctamente para el cliente.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fa-solid fa-file-invoice-dollar"></i> Lista de Recibos</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNuevoRecibo">
            <i class="fa-solid fa-plus"></i> Nuevo Recibo
        </button>
    </div>

    <div class="tarjeta-blanca-recibos">
        <table class="tabla-recibos-limpia">
            <thead>
                <tr>
                    <th>ID Recibo</th>
                    <th>Cliente</th>
                    <th>Periodo</th>
                    <th>Monto</th>
                    <th>Estado</th>
                    <th style="text-align: center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $nombre_anterior = "";
                if (!empty($recibos)):
                    foreach ($recibos as $r): 
                        $nombre_actual = $r['nombre']; 
                    ?>
                        <?php if ($nombre_actual != $nombre_anterior): ?>
                            <tr class="group-row">
                                <td colspan="6">
                                    <i class="fa-solid fa-user"></i> <?php echo htmlspecialchars($nombre_actual); ?>
                                </td>
                            </tr>
                            <?php $nombre_anterior = $nombre_actual; ?>
                        <?php endif; ?>

                        <tr>
                            <td><?php echo $r['id_recibo']; ?></td>
                            <td>—</td> 
                            <td><?php echo htmlspecialchars($r['mes_periodo']); ?></td>
                            <td>S/ <?php echo number_format($r['monto_total'], 2); ?></td>
                            <td>
                                <span class="badge <?php echo ($r['estado'] == 'pagado') ? 'bg-success' : 'bg-danger'; ?>">
                                    <?php echo ucfirst($r['estado']); ?>
                                </span>
                            </td>
                            <td style="text-align: center;">
                                <button class="btn-icon btn-eliminar" title="Eliminar"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php 
                    endforeach; 
                else: 
                ?>
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 20px;">No hay recibos generados en el sistema.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modalNuevoRecibo" tabindex="-1" aria-labelledby="modalNuevoReciboLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalNuevoReciboLabel">Generar Nuevo Recibo de Agua</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="index.php?url=recibos&action=guardar" method="POST">
        <div class="modal-body">
          
          <div class="mb-3">
            <label for="id_cliente" class="form-label">Seleccionar Cliente</label>
            <select class="form-select" name="id_cliente" id="id_cliente" required>
                <option value="">-- Seleccione un usuario --</option>
                <?php if (!empty($clientes)): ?>
                    <?php foreach($clientes as $cliente): ?>
                        <option value="<?php echo $cliente['id_cliente']; ?>">
                            <?php echo htmlspecialchars($cliente['nombre']); ?> (DNI: <?php echo htmlspecialchars($cliente['dni']); ?>)
                        </option>
                    <?php endforeach; ?>
                <?php else: ?>
                    <option value="" disabled>No hay clientes registrados</option>
                <?php endif; ?>
            </select>
          </div>

          <div class="mb-3">
            <label for="mes_periodo" class="form-label">Periodo / Mes Cobro</label>
            <input type="text" class="form-control" name="mes_periodo" id="mes_periodo" placeholder="Ej: Junio 2026" required>
          </div>

          <div class="mb-3">
            <label for="monto_total" class="form-label">Monto a Cobrar (S/)</label>
            <input type="number" step="0.01" class="form-control" name="monto_total" id="monto_total" value="10.00" required>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-success">Generar Recibo</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include dirname(__DIR__) . '/layout/footer.php'; ?>
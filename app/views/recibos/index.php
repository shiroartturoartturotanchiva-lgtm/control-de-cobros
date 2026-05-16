<?php include dirname(__DIR__) . '/layout/header.php'; ?>
<?php include dirname(__DIR__) . '/layout/sidebar-dashboard.php'; ?>

<style>
    /* Asegura el espacio exacto del menú lateral izquierdo para que no aplaste la tabla */
    .contenedor-principal-recibos {
        margin-left: 260px !important;
        padding: 30px !important;
        box-sizing: border-box !important;
        background-color: #f4f6f9 !important;
        min-height: 100vh !important;
        display: block !important;
    }

    /* Tarjeta blanca contenedora estilo Dashboard */
    .tarjeta-blanca-recibos {
        background: #ffffff !important;
        padding: 24px !important;
        border-radius: 10px !important;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05) !important;
        width: 100% !important;
        box-sizing: border-box !important;
        margin-top: 15px !important;
    }

    /* Zona responsiva con colchón de aire para evitar cortes en los bordes */
    .zona-tabla-recibos {
        width: 100% !important;
        overflow-x: auto !important;
        padding: 5px !important;
    }

    /* Control estricto de la tabla */
    .tabla-recibos-limpia {
        width: 100% !important;
        border-collapse: collapse !important;
        margin: 0 !important;
        table-layout: fixed !important; /* Obliga al navegador a respetar los anchos asignados */
    }

    .tabla-recibos-limpia thead tr {
        background-color: #212529 !important;
        color: #ffffff !important;
    }

    .tabla-recibos-limpia th, 
    .tabla-recibos-limpia td {
        padding: 14px 16px !important;
        text-align: left !important;
        vertical-align: middle !important;
        border-bottom: 1px solid #dee2e6 !important;
        box-sizing: border-box !important;
    }

    /* ALMOHADILLA DE SEGURIDAD EXCLUSIVA PARA EL ID */
    .celda-id-blindada {
        color: #0d6efd !important;
        font-weight: bold !important;
        padding-left: 25px !important; /* Espacio extra a la izquierda para que nunca se corte el # */
        width: 120px !important;
        white-space: nowrap !important;
    }

    /* Intercalado automático de colores de filas */
    .tabla-recibos-limpia tbody tr:nth-child(even) { background-color: #ffffff !important; }
    .tabla-recibos-limpia tbody tr:nth-child(odd) { background-color: #f8f9fa !important; }
</style>

<div class="contenedor-principal-recibos">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 style="font-size: 24px; color: #333; font-weight: 600; margin: 0;">
            <i class="fa-solid fa-file-invoice-dollar"></i> Lista de Recibos
        </h2>
        <button class="btn btn-primary">
            <i class="fa-solid fa-plus"></i> Nuevo Recibo
        </button>
    </div>

    <div class="tarjeta-blanca-recibos">
        <div class="zona-tabla-recibos">
            <table class="tabla-recibos-limpia">
                <thead>
                    <tr>
                        <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px; width: 120px !important; padding-left: 25px !important;">ID Recibo</th>
                        <th style="width: 250px;">Cliente</th>
                        <th style="width: 150px;">Periodo</th>
                        <th style="width: 140px;">Monto Total</th>
                        <th style="width: 130px;">Estado</th>
                        <th style="text-align: center; border-top-right-radius: 6px; border-bottom-right-radius: 6px; width: 120px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($recibos)): ?>
                        <?php foreach ($recibos as $r): ?>
                        <tr>
                            <td class="celda-id-blindada">
                                <?php echo isset($r['id_recibo']) ? $r['id_recibo'] : ($r['id'] ?? '0'); ?>
                            </td>
                            
                            <td style="font-weight: 500; color: #333; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                <?php echo !empty($r['nombre']) ? $r['nombre'] : 'Cliente #' . ($r['id_cliente'] ?? '0'); ?>
                            </td>
                            
                            <td class="text-muted"><?php echo $r['mes_periodo'] ?? 'Sin Periodo'; ?></td>
                            
                            <td style="font-weight: 600; color: #212529;">
                                S/ <?php echo number_format($r['monto_total'] ?? 0, 2); ?>
                            </td>
                            
                            <td>
                                <?php 
                                $estado = strtolower($r['estado'] ?? 'pendiente');
                                if ($estado == 'pagado') {
                                    $badgeClass = 'bg-success text-white';
                                    $texto = 'Pagado';
                                } elseif ($estado == 'anulado') {
                                    $badgeClass = 'bg-secondary text-white';
                                    $texto = 'Anulado';
                                } else {
                                    $badgeClass = 'bg-danger text-white';
                                    $texto = 'Pendiente';
                                }
                                ?>
                                <span class="badge <?php echo $badgeClass; ?>" style="font-size: 11px; padding: 6px 12px; text-transform: uppercase; font-weight: bold; border-radius: 4px; display: inline-block;">
                                    <?php echo $texto; ?>
                                </span>
                            </td>
                            
                            <td style="text-align: center;">
                                <button title="Editar" style="background-color: #ffc107; border: none; padding: 6px 10px; border-radius: 4px; margin-right: 5px; cursor: pointer;">
                                    <i class="fa-solid fa-pen" style="color: #000;"></i>
                                </button>
                                <button title="Eliminar" style="background-color: #dc3545; border: none; padding: 6px 10px; border-radius: 4px; cursor: pointer;">
                                    <i class="fa-solid fa-trash" style="color: #fff;"></i>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" style="padding: 30px; text-align: center; color: #999; font-style: italic;">
                                No hay recibos registrados en el sistema.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?php include dirname(__DIR__) . '/layout/footer.php'; ?>
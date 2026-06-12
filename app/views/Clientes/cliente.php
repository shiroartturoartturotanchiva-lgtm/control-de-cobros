<?php include BASE_PATH . '/views/layout/header.php'; ?>
<?php include BASE_PATH . '/views/layout/sidebar-dashboard.php'; ?>

<link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/clientes.css?v=<?php echo time(); ?>">
<main class="main-clientes">
    <div class="container-fluid">
        <div class="clientes-header">
            <h2 class="clientes-title"><i class="fa-solid fa-users"></i> Listado de Clientes</h2>
           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNuevoCliente">
    <i class="fa-solid fa-user-plus"></i> Nuevo Cliente
     </button>
        </div>

        <div class="clientes-card">
            <div class="table-responsive-custom">
                <table class="tabla-clientes">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Fecha Registro</th>
                            <th style="text-align: center;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($clientes)): ?>
                            <?php foreach ($clientes as $c): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($c['id_cliente']); ?></td>
                                <td><?php echo htmlspecialchars($c['dni']); ?></td>
                                <td><?php echo htmlspecialchars($c['nombre']); ?></td>
                                <td><?php echo htmlspecialchars($c['direccion'] ?? 'Sin dirección'); ?></td>
                                <td><?php echo date('d/m/Y', strtotime($c['fecha_registro'])); ?></td>
                                <td style="text-align: center;">
                                   <button type="button" onclick="abrirModal(<?php echo htmlspecialchars(json_encode($c), ENT_QUOTES, 'UTF-8'); ?>)">
                                        <i class="fa-solid fa-edit"></i> Editar
                                    </button>
                                    <button type="button" onclick="eliminarCliente(<?php echo $c['id_cliente']; ?>)" style="color: red; margin-left: 5px;">
                                        <i class="fa-solid fa-trash"></i> Eliminar
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="6" style="text-align: center;">No hay clientes registrados.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<div id="modal-edicion" class="modal-form" style="display:none; position:fixed; top:20%; left:35%; z-index:9999;">
    <h2>Editar Cliente</h2>
    <form id="form-cliente-ajax">
        <input type="hidden" name="id_cliente" id="edit-id">
        
        <label>DNI:</label>
        <input type="text" name="dni" id="edit-dni">
        
        <label>Nombre:</label>
        <input type="text" name="nombre" id="edit-nombre">
        
        <label>Dirección:</label>
        <input type="text" name="direccion" id="edit-direccion">
        
        <div class="button-group">
            <button type="button" class="btn-guardar" onclick="guardarCambios()">Guardar Cambios</button>
            <button type="button" class="btn-cancelar" onclick="document.getElementById('modal-edicion').style.display='none'">Cancelar</button>
        </div>
    </form>
</div>

<div class="modal fade" id="modalNuevoCliente" tabindex="-1" aria-labelledby="modalNuevoClienteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalNuevoClienteLabel">Registrar Nuevo Cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="index.php?url=clientes&action=guardar" method="POST">
        <div class="modal-body">
          
          <div class="mb-3">
            <label for="dni" class="form-label">DNI / Documento</label>
            <input type="text" class="form-control" name="dni" id="dni" required maxlength="8">
          </div>

          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre Completo</label>
            <input type="text" class="form-control" name="nombre" id="nombre" required>
          </div>

          <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" name="direccion" id="direccion" required>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-success">Guardar Cliente</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="<?php echo BASE_URL; ?>/public/js/clientes.js?v=<?php echo time(); ?>"></script>

<?php include BASE_PATH . '/views/layout/footer.php'; ?>
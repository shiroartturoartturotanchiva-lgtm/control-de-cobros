// public/js/clientes.js

function abrirModal(cliente) {
    document.getElementById('edit-id').value = cliente.id_cliente;
    document.getElementById('edit-dni').value = cliente.dni;
    document.getElementById('edit-nombre').value = cliente.nombre;
    document.getElementById('edit-direccion').value = cliente.direccion;
    document.getElementById('modal-edicion').style.display = 'block';
}

function guardarCambios() {
    const id = document.getElementById('edit-id').value;
    const dni = document.getElementById('edit-dni').value;
    const nombre = document.getElementById('edit-nombre').value;
    const direccion = document.getElementById('edit-direccion').value;

    const formData = new FormData();
    formData.append('id_cliente', id);
    formData.append('dni', dni);
    formData.append('nombre', nombre);
    formData.append('direccion', direccion);

    // Usa esta URL exacta, que es la que te devolvió el {"success":true}
    const url = '/control-de-cobros/index.php?url=clientes/editar_cliente';

    fetch(url, {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) throw new Error('Error en el servidor');
        return response.json(); // Aquí es donde JavaScript lee el {"success":true}
    })
    .then(data => {
        if (data.success) {
            alert('¡Cliente actualizado con éxito!');
            location.reload(); // Recarga la página para ver los cambios
        } else {
            alert('Error al actualizar el cliente.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Hubo un problema al conectar con el servidor.');
    });
}
function eliminarCliente(id) {
    if (confirm('¿Estás seguro de eliminar este cliente?')) {
        fetch('index.php?url=clientes/eliminar&id=' + id)
        .then(response => response.json())
        .then(data => { alert('Cliente eliminado'); location.reload(); });
    }
}
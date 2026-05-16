
// LÓGICA  DE LA LANDING PAGE
document.addEventListener('DOMContentLoaded', function() {
    const formLanding = document.getElementById('landingForm');
    
    if (formLanding) {
        formLanding.addEventListener('submit', function(e) {
            e.preventDefault(); // Evita que la página se recargue

            const boton = document.getElementById('btnRegistro');
            const nombre = document.getElementById('regNombre').value;

            // Efecto visual de carga en el botón
            boton.disabled = true;
            boton.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-2"></i> Procesando acceso...';

            // Pausa estética de 1.2 segundos y redirección al panel
            setTimeout(function() {
                alert('¡Bienvenido, ' + nombre + '! Tu cuenta ha sido creada con éxito. Redirigiendo al panel...');
                window.location.href = 'index.php?url=clientes';
            }, 1200); 
        });
    }
});
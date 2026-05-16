// Esperar a que toda la página cargue
document.addEventListener('DOMContentLoaded', function() {
    console.log("Sistema Agua SAC: JS cargado correctamente.");


    botonesVer.forEach(boton => {
        boton.addEventListener('click', function(e) {
            // Esto es solo para probar, luego podemos abrir un modal
            console.log("Visualizando detalles del cliente...");
        });
    });
});

function confirmarCobro(nombre, idRecibo) {
    if (confirm("¿Confirmas el pago de S/ para " + nombre + "?")) {
        // Por ahora redirigimos, luego podemos usar AJAX
        window.location.href = "pagar-recibo?id=" + idRecibo;
    }
}
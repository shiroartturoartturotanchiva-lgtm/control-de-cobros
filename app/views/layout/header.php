<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agua SAC - Dashboard</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="/control-de-cobros/public/css/dashboard.css">
</head>
<body>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btnToggle = document.querySelector('.hamburger-btn');
            const sidebar = document.querySelector('.sidebar-moderno');

            if(btnToggle && sidebar) {
                btnToggle.addEventListener('click', () => {
                    sidebar.classList.toggle('active');
                });
            }
        });
    </script>

    <div style="display: flex; min-height: 100vh; width: 100%;">
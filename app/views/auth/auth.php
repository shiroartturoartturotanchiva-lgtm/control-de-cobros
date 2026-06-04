<?php
session_start();

// Datos "quemados" para prueba rápida (luego lo conectaremos a tu BD)
$usuario_correcto = "admin";
$pass_correcta = "123456";

if ($_POST['usuario'] == $usuario_correcto && $_POST['password'] == $pass_correcta) {
    // Si los datos son correctos, creamos la "llave" de acceso
    $_SESSION['usuario'] = $_POST['usuario'];
    
    // Y lo mandamos al Dashboard
  header('Location: ../../index.php?url=dashboard/index');
} else {
    echo "Datos incorrectos. <a href='login.php'>Volver</a>";
}
?>
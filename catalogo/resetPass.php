<?php
    require 'config/config.php';
    require 'funciones/conexion.php';
    require 'funciones/usuarios.php';
    $chequeo = mailResetPass();
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container py-4">
        <h1>Combio de contraseña</h1>

<?php
    if ( $chequeo ) {
        echo 'Se ha enviado email';
    }
    else{
        echo 'no se pudo modificar';
    }
?>


    </main>

<?php
include 'layout/footer.php';
?>
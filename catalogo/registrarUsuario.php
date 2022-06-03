<?php
    require 'config/config.php';
    require 'funciones/conexion.php';
    require 'funciones/usuarios.php';
    $agregar = agregarUsuario();
    $css = 'danger';
    $mensaje = 'No se pudo agregar el usuario.';
    if ( $agregar ){
        $css = 'success';
        $mensaje = 'Usuario agregado correctamente.';
    }
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container py-4">
        <h1>Alta de un usurio</h1>

        <div class="alert alert-<?= $css ?> p-4 col-8 mx-auto shadow">
            <?= $mensaje ?>
            <a href="adminUsuarios.php" class="btn btn-outline-secondary">
                Volver a panel de usuarios
            </a>
        </div>
        
    </main>

<?php
    include 'layout/footer.php';
?>
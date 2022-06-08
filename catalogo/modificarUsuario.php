<?php
    require 'config/config.php';
    require 'funciones/autenticacion.php';
        autenticar();
    require 'funciones/conexion.php';
    require 'funciones/usuarios.php';
    $check = modificarUsuario();
    $css = 'danger';
    $mensaje = 'No se pudo modificar el usuario.';
    if ( $check ){
        $css = 'success';
        $mensaje = 'Usuario modificado correctamente.';
    }
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container py-4">
        <h1>Modificación de un usurio</h1>

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
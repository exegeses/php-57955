<?php
    require 'config/config.php';
    require 'funciones/autenticacion.php';
        autenticar();
    require 'funciones/conexion-local.php';
    require 'funciones/marcas.php';
    $agregar = agregarMarca( );
    $css = 'danger';
    $mensaje = 'No se pudo agregar la marca.';
    if ( $agregar ){
        $css = 'success';
        $mensaje = 'Marca agregada correctamente.';
    }
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container py-4">
        <h1>Alta de una marca</h1>

        <div class="alert alert-<?= $css ?> p-4 col-8 mx-auto shadow">
            <?= $mensaje ?>
            <a href="adminMarcas.php" class="btn btn-outline-secondary">
                Volver a panel de marcas
            </a>
        </div>
        
    </main>

<?php
    include 'layout/footer.php';
?>
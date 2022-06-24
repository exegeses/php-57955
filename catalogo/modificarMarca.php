<?php
    //require 'config/config.php';
    require 'funciones/conexion-local.php';
    require 'funciones/marcas.php';
    $check = modificarMarca();
    $css = 'danger';
    $mensaje = 'No se pudo modificar la marca.';
    if ( $check ){
        $css = 'success';
        $mensaje = 'Marca modificada correctamente.';
    }
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container py-4">
        <h1>Modificación de una marca</h1>

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
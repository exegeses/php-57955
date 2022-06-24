<?php
    require 'config/config.php';
    require 'funciones/autenticacion.php';
        autenticar();
    require 'funciones/conexion-local.php';
    require 'funciones/productos.php';
    $agregar = agregarProducto( );
    $css = 'danger';
    $mensaje = 'No se pudo agregar el producto.';
    if ( $agregar ){
        $css = 'success';
        $mensaje = 'Producto agregada correctamente.';
    }
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container py-4">
        <h1>Alta de un producto</h1>

        <div class="alert alert-<?= $css ?> p-4 col-8 mx-auto shadow">
            <?= $mensaje ?>
            <a href="adminProductos.php" class="btn btn-outline-secondary">
                Volver a panel de productos
            </a>
        </div>
        
    </main>

<?php
    include 'layout/footer.php';
?>